<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-box">
                    <div class="site-branding">
                        <a href="index.html" title="Lawace">
                            <img src="{{ asset('uploads/general/' . $settings->logo) }}" width="164" height="47" alt="Lawace">
                        </a>
                    </div>
                    <div class="header-menu">
                        <nav class="main-navigation">
                            <button class="toggle-button"><span></span></button>
                            <div class="mobile-menu-box">
                                <ul>
                                    <li class="active">
                                        <a href="{{route('home')}}" title="Home">{{__('website.home')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ request()->is('/') ? '#about-us' : route('home') . '#about-us' }}" title="About Us">{{__('website.about_us')}}</a>
                                    </li>
                                    <li class="sub-items">
                                        <a href="javascript:void(0);" title="Service">{{__('website.services')}}</a>
                                        <ul class="sub-menu">
                                            @foreach ($getServices as $service)
                                            <li>
                                                <a href="{{route('service.show',$service->slug)}}" title="Services">{{$service->title}}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{route('team.index')}}" title="Contact Us">{{__('website.team')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('blog.index')}}" title="Contact Us">{{__('website.blog')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('contact.index')}}" title="Contact Us">{{__('website.contact_us')}}</a>
                                    </li>

                                    @include('layouts.website.lang-switch')


                                </ul>
                                <div class="for-mob">
                                    <div class="header-mob-btn">
                                        <a href={{route('contact.index')}} class="sec-btn"
                                            title="Get Appointment"><span>
                                                {{__('website.get_offer')}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                        <div class="header-btn">
                            <a href={{route('contact.index')}} class="sec-btn" title="Get Appointment"><span>
                                {{__('website.get_offer')}}
                                    </span></a>
                        </div>
                        <div class="black-shadow"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
