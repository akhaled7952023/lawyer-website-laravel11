<div class="col-lg-4">
    <div class="sidebar wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
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
        {{-- <div class="download-brochure">
            <h4 class="h4-title">Download Brochure</h4>
            <div class="download-brochure-box">
                <div class="icon">
                    <img src="./assets/images/pdf-icon.svg" width="55" height="60" alt="PDF">
                </div>
                <div class="text">
                    <p>How To Write Legal Advice Document</p>
                    <p>
                        <a href="https://file-examples.com/storage/fe9792139267462ed950620/2017/10/file-sample_150kB.pdf"
                            title="Download PDF" target="_blank">Download (4.5MB)</a>
                    </p>
                </div>
            </div>
            <div class="download-brochure-box">
                <div class="icon">
                    <img src="./assets/images/pdf-icon.svg" width="55" height="60" alt="PDF">
                </div>
                <div class="text">
                    <p>Legal Registration Form Document</p>
                    <p>
                        <a href="https://file-examples.com/storage/fe9792139267462ed950620/2017/10/file-sample_150kB.pdf"
                            title="Download PDF" target="_blank">Download (4.5MB)</a>
                    </p>
                </div>
            </div>
        </div> --}}
        <div class="service-detail-contact">
            <div class="icon">
                <img src="{{asset('asset/website')}}/assets/images/call-mail-icon.svg" width="36" height="32"
                    alt="Call Mail">
            </div>
            <div class="text">
                <h4 class="h4-title">
                    <a href="tel:{{ preg_replace('/\s+/', '', $settings->phone_mobile) }}" title="Call on +91 987 4512 698">{{$settings->phone_mobile}}</a>
                </h4>
                <p>
                    <a href="mailto:info@lawace.com"
                        title="Mail on info@lawace.com">{{$settings->main_email}}</a>
                </p>
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
