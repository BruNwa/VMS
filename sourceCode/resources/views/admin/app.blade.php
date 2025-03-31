<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('admin.layouts.head')
<body>
    <audio id="myAudio1">
        <source src="{{asset('beep.mp3')}}" type="audio/mpeg">
    </audio>
    <main class="db-main">
        @include('admin.layouts.navbar')
        @include('admin.layouts.menubar')
        @yield('content')
    </main>
    @include('admin.layouts.script')
</body>
</html>
