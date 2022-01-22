@extends('admin.layout')
@section('title','عقارك')
@section('content')

    <div class="container">

            <form class="row form1" action="{{route('admin.access')}}" method="GET">

                <input class="col-md-4 col-8" type="number" name="search" placeholder="ابحث بكود الاعلان">
                <button class="btn btn-primary col-md-1 col-2" type="submit"><i class="fa fa-search"></i></button>
            </form>
        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif
    </div>


    <table class="vag" id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>{{__('navbar.house_title')}}</th>
            <th>{{__('navbar.department')}}</th>
            <th>{{__('navbar.user')}}</th>
            <th>{{__('navbar.mobile')}}</th>
            <th>{{__('navbar.update')}}</th>


        </tr>
        </thead>

        @if($owners->count() == true)

            @foreach($owners as $owner)

                <tbody>
                <tr>
                    <td>{{$owner->house_title}}</td>
                    <td>{{$owner->department}}</td>
                    <td>{{$owner->user->name}}</td>
                    <td>{{$owner->user->mobile}}</td>
                    <td class="fad1">


                        <a class="btn btn-primary" href="{{route('admin.show',$owner->id)}}"><i class="fa fa-eye gad"></i></a>
                        <a href="{{route('admin.soft',$owner->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>





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


