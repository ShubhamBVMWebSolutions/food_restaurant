<!DOCTYPE html>
<html lang="en">

@include('food_home.layouts.head')

<body>

    @include('food_home.layouts.header')
    <main id="main">
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg" style="padding-top: 120px;">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Testimonials</h2>
                    <p>What Are They <span>Saying About Us</span></p>
                </div>
                <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($reviews as $item)
                            @php
                                $rating = $item->reviews;
                                $ratings = json_decode($rating, true);
                                $qualityRate = $ratings['Quality_rate'] ?? 0;
                            @endphp
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="row gy-4 justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="testimonial-content">
                                                <p>
                                                    <i class="bi bi-quote quote-icon-left"></i>
                                                    {{ $item->remarks }}
                                                    <i class="bi bi-quote quote-icon-right"></i>
                                                </p>
                                                <h3>{{ $item->name }}</h3>
                                                <h4>Ceo &amp; Founder</h4>
                                                <div class="stars">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < $qualityRate)
                                                            <i class="bi bi-star-fill"></i>
                                                        @else
                                                            <i class="bi bi-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <img src="{{ $item->profile_pic ? asset($item->profile_pic) : asset('images/default-avatar.png') }}"
                                                class="img-fluid testimonial-img" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->
    </main>
    @include('food_home.layouts.footer')


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    @include('food_home.layouts.scripts')

</body>

</html>
