@extends('website.master')

@section('languageSwitcher')
    <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale() == 'ar' ? 'en' : 'ar', route('blog.show', $translatedSlug)) }}" title="{{ app()->getLocale() == 'ar' ? 'English' : 'العربية' }}">
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
                        <h1 class="h1-title">{{__('website.blog')}}</h1>
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
                <a href="{{route('blog.index')}}" title="BLOG">{{__('website.blog')}}</a>
            </li>
            <li>{{ $article->title }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    	<!-- Blog Detail Start -->
		<section class="page-blog-detail">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						@include('website.blog.blogcontent')
					</div>
					@include('website.blog.blogsidebar')
				</div>
			</div>
		</section>
		<!-- Blog Detail End -->

@endsection

