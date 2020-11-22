<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\ourTeamModel;
use App\teamSocialModel;
use App\uploadFilesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ourTeamController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = ourTeamModel::query();
//            dd($data->get());
            return DataTables::eloquent($data)
                ->addColumn('action',function($row){
                    $html = '<a href="'.route('admin.our-team-add',['id'=> Crypt::encrypt($row->id)]).'"
                                    class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                            <a data-action="delete" data-href="'.route('admin.our-team-delete',['id'=> Crypt::encrypt($row->id)]).'"
                            class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Delete</a>';
                    return $html;
                })
//                ->rawColumns(['action'])
//                ->make(true);
                ->toJson();
        }
        return view('pages.admin.ourTeam.index');
    }

    public function add($id = null){
        $parm = "Add";
        $data = new ourTeamModel;
        if($id != null){
            $cid= $id;
            $id = Crypt::decrypt($id);
            $parm = "Edit";
            $action = route("admin.our-team-add-post", ["id" => $cid]);
            $data = ourTeamModel::with('socials','dp')->findOrFail($id);
        }
        else{
            $action = route("admin.our-team-add-post");
        }
        return view('pages.admin.ourTeam.add',compact('parm','action','data'));
    }

    public function addPost(Request $request,$id = null){
        $data = $request->all();
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'intro' => 'required',
            'status' => 'required',
        ];
        $obj = new ourTeamModel;
        $parm = "Add";
        if($id != null){
            $o_id = Crypt::decrypt($id);
            $rules['name'] = 'required';
            $parm = "Edit";
            $obj = ourTeamModel::find($o_id);
        }
        $validate = Validator::make($data,$rules);
        if($validate->fails()){
            return response()->json(['status' => "Error", 'errors' => $validate->getMessageBag()->toArray()]);
        }
        $obj->name = $data['name'] ?? null;
        $obj->designation = $data['designation'] ?? null;
        $obj->intro = $data['intro'] ?? null;
        $obj->status = $data['status'] ?? null;
        if($obj->save()){
            teamSocialModel::where('team_id',$obj->id)->delete();
            foreach($data['social_name'] as $key => $value){
                $link = new teamSocialModel;
                $link->team_id = $obj->id;
                $link->name = $data['social_name'][$key];
                $link->link = $data['social_link'][$key];
                $link->icon = $data['icon'][$key];
                $link->title = $data['social_title'][$key];
                $link->status = 'Active';
                $link->save();
            }
            if($request->has('display_image')){
                $path = [];
                $file_path = "";
                $module = "our-team";
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
                $files = Storage::putFile($file_path, $request->display_image);
                $uploadFile = new uploadFilesModel;
                $uploadFile->name = $request->display_image->getClientOriginalName() ?? 'Our Team Image';
                $uploadFile->parent_id = $obj->id;
                $uploadFile->parent_table = (new ourTeamModel)->getTable();
                $uploadFile->url = $files;
                $uploadFile->status = 'Active';
                $uploadFile->save();
                $obj->display_image = $uploadFile->id;
                $obj->save();
            }
            return response()->json(['status' => "Success", 'html' => "{$parm}ed Successfully"]);
        }
        abort(404);
    }

    public function deletePost($id = null){
        $id = Crypt::decrypt($id);
        if($id){
            ourTeamModel::where('id',$id)->delete();
            return response()->json(['status' => "Success", 'html' => "Deleted Successfully"]);
        }
        return response()->json(['status' => "Error", 'html' => "Deleting Failed"]);
    }

}
