<section class="main-banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-content">
                    <span class="sub-title wow fadeup-animation">{{$header->firstsolgan}}</span>
                    <h1 class="h1-title wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s"
                    style="padding: 20px 0px">
                        {{$header->secondsolgan}}
                    </h1>
                    {{-- <p class="wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <pre>

                        </pre>
                    </p> --}}
                    <a href="{{$header->link}}" class="sec-btn wow fadeup-animation" data-wow-duration="0.8s"
                        data-wow-delay="0.4s" title="Discover More"><span>{{$header->textbutton}}</span></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <img src="{{ asset('uploads/general/' . $header->image) }}" width="636" height="694" alt="Banner Image">
                    <span class="overlay"></span>
                    {{-- <a href=" {{asset('asset/website/')}}/assets/images/lawyer-video.mp4" data-fancybox="video" class="rotate-btn"
                        title="Lawyer For Your Best"><i class="fas fa-play"></i></a> --}}
                </div>
            </div>
        </div>
    </div>
    <span class="bg-text">LAWYER</span>
    <span class="bg-icon"></span>
</section>
