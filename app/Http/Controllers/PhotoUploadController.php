<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PhotoUploadController extends Controller
{
    public function Upload(Request $request){

        if ($request->hasFile('Photo')){

            $extension = $request->file('Photo')->getClientOriginalExtension();
            $fileNameToStore = Session::get('NIC').'.'.$extension;
            $path = $request->file('Photo')->storeAs('public',$fileNameToStore);
            UserModel::where('NIC','=',Session::get('NIC'))->update(['Photo'=>$fileNameToStore]);


            return redirect()->back();
        }
        return response('Error');

    }
}
