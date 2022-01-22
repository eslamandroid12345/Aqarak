@extends('layouts.app')
@section('title','عقارك')
@section('content')

    <br><br><br><br>
    <div class="container xa">
        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif


            <form class="row form1" action="{{route('houses.data')}}" method="GET">

                <input class="col-md-4 col-6 ha" type="number" name="price" placeholder="ابحث بالسعر المناسب لك" autocomplete="off">

                       <select class="col-md-4 col-5 ha" name="house_title">
                         <option value ="التجمع التالت">التجمع التالت</option>
                         <option value ="التجمع الخامس">التجمع الخامس</option>
              </select>
                   <input class="col-md-4 col-6 ha" type="text" placeholder="سكن مصر / نزهه التجمع ..." name="add_title" autocomplete="off">


                     <input class="col-md-4 col-5 ha" type="text" placeholder="شقه / فيلا" name="villa" autocomplete="off">
                   <input class="col-md-4 col-6 ha" type="text" placeholder="ايجار / بيع" name="department" autocomplete="off">


                <button style="background: #177777;margin-top:15px;padding:7px 3px" class="btn col-md-1 col-3 text-white" type="submit">بحث</button>
            </form>
    </div>



        @if($owners->count() == true)

            <div class="head-photo">
                <div class="container">
                    <div class="row">
                    @foreach($owners as $owner)

                            <div class="head-photo1 col-md-3 col-12">
                                <div class="head-photo2 mal2">
                                    @if(empty(json_decode($owner->filename)))
                                        <div class="rar" style="width: 100%;height: 350px">
                                            <h6>لا يوجد صور للشقه</h6>
                                        </div>
                                    @else
                                        @foreach(json_decode($owner->filename) as $images)
                                            <img style="width: 100%;height: 350px" src="{{URL::to('/students/'.$images)}}">
                                        @endforeach
                                    @endif

                                </div>
                                <div class="head-para">

                                    <h6 style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{$owner->description}}</h6>
                                    <p><i class="fa fa-map-marker-alt"></i><span for="">{{$owner->house_title}}</span></p>
                                    <p><i class="fa fa-map-home"></i><span for="">{{$owner->villa}}</span></p>
                                    <p><i class="fa fa-home"></i><span for="">{{$owner->department}}</span></p>
                                    <p>

        <span>
        <i class="icon fa fa-expand-arrows-alt"></i>
        {{$owner->space}} متر
        </span>
                                        <span>
        <i class="icon fa fa-bed"></i>
        {{$owner->room_number}} غرف </span>
                                        <span>
        <i class="icon fa fa-bath"></i>
        {{$owner->bathroom_number}} حمام </span>
                                    </p>

                                    <p style="color: #f9a825;font-weight: 600;font-size: 16px;">{{$owner->price}} <span>جنيه</span></p>
                                    <a style="background: #177777;padding: 9px 25px" class="btn text-white" href="{{route('houses.show',$owner->id)}}">التفاصيل</a>


                                </div>


                            </div>






            @endforeach
                        </div>
                    </div>
                </div>


                @elseif($owners->count() == false)
            <div class="alert alert-danger text-right">
                {{__('لا يوجد عقار')}}
            </div>
        @endif

    {{ $owners->links('pagination::bootstrap-4') }}
@endsection

