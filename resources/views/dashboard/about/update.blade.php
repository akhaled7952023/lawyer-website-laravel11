@extends('layouts.dashboard.app')
@section('title')
    About Us
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

                                <li class="breadcrumb-item active">{{ __('dashboard.about') }}</li>
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
                            <form class="form" action="{{ route('dashboard.about.update', $about->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>{{ __('dashboard.about') }}</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.title_ar') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="title_ar" placeholder="{{ __('dashboard.title_ar') }}"
                                                    value="{{ $about->getTranslation('title', 'ar') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.title_en') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="title_en" placeholder="{{ __('dashboard.title_en') }}"
                                                    value="{{ $about->getTranslation('title', 'en') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.number') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="number" placeholder="{{ __('dashboard.number') }}"
                                                    value="{{ $about->number }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.about_us_ar') }}</label>
                                                <textarea id="about_us_ar" class="form-control border-primary" style="resize: none;" name="about_us_ar" rows="6"
                                                    placeholder="{{ __('dashboard.about_us_ar') }}"> {{ $about->getTranslation('about_us', 'ar') }}  </textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.about_us_en') }}</label>
                                                <textarea id="about_us_en" class="form-control border-primary" style="resize: none;" name="about_us_en" rows="6"
                                                    placeholder="{{ __('dashboard.about_us_en') }}"> {{ $about->getTranslation('about_us', 'en') }}  </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="image"
                                                    style="padding-bottom: 10px;">{{ __('dashboard.image') }}</label>
                                                <input type="file" name="image" id="image"
                                                    class="dropify @error('image') is-invalid @enderror"
                                                    data-default-file="{{ asset('uploads/general/' . $about->image) }}">

                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>


                                        </fieldset>
                                    </div>

                                    <div class="card-body">
                                        <div class="repeater-default">
                                            <div data-repeater-list="content">
                                                @foreach ($about->content as $index => $contentdetails)
                                                    <div data-repeater-item>
                                                        <div class="form row align-items-center">
                                                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                                                <label
                                                                    for="social-link">{{ __('dashboard.title_ar') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="content[{{ $index }}][title_ar]"
                                                                    value="{{ $contentdetails['title_ar'] ?? '' }}"
                                                                    placeholder="{{ __('dashboard.title_ar') }}">
                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                                                <label
                                                                    for="social-link">{{ __('dashboard.title_en') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="content[{{ $index }}][title_en]"
                                                                    value="{{ $contentdetails['title_en'] ?? '' }}"
                                                                    placeholder="{{ __('dashboard.title_en') }}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 text-center">
                                                                <button type="button" style="margin-top: 25px"
                                                                    class="btn btn-danger" data-repeater-delete
                                                                    data-confirm-message="{{ __('dashboard.confirm_delete') }}">
                                                                    <i class="ft-x"></i> {{ __('dashboard.delete') }}
                                                                </button>
                                                            </div>

                                                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                                                <label
                                                                    for="social-link">{{ __('dashboard.about_description_ar') }}</label>
                                                                <textarea id="description_ar" class="form-control border-primary"
                                                                    style="resize: none;"name="content[{{ $index }}][description_ar]" rows="6"
                                                                    placeholder="{{ __('dashboard.description_ar') }}">{{ $contentdetails['description_ar'] }}  </textarea>

                                                            </div>
                                                            <div class="form-group mb-1 col-sm-12 col-md-5">
                                                                <label
                                                                    for="social-link">{{ __('dashboard.about_description_en') }}</label>
                                                                <textarea id="description_ar" class="form-control border-primary"
                                                                    style="resize: none;"name="content[{{ $index }}][description_en]" rows="6"
                                                                    placeholder="{{ __('dashboard.description_en') }}">{{ $contentdetails['description_en'] }}  </textarea>
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
@endsection

@section('scripts')
    <script src="{{ asset('asset/dashboard/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('UtilsJs/repeater.js') }}"></script>
@endsection
