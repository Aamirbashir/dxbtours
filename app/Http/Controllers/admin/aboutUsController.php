<?php

namespace App\Http\Controllers\admin;

use App\aboutUsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class aboutUsController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = aboutUsModel::query();
//            dd($data->get());
            return DataTables::eloquent($data)
                ->addColumn('action',function($row){
                    $html = '<a href="'.route('admin.about-us-add',['id'=> Crypt::encrypt($row->id)]).'"
                                    class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>';
                    return $html;
                })
//                ->rawColumns(['action'])
//                ->make(true);
                ->toJson();
        }
        return view('pages.admin.aboutUs.index');
    }

    public function add($id = null){
//        $parm = "Add";
//        $data = new aboutUsModel;
//        if($id != null){
//            $cid= $id;
//            $id = Crypt::decrypt($id);
//            $parm = "Edit";
            $data = aboutUsModel::first();
            $action = route("admin.about-us-add-post", ["id" => Crypt::encrypt($data->id)]);
//        }
//        else{
//            $action = route("admin.about-us-add-post");
//        }
        return view('pages.admin.aboutUs.add',compact('action','data'));
    }

    public function addPost(Request $request,$id = null){
        $data = $request->all();
        $rules = [
            'description' => 'required',
            'status' => 'required',
        ];
        $obj = new aboutUsModel;
        $parm = "Add";
        if($id != null){
            $o_id = Crypt::decrypt($id);
            $parm = "Edit";
            $obj = aboutUsModel::find($o_id);
        }
        $validate = Validator::make($data,$rules);
        if($validate->fails()){
            return response()->json(['status' => "Error", 'errors' => $validate->getMessageBag()->toArray()]);
        }
        $obj->description = $data['description'] ?? null;
        $obj->status = $data['status'] ?? null;
        if($obj->save()){
            return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
        }
        abort(404);
    }


}
