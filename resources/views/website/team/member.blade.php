@extends('website.master')

@section('languageSwitcher')
    <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale() == 'ar' ? 'en' : 'ar', route('team.show', $translatedSlug)) }}" title="{{ app()->getLocale() == 'ar' ? 'English' : 'العربية' }}">
        <i class="flag-icon {{ app()->getLocale() == 'ar' ? 'flag-icon-gb' : 'flag-icon-sa' }}" style="margin-right: 8px;"></i>
        {{ app()->getLocale() == 'ar' ? 'English' : 'العربية' }}
    </a>
@endsection


@section('content')

		<!-- Banner Start -->
		<section class="main-inner-banner">
			<span class="bg-icon"></span>
			<div class="inner-banner-shape"></div>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="inner-banner-content">
							<h1 class="h1-title">{{$member->name}}</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Banner End -->

		<!-- Breadcrumb Start -->
		<div class="breadcrumb-box">
			<ul>
				<li>
					<a href="{{route('home')}}" title="HOME">{{__('website.home')}}</a>
				</li>
                <li>
					<a href="{{route('team.index')}}" title="HOME">{{__('website.team')}}</a>
				</li>

				<li>{{$member->name}}</li>
			</ul>
		</div>
		<!-- Breadcrumb End -->

        <!-- Team Detail Start -->
		<section class="main-team-detail">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="team-detail-img wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
							<div class="team-img-wp">
								<div class="team-img">
									<img src="{{ asset('uploads/general/' . $member->image) }}" width="419" height="492"
										alt="{{$member->name}}">
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="team-detail-content wow right-animation" data-wow-duration="0.8s"
							data-wow-delay="0.2s">
							<span class="sub-title">{{$member->position}}</span>
							<h2 class="h2-title">{{$member->name}}</h2>
							<div class="team-detail-content-text">
								{!! $member->bio!!}
							</div>
							<div class="team-detail-contact">
								<div class="contact-link-box">
									<div class="icon">
										<img src="{{asset('asset/website/')}}/assets/images/phone-icon.svg" width="26" height="26"
											alt="Phone No.">
									</div>
									<div class="text">
										<p>
											<strong>{{__('website.phone')}} : </strong>
											<a href="tel:{{$settings->phone_mobile}}" >{{$settings->phone_mobile}}</a>
										</p>
									</div>
								</div>
								<div class="contact-link-box">
									<div class="icon">
										<img src="{{asset('asset/website/')}}/assets/images/email-icon.svg" width="33" height="25"
											alt="Email Address">
									</div>
									<div class="text">
										<p>
											<strong>{{__('website.email')}} : </strong>
											<a href="mailto:{{$settings->main_email}}"
												title="Mail on support@lawace.com">{{$settings->main_email}}</a>
										</p>
									</div>
								</div>
								<div class="contact-link-box">
									<div class="icon">
										<img src="{{asset('asset/website/')}}/assets/images/Experience-icon.svg" width="26" height="26"
											alt="Experience">
									</div>
									<div class="text">
										<p>
											<strong>{{__('website.Experience')}} : </strong>
											{{$member->years}} Years
										</p>
									</div>
								</div>
								<div class="contact-link-box">
									<div class="icon">
										<img src="{{asset('asset/website/')}}/assets/images/Qualification-icon.svg" width="26" height="26"
											alt="Qualification">
									</div>
									<div class="text">
										<p>
											<strong>{{__('website.Qualification')}} : </strong>
											{{$member->experience}}
										</p>
									</div>w
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- Team Detail End -->

@endsection




