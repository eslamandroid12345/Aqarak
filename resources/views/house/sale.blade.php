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

        <form class="row form1" action="{{route('houses.sale')}}" method="GET">

            <input class="col-md-4 col-8" type="number" name="search" placeholder="ابحث بكود الاعلان">
            <button class="btn btn-primary col-md-1 col-2" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <table class="vag" id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>عنوان الاعلان</th>
            <th>عنوان العقار</th>
            <th>القسم</th>
            <th>السعر</th>
            <th>اخذ اجراء</th>

        </tr>
        </thead>

        @if($owners->count() == true)

            @foreach($owners as $owner)

                <tbody>
                <tr>
                    <td>{{$owner->add_title}}</td>
                    <td>{{$owner->house_title}}</td>
                    <td>{{$owner->department}}</td>
                    <td>{{$owner->price}}</td>
                    <td class="fad1">


                            <a class="btn btn-primary" href="{{route('houses.show',$owner->id)}}"><i class="fa fa-eye gad"></i></a>
                            <a class="btn btn-danger" href="{{route('houses.edit.user',$owner->id)}}"><i class="fa fa-eye gad"></i></a>







                    </td>
                </tr>
                </tbody>
            @endforeach

        @elseif($owners->count() == false)
            <div class="alert alert-danger text-right">
                {{__('لا يوجد عقار')}}
            </div>
        @endif
    </table>
    {{ $owners->links('pagination::bootstrap-4') }}
@endsection

