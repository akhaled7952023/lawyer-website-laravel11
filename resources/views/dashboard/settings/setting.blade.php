@extends('layouts.dashboard.app')
@section('title')
    Settings
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('dashboard.dashboard')}}</a></li>

                                <li class="breadcrumb-item active">{{__('dashboard.settings')}}</li>
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
                            @include('dashboard.includes.validations-errors')
                            <form class="form" action="{{ route('dashboard.settings.update' , $settings->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>{{__('dashboard.settings')}}</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{__('dashboard.main_email')}}</label>
                                                <input type="email" id="userinput1" class="form-control border-primary"
                                                name="main_email"  placeholder="{{__('dashboard.email')}}" value="{{ $settings->main_email}}" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{__('dashboard.secondary_email')}}</label>
                                                <input type="email" id="userinput1" class="form-control border-primary" value="{{ $settings->secondary_email}}"
                                                name="secondary_email"   placeholder="{{__('dashboard.secondary_email')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{__('dashboard.phone_number')}}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                name="phone_mobile"  placeholder="{{__('dashboard.phone_number')}}" value="{{ $settings->phone_mobile}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{__('dashboard.another_phone')}}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                name="landline_phone"   placeholder="{{__('dashboard.another_phone')}}" value="{{ $settings->landline_phone}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <label for="userinput1">{{__('dashboard.about_en')}}</label>
                                                    <textarea id="about_en" class="form-control border-primary" style="resize: none;" name="about_en" rows="5" placeholder="{{ __('dashboard.about_en') }}"> {{ $settings->getTranslation('about', 'en') }}  </textarea>
                                                </div>
                                              </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <label for="userinput1">{{__('dashboard.about_ar')}}</label>
                                                    <textarea id="about_ar" class="form-control border-primary" style="resize: none;" name="about_ar" rows="5" placeholder="{{ __('dashboard.about_ar') }}"> {{ $settings->getTranslation('about', 'ar') }} </textarea>
                                                </div>
                                              </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <label for="userinput1">{{__('dashboard.adress_ar')}}</label>
                                                    <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="adress_ar"   placeholder="{{__('dashboard.adress_ar')}}" value="{{ $settings->getTranslation('adress', 'ar') }}">
                                                </div>

                                              </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <label for="userinput1">{{__('dashboard.adress_en')}}</label>
                                                    <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="adress_en"   placeholder="{{__('dashboard.adress_en')}}" value="{{ $settings->getTranslation('adress', 'en') }}">
                                                </div>

                                              </fieldset>
                                        </div>

                                    </div>
                                    <div >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputGroupFile01">{{ __('dashboard.logo') }}</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="logo" accept="image" onchange="updateFileName()" >
                                                        <label class="custom-file-label" for="inputGroupFile01">{{ $settings->logo}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="col-md-6">
                                                <div class="form-group">
                                                    <label for="map">{{ __('dashboard.map') }}</label>
                                                    <input
                                                        type="text"
                                                        id="map"
                                                        class="form-control border-primary"
                                                        name="map"
                                                        placeholder="{{ __('dashboard.map') }}"
                                                        value="{{ old('map', $settings->map ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                        <!-- Container to show the map preview -->
                                        <div id="map-preview" style="display: none; margin-top: 15px; border: 1px solid #ddd;">
                                            <iframe id="map-iframe"
                                                    src="{{ $settings->map ?? '' }}"
                                                    style="width: 100%; height: 300px; border: none;"
                                                    allowfullscreen="allowfullscreen"></iframe>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="repeater-default">
                                            <div data-repeater-list="social_links">
                                                @foreach($settings->social_links as $index => $social)
                                                    <div data-repeater-item>
                                                        <div class="form row align-items-center">
                                                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                                                <label for="social-link">{{ __('dashboard.social_link') }}</label>
                                                                <input type="text" class="form-control" name="social_links[{{ $index }}][link]" value="{{ $social['link'] ?? '' }}" placeholder="{{ __('dashboard.enter_social_link') }}">
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                                                <label for="social-icon">{{ __('dashboard.social_icon') }}</label>
                                                                <input type="text" class="form-control" name="social_links[{{ $index }}][icon]" value="{{ $social['icon'] ?? '' }}" placeholder="{{ __('dashboard.enter_social_icon') }}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 text-center">
                                                                <button type="button" style="margin-top: 25px" class="btn btn-danger" data-repeater-delete>
                                                                    <i class="ft-x"></i> {{ __('dashboard.delete_social') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group overflow-hidden">
                                                <button type="button" data-repeater-create class="btn btn-primary">
                                                    <i class="ft-plus"></i> {{ __('dashboard.add_new_social') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>




                                    </div>

                                <div class="form-actions right">
                                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.back();">
                                        <i class="ft-x"></i> {{(__('dashboard.cancle'))}}
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> {{(__('dashboard.save'))}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('asset/dashboard/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('UtilsJs/repeater.js') }}"></script>
    <script>
// Function to update the map preview
function updateMapPreview() {
    const mapInput = document.getElementById('map').value.trim();
    const mapPreview = document.getElementById('map-preview');
    const mapIframe = document.getElementById('map-iframe');

    if (mapInput) {
        // Show the preview and update the iframe source
        mapPreview.style.display = 'block';
        mapIframe.src = mapInput;
    } else {
        // Hide the preview if the input is empty
        mapPreview.style.display = 'none';
        mapIframe.src = '';
    }
}

// Run on input change
document.getElementById('map').addEventListener('input', updateMapPreview);

// Run on page load
document.addEventListener('DOMContentLoaded', updateMapPreview);

    function updateFileName() {
        var input = document.getElementById('inputGroupFile01');
        var label = input.nextElementSibling;
        var fileName = input.files[0] ? input.files[0].name : '';
        label.textContent = fileName ? fileName : '{{ __('dashboard.choose_logo') }}';
    }
    </script>

@endsection
