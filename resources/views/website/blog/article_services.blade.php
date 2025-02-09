@extends('website.master')

@section('content')

<!-- Banner Start -->
<section class="main-inner-banner">
    <span class="bg-icon"></span>
    <div class="inner-banner-shape"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner-banner-content">
                    <h1 class="h1-title"> {{$servicetitle}} </h1>
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
            <a href="{{route('blog.index')}}" title="HOME">{{__('website.all_blogs')}}</a>
        </li>
        <li>{{$servicetitle}}</li>
    </ul>
</div>
<!-- Breadcrumb End -->

<!-- Blog Grid Start -->
<section class="page-blog-list">
    <div class="container">
        <div class="blog-lists">
            <div class="row">
                @foreach ($articles as $article)

                <div class="col-lg-4 col-md-6">
                    <div class="blog-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="blog-img-box">
                            <div class="blog-img-wp">
                                <a href="{{ route('blog.show', $article->slug) }}" >
                                    <div class="blog-img back-img"
                                         style="background-image: url('{{ asset('uploads/general/' . $article->image) }}')">
                                    </div>
                                </a>

                            </div>
                            <span class="blog-date"><img src="{{asset('asset/website')}}/assets/images/calendar-icon.svg" width="20"
                                    height="18" alt="Calendar Icon">{{ $article->formatted_date }}</span>
                        </div>
                        <div class="blog-box-text">
                            <h4 class="h4-title">
                                <a href="{{route('blog.show' , $article->slug)}}"
                                    title="Proven legal tactics for effective representation.">{{$article->title}}</a>
                            </h4>

                            <p></p>
                            <a href="{{route('blog.show', $article->slug)}}" class="link-btn" title="Discover More"><span>
                            {{__('website.discover_more')}}
                            </span><i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            @if ($articles->hasPages())
    <div class="blog-pagination">
        <ul>
            {{-- زر السابق --}}
            @if ($articles->onFirstPage())
                <li class="arrow disabled">
                    <a href="javascript:void(0);" title="Previous"><i class="fas fa-chevron-left"></i></a>
                </li>
            @else
                <li class="arrow">
                    <a href="{{ $articles->previousPageUrl() }}" title="Previous"><i class="fas fa-chevron-left"></i></a>
                </li>
            @endif

            {{-- أرقام الصفحات --}}
            @foreach ($articles->links()->elements[0] as $page => $url)
                <li class="{{ $articles->currentPage() == $page ? 'active' : '' }}">
                    <a href="{{ $url }}" title="{{ $page }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- زر التالي --}}
            @if ($articles->hasMorePages())
                <li class="arrow">
                    <a href="{{ $articles->nextPageUrl() }}" title="Next"><i class="fas fa-chevron-right"></i></a>
                </li>
            @else
                <li class="arrow disabled">
                    <a href="javascript:void(0);" title="Next"><i class="fas fa-chevron-right"></i></a>
                </li>
            @endif
        </ul>
    </div>
@endif


            {{-- <div class="blog-pagination">
                <ul>
                    <li class="arrow">
                        <a href="javascript:void(0);" title="Previous"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0);" title="1">1</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" title="2">2</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" title="3">3</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" title="4">4</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" title="5">5</a>
                    </li>
                    <li class="arrow">
                        <a href="javascript:void(0);" title="Previous"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</section>
<!-- Blog Grid End -->



@endsection


