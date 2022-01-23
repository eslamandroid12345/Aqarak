<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\traits\GeneralTrait;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class HouseController extends Controller
{
    use GeneralTrait;


    public function index(Request $request){


        $houses = House::get();
        if(!$houses){


            return $this->returnDataError('empty houses','5000');

        }else{

            return  $this->returnData('تم الحصول علي البيانات بنجاح','houses',$houses);
        }

    }

    public function create(Request $request){


        $rule = [

            'add_title' => 'required',
            'house_title' => 'required',
            'description' => 'required',
            'department'  => 'required',
            'title_type'  => 'required',
            'price'  => 'required',
            'room_number'  => 'required',
            'bathroom_number'  => 'required',
            'space'  => 'required',
            'date_day'  => 'required',
            'filename' => 'nullable',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'villa' => 'required'
        ];

        $message = [

            'add_title.required' => 'برجاء اضافه عنوان الاعلان',
            'house_title.required' => 'برجاء اضافه عنوان العقار',
            'description.required' => 'برجاء اضافه تفاصيل العقار',
            'department.required'  => 'برجاء اضافه القسم',
            'title_type.required'  => 'برجاء اضافه نوع المعلن',
            'price.required'  => 'برجاء اضافه سعر العقار',
            'room_number.required'  => 'ادخل عدد الغرف',
            'bathroom_number.required'  => 'ادخل عدد الحمامات',
            'space.required'  => ' برجاء ادخال مساحه العقار',
            'date_day.required'  => 'برجاء ادخال تاريخ التسجيل',
            'villa.required' => 'برجاء ادخال قسم العقار',

        ];

        $validator = Validator::make($request->all(),$rule,$message);

        if($validator->fails()){


            return $this->returnDataError($validator->errors(),'400');
        }



        $user = JWTAuth::parseToken()->authenticate();//user who authenticated api OR JWTAuth::user();
        $user_id = $user->id;//id of user api who authenticated


        $data = [];//empty array
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/students/', $name);
                $data[] = $name;
            }
        }



            $house = $user->house()->create([

            'user_id' => $user_id,//user id of api
            'add_title' => $request['add_title'],
            'house_title' => $request['house_title'],
            'villa' => $request['villa'],
            'description' => $request['description'],
            'department' => $request['department'],
            'title_type' => $request['title_type'],
            'price' => $request['price'],
            'room_number' => $request['room_number'],
            'bathroom_number' => $request['bathroom_number'],
            'space'=> $request['space'],
            'date_day'=> $request['date_day'],
            'filename' => json_encode($data),
            'status' => 0,


        ]);


        return $this->returnData('house created successfully','house',$house);

    }
}
