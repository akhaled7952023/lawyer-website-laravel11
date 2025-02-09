@extends('website.master')

@section('content')


<!-- Banner Start -->
@include('website.home.banner')
<!-- Banner End -->

<!-- Features Start -->
@include('website.home.features')
<!-- Features End -->

<!-- About Us Start -->
@include('website.home.aboutus')
<!-- About Us End -->

<!-- Case Study Start -->
@include('website.home.services')
<!-- Case Study End -->

{{-- <!-- Our Services Start -->
<section class="main-our-services">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="our-services-title">
                    <span class="sub-title">OUR SERVICES</span>
                    <h2 class="h2-title">The Best Lawyer Solution</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="our-services-content">
                    <p>
                        Curabitur nec nibh risus. Nam tempus lacinia libero, vel mattis enim faucibus fringilla.
                        Morbi vitae risus pharetra erat semper fringilla vel at odio. Nunc id ipsum non felis
                        mollis
                        finibus.
                    </p>
                    <a href="services.html" class="link-btn" title="Discover More Services"><span>Discover More
                            Services</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="services-list">
            <div class="services-list-bg-shape">
                <img src=" {{asset('asset/website/')}}/assets/images/service-list-bg-shape.svg" width="1936" height="218"
                    alt="Sevice Shape">
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="service-box wow fadeup-animation" data-wow-duration="0.8s"
                        data-wow-delay="0.2s">
                        <div class="icon">
                            <img src=" {{asset('asset/website/')}}/assets/images/Professional-Advice.svg" width="35" height="35"
                                alt="Professional Advice">
                        </div>
                        <h4 class="h4-title">
                            <a href="service-detail.html" title="Professional Advice">Professional Advice</a>
                        </h4>
                        <p>Etiam justo vitae lacus hendrerit ornare sit amet in justo donec felis tempus augue.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="service-box wow fadeup-animation" data-wow-duration="0.8s"
                        data-wow-delay="0.3s">
                        <div class="icon">
                            <img src=" {{asset('asset/website/')}}/assets/images/Employment-Law.svg" width="35" height="35"
                                alt="Employment Law">
                        </div>
                        <h4 class="h4-title">
                            <a href="service-detail.html" title="Employment Law">Employment Law</a>
                        </h4>
                        <p>Etiam justo vitae lacus hendrerit ornare sit amet in justo donec felis tempus augue.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="service-box wow fadeup-animation" data-wow-duration="0.8s"
                        data-wow-delay="0.4s">
                        <div class="icon">
                            <img src=" {{asset('asset/website/')}}/assets/images/Competitive-Pricing.svg" width="35" height="35"
                                alt="Competitive Pricing">
                        </div>
                        <h4 class="h4-title">
                            <a href="service-detail.html" title="Competitive Pricing">Competitive Pricing</a>
                        </h4>
                        <p>Etiam justo vitae lacus hendrerit ornare sit amet in justo donec felis tempus augue.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="service-box wow fadeup-animation" data-wow-duration="0.8s"
                        data-wow-delay="0.5s">
                        <div class="icon">
                            <img src=" {{asset('asset/website/')}}/assets/images/Education-Law.svg" width="35" height="35"
                                alt="Education Law">
                        </div>
                        <h4 class="h4-title">
                            <a href="service-detail.html" title="Education Law">Education Law</a>
                        </h4>
                        <p>Etiam justo vitae lacus hendrerit ornare sit amet in justo donec felis tempus augue.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Services End --> --}}

<!-- Our Skills Start -->
@include('website.home.skills')
<!-- Our Skills End -->

<!-- Clients We Serve Start -->
@include('website.home.clients')
<!-- Clients We Serve End -->

<!-- Testimonials Start -->
@include('website.home.testimonials')
<!-- Testimonials End -->

<!-- Special Team Start -->
 @include('website.home.our_team')
<!-- Special Team End -->

<!-- FAQ Start -->
@include('website.home.faq')
<!-- FAQ End -->

<!-- Counter Start -->
@include('website.home.counter')
<!-- Counter End -->


@endsection

