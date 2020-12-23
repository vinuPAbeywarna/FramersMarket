<?php

namespace App\Http\Controllers;

use App\Models\FarmerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function SignIn(Request $request){
        $Farmer = FarmerModel::where('NIC','=',$request->input('NIC'))->get()->first();
        $isPasswordValid = Hash::check($request->input('Password'),$Farmer->PasswordHash);

        if ($isPasswordValid){
            return redirect()->route('Home');
        } else {
            return redirect()->route('SignIn');
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


