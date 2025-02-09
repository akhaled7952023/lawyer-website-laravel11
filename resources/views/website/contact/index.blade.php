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
                        <h1 class="h1-title">{{ __('website.contact_us') }}</h1>
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
                <a href="index.html" title="HOME">{{ __('website.home') }}</a>
            </li>
            <li>{{ __('website.contact_us') }}</li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Us Start -->
    <section class="page-contact-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="contact-us-content wow left-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <span class="sub-title">{{ __('website.contact_us') }}</span>
                        <h2 class="h2-title">{{ __('website.get_touch') }}</h2>
                        <div class="contact-link-list">
                            <div class="contact-link-box">
                                <div class="icon">
                                    <img src="{{ asset('asset/website') }}/assets/images/location-icon.svg" width="35"
                                        height="40" alt="Location">
                                </div>
                                <div class="text">
                                    <h4 class="h4-title">{{ __('website.location') }}</h4>
                                    <p>
                                        <a href="https://maps.app.goo.gl/qoQgApns5tjtb4ycA" target="_blank"
                                            title="24 Parkland Rd, Osborne Park WA 6017">{{ $settings->adress }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="contact-link-box">
                                <div class="icon">
                                    <img src="{{ asset('asset/website') }}/assets/images/email-icon.svg" width="38"
                                        height="28" alt="Email Address">
                                </div>
                                <div class="text">
                                    <h4 class="h4-title">{{ __('website.email') }}</h4>
                                    <p>
                                        <a href="mailto:{{ $settings->main_email }}"
                                            title="Mail on support@lawace.com">{{ $settings->main_email }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="contact-link-box">
                                <div class="icon">
                                    <img src="{{ asset('asset/website') }}/assets/images/phone-icon.svg" width="35"
                                        height="35" alt="Phone No.">
                                </div>
                                <div class="text">
                                    <h4 class="h4-title">{{ __('website.phone') }}</h4>
                                    <p>
                                        <a href="tel:{{ $settings->phone_mobile }}"
                                            title="Call on +91 987 9874 987">{{ $settings->phone_mobile }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="contact-us-form wow right-animation" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <p>{{ __('website.message_form') }}</p>

                        <div class="contact-form">
                            @if (session('success_message'))
                                <div class="alert alert-success">
                                    {{ session('success_message') }}
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

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-box">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-input"
                                                placeholder="{{ __('website.name') }}*"  autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-box">
                                            <input type="number" name="phone" value="{{ old('phone') }}" class="form-input"
                                                placeholder="{{ __('website.phone') }}*"  autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-box">
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-input"
                                                placeholder="{{ __('website.email') }}*"  autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-box">
                                            <input type="text" name="city" value="{{ old('city') }}" class="form-input"
                                                placeholder="{{ __('website.city') }}*"  autocomplete="off">

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-box">
                                            <textarea class="form-input" name="message" value="{{ old('message') }}" placeholder="{{ __('website.message') }}"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="form-box mb-0">
                                            <button type="submit" class="sec-btn" id="submitBtn">
                                                <span>{{ __('website.submit') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us End -->

    <!-- Google Map Start -->
    <div class="google-map">
        <iframe src="{{ $settings->map }}" width="1920" height="500" style="border: 0" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Google Map End -->
@endsection

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
