<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\servicesModel;
use App\uploadFilesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DataTables;

class servicesController extends Controller
{
    public function index(Request $request){
//        $data = servicesModel::with('logoFile')->find(2);
//        return Storage::url('app/'.$data->logoFile->url);
        if($request->ajax()){
            $data = servicesModel::query();
//            dd($data->get());
            return DataTables::eloquent($data)
                ->addColumn('action',function($row){
                    $html = '<a href="'.route('admin.services-add',['id'=> Crypt::encrypt($row->id)]).'"
                                    class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>

                            <a data-action="delete" data-href="'.route('admin.services-delete',['id'=> Crypt::encrypt($row->id)]).'"
                            class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Delete</a>';
                    return $html;
                })
//                ->rawColumns(['action'])
//                ->make(true);
                ->toJson();
        }
        return view('pages.admin.services.index');
    }

    public function add($id = null){
        $parm = "Add";
        $data = new servicesModel;
        if($id != null){
            $cid= $id;
            $id = Crypt::decrypt($id);
            $parm = "Edit";
            $action = route("admin.services-add-post", ["id" => $cid]);
            $data = servicesModel::with('logoFile')->findOrFail($id);
        }
        else{
            $action = route("admin.services-add-post");
        }
        return view('pages.admin.services.add',compact('parm','action','data'));
    }

    public function addPost(Request $request,$id = null){
        $data = $request->all();
        $rules = [
            'name' => 'required|string|max:255|unique:services_list,name,NULL,id,deleted_at,NULL',
            'short_description' => 'required',
            'long_description' => 'required',
            'title' => 'required',
            'logo' => 'mimes:jpeg,png|max:1014',
        ];
        $obj = new servicesModel;
        $parm = "Add";
        if($id != null){
            $o_id = Crypt::decrypt($id);
            $rules['name'] = 'required|string|max:255|unique:services_list,name,' . $o_id . ',id,deleted_at,NULL';
            $parm = "Edit";
            $obj = servicesModel::find($o_id);
        }
        $validate = Validator::make($data,$rules);
        if($validate->fails()){
            return response()->json(['status' => "Error", 'errors' => $validate->getMessageBag()->toArray()]);
        }
        $obj->name = $data['name'] ?? null;
        $obj->short_description = $data['short_description'] ?? null;
        $obj->long_description = $data['long_description'] ?? null;
        $obj->title = $data['title'] ?? null;
         $obj->display_order = $data['display_order'] ?? null;
        $obj->status = $data['status'] ?? null;
        $obj->slug=Str::slug($data['name'], '-');
         $obj->seo_keywords=$data['seo_keywords'] ?? null;
        if($obj->save()){
            if($request->has('logo')){
                $path = [];
                $file_path = "";
                $module = "services";
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
                $files = Storage::putFile($file_path, $request->logo);
                $uploadFile = new uploadFilesModel;
                $uploadFile->name = $request->logo->getClientOriginalName() ?? 'Service Image';
                $uploadFile->parent_id = $obj->id;
                $uploadFile->parent_table = (new servicesModel)->getTable();
                $uploadFile->url = $files;
                $uploadFile->status = 'Active';
                $uploadFile->save();
                $obj->logo = $uploadFile->id;
                $obj->save();
            }
                return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
        }
        return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
    }
    public function deletePost($id = null){
        $id = Crypt::decrypt($id);
        if($id){
            servicesModel::where('id',$id)->delete();
            return response()->json(['status' => "Success", 'html' => "Deleted Successfully"]);
        }
        return response()->json(['status' => "Error", 'html' => "Deleting Failed"]);
    }
}
