@extends('layouts.app')
@section('title','عقارك')
@section('content')
    <!--This Is Header-->
    <div class="header">
        <div class="container">

            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active one">
                        <div class="container alpha1">
                            <div class="alpha">

                                <div>
                                    <h2>عقارك</h2>
                                    <p>إذا كنت تبحث عن عقار أو ترغب في الإعلان عن عقارك في أي منطقة بالتجمع يجب ألا يفوتك تحميل تطبيق عقارك على هاتفك</p>
                                    <button><a class="text-white" href="{{route('houses.sale')}}">عقاري</a></button>
                                    <button><a class="text-white" href="">معلومات عننا</a></button>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
@endsection
