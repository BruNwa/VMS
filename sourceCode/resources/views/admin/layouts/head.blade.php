<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($sitetitle) ? ucfirst($sitetitle) : "QuickPass - Appointment Booking & Visitor Gate Pass System With Qr Code" }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ themeSetting('fav_icon') ? themeSetting('fav_icon')->favicon : asset('images/fav_icon.png') }}">
    <link rel="stylesheet" href="{{ asset('backend/fonts/icomoon/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/fonts/fontawesome/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/fonts/typography/public/public.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/fonts/typography/rubik/rubik.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/lib/daterange/daterange.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/lib/swiper/bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('js/izitoast/dist/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/custome.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/lib/inttelinput/css/intlTelInput.css')}}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('css')
</head>




