@extends('admin.layout')
@section('title','عقارك')
@section('content')

    <br><br><br><br>
    <div class="announce-head xa">
        <div class="container">

            @if($errors->any)
                @foreach($errors->all() as $error)
                    <div class="alert alert-primary">
                        {{$error}}

                    </div>
                @endforeach
            @endif

            <form action="{{route('admin.company.rate')}}" method="post">

                @csrf
                <h4></h4>
                <div class="row">

                    <div class="announce-head1 col-lg-6 col-12">

                        <label for="">نوع المعلن</label><select name="choose_home"><option value="شقه">شقه</option><option value="فيلا">فيلا</option> </select><br>
                        <label for="">القسم</label><select name="choose_operation"><option value="ايجار">ايجار</option><option value="بيع">بيع</option></select><br>
                        <label for="">السعر</label><input type="number" name="choose_price"><br>
                        <label for="">نسبه المكتب</label><input type="number" name="choose_rate">
                        <label for="" style="visibility: hidden;">ارسال البيانات</label><input type="submit" value="ارسال البيانات">
                        <a class="btn btn-primary" href="{{route('admin.company.rate.show')}}">عرض العمليات</a>


                    </div>



                </div>
            </form>
        </div>
    </div>


@endsection
