@extends('layouts.dashboard.app')
@section('title')
    Header
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a></li>

                                <li class="breadcrumb-item active">{{ __('dashboard.header') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" action="{{ route('dashboard.header.update', $header->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>{{ __('dashboard.header') }}</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.firstsolgan_ar') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="firstsolgan_ar" placeholder="{{ __('dashboard.firstsolgan_ar') }}"
                                                    value="{{ $header->getTranslation('firstsolgan', 'ar') }}">
                                                @error('firstsolgan_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.firstsolgan_en') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="firstsolgan_en"
                                                    placeholder="{{ __('dashboard.firstsolgan_en') }}"
                                                    value="{{ $header->getTranslation('firstsolgan', 'en') }}">
                                                @error('firstsolgan_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.secondsolgan_ar') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="secondsolgan_ar"
                                                    placeholder="{{ __('dashboard.secondsolgan_ar') }}"
                                                    value="{{ $header->getTranslation('secondsolgan', 'ar') }}">
                                                @error('secondsolgan_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.secondsolgan_en') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="secondsolgan_en"
                                                    placeholder="{{ __('dashboard.secondsolgan_en') }}"
                                                    value="{{ $header->getTranslation('secondsolgan', 'en') }}">
                                                @error('secondsolgan_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.textbutton_ar') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="textbutton_ar" placeholder="{{ __('dashboard.textbutton_ar') }}"
                                                    value="{{ $header->getTranslation('textbutton', 'ar') }}">
                                                @error('textbutton_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.textbutton_en') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="textbutton_en" placeholder="{{ __('dashboard.textbutton_en') }}"
                                                    value="{{ $header->getTranslation('textbutton', 'en') }}">
                                                @error('textbutton_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.buttonlink') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="link" placeholder="{{ __('dashboard.buttonlink') }}"
                                                    value="{{ $header->link }}">
                                                @error('link')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                    <div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="image"
                                                        style="padding-bottom: 10px;">{{ __('dashboard.image') }}</label>
                                                    <input type="file" name="image" id="image"
                                                        class="dropify @error('image') is-invalid @enderror"
                                                        data-default-file="{{ asset('uploads/general/' . $header->image) }}">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>


                                            </fieldset>
                                        </div>

                                        <div class="card-body">
                                            <div class="repeater-default">
                                                <div data-repeater-list="features">
                                                    @foreach ($header->features as $index => $feature)
                                                        <div data-repeater-item>
                                                            <div class="form row align-items-center">
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label
                                                                        for="feature_ar">{{ __('dashboard.feature_ar') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        name="features[{{ $index }}][text_ar]"
                                                                        value="{{ $feature['text_ar'] ?? '' }}"
                                                                        placeholder="{{ __('dashboard.enter_feature_ar') }}" >

                                                                        @error('features.' . $index . '.text_ar')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                </div>

                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label
                                                                        for="feature_en">{{ __('dashboard.feature_en') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        name="features[{{ $index }}][text_en]"
                                                                        value="{{ $feature['text_en'] ?? '' }}"
                                                                        placeholder="{{ __('dashboard.enter_feature_en') }}">

                                                                        @error('features.' . $index . '.text_en')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                </div>

                                                                <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                    <label for="feature_image">{{ __('dashboard.feature_image') }}</label>
                                                                    <input type="file"
                                                                           class="form-control"
                                                                           name="features[{{ $index }}][image]"
                                                                           id="featureImageInput_{{ $index }}"
                                                                     onchange="previewImage(event, {{ $index }})">
                                                                     @error('features.' . $index . '.image')
                                                                     <span class="text-danger">{{ $message }}</span>
                                                                     @enderror

                                                                </div>
                                                                <div class="form-group mb-1 col-sm-12 col-md-2">

                                                                    @if(!empty($feature['image']))
                                                                    <img src="{{ asset('uploads/general/' . $feature['image']) }}"
                                                                         alt="Feature Image"
                                                                         class="img-thumbnail mt-2"
                                                                         width="100"
                                                                         id="featureImagePreview_{{ $index }}">
                                                                @endif

                                                                </div>

                                                            </div>


                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>




                                    </div>

                                    <div class="form-actions right">
                                        <button type="button" class="btn btn-warning mr-1"
                                            onclick="window.history.back();">
                                            <i class="ft-x"></i> {{ __('dashboard.cancle') }}
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> {{ __('dashboard.save') }}
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('asset/dashboard/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript">
    </script>

<script>
   function previewImage(event, index) {
    const input = event.target;
    const previewId = `featureImagePreview_${index}`;

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const previewImage = document.getElementById(previewId);
            if (previewImage) {
                previewImage.src = e.target.result;
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endsection
