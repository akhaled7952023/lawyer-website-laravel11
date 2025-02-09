@foreach ($related_articles as $article)
<div class="col-md-6">
    <div class="blog-box wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.3s">

    <div class="blog-img-box">
        <div class="blog-img-wp">
            <a href="{{route('blog.show' , $article->slug)}}">
                <div class="blog-img back-img"
                style="background-image: url('{{ asset('uploads/general/' . $article->image) }}')">
            </div>
            </a>
        </div>
        <span class="blog-date"><img src="{{asset('asset/website')}}/assets/images/calendar-icon.svg"
                width="20" height="18" alt="Calendar Icon">{{$article->formatted_date}}</span>
    </div>
    <div class="blog-box-text">
        <h4 class="h4-title">
            <a href="{{route('blog.show' , $article->slug)}}"
                title="Defending your rights by expert guidance.">
                {{$article->title}}
            </a>
        </h4>
        <p></p>
        <a href="{{route('blog.show' , $article->slug)}}" class="link-btn"
            title="Discover More"><span>{{__('website.discover_more')}}</span><i
                class="fas fa-arrow-right" aria-hidden="true"></i></a>
    </div>

</div>
</div>
@endforeach
