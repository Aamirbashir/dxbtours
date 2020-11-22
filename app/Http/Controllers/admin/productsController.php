<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\products;
use App\uploadFilesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DataTables;
use App\servicesModel;


class productsController extends Controller
{
    //

       public function index(Request $request){
//        $data = products::with('logoFile')->find(2);
//        return Storage::url('app/'.$data->logoFile->url);
        if($request->ajax()){
            $data = products::query();
//            dd($data->get());
            return DataTables::eloquent($data)
                ->addColumn('action',function($row){
                    $html = '<a href="'.route('admin.products-add',['id'=> Crypt::encrypt($row->id)]).'"
                                    class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>

                            <a data-action="delete" data-href="'.route('admin.products-delete',['id'=> Crypt::encrypt($row->id)]).'"
                            class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Delete</a>';
                    return $html;
                })
//                ->rawColumns(['action'])
//                ->make(true);
                ->toJson();
        }
        return view('pages.admin.products.index');
    }

    public function add($id = null){
        $parm = "Add";
        $data = new products;
        $services_list=servicesModel::all();
        if($id != null){
           
            $cid= $id;
            $id = Crypt::decrypt($id);
            $parm = "Edit";
            $action = route("admin.products-add-post", ["id" => $cid]);
            $data = products::with('logoFile')->findOrFail($id);
            $gallery=products::findOrFail($id);
            dd($gallery->gallery());

        }
        else{
            $action = route("admin.products-add-post");
        }
        return view('pages.admin.products.add',compact('parm','action','data','services_list'));
    }

    public function addPost(Request $request,$id = null){
        $data = $request->all();
        $rules = [
            'name' => 'required|string|max:255|unique:services_list,name,NULL,id,deleted_at,NULL',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_price' => 'required',
            'service_id' => 'required',
            'product_image' => 'mimes:jpeg,png|max:1014',
        ];
        $obj = new products;
        $parm = "Add";
        if($id != null){
            $o_id = Crypt::decrypt($id);
            $rules['name'] = 'required|string|max:255|unique:services_list,name,' . $o_id . ',id,deleted_at,NULL';
            $parm = "Edit";
            $obj = products::find($o_id);
        }
        $validate = Validator::make($data,$rules);
        if($validate->fails()){
            return response()->json(['status' => "Error", 'errors' => $validate->getMessageBag()->toArray()]);
        }
        $obj->name = $data['name'] ?? null;
        $obj->title = $data['title'] ?? null;
        $obj->short_description = $data['short_description'] ?? null;
        $obj->long_description = $data['long_description'] ?? null;
        $obj->product_price = $data['product_price'] ?? null;
        $obj->display_order = $data['display_order'] ?? null;
        $obj->status = $data['status'] ?? null;
        $obj->price_criteria = $data['price_criteria'] ?? null;
        $obj->service_id = $data['service_id'] ?? null;
        $obj->number_of_pax = $data['number_of_pax'] ?? null;
        $obj->size=$data['size'];
          $obj->discount_price=$data['discount_price'];
            $obj->seo_keywords = $data['seo_keywords'] ?? null;
        $obj->product_slug=Str::slug($data['name'], '-');
        if($obj->save()){
            if($request->has('product_image')){
                $path = [];
                $file_path = "";
                $module = "products";
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
                $uploadFile = new uploadFilesModel;
                $uploadFile->name = $request->product_image->getClientOriginalName() ?? 'Products Image';
                $uploadFile->parent_id = $obj->id;
                $uploadFile->parent_table = (new products)->getTable();
                $uploadFile->url = $files;
                $uploadFile->status = 'Active';
                $uploadFile->save();
                $obj->product_image = $uploadFile->id;
                $obj->save();
            }
                return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
        }
        return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
    }
    public function deletePost($id = null){
        $id = Crypt::decrypt($id);
        if($id){
            products::where('id',$id)->delete();
            return response()->json(['status' => "Success", 'html' => "Deleted Successfully"]);
        }
        return response()->json(['status' => "Error", 'html' => "Deleting Failed"]);
    }

}
