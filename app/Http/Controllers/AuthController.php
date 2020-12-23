<?php

namespace App\Http\Controllers;

use App\Models\FarmerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function SignIn(Request $request){
        try {
            $Farmer = FarmerModel::where('NIC','=',$request->input('NIC'))->get()->first();
            $isPasswordValid = Hash::check($request->input('Password'),$Farmer->PasswordHash);

            if ($isPasswordValid){
                Session::put('Logged',true);
                return view('SignIn')->with(['error'=>false]);
            } else {
                return view('SignIn')->with(['error'=>true]);
            }
        } catch (\Exception $e){
            return view('SignIn')->with(['error'=>true]);
        }
    }

    public function SignUp(Request $request){
        $newFarmer = new FarmerModel();
        $newFarmer->Name = $request->input('Name');
        $newFarmer->NIC = $request->input('NIC');
        $newFarmer->PasswordHash = Hash::make($request->input('Password'));
        $newFarmer->Phone = $request->input('Phone');
        $newFarmer->Address = $request->input('Address');
        $newFarmer->Email = $request->input('Email');
        $newFarmer->save();
        return redirect()->route('SignIn');
    }


}


