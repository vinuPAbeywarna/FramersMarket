<?php

namespace App\Http\Controllers;


use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function SignIn(Request $request){
        try {
            $User = UserModel::where('NIC','=',$request->input('NIC'))->get()->first();
            $isPasswordValid = Hash::check($request->input('Password'),$User->PasswordHash);

            if ($isPasswordValid){
                Session::put('Logged',true);
                Session::put('UserType', $User->UserType);
                Session::put('NIC',$User->NIC);
                return redirect()->route('Profile');
            } else {
                return view('SignIn')->with(['error'=>true]);
            }
        } catch (\Exception $e){
            //return response($e);
            return view('SignIn')->with(['error'=>true]);
        }
    }

    public function SignUp(Request $request){
        $newUser = new UserModel();
        $newUser->Name = $request->input('Name');
        $newUser->NIC = $request->input('NIC');
        $newUser->PasswordHash = Hash::make($request->input('Password'));
        $newUser->Phone = $request->input('Phone');
        $newUser->Address = $request->input('Address');
        $newUser->Email = $request->input('Email');
        $newUser->save();
        return redirect()->route('SignIn');
    }

    public function NewUser(Request $request){
        $newUser = new UserModel();
        $newUser->Name = $request->input('Name');
        $newUser->NIC = $request->input('NIC');
        $newUser->PasswordHash = Hash::make($request->input('Password'));
        $newUser->Phone = $request->input('Phone');
        $newUser->Address = $request->input('Address');
        $newUser->Email = $request->input('Email');
        $newUser->UserType = $request->input('UserType');
        $newUser->save();
        return redirect()->back();
    }

    public function UpdateUser(Request $request){
        UserModel::firstWhere('NIC','=',Session::get('NIC'))->update([
            'Name'=>$request->input('Name'),
            'NIC'=>$request->input('NIC'),
            'Phone'=>$request->input('Phone'),
            'Address'=>$request->input('Address'),
            'Email'=>$request->input('Email'),
        ]);

        return redirect()->route('Profile');

    }
}


