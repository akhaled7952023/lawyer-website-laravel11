<section class="main-about-us" id="about-us">
    <div class="container">
        <div class="row aboutar" >

            <div class="col-lg-6 align-self-center">
                <div class="about-us-content wow right-animation" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">
                    <span class="sub-title">{{__('website.about_us')}}</span>
                    <h2 class="h2-title">{{$about->title}}</h2>
                    <p>
                        {{$about->about_us}}
                    </p>

                    <div class="faq-accordion">
                        @foreach ($about->content as $index => $element )

                        <div class="faq-accordion-box">
                            <div class="faq-accordion-title">
                                <h4 class="h4-title">
                                    {{ app()->getLocale() == 'ar' ? $element['title_ar'] : $element['title_en'] }}
                                </h4>
                                <span class="icon"><i class="fas fa-arrow-right"></i></span>
                            </div>
                            <div class="faq-accordion-content">
                                <p>
                                    {{ app()->getLocale() == 'ar' ? $element['description_ar'] : $element['description_en'] }}
                                </p>
                            </div>
                        </div>

                        @endforeach

                    </div>

                    <div class="about-us-content-btn">
                        <a href="{{route('contact.index')}}" class="sec-btn" title="More About Us"><span>
                                {{__('website.contact_us')}}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-us-img-box wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <div class="about-us-img back-img"
                    style="background-image: url('{{ asset('uploads/general/' . $about->image) }}');">
                </div>
                    <div class="about-counter-box" id="about_counter">
                        <h3 class="h3-title">
                            <span data-count="{{$about->number}}" class="counting">0</span>+
                        </h3>
                        <h4 class="h4-title">{{__('website.number_cases')}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
