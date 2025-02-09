<div class="col-lg-4">
    <div class="sidebar wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">

        <div class="blog-category">
            <h4 class="h4-title">{{__('website.categories')}}</h4>
            <ul>

               @foreach ($services as $service)
               <li>
                <a href="{{ route('blog.showarticles', [
                    'serviceid' => $service->id,
                    'servicetitle' => $service->getTranslation('title', 'ar') . '__' . $service->getTranslation('title', 'en')
                ]) }}" title="{{ $service->title }}">
                    {{ $service->title }} ({{ $service->articles_count }})
                </a>
            </li>
    @endforeach
            </ul>
        </div>

        <div class="recent-post">
            <h4 class="h4-title">{{__('website.recent_posts')}}</h4>

            @foreach ($latest_articles as $article)
            <div class="recent-post-box">
                <a href="{{ route('blog.show', $article->slug) }}" >
                <div class="img back-img"
                    style="background-image: url('{{ asset('uploads/general/' . $article->image) }}')"></div>
                </a>
                <div class="text">
                    <p>
                        <a href="{{ route('blog.show', $article->slug) }}">{{$article->title}}</a>
                    </p>
                    <div class="date">

                        <img src="{{asset('asset/website')}}/assets/images/calendar-icon.svg" width="20" height="17"
                            alt="Calendar">{{$article->formatted_date}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="get-in-touch">
            <h4 class="h4-title">{{__('website.get_touch')}}</h4>
            <div class="get-in-touch-form">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                @include('dashboard.includes.validations-errors')
                <form id="myForm" class="form" action="{{ route('form.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="device_fingerprint" id="deviceFingerprint">
                    <input type="hidden" name="canvas_fingerprint" id="canvasFingerprint">
                    <input type="hidden" name="webgl_fingerprint" id="webglFingerprint">

                    <div class="form-box">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-input"
                        placeholder="{{ __('website.name') }}*"  autocomplete="off">
                    </div>
                    <div class="form-box">
                        <input type="number" name="phone" value="{{ old('phone') }}" class="form-input"
                        placeholder="{{ __('website.phone') }}*"  autocomplete="off">
                    </div>
                    <div class="form-box">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-input"
                        placeholder="{{ __('website.email') }}*"  autocomplete="off">
                    </div>
                    <div class="form-box">
                        <input type="text" name="city" value="{{ old('city') }}" class="form-input"
                        placeholder="{{ __('website.city') }}*"  autocomplete="off">
                    </div>
                    <div class="form-box">
                        <textarea class="form-input" name="message" value="{{ old('message') }}" placeholder="{{ __('website.message') }}"></textarea>

                    </div>
                    <div class="form-box">
                        <button type="submit" class="sec-btn" id="submitBtn">
                            <span>{{ __('website.submit') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>



@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fingerprintjs/fingerprintjs@3/dist/fp.min.js"></script>

<script>
    (async () => {
        const fp = await FingerprintJS.load();
        const result = await fp.get();

        document.getElementById('deviceFingerprint').value = result.visitorId;

        function getCanvasFingerprint() {
            let canvas = document.createElement('canvas');
            let ctx = canvas.getContext('2d');
            ctx.textBaseline = 'top';
            ctx.font = '14px Arial';
            ctx.fillText('Hello Fingerprint', 2, 2);

            let data = ctx.getImageData(0, 0, canvas.width, canvas.height).data;
            return hashCanvasFingerprint(data);
        }

        function hashCanvasFingerprint(data) {
            let hash = 0;
            for (let i = 0; i < data.length; i++) {
                hash = (hash << 5) - hash + data[i];
                hash |= 0;
            }
            return hash.toString();
        }

        function getWebGLFingerprint() {
            let canvas = document.createElement('canvas');
            let gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
            if (!gl) return 'Not Supported';

            let debugInfo = gl.getExtension('WEBGL_debug_renderer_info');
            return debugInfo
                ? gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL)
                : 'Unknown Renderer';
        }

        document.getElementById('canvasFingerprint').value = getCanvasFingerprint();
        document.getElementById('webglFingerprint').value = getWebGLFingerprint();
    })();


</script>

@endsection

