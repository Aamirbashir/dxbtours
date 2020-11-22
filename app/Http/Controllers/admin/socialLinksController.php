<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\socialLinksModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use DataTables;

class socialLinksController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = socialLinksModel::query();
//            dd($data->get());
            return DataTables::eloquent($data)
                ->addColumn('action',function($row){
                    $html = '
                    <a href="'.route('admin.social-links-add',['id'=> Crypt::encrypt($row->id)]).'"
                                    class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                    <a data-action="delete" data-href="'.route('admin.social-links-delete',['id'=> Crypt::encrypt($row->id)]).'"
                                    class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Delete</a>
                                    ';
                    return $html;
                })
//                ->rawColumns(['action'])
//                ->make(true);
            ->toJson();
        }
        return view('pages.admin.socialLinks.index');
    }

    public function add($id = null){
        $parm = "Add";
        $data = new socialLinksModel;
        if($id != null){
            $cid= $id;
            $id = Crypt::decrypt($id);
            $parm = "Edit";
            $action = route("admin.social-links-add-post", ["id" => $cid]);
            $data = socialLinksModel::findOrFail($id);
        }
        else{
            $action = route("admin.social-links-add-post");
        }
        return view('pages.admin.socialLinks.add',compact('parm','action','data'));
    }

    public function addPost(Request $request,$id = null){
        $data = $request->all();
        $rules = [
            'name' => 'required|string|max:255|unique:social_links,name,NULL,id,deleted_at,NULL',
            'link' => 'required',
            'icon' => 'required',
            'title' => 'required',
            'status' => 'required',
        ];
        $obj = new socialLinksModel;
        $parm = "Add";
        if($id != null){
            $o_id = Crypt::decrypt($id);
            $rules['name'] = 'required|string|max:255|unique:social_links,name,' . $o_id . ',id,deleted_at,NULL';
            $parm = "Edit";
            $obj = socialLinksModel::find($o_id);
        }
        $validate = Validator::make($data,$rules);
        if($validate->fails()){
            return response()->json(['status' => "Error", 'errors' => $validate->getMessageBag()->toArray()]);
        }
        $obj->name = $data['name'] ?? null;
        $obj->link = $data['link'] ?? null;
        $obj->icon = $data['icon'] ?? null;
        $obj->title = $data['title'] ?? null;
        $obj->status = $data['status'] ?? null;
        if($obj->save()){
            return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
        }
        abort(404);
    }

    public function deletePost($id = null){
        $id = Crypt::decrypt($id);
        if($id){
            socialLinksModel::where('id',$id)->delete();
            return response()->json(['status' => "Success", 'html' => "Deleted Successfully"]);
        }
        return response()->json(['status' => "Error", 'html' => "Deleting Failed"]);
    }
}
