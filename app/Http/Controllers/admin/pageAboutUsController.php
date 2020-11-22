<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\pageAboutUsModel;
use App\uploadFilesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class pageAboutUsController extends Controller
{
    public function add($id = null){
        $data = pageAboutUsModel::first();
        $action = route("admin.page-about-us-add-post", ["id" => Crypt::encrypt($data->id)]);
        return view('pages.admin.pageAboutUs.add',compact('action','data'));
    }

    public function addPost(Request $request,$id = null){
        $data = $request->all();
        $rules = [
            'description' => 'required',
            'status' => 'required',
        ];
        $obj = new pageAboutUsModel;
        $parm = "Add";
        if($id != null){
            $o_id = Crypt::decrypt($id);
            $parm = "Edit";
            $obj = pageAboutUsModel::find($o_id);
        }
        $validate = Validator::make($data,$rules);
        if($validate->fails()){
            return response()->json(['status' => "Error", 'errors' => $validate->getMessageBag()->toArray()]);
        }
        $obj->description = $data['description'] ?? null;
        $obj->status = $data['status'] ?? null;
        if($obj->save()){
            if($request->has('logo')){
                $path = [];
                $file_path = "";
                $module = "about-us";
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
                $uploadFile->name = $request->logo->getClientOriginalName() ?? 'About Us Logo';
                $uploadFile->parent_id = $obj->id;
                $uploadFile->parent_table = (new pageAboutUsModel)->getTable();
                $uploadFile->url = $files;
                $uploadFile->status = 'Active';
                $uploadFile->save();
                $obj->logo_link = $uploadFile->id;
                $obj->save();
            }
            return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
        }
        abort(404);
    }
}
