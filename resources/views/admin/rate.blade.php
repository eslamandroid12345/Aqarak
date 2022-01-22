@extends('admin.layout')
@section('title','عقارك')
@section('content')

    <br><br><br>
    <div class="container form1">

        @if($message = Session::get('success'))

            <div class="alert alert-primary">
                {{$message}}
            </div>

        @endif
    </div>

    <table class="vag" id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>نوع العقار</th>
            <th>نوع العمليه</th>
            <th>سعر العقار</th>
            <th>نسبه المكتب</th>
            <th>الناريخ</th>

        </tr>
        </thead>

        @if($rates->count() == true)

            @foreach($rates as $rate)

                <tbody>
                <tr>
                    <td>{{$rate->choose_home}}</td>
                    <td>{{$rate->choose_operation}}</td>
                    <td>{{$rate->choose_price}}</td>
                    <td>{{$rate->choose_rate}}</td>
                    <td>{{$rate->created_at}}</td>


                </tr>
                </tbody>
            @endforeach

        @elseif($rates->count() == false)
            <div class="alert alert-danger text-right">
                {{__('لا يوجد عقار')}}
            </div>
        @endif
    </table>
    {{ $rates->links('pagination::bootstrap-4') }}
@endsection

