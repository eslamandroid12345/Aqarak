<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminController extends Controller
{

    use GeneralTrait;

    public function login(Request $request){
        $rules = [


            'email' => 'required',
            'password' => 'required',


        ];

        $message = [

            'email.required' => 'البريد الالكتروني مطلوب',
            'password.required' => 'حقل الباسورد مطلوب',

        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){

            return $this->returnDataError($validator->errors(),'400');
        }


        $token = Auth::guard('admin-api')->attempt($request->only(['email','password']));


        if(!$token){

            return $this->returnDataError('failed to login please try again','500');

        }

        $admin = Auth::guard('admin-api')->user();
        $admin->token = $token;

        return $this->returnData('welcome admin api','user',$admin);

    }


    public function logout(Request $request){

        $token = $request->header('auth-token');

        if($token){

            JWTAuth::setToken($token)->invalidate();

            return $this->returnSuccessMessage('6000','admin logout successfully');
        }
    }

}
