<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\traits\GeneralTrait;
use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsersController extends Controller
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


        $token = Auth::guard('user-api')->attempt($request->only(['email','password']));


        if(!$token){

            return $this->returnDataError('failed to login please try again','500');

        }

        $user = Auth::guard('user-api')->user();
        $user->token = $token;

        return $this->returnData('welcome user api','user',$user);



    }



    public function register(Request $request){


        $rules = [

            'name' => 'required|max:10',
            'email' => 'required|unique:users',
            'owner' => 'required',
            'mobile' => 'required|max:11',
            'password' => 'required|min:8',
            'check' => 'required',


        ];

        $message = [

            'name.required' => 'الاسم مطلوب برجاء ادخاله',
            'email.required' => 'البريد الالكتروني مطلوب',
            'owner.required' => 'حقل مالك العقار مطلوب',
            'mobile.required' => 'حقل الهاتف مطلوب',
            'password.required' => 'حقل الباسورد مطلوب',
            'password.min' => 'حقل الباسورد لا يجب ان يكون اقل من 8 حروف',
            'email.unique' => 'هذا الايميل مستخدم بالفعل',
            'check.required' => 'برجاء الموافقه علي السياسات',

        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){

            return $this->returnDataError($validator->errors(),'400');
        }

        $user = User::create([

            'name' => $request['name'],
            'email' => $request['email'],
            'owner' => $request['owner'],
            'mobile' => $request['mobile'],
            'password' => Hash::make($request['password']),
            'check' => $request['check'],


        ]);

        if($user){

            return $this->returnData('user created successfully','user',$user);
        }


    }

    public function index(){

        $users  = UserResource::collection(User::get());
        return $this->returnData('تم الحصول علي بيانات المستخدمين','users',$users);

    }


    public function update(Request $request,$id){


        $rules = [

            'name' => 'required|max:10',
            'email' => 'required|unique:users',
            'owner' => 'required',
            'mobile' => 'required|max:11',
            'password' => 'required|min:8',


        ];

        $message = [

            'name.required' => 'الاسم مطلوب برجاء ادخاله',
            'email.required' => 'البريد الالكتروني مطلوب',
            'owner.required' => 'حقل مالك العقار مطلوب',
            'mobile.required' => 'حقل الهاتف مطلوب',
            'password.required' => 'حقل الباسورد مطلوب',
            'password.min' => 'حقل الباسورد لا يجب ان يكون اقل من 8 حروف',
            'email.unique' => 'هذا الايميل مستخدم بالفعل',

        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){

            return $this->returnDataError($validator->errors(),'400');
        }

        $user = new UserResource(User::find($id));

        if(!$user){

            $this->returnDataError('failed to find user api','400');
        }else{

            $user->update([

                'name' => $request['name'],
                'email' => $request['email'],
                'owner' => $request['owner'],
                'mobile' => $request['mobile'],
                'password' => Hash::make($request['password']),


            ]);


            return $this->returnData('تم تعديل بيانات المستخدم بنجاح','user',$user);
        }

    }


    public function dataUser(){

        $user = JWTAuth::parseToken()->authenticate();//user login api
        $user_id = $user->id;//id of user who authenticated with api

        $user = House::where('user_id',$user_id)->get();

        return $this->returnData('اهلا بك user','house',$user);

    }

    public function logout(Request $request){

        $token = $request->header('auth-token');

        if($token){

            JWTAuth::setToken($token)->invalidate();

            return $this->returnSuccessMessage('6000','user logout successfully');
        }
    }






}//end class user api
