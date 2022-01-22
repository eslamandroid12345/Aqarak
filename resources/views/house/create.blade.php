@extends('layouts.app')
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

            <form action="{{route('houses.store')}}" method="post" enctype="multipart/form-data">

                @csrf
                <h4>بيانات العقار</h4>
                <div class="row">

                    <div class="announce-head1 col-lg-6 col-12">


                        <label for=""> عنوان الاعلان</label><input  type="text" name="add_title" placeholder="مثال: شقه للايجار / شقه للبيع"><br>
                        <label for="">عنوان العقار</label><input type="text" name="house_title"><br>
                        <label for="">نوع العقار</label><select name="villa"><option value="شقه">شقه</option><option value="فيلا">فيلا</option> </select><br>
                        <label for="" style="padding-top: 0px;">تفاصيل العقار</label><textarea name="description" id="" cols="30" rows="5" placeholder="تفاصيل العقار"></textarea><br>
                        <label for="">القسم</label><select name="department"><option value="ايجار">ايجار</option><option value="بيع">بيع</option></select><br>
                        <label for="">نوع المعلن</label><select name="title_type"><option value="صاحب العقار">صاحب العقار</option><option value="شركة تسويق عقاري">شركة تسويق عقاري</option> </select><br>

                        <label for="">السعر</label><input type="number" name="price"><br>
                        <label for="">عدد الغرف</label><input type="number" name="room_number">
                        <label for="">عدد الحمامات</label><input type="number" name="bathroom_number">
                        <label for="">المساحه</label><input type="number" name="space">
                        <label for="">التاريخ</label><input type="date" name="date_day">



                    </div>
                    <div class="announce-head2 col-lg-6 col-12">

                        <h6>اضف صور العقار</h6>

                        <div class="input-group control-group increment" >
                            <input type="file" name="filename[]">
                           
                        </div>

                        
                        <div class="input-group control-group increment" >
                            <input type="file" name="filename[]">
                           
                        </div>

                        
                        <div class="input-group control-group increment" >
                            <input type="file" name="filename[]">
                           
                        </div>

                        
                        <div class="input-group control-group increment" >
                            <input type="file" name="filename[]">
                           
                        </div>


                      

                    </div>
                    <div class="announce-head3 col-lg-6 col-12">
                        <label for="" style="visibility: hidden;">ارسال البيانات</label><input type="submit" value="ارسال البيانات">
                    </div>

                </div>
            </form>
        </div>
    </div>


@endsection
