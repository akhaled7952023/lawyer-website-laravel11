<section class="main-features">
    <div class="features-list">

        @foreach ($header->features as $index => $feature)
    <div class="feature-box wow fadeup-animation"
         data-wow-duration="0.8s"
         data-wow-delay="{{ 0.2 + ($index * 0.2) }}s">

        <div class="icon">
            <img src="{{ asset('uploads/general/' . $feature['image']) }}" width="60" height="60" alt="Lawyer Advice">
        </div>

        <div class="text">
            <h4 class="h4-title">
                {{ app()->getLocale() == 'ar' ? $feature['text_ar'] : $feature['text_en'] }}
            </h4>
        </div>
    </div>
@endforeach
    </div>
</section>
