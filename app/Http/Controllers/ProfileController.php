<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    
    public function change_password(Request $request){

        $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()){

            return response()->json([
                'message' => 'Incorret validations',
                'errors' =>$validator->errors()
            ],401);
        }
        $user = $request->user();
        if(Hash::check($request->old_password, $user->password)){

            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'message' => 'password update successsfully'
            ],200);
        }else{
            return response()->json([
                'message' => 'password not matched'
            ],401);

        }

    }
}
