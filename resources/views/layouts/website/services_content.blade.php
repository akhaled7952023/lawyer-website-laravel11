<div class="col-lg-8">
    <div class="service-detail-content wow left-animation" data-wow-duration="0.8s"
        data-wow-delay="0.2s">
        <div class="service-detail-content-title">
            <div class="icon">
                <img src="{{asset('asset/website')}}/assets/images/Professional-Advice.svg" width="35" height="35"
                    alt="Professional Advice">
            </div>
            <h2 class="h2-title">{{$service->title}}</h2>
        </div>
        <div class="service-detail-content-box">
            {!! $service->description !!}
        </div>

    </div>
</div>
