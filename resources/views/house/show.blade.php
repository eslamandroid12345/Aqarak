@extends('layouts.app')

@section('title','عقارك')
@section('content')

    <br><br>

    <div class="search2-head form1">
        <div class="container">
            <div class="row">



                <div style="margin-top: 22px;border:none" class="head-photo1 col-lg-5 col-12">



                    <div  class="head-para">

                        <h6>تفاصيل الاعلان</h6>
                        <p><i class="fa fa-map-marker-alt"></i><span for="">{{$house->add_title}}</span></p>
                        <p><i class="fa fa-map-marker-alt"></i><span for="">{{$house->house_title}}</span></p>
                        <p><i class="fa fa-building"></i><span for="">{{$house->villa}}</span></p>
                        <p><i class="fa fa-home"></i><span for="">{{$house->department}}</span></p>
                        <p>

             <span>
             <i class="icon fa fa-expand-arrows-alt"></i>
                 {{$house->space}} متر
             </span>
                            <span>
             <i class="icon fa fa-bed"></i>
             {{$house->room_number}} غرف </span>
                            <span>
             <i class="icon fa fa-bath"></i>
             {{$house->bathroom_number}} حمام </span>
                        </p>

                        <p><span>السعر: </span> <span>{{$house->price}} جنيه  </span></p>

                        <p><span>كود الاعلان</span><span>{{$house->id}}</span></p>
                        <p><span>تاريخ النشر</span><span>{{$house->date_day}}</span></p>

                        <p><a href="tel:01019700137"><span style="padding-left: 2px;"><i class="fa fa-mobile-alt"></i></span><span>0{{$house->phone_1}}</span></a></p>
                        <p><a href="tel:01014183020"><span style="padding-left: 2px;"><i class="fa fa-mobile-alt"></i></span><span>0{{$house->phone_2}}</span></a></p>
                        <p><a href="tel:01012027253"><span style="padding-left: 2px;"><i class="fa fa-mobile-alt"></i></span><span>0{{$house->phone_3}}</span></a></p>

                        <p><span style="font-weight: bold;padding-left: 10px;">وصف الاعلان:</span>,<span>{{$house->description}}
                 </span></p>
                    </div>


                </div>

                <div class="head-photo11 col-lg-7 col-12">


                    @foreach(json_decode($house->filename, true) as $images)
                        <img src="{{URL::to('/students/'.$images)}}">
                    @endforeach


                </div>


            </div>
        </div>
    </div>
@endsection
