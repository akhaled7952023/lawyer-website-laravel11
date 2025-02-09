{{-- @foreach ($members as $member )

<h1> {{$member->name}} </h1> <br>
<h1> {{$member->position}} </h1> <br>
<h1> {{$member->status}} </h1> <br>
<h1> {{$member->slug}} </h1> <br>
<a href="{{ route('team.show', $member->slug) }}">
    {{ $member->slug }}
</a>
<img width="300px" height="300px" src="{{ asset('uploads/general/' . $member->image) }}" >

@endforeach --}}


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
                    <h1 class="h1-title">{{__('website.team')}}</h1>
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
            <a href="index.html" title="HOME">{{__('website.home')}}</a>
        </li>
        <li>{{__('website.team')}}</li>
    </ul>
</div>
<!-- Breadcrumb End -->

<!-- Our Team Start -->
<section class="page-our-team">
    <div class="container">
        <div class="page-team-list">
            <div class="row">
                @foreach ($members as $member )

                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="team-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="team-img-wp">
                            <div class="team-img">
                                <a href="{{route('team.show', $member->slug)}}">
                                    <img src="{{ asset('uploads/general/' . $member->image) }}" width="317" height="368"
                                    alt="Michel Holway">
                                </a>
                            </div>
                            <div class="team-social">
                                <div class="team-social-share">
                                    <a href="{{route('team.show', $member->slug)}}"><img src="{{asset('asset/website/')}}/assets/images/share-icon.svg" width="15" height="17"
                                        alt="Share Icon"></a>
                                </div>

                            </div>
                        </div>
                        <p>{{$member->position}}</p>
                        <h4 class="h4-title">
                            <a href="{{route('team.show', $member->slug)}}" title="{{$member->name}}">{{$member->name}}</a>
                        </h4>
                    </div>
                </div>

                @endforeach


            </div>
        </div>
    </div>
</section>
<!-- Our Team End -->

@endsection









