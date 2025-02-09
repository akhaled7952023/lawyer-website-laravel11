<section class="main-counter">
    <div class="container">
        <div class="col-12">
            <div class="counter-list" id="counter">
                @foreach ($skills->counters as $element)
                <div class="counter-box">
                    <div class="counter-title">
                        <h2 class="h1-title">
                            <span class="counting">{{ $element['value'] }} </span>
                        </h2>
                    </div>
                    <div class="counter-text">
                        <h4 class="h4-title">{{ app()->getLocale() == 'ar' ? $element['name_ar'] : $element['name_en'] }}</span></h4>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
