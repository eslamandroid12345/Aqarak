@extends('layouts.app')

@section('content')
    <div class="head-login">
        <div class="alpha">
            <div class="container">

                <div class="row">
                    <div class="login1 col-lg-4 col-10">

                        <div>
                            <form action="{{ route('register') }}" method="POST">

                                @csrf
                                <label>الاسم</label> <input type="text" name="name" value="{{ old('name') }}" required>
                                <label>رقم الهاتف</label> <input type="number" name="mobile" required>
                                <label>نوع المستخدم</label> <select name="owner">
                                    <option value="مالك عقار">مالك عقار</option>
                                    <option value="شركات التسويق العقاري">شركات التسويق العقاري</option>
                                </select>
                                <label>البريد الالكتروني</label> <input type="email" name="email" value="{{ old('email') }}" required>
                                <label for="">كلمة السر</label><input type="password" name="password" required>
                                <label for="">تاكيد كلمة السر</label><input type="password" name="password_confirmation">
                                <label><a href="#">@error('check') {{$message}} @enderror</a></label>
                                <label  for=""><a href="#">الموافقه علي السياسات</a> </label><input style="width: auto" class="form-check-input" type="checkbox" name="check" value="on" id="flexCheckChecked">


                                <input type="submit" value="تسجيل حساب">

                            </form>

                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>


@endsection
