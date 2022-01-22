<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
    <meta name="description" content="إذا كنت تبحث عن عقار أو ترغب في الإعلان عن عقارك في أي منطقة بالتجمع يجب ألا يفوتك تحميل تطبيق عقارك على هاتفك">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

</head>

<style>


    .header {


        height: 100vh;
        width: 100%;
        background: url({{asset('image/za.jpg')}}) no-repeat;
        background-size: 100% 100%;
        overflow: hidden;
        align-items: center;
        display: flex;
    }

    .head-login{

        height: 100vh;
        width: 100%;
        background: url({{asset('image/za.jpg')}}) no-repeat;
        background-size: 100% 100%;
        align-items: center;
    }

    @media(max-width:768px) {
        .header {


            height: 100vh;
            width: 100%;
            background: url({{asset('image/555555555555555.jpg')}}) no-repeat;
            background-size: 100% 100%;
            overflow: hidden;
            align-items: center;
            display: flex;
        }

        .head-login{

            height: 100vh;
            width: 100%;
            background: url({{asset('image/555555555555555.jpg')}}) no-repeat;
            background-size: 100% 100%;
            align-items: center;
        }

    }

   .mal2 img:nth-of-type(2){

    display: none;

   }

   .mal2 img:nth-of-type(3){

display: none;

}
.mal2 img:nth-of-type(4){

display: none;

}
.mal2 img:nth-of-type(5){

display: none;

}

.mal2 img:nth-of-type(6){

display: none;

}

.mal2 img:nth-of-type(7){

display: none;

}

.mal2 img:nth-of-type(8){

display: none;

}

.mal2 img:nth-of-type(9){

display: none;

}.mal2 img:nth-of-type(10){

display: none;

}.mal2 img:nth-of-type(11){

display: none;

}.mal2 img:nth-of-type(12){

display: none;

}.mal2 img:nth-of-type(13){

display: none;

}.mal2 img:nth-of-type(14){

display: none;

}.mal2 img:nth-of-type(15){

display: none;

}.mal2 img:nth-of-type(16){

display: none;

}.mal2 img:nth-of-type(17){

display: none;

}.mal2 img:nth-of-type(18){

display: none;

}.mal2 img:nth-of-type(19){

display: none;

}

.mal2 img:nth-of-type(20){

display: none;

}
</style>
<body>

        @include('house.navbar')
        <main>
            @yield('content')
        </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="{{asset('js/image.js')}}"></script>
</body>
</html>
