<section class="main-our-skills">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <div class="our-skills-content wow right-animation" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">
                    <span class="sub-title">{{__('website.our_skills')}}</span>
                    <h2 class="h2-title">{{$skills->title }}</h2>
                    <div class="experience-skills">
                        <div class="experience-skill-list" id="progress_bar">


                            @foreach ($skills->skills as $element)
                            <div class="experience-skill-bar-box">
                                <h4 class="h4-title experience-skill-bar-title">{{ app()->getLocale() == 'ar' ? $element['name_ar'] : $element['name_en'] }}</h4>
                                <div class="h4-title experience-skill-bar-percent">
                                    <span class="counting" data-count="{{ $element['percentage'] }}">{{ $element['percentage'] }}</span>%
                                </div>
                                <div class="experience-skill-bar" data-width="{{ $element['percentage'] }}%">
                                    <div class="experience-skill-bar-inner"></div>
                                </div>
                            </div>
                           @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="our-skills-img-wp wow left-animation" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">
                    <div class="our-skills-img1 back-img"
                        style="background-image: url(' {{asset('uploads/general/' . $skills->image) }}"></div>
                    {{-- <div class="our-skills-img2 back-img"
                        style="background-image: url(' {{asset('asset/website/')}}/assets/images/skills-img2.jpg')"></div> --}}
                </div>
            </div>

        </div>
    </div>
</section>
