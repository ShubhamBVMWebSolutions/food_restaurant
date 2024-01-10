<!DOCTYPE html>
<html lang="en">

@include('food_home.layouts.head')

<body>
    @include('food_home.layouts.header')
    @yield('content')
    @include('food_home.layouts.footer')


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    @include('food_home.layouts.scripts')

</body>

</html>
