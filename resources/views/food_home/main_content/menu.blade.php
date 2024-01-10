<!DOCTYPE html>
<html lang="en">

@include('food_home.layouts.head')
<style>
    .sticky {
        background: #C92CA2;
        color: #fff;
        position: sticky;
        bottom: 0px;
        padding: 1em 0;
    }

</style>
<body>
    @include('food_home.layouts.header')
    <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu" style="padding-top: 100px;">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Menu</h2>
                    <p>Check Our <span>Yummy Menu</span></p>
                </div>

                <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                            <h4>Starters</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                            <h4>Breakfast</h4>
                        </a><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                            <h4>Lunch</h4>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                            <h4>Dinner</h4>
                        </a>
                    </li><!-- End tab nav item -->

                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                    <!-- ======= Starter Menu Content ======= -->
                    <div class="tab-pane fade active show" id="menu-starters">
                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>Starters</h3>
                        </div>
                        <div class="row gy-5">
                            @foreach ($starters as $item)
                                <div class="col-lg-4 menu-item">
                                    <a href="{{asset($item->image)}}" class="glightbox"><img
                                            src="{{asset($item->image)}}" class="menu-img img-fluid"
                                            alt=""></a>
                                    {{-- <a href="{{route('checkout',['id'=>Crypt::encrypt($item->id)])}}" style="text-decoration: none;"> --}}
                                        <a href="#" onclick="add_to_cart({{$item->id}})"style="text-decoration: none;">
                                        <h4>{{$item->name}}</h4>
                                        <p class="ingredients">
                                            @php
                                                $incrediants = json_decode($item->ingrediants);
                                            @endphp
                                        @foreach ( $incrediants  as $data)
                                            {{$data}}
                                        @endforeach
                                        </p>
                                        <p class="price">
                                            ${{$item->price}}
                                        </p>
                                    </a>
                                </div><!-- Menu Item -->
                            @endforeach
                        </div>
                    </div>
                    <!-- ======= End Starter Menu Content ======= -->

                    <!-- ======= Breakfast Menu Content ======= -->
                    <div class="tab-pane fade" id="menu-breakfast">

                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>Breakfast</h3>
                        </div>

                        <div class="row gy-5">
                            @foreach ($breakfast as $item)
                                <div class="col-lg-4 menu-item">
                                    <a href="{{asset($item->image)}}" class="glightbox"><img
                                            src="{{asset($item->image)}}" class="menu-img img-fluid"
                                            alt=""></a>
                                    <h4>{{$item->name}}</h4>
                                    <p class="ingredients">
                                        @php
                                            $incrediants = json_decode($item->ingrediants);
                                        @endphp
                                        @foreach ( $incrediants  as $data)
                                            {{$data}}
                                        @endforeach
                                    </p>
                                    <p class="price">
                                        ${{$item->price}}
                                    </p>
                                </div><!-- Menu Item -->
                            @endforeach
                        </div>
                    </div>
                    <!-- ======= End Breakfast Menu Content ======= -->

                    <!-- ======= Lunch Menu Content ======= -->
                    <div class="tab-pane fade" id="menu-lunch">

                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>Lunch</h3>
                        </div>

                        <div class="row gy-5">
                            @foreach ($lunch as $item)
                                <div class="col-lg-4 menu-item">
                                    <a href="{{asset($item->image)}}" class="glightbox"><img
                                    src="{{asset($item->image)}}" class="menu-img img-fluid"
                                            alt=""></a>
                                    <h4>{{$item->name}}</h4>
                                    <p class="ingredients">
                                        @php
                                            $incrediants = json_decode($item->ingrediants);
                                        @endphp
                                        @foreach ( $incrediants  as $data)
                                            {{$data}}
                                        @endforeach
                                    </p>
                                    <p class="price">
                                        ${{$item->price}}
                                    </p>
                                </div><!-- Menu Item -->
                            @endforeach
                        </div>
                    </div>
                    <!-- ======= End Lunch Menu Content ======= -->

                    <!-- ======= Dinner Menu Content ======= -->
                    <div class="tab-pane fade" id="menu-dinner">

                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>Dinner</h3>
                        </div>

                        <div class="row gy-5">
                            @foreach ($dinner as $item)
                                <div class="col-lg-4 menu-item">
                                    <a href="{{asset($item->image)}}" class="glightbox"><img
                                            src="{{asset($item->image)}}" class="menu-img img-fluid"
                                            alt=""></a>
                                    <h4>{{$item->name}}</h4>
                                    <p class="ingredients">
                                        @php
                                            $incrediants = json_decode($item->ingrediants);
                                        @endphp
                                        @foreach ( $incrediants  as $data)
                                            {{$data}}
                                        @endforeach
                                    </p>
                                    <p class="price">
                                        ${{$item->price}}
                                    </p>
                                </div>
                                <!-- Menu Item -->
                            @endforeach
                        </div>
                    </div>
                    <!-- ======= End Dinner Menu Content ======= -->
                </div>

            </div>
        </section>
    <!-- End Menu Section -->
    <a href="{{route('checkout')}}" style="text-decoration: none;">
        <div class="sticky text-center d-none" style="cursor: pointer;">
            <h5>Item Added to the cart successfully</h5>
            <h5>View My Cart -></h5>
        </div>
    </a>
    @include('food_home.layouts.footer')


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    @include('food_home.layouts.scripts')
<script>
    function add_to_cart(id) {
        $.ajax({
            type: 'POST',
            url: '{{ route("add_to_cart") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
            },
            success: function(response) {
                if (response.success) {
                    alert('Item added to cart successfully!');
                    $('.sticky').removeClass('d-none');

                } else {
                    alert('Error adding item to cart!');
                }
            },
            error: function() {
                // Handle AJAX error
                alert('Error in AJAX request!');
            }
        });
    }
</script>
</body>

</html>
