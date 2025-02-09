@extends('layouts.dashboard.app')
@section('title')
   Edit Testimonial
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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.testimonials.index') }}">{{ __('dashboard.testmonials') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.edit_testmonials') }}</li>
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
                            {{-- @include('dashboard.includes.validations-errors') --}}
                            <form id="myForm" class="form" action="{{ route('dashboard.testimonials.update' , $testmonial->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>{{ __('dashboard.edit_testmonials') }}</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="status-switch">{{__('dashboard.status_testmonials')}}</label>
                                                <div style="margin-left: 10px; margin-right: 10px" id="status-switch" class="btn-group" tabindex="0">
                                                    <a data-status="0" class="btn btn-default" title="Don't Say NO!!" onclick="setStatus(0)">No</a>
                                                    <a data-status="1" class="btn btn-default" title="Say, Yes please!!" onclick="setStatus(1)">Yes</a>
                                                </div>
                                                <input type="hidden" id="status-input" name="status" value="{{ $testmonial->status ?? 1 }}">
                                                @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.name_ar_customer') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="name_ar" value="{{$testmonial->getTranslation('name', 'ar')}}"
                                                    placeholder="{{ __('dashboard.name_ar_customer') }}">
                                                    @error('name_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.name_en_customer') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="name_en" value="{{$testmonial->getTranslation('name', 'en')}}"
                                                    placeholder="{{ __('dashboard.name_en_customer') }}">
                                                    @error('name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--Finish name -->

                                    <!-- Job Name  ---------------------- -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.job_name_ar') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="job_ar" value="{{$testmonial->getTranslation('job', 'ar')}}"
                                                    placeholder="{{ __('dashboard.job_name_ar') }}">
                                                    @error('job_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.job_name_en') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="job_en" value="{{$testmonial->getTranslation('job', 'en')}}"
                                                    placeholder="{{ __('dashboard.job_name_en') }}">
                                                    @error('job_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- End Job Name  ---------------------- -->


                                    <!-- Start feedback  ---------------------- -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <label for="userinput1">{{ __('dashboard.feedback_ar') }}</label>
                                                    <textarea  class="form-control" name="feedback_ar" class="form-control"
                                                    style="resize: none;" rows="6"> {{$testmonial->getTranslation('feedback', 'ar')}}</textarea>
                                                    @error('feedback_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <label for="userinput1">{{ __('dashboard.feedback_en') }}</label>
                                                    <textarea  class="form-control" name="feedback_en" class="form-control"
                                                    style="resize: none;" rows="6">{{$testmonial->getTranslation('feedback', 'en')}}</textarea>
                                                    @error('feedback_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <!-- End Start feedback  ---------------------- -->


                                    <!-- Upload Image  ---------------------- -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="image" style="padding-bottom: 10px;">{{__('dashboard.image')}}</label>
                                                <input type="file" name="image" id="image"
                                                data-default-file="{{ asset('uploads/general/' . $testmonial->image) }}"
                                                    class="dropify @error('image') is-invalid @enderror">
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                        </div>


                                        </fieldset>
                                    </div>
                                     <!-- Seo  ---------------------- -->


                                </div>

                                <div>



                                </div>

                                <div class="form-actions right">
                                    <button type="button" class="btn btn-warning mr-1" onclick="window.history.back();">
                                        <i class="ft-x"></i> {{ __('dashboard.cancle') }}
                                    </button>
                                    <button id="saveButton" type="submit" class="btn btn-primary">
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


   <script src="{{ asset('UtilsJs/status-switch.js') }}"></script>


@endsection
