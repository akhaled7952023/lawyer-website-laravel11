<section class="main-faq">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="faq-sec-content wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <span class="sub-title">{{__('website.faq')}}</span>
                    <h2 class="h2-title">{{$faqDetails->title}}</h2>
                    <div class="faq-accordion">

                        @foreach ($faq as $element)
                        <div class="faq-accordion-box">
                            <div class="faq-accordion-title">
                                <h4 class="h4-title">{{ $element['question'] }}</h4>
                                <span class="icon"><i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                            </div>
                            <div class="faq-accordion-content">
                                <p>
                                    {{ $element['answer'] }}
                                </p>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div  class="faq-img-wp wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <div class="faq-img1 back-img"
                        style="background-image: url(' {{ asset('uploads/general/' . $faqDetails->image) }}'"></div>
                    <div class="faq-img2 back-img"
                        style="background-image: url(' {{asset('asset/website/')}}/assets/images/faq-img2.jpg')"></div>
                    {{-- <a href="contact-us.html" class="link-btn" title="Do You have Any Question"><span>Do You
                            have Any Question</span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i></a> --}}
                </div>
            </div>

        </div>
    </div>
</section>
