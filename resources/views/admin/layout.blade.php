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

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

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



    }



</style>
{{-- start direction --}}
@if(LaravelLocalization::setLocale() == 'en')
<style>
    body{

        direction: ltr;
    }
    .navbar{

        direction: ltr;

    }
</style>
@endif

{{-- end direction --}}
<body>


     @include('admin.navbar2')
    <main>
        @yield('content')
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="{{asset('js/jquery2.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>




     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     <script>

         $(function(){
             $(document).on('click','#delete',function(e){
                 e.preventDefault();
                 var link = $(this).attr("href");


                 Swal.fire({
                     title: 'هل انت متاكد من حذف البيانات',
                     text: "حذف البيانات",
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'حذف'
                 }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = link
                         Swal.fire(
                             'تم الحذف',
                             'تم حذف البيانات',
                             'تم بنجاح'
                         )
                     }
                 })


             });

         });

     </script>
</body>
</html>
