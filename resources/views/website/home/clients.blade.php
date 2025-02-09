<section class="main-clients">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="clients-title">
                    <h4 class="h4-title">{{__('website.our_clients')}}</h4>
                </div>
                <div class="clients-slider swiper">
                    <div class="swiper-wrapper">


                        @foreach ($clients as $client)
                        <div class="swiper-slide">
                            <div class="client-box">
                                <a href="{{$client->link}}">
                                    <img src="{{ asset('uploads/general/' . $client->logo) }}" width="169" height="44" alt="Client 1">
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
