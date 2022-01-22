@extends('admin.layout')
@section('title','عقارك')
@section('content')

    <br><br>
    <div class="container za">
        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif
    </div>

    <table class="vag" id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>{{__('navbar.id')}}</th>
            <th>{{__('navbar.name')}}</th>
            <th>{{__('navbar.email')}}</th>
            <th>{{__('navbar.phone')}}</th>

        </tr>
        </thead>

        @if($users->count() == true)

            @foreach($users as $user)

                <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>

                   

                </tr>
                </tbody>
            @endforeach

        @elseif($users->count() == false)
            <div class="alert alert-danger text-right">
                {{__('لا يوجد مستخدمين')}}
            </div>
        @endif
    </table>
    {{ $users->links('pagination::bootstrap-4') }}
@endsection

