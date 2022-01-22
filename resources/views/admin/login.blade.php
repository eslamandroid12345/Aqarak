
@extends('layouts.app')
@section('title','عقارك')
@section('content')
    <div class="head-login">
        <div class="alpha">
            <div class="container">

                <div class="row">
                    <div class="login1 col-lg-4 col-10">

                        <div>
                            <form action="{{ route('admin.open') }}" method="POST">

                                @csrf
                                <h6 style="text-align: right;padding-bottom: 10px;padding-right: 43px">دخول الادمن</h6>

                                <label>البريد الالكتروني</label> <input type="email" name="email" value="{{ old('email') }}" required>
                                <label for="">كلمة السر</label><input type="password" name="password" required>
                                <input type="submit" value="تسجيل الدخول">

                            </form>

                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>


@endsection

