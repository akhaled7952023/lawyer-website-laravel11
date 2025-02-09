<footer class="site-footer">
    <span class="bg-icon"></span>
    <span class="footer-bg-shape"><img src=" {{asset('asset/website/')}}/assets/images/testimonial-bg-shape.svg" width="405" height="641"
            alt="Footer Shape"></span>
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-info">
                        <h4 class="h4-title footer-title">{{__('website.about_us')}}</h4>
                        <p>{{$settings->about}}</p>

                        <div class="social-media">

                            @foreach ($settings->social_links as $index => $element)
                            <a href="{{$element['link']}}" title="Follow on Facebook" target="_blank"><i
                                class="{{$element['icon']}}" aria-hidden="true"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="footer-link-wp">
                        <div class="footer-link">
                            <h4 class="h4-title footer-title">{{__('website.links')}}</h4>
                            <ul>
                                <li>
                                    <a href="{{route('home')}}" title="Home">{{__('website.home')}}</a>
                                </li>
                                <li>
                                    <a href="{{ request()->is('/') ? '#about-us' : route('home') . '#about-us' }}" title="About Us">{{__('website.about_us')}}</a>
                                </li>

                                <li>
                                    <a href="{{route('team.index')}}" title="team">{{__('website.team')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('blog.index')}}" title="Blog">{{__('website.blog')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('contact.index')}}" title="Contact Us">{{__('website.contact_us')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-4">
                    <div class="footer-link-wp">
                        <div class="footer-link">
                            <h4 class="h4-title footer-title">{{__('website.services')}}</h4>
                            <ul>

                                @foreach ($getServices as $service)
                                <li>
                                    <a href="#" title="{{$service->title}}">{{$service->title}}</a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5">
                    <div class="footer-contact">
                        <h4 class="h4-title footer-title">{{__('website.contact_us')}}</h4>
                        <ul>
                            <li>
                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                <div class="text">
                                    <div>
                                        <a href="https://maps.app.goo.gl/6gxNsZ6A1KbqFZsg8"
                                            title="145 45j Street Office 789 De14563, Western Australia"
                                            target="_blank">{{$settings->adress}}</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="icon"><i class="fas fa-envelope"></i></span>
                                <div class="text">
                                    <div>
                                        <a href="mailto:info@lawace.com"
                                            title="Mail on info@lawace.com">{{$settings->main_email}}</a>
                                    </div>
                                    <div>
                                        <a href="mailto:support@lawace.com"
                                            title="Mail on support@lawace.com">{{$settings->secondary_email}}</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span class="icon"><i class="fas fa-phone-alt"></i></span>
                                <div class="text">
                                    <div>
                                        <a href="tel:919879874569" title="Call on +91 987 9874 569">{{$settings->phone_mobile}}</a>
                                    </div>
                                    <div>
                                        <a href="tel:912359874512" title="Call on +91 235 9874 512">{{$settings->landline_phone}}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            {{-- <div class="footer-logo">
                <a href="index.html" title="Lawace"><img src=" {{asset('asset/website/')}}/assets/images/logo-white.png" width="164"
                        height="47" alt="Lawace"></a>
            </div> --}}
            <div class="copy-right">
                <p style="text-align: center">
                    Copyright © <span id="copy-right-year">2025</span>
                    <a href="https://themeforest.net/user/geekcodelab" title="Geekcodelab"
                        target="_blank">Geekcodelab</a>. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>


