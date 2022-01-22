<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rate;

class RateController extends Controller
{



    public function register(){

        return view('admin.register');
    }

    public function rate(Request $request){

        $rules = [

            'choose_home' => 'required',
            'choose_operation' => 'required',
            'choose_price' => 'required',
            'choose_rate' => 'required',


        ];

        $messages = [

            'choose_home.required' => 'برجاء اختيار عقار',
            'choose_operation.required' => 'اختيار العمليه',
            'choose_price.required' => 'برجاء اختيار سعر العقار',
            'choose_rate.required' => 'برجاء اختيار نسبه العقار',
        ];

        $request->validate($rules,$messages);

        $rate = Rate::create($request->all());

        return redirect()->route('admin.company.rate.show')->with('success','تم تسجيل عمليه بيع الشقه بنجاح');

    }



    public function rateShow(){


        $rates = Rate::latest()->paginate(MXA_PAGINATE);
        return view('admin.rate',compact('rates'));

    }
}
