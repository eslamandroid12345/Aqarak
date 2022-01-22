
@extends('layouts.app')

@section('content')
    <div class="head-login">
        <div class="alpha">
            <div class="container">

                <div class="row">
                    <div class="login1 col-lg-4 col-10">

                        <div>
                            <form action="{{ route('login') }}" method="POST">

                                @csrf

                                <label>البريد الالكتروني</label> <input type="email" name="email" value="{{ old('email') }}" required>
                                <label for="">كلمة السر</label><input type="password" name="password" required>
                                <input type="submit" value="تسجيل الدخول">
                                <a href="{{route('register')}}"> <input style="background: #3b69a5;border: 1px solid #3b69a5" class="text-white" type="button" value="تسجيل حساب"></a>


                            </form>

                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>


@endsection

