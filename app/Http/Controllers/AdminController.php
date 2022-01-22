<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


final class AdminController extends Controller
{



    public function getHouses()
    {

        $owners = House::where('status','=',0)->latest()->paginate(MXA_PAGINATE);
        return view('admin.sales', compact('owners'));
    }

    public function users(){

        $users = User::latest()->paginate(MXA_PAGINATE);
        return view('admin.users',compact('users'));

    }


    public function homeData(){


        return view('admin.home');
    }
    //access house who status = 1 or true

    public function access(Request $request)
    {

         if($request->has('search')){

             $owners = House::where('id',$request->search)->paginate(MXA_PAGINATE);


         }else{

             $owners = House::where('status','=',1)->latest()->paginate(MXA_PAGINATE);

         }
        return view('admin.access', compact('owners'));
    }


    public function show(House $house){


        return view('admin.show',compact('house'));
    }

    public function soft($id)
    {

        $house = House::find($id)->delete();
        return redirect()->route('admin.access')->with('success', 'تم حذف العقار بنجاح');


    }


    public function adminLoginData()
    {

        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {

        $rules = [

            'email' => 'required|email',
            'password' => 'required|min:6',

        ];

        $message = [


            'email.required' => 'برجاء ادخال البريد الالكتروني',
            'password.required' => 'كلمه المرور مطلوبه',

        ];

        $request->validate($rules,$message);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('admin/home')->with('success', 'اهلا بك ايها المدير العام');

        } else {

            return back()->withInput($request->only('email'));
        }
    }


    public function salesTrashed(){

        $owners = House::onlyTrashed()->latest()->paginate(MXA_PAGINATE);
        return view('admin.trashed',compact('owners'));
    }

    public function edit(House $house){


        return view('admin.edit',compact('house'));

    }


    public function update(Request $request, House $house){

        $house->update([

           'status' => $request['status'],
        ]);

        return redirect()->route('admin.access')->with('success','تم تفعيل الاعلان بنجاح');
    }

    public function deleteUser($id){

        $user = User::find($id)->delete();
        return redirect()->route('admin.users')->with('success','تم حذف المستخدم بنجاح');
    }


    public function salaesDelete($id){

        $user = House::find($id)->delete();
        return redirect()->route('admin.sales')->with('success','تم حذف اعلان المستخدم بنجاح');

    }

}
