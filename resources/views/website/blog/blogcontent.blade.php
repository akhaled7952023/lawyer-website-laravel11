<div class="blog-detail-content">
    <div class="page-blog-lists wow fadeup-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
        <div class="blog-img-box">
            <div class="blog-img-wp">
                <div class="blog-img back-img"
                    style="background-image: url('{{ asset('uploads/general/' . $article->image) }}"></div>
            </div>
            <span class="blog-date"><img src="{{ asset('asset/website') }}/assets/images/calendar-icon.svg" width="20"
                    height="18" alt="Calendar Icon">
                <p> {{ $article->formatted_date }}
                </p>
            </span>
        </div>
    </div>
    <h2 class="h2-title">{{ $article->title }}</h2>
    <div class="blog-detail-text-box">
        {!! $article->content !!}
    </div>

    @if ($article->service_id != null)
    <div class="main-related-blog">
        <div class="related-blog-title">
            <h2 class="h2-title">{{ __('website.related_blog') }}</h2>
        </div>
        <div class="related-blog-list">
            <div class="row">
                        @include('website.blog.relatedarticles')

            </div>
        </div>
    </div>
    @endif
</div>
