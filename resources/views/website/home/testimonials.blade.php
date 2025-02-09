<section class="main-testimonials">
    <span class="testimonial-bg-shape"><img src=" {{asset('asset/website/')}}/assets/images/testimonial-bg-shape.svg" width="405"
            height="641" alt="Testimonial Shape"></span>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonials-title text-center">
                    <span class="sub-title">{{__('website.testimonials')}}</span>
                    <h2 class="h2-title">{{__('website.testimonials_say')}}</h2>
                </div>
                <div class="testimonial-slider swiper">
                    <div class="swiper-wrapper">

                        @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-box">
                                <div class="testimonial-box-shape">
                                    <img src=" {{asset('asset/website/')}}/assets/images/testimonial-box-shape.svg" width="170" height="55"
                                        alt="Shape">
                                </div>
                                <span class="quote-icon"><img src=" {{asset('asset/website/')}}/assets/images/Quote.svg" width="76"
                                        height="56" alt="Quote"></span>
                                <div class="testimonial-img back-img"
                                style="background-image: url('{{ asset('uploads/general/' . $testimonial->image) }}');"></div>
                                <div class="review-by">
                                    <h4 class="h4-title">{{$testimonial->name}}</h4>
                                    <p>{{$testimonial->job}}</p>

                                </div>
                                <div class="testimonial-text">
                                    <p>
                                        {{$testimonial->feedback }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
