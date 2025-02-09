<section class="main-case-study">
    <div class="case-study-slider swiper">
        <div class="swiper-wrapper">

            @foreach ($services as $service)
            <div class="swiper-slide">
                <div class="case-study-box">
                        <img src="{{ asset('uploads/general/' . $service->image) }}" width="480" height="610" alt="Legal Masters">

                    <div class="case-study-box-content">
                        <h4 class="h4-title">
                            <a href="{{route('service.show' , $service->slug)}}" title="Legal Masters">{{ $service['title'] }}</a>
                        </h4>
                        <div class="case-study-box-text">
                            <p>{!! $service->description !!}</p>
                            <a href="{{route('service.show' , $service->slug)}}" class="arrow-btn" title="Legal Masters"><i
                                class="{{ app()->getLocale() === 'ar' ? 'fas fa-arrow-left' : 'fas fa-arrow-right' }}"
                                aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

           @endforeach


        </div>
    </div>
</section>
