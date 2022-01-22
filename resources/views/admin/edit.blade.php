@extends('admin.layout')
@section('title','عقارك')
@section('content')

    <br><br><br>
    <div class="container mt-5 text-center ba">
        @php

        $status = [0,1];
        @endphp

        <form action="{{route('admin.update',$house->id)}}" method="POST">

            @csrf
            @method('PUT')
            <select name="status" class="form-control">

                @foreach($status as $open)
                    <option value="{{$open}}" {{$open == $house->status ? 'selected' : ''}}>{{$open}}</option>
                @endforeach
            </select>
            <button class="btn btn-primary mt-3" type="submit">تفعيل الاعلان</button>
        </form>
    </div>
@endsection
