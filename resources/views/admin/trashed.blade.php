@extends('admin.layout')
@section('title','عقارك')
@section('content')

    <br>
    <div class="container xa">
        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif
    </div>

    <table class="vag1" id="example" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th>{{__('navbar.house_title')}}</th>
            <th>{{__('navbar.department')}}</th>
            <th>{{__('navbar.price')}}</th>
            <th>{{__('navbar.date_day')}}</th>
            <th>{{__('navbar.mobile')}}</th>

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
                    <td>{{$owner->user->mobile}} </td>

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

