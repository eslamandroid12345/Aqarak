@extends('admin.layout')
@section('title','عقارك')
@section('content')

    <div class="container xa">
        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif
    </div>

    <br><br>
    <table class="vag" id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>{{__('navbar.house_title')}}</th>
            <th>{{__('navbar.department')}}</th>
            <th>{{__('navbar.price')}}</th>
            <th>{{__('navbar.date_day')}}</th>
            <th>{{__('navbar.update')}}</th>

        </tr>
        </thead>

        @if($owners->count() == true)

            @foreach($owners as $owner)

                <tbody>
                <tr>
                    <td>{{$owner->house_title}}</td>
                    <td>{{$owner->department}}</td>
                    <td>{{$owner->price}}</td>
                    <td>{{$owner->date_day}}</td>
                    <td class="fad1">


                             <a class="btn btn-primary" href="{{route('admin.edit',$owner->id)}}"><i class="fa fa-home gad"></i></a>
                             <a class="btn btn-secondary" href="{{route('admin.edit',$owner->id)}}"><i class="fa fa-edit gad"></i></a>
                             <a href="{{route('admin.sales.delete',$owner->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash gad"></i></a>







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

