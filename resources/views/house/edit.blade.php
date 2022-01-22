@extends('layouts.app')
@section('title','عقارك')

@section('content')

    <div class="announce-head">
        <div class="container">

            @if($errors->any)
                @foreach($errors->all() as $error)
                    <div class="alert alert-primary">
                        {{$error}}

                    </div>
                @endforeach
            @endif

            @php

            $depart = ['بيع','ايجار'];
            $company = ['صاحب العقار','شركة تسويق عقاري'];
            $villa = ['شقه','فيلا'];
            @endphp
            <form action="{{route('houses.update',$house->id)}}" method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <h4>بيانات العقار</h4>
                <div class="row">

                    <div class="announce-head1 col-lg-6 col-12">

                        <label for="">عنوان الاعلان</label><input type="text" name="add_title" value="{{$house->add_title}}"><br>
                        <label for="">عنوان العقار</label><input type="text" name="house_title"  value="{{$house->house_title}}"><br>
                        <label for="" style="padding-top: 0px;">تفاصيل العقار</label><textarea name="description" id="" cols="30" rows="5" > {{$house->description}}</textarea><br>
                        <label for="">القسم</label><select name="department">
                            @foreach($depart as $now)
                            <option value="{{$now}}" {{$now == $house->department ? 'selected' : ''}}>{{$now}}</option>
                            @endforeach
                        </select><br>

                        <label for="">نوع المعلن</label>
                        <select name="title_type">
                            @foreach($company as $owners)
                                <option value="{{$owners}}" {{$owners == $house->title_type ? 'selected' : ''}}>{{$owners}}</option>
                            @endforeach
                        </select><br>

                        <label for="">نوع العقار</label>
                        <select name="title_type">
                            @foreach($villa as $vi)
                                <option value="{{$vi}}" {{$vi == $house->villa ? 'selected' : ''}}>{{$vi}}</option>
                            @endforeach
                        </select><br>

                        <label for="">السعر</label><input type="number" name="price" value="{{$house->price}}"><br>
                        <label for="">عدد الغرف</label><input type="number" name="room_number" value="{{$house->room_number}}">
                        <label for="">عدد الحمامات</label><input type="number" name="bathroom_number" value="{{$house->bathroom_number}}">
                        <label for="">المساحه</label><input type="number" name="space" value="{{$house->space}}">
                        <label for="">التاريخ</label><input type="date" name="date_day" value="{{$house->date_day}}"><br>

                            <button class="btn btn-primary" type="submit">تحديث</button>

                    </div>


                </div>
            </form>
        </div>
    </div>




@endsection
