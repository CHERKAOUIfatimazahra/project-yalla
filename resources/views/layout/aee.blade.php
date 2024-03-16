<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from html.themesawesome.com/dugemhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 Mar 2024 18:21:21 GMT -->

<head>
    {{-- meta --}}
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- links --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

    {{-- scripts --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
{{--  --}}

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <!-- SYLESHEETS
            ============================================= -->
        <link rel="stylesheet" href="css/aos.css" type="text/css">
        <link rel="stylesheet" href="css/style1.css" type="text/css">
        <link rel="stylesheet" href="css/swiper.min.css" type="text/css">
        <link rel="stylesheet" href="css/lightgallery.min.css" type="text/css">
        <link rel="stylesheet" href="css/plugin.css" type="text/css" />
        <link rel="stylesheet" href="css/sm-core-css.css" type="text/css" />
        <link rel="stylesheet" href="css/sm-clean.css" type="text/css" />
        <link rel="stylesheet" href="css/thaw-flex.css" type="text/css" />
        <link rel="stylesheet" href="css/font.css" type="text/css" />
        <link rel="stylesheet" href="css/fontawesome.min.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="stylesheet" href="css/responsive.css" type="text/css" />
        <link rel="icon" href="img/fav-icon.png">
        <script>
            document.documentElement.className = 'js';

        </script>
        <!-- EXTERNAL STYLES
            ============================================= -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>YALLA</title>
</head>

<body class="">
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>

</html>
