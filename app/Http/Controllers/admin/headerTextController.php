<?php

namespace App\Http\Controllers\admin;

use App\headerTextModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use DataTables;

class headerTextController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = headerTextModel::query();
//            dd($data->get());
            return DataTables::eloquent($data)
                ->addColumn('action',function($row){
                    $html = '<a href="'.route('admin.header-text-add',['id'=> Crypt::encrypt($row->id)]).'"
                                    class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                            <a data-action="delete" data-href="'.route('admin.header-text-delete',['id'=> Crypt::encrypt($row->id)]).'"
                            class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Delete</a>';
                    return $html;
                })
//                ->rawColumns(['action'])
//                ->make(true);
                ->toJson();
        }
        return view('pages.admin.headerText.index');
    }

    public function add($id = null){
        $parm = "Add";
        $data = new headerTextModel;
        if($id != null){
            $cid= $id;
            $id = Crypt::decrypt($id);
            $parm = "Edit";
            $action = route("admin.header-text-add-post", ["id" => $cid]);
            $data = headerTextModel::findOrFail($id);
        }
        else{
            $action = route("admin.header-text-add-post");
        }
        return view('pages.admin.headerText.add',compact('parm','action','data'));
    }

    public function addPost(Request $request,$id = null){
        $data = $request->all();
        $rules = [
            'name' => 'required|string|max:255|unique:header_text,name,NULL,id,deleted_at,NULL',
            'status' => 'required',
        ];
        $obj = new headerTextModel;
        $parm = "Add";
        if($id != null){
            $o_id = Crypt::decrypt($id);
            $rules['name'] = 'required|string|max:255|unique:header_text,name,' . $o_id . ',id,deleted_at,NULL';
            $parm = "Edit";
            $obj = headerTextModel::find($o_id);
        }
        $validate = Validator::make($data,$rules);
        if($validate->fails()){
            return response()->json(['status' => "Error", 'errors' => $validate->getMessageBag()->toArray()]);
        }
        $obj->name = $data['name'] ?? null;
        $obj->status = $data['status'] ?? null;
        if($obj->save()){
            return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
        }
        abort(404);
    }
    public function deletePost($id = null){
        $id = Crypt::decrypt($id);
        if($id){
            headerTextModel::where('id',$id)->delete();
            return response()->json(['status' => "Success", 'html' => "Deleted Successfully"]);
        }
        return response()->json(['status' => "Error", 'html' => "Deleting Failed"]);
    }
}
