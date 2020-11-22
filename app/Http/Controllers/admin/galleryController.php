<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\gallery;
use App\servicesModel;
Use App\products;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Illuminate\Support\Facades\Crypt;

class galleryController extends Controller

{
    //

       public function index(Request $request){
//        $data = gallery::with('logoFile')->find(2);
//        return Storage::url('app/'.$data->logoFile->url);
        if($request->ajax()){
            
            $data = gallery::query();
//            dd($data->get());
            return DataTables::eloquent($data)
                ->addColumn('action',function($row){
                    $html = '<a href="'.route('admin.gallery-add',['id'=> Crypt::encrypt($row->id)]).'"
                                    class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>

                            <a data-action="delete" data-href="'.route('admin.gallery-delete',['id'=> Crypt::encrypt($row->id)]).'"
                            class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Delete</a>';
                    return $html;
                })
//                ->rawColumns(['action'])
//                ->make(true);
                ->toJson();
        }
        return view('pages.admin.gallery.index');
    }
public function add($id = null){
        $parm = "Add";
        $data = new  gallery;
        $services_list=products::all();
        if($id != null){
            $cid= $id;
            $id = Crypt::decrypt($id);
            $parm = "Edit";
            $action = route("admin.gallery-add-post", ["id" => $cid]);
            $data = gallery::findOrFail($id);
        }
        else{
            $action = route("admin.gallery-add-post");
        }
        return view('pages.admin.gallery.add',compact('parm','action','data','services_list'));
    }

    public function addPost(Request $request,$id = null){
        $data = $request->all();
       
        $rules = [
           
            'ImageUrl' => 'mimes:jpeg,png|max:1014',
        ];
        $obj = new gallery;
        $parm = "Add";
        if($id != null){
            $o_id = Crypt::decrypt($id);
            $rules['name'] = 'required|string|max:255|unique:services_list,name,' . $id . ',id,deleted_at,NULL';
            $parm = "Edit";
            $obj = gallery::find($id);
        }
        $validate = Validator::make($data,$rules);
        if($validate->fails()){
            return response()->json(['status' => "Error", 'errors' => $validate->getMessageBag()->toArray()]);
        }
        $obj->name = $data['name'] ?? null;
        $obj->type ='product';
        $obj->order = $data['order'] ?? null;
        $obj->status = $data['status'] ?? null;
        $obj->product_id=$data['service_id'];
       
     
            if($request->has('product_image')){
                $path = [];
                $file_path = "";
                $module = "gallery";
                $inner = function ($arr) use (&$inner, &$path) {
                    if (is_array($arr)) {
                        foreach ($arr as $key => $value) {
                            if (is_array($value)) {
                                $path[] = $key;
                                $inner($value);
                            } else {
                                $path[] = $value;
                            }
                        }
                    } else {
                        $path[] = $arr;
                    }
                };
                $inner($module);
                $now_time = Carbon::now();
                $path[] = $now_time->year;
                $path[] = $now_time->format("F");
                $file_path = implode("/", $path);
                $files = Storage::putFile($file_path, $request->product_image);
                $obj->ImageUrl = $files;
                $obj->status = 'Active';
                $obj->save();
                return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);

            }
            else
            return response()->json(['status' => "Error", 'errors' =>"empty Image"]);

               
        
        return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
    }
    public function deletePost($id = null){
        $id = Crypt::decrypt($id);
        if($id){
            gallery::where('id',$id)->delete();
            return response()->json(['status' => "Success", 'html' => "Deleted Successfully"]);
        }
        return response()->json(['status' => "Error", 'html' => "Deleting Failed"]);
    }
}
