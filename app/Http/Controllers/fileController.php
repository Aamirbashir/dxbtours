<?php

namespace App\Http\Controllers;

use App\uploadFilesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Image;

class fileController extends Controller
{
    public function getFile($id){
        $id = str_replace('.jpg','',$id);
        $id = Crypt::decrypt($id);
        $file = uploadFilesModel::find($id);
//        dd(storage_path('app/'.$file->url));
        $image = Image::make(storage_path('app/'.$file->url));
        return $image->response();
    }
}
