<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\contactUsModel;
use DataTables;
use Illuminate\Support\Facades\Crypt;
use App\bookings_details;
use App\products;
use Illuminate\Support\Facades\Validator;
class bookingsController extends Controller
{
    //

      public function index(Request $request){
//        $data = products::with('logoFile')->find(2);
//        return Storage::url('app/'.$data->logoFile->url);
        if($request->ajax()){
            $data = contactUsModel::query();
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
        return view('pages.admin.bookings.index');
    }
    public function confirmBookings(Request $request,$date=null){
//        $data = products::with('logoFile')->find(2);
//        return Storage::url('app/'.$data->logoFile->url);

        if($request->ajax()){
            
            $data = bookings_details::query();
//            dd($data->get());
            return DataTables::eloquent($data)
                ->addColumn('action',function($row){
                    $html = '<a href="'.route('admin.bookings-add',['id'=> Crypt::encrypt($row->id)]).'"
                                    class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>

                            <a data-action="delete" data-href="'.route('admin.products-delete',['id'=> Crypt::encrypt($row->id)]).'"
                            class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i> Delete</a>';
                    return $html;
                })
//                ->rawColumns(['action'])
//                ->make(true);
                ->toJson();
        }
        return view('pages.admin.bookings.bookings');
    }

     public function add($id = null){
        $parm = "Add";
        $data = new bookings_details;
        $products=products::all();
        if($id != null){
            $cid= $id;
            $id = Crypt::decrypt($id);
            $parm = "Edit";
            $action = route("admin.bookings-add-post", ["id" => $cid]);
            $data = bookings_details::findOrFail($id);
        }
        else{
            $action = route("admin.bookings-add-post");
        }
        return view('pages.admin.bookings.add',compact('parm','action','data','products'));
    }

    public function addPost(Request $request,$id = null){
        $data = $request->all();
        $rules = [
            'service_name' => 'required|string|max:255',
        ];
        $obj = new bookings_details;
        $parm = "Add";
        if($id != null){
            $o_id = Crypt::decrypt($id);
            $rules['service_name'] = 'required|string|max:255';
            $parm = "Edit";
            $obj = bookings_details::find($o_id);
        }
        $validate = Validator::make($data,$rules);
        if($validate->fails()){
            return response()->json(['status' => "Error", 'errors' => $validate->getMessageBag()->toArray()]);
        }
        
            $obj->service_name = $data['service_name']??null;
            $obj->customer_name = $data['customer_name']??null;
            $obj->customer_email = $data['customer_email']??null;
            $obj->customer_cell= $data['customer_cell']??null;
            $obj->customer_phone= $data['customer_phone']??null;
            $obj->customer_address= $data['customer_address']??null;
            $obj->booking_date = $data['booking_date']??null;
            $obj->number_of_pax=$data['number_of_pax']??null;
            $obj->total_collection=$data['total_collection']??null;
            $obj->total_collected=$data['total_collected']??null;
            $obj->total_balance=$data['total_balance']??null;
            $obj->message=$data['message']??null;
            $obj->agent=$data['agent']??null;

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
}
