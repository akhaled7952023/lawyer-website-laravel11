<section class="main-special-team">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-3 col-12">
                <div class="special-team-content">
                    <span class="sub-title">{{__('website.special_team')}}</span>
                    <h2 class="h2-title" style="font-size: 30px">{{__('website.slogan_team')}}</h2>

                    <a href="team.html" class="link-btn" title="Discover More Lawyers"><span>
                        {{__('website.discover_ourteam')}}
                        </span>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-xl-9 col-12">
                <div class="special-team-list">
                    <div class="team-slider swiper">
                        <div class="swiper-wrapper">
                            @foreach ($members as $member)

                            <div class="swiper-slide">
                                <div class="team-box">
                                    <div class="team-img-wp">
                                        <div class="team-img">
                                            <a href="{{route('team.show' , $member->slug)}}">
                                            <img src=" {{ asset('uploads/general/' . $member->image) }}" width="317"
                                                height="368" alt="Michel Holway">
                                            </a>
                                        </div>
                                        <div class="team-social">
                                            <div class="team-social-share">

                                                <img  src=" {{asset('asset/website/')}}/assets/images/share-icon.svg" width="15" height="17"
                                                    alt="Share Icon">
                                            </div>

                                        </div>
                                    </div>
                                    <p>{{$member->position}}</p>
                                    <h4 class="h4-title">
                                        <a href="{{route('team.show' , $member->slug)}}" title="Michel Holway">{{$member->name}}</a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
