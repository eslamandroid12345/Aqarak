<?php

namespace App\Http\Controllers;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HouseController extends Controller
{


    public function about(){

        return view('house.about');
    }



    public function home(){


        return view('house.home');
    }


    public function welcome(){

        return view('house.welcome');
    }


        public function index(Request $request){


             $owners = House::Search($request)->where('status', '=', 1)->latest()->paginate(MXA_PAGINATE);
             return view('house.index',compact('owners'));//end data send


    }

    public function sale(Request $request){

        if($request->has('search')){

            $owners = House::where('id',$request->search)->paginate(MXA_PAGINATE);


        }else{

            $owners = House::where('status','=',1)->latest()->where('user_id',Auth::id())->paginate(MXA_PAGINATE);

        }

        return view('house.sale',compact('owners'));
    }


    public function create(){

        return view('house.create');


    }


    public function show(House $house){


        if($house->user_id != Auth::id()){

            abort('404');
        }

        return view('house.show',compact('house'));


    }


    public function edit(House $house){


        if($house->user_id != Auth::id()){

            abort('404');
        }

        return view('house.edit',compact('house'));


    }



    public function store(Request $request){

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
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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

        ];

        $request->validate($rule,$message);


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



        $house = House::create([

            'user_id' => Auth::id(),
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


        return redirect()->route('houses.sale')->with('success','تم اضافه عقارك بنجاح برجاء الانتظار الموافقه من قبل الادمن');


    }


    public function update(Request $request, House $house){


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


        ];

        $request->validate($rule,$message);


        $house->update($request->all());
        return redirect()->route('admin.sales')->with('success','تم تعديل عقارك بنجاح');


    }


    public function destroy($house){


         $dell = House::find($house)->delete();
        return redirect()->route('houses.sale')->with('success','تم حذف عقارك بنجاح');

    }






}//end of class HouseController
