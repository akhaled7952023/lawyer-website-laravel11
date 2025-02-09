@extends('layouts.dashboard.app')
@section('title')
    Create Member
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
                                        href="{{ route('dashboard.teams.index') }}">{{ __('dashboard.team') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.edit_member') }}</li>
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
                            <form id="myForm" class="form" action="{{ route('dashboard.teams.update', $member->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-body">
                                    <h4 class="form-section"><i
                                            class="la la-new"></i>{{ __('dashboard.edit_member') }}</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="status-switch">{{ __('dashboard.status_member') }}</label>
                                                <div style="margin-left: 10px; margin-right: 10px" id="status-switch"
                                                    class="btn-group" tabindex="0">
                                                    <a data-status="0" class="btn btn-default" title="Don't Say NO!!"
                                                        onclick="setStatus(0)">No</a>
                                                    <a data-status="1" class="btn btn-default" title="Say, Yes please!!"
                                                        onclick="setStatus(1)">Yes</a>
                                                </div>
                                                <input type="hidden" id="status-input" name="status" value="{{ $member->status ?? 1 }}">
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.name_ar') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="name_ar" value="{{$member->getTranslation('name', 'ar')}}"
                                                    placeholder="{{ __('dashboard.name_ar') }}">
                                                @error('name_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.name_en') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="name_en" value="{{$member->getTranslation('name', 'en')}}"
                                                    placeholder="{{ __('dashboard.name_en') }}">
                                                @error('name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <!--Finish title-->

                                    <!-- Start Slug ----------  -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.slug_ar') }}</label>
                                                <input type="text" id="slug_ar" class="form-control border-primary"
                                                    name="slug[ar]" value="{{$member->getTranslation('slug', 'ar')}}"
                                                    onchange="generateSlugFromTitle(this.value, 'slug_ar')"
                                                    placeholder="{{ __('dashboard.slug_ar') }}">
                                                @error('slug.ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.slug_en') }}</label>
                                                <input type="text" id="slug_en" class="form-control border-primary"
                                                    name="slug[en]" value="{{$member->getTranslation('slug', 'en')}}"
                                                    onchange="generateSlugFromTitle(this.value, 'slug_en')"
                                                    placeholder="{{ __('dashboard.slug_en') }}">
                                                @error('slug.en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Finish Slug ---------------------- -->

                                    <!--Start Position-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.position_ar') }}</label>
                                                <input type="text" id="position_ar"
                                                    class="form-control border-primary" name="position_ar"
                                                    value="{{$member->getTranslation('position', 'ar')}}"
                                                    placeholder="{{ __('dashboard.position_ar') }}">
                                                @error('position_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.position_en') }}</label>
                                                <input type="text" id="position_en"
                                                    class="form-control border-primary" name="position_en"
                                                    value="{{$member->getTranslation('position', 'en')}}"
                                                    placeholder="{{ __('dashboard.position_en') }}">
                                                @error('position_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <!--End Position -->

                                    <!--Start Experience-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.experience_ar') }}</label>
                                                <input type="text" id="experience_ar"
                                                    class="form-control border-primary" name="experience_ar"
                                                    value="{{$member->getTranslation('experience', 'ar')}}"
                                                    placeholder="{{ __('dashboard.experience_ar') }}">
                                                @error('experience_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.experience_en') }}</label>
                                                <input type="text" id="experience_en"
                                                    class="form-control border-primary" name="experience_en"
                                                    value="{{$member->getTranslation('experience', 'en')}}"
                                                    placeholder="{{ __('dashboard.experience_en') }}">
                                                @error('experience_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.years') }}</label>
                                                <input type="text" id="years"
                                                    class="form-control border-primary" name="years"
                                                    value="{{ $member->years }}"
                                                    placeholder="{{ __('dashboard.years') }}">
                                                @error('years')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                        <!--End Experience -->

                                        <!-- Start Description  ---------------------- -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <div class="custom-file">
                                                        <label
                                                            for="userinput1">{{ __('dashboard.bio_ar') }}</label>
                                                        <textarea id="summernote_ar" class="summernote" name="bio_ar" >{!! $member->getTranslation('bio', 'ar') !!}</textarea>
                                                        @error('bio_ar')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <div class="custom-file">
                                                        <label
                                                            for="userinput1">{{ __('dashboard.bio_en') }}</label>
                                                        <textarea id="summernote_en" class="summernote" name="bio_en" class="form-control"> {!! $member->getTranslation('bio', 'en') !!} </textarea>
                                                        @error('bio_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>


                                        <!-- End Description  ---------------------- -->


                                        <!-- Upload Image  ---------------------- -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="image"
                                                        style="padding-bottom: 10px;">{{ __('dashboard.image') }}</label>
                                                    <input type="file" name="image" id="image"
                                                     data-default-file="{{ asset('uploads/general/' . $member->image) }}"
                                                        class="dropify @error('image') is-invalid @enderror">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>


                                            </fieldset>
                                        </div>
                                        <!-- Seo  ---------------------- -->


                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.meta_title_ar') }}</label>
                                                <input type="text" id="metatitlear" class="form-control border-primary"
                                                    name="meta_title_ar"
                                                     value="{{$member->getTranslation('meta_title', 'ar')}}"
                                                    oninput="limitTextById('metatitlear', 70)"

                                                    placeholder="{{ __('dashboard.meta_title_ar') }}">
                                                    @error('meta_title_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.meta_title_en') }}</label>
                                                <input type="text" id="metatitleen" class="form-control border-primary"
                                                    name="meta_title_en"
                                                     value=" {{$member->getTranslation('meta_title', 'en')}}"
                                                     oninput="limitTextById('metatitleen', 70)"

                                                    placeholder="{{ __('dashboard.meta_title_en') }}">
                                                    @error('meta_title_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.meta_description_ar') }}</label>
                                                <input type="text" id="metadescriptionar" class="form-control border-primary"
                                                    name="meta_description_ar"
                                                     value="{{$member->getTranslation('meta_description', 'ar')}}"
                                                    oninput="limitTextById('metadescriptionar', 170)"
                                                    placeholder="{{ __('dashboard.meta_description_ar') }}">
                                                    @error('meta_description_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.meta_description_en') }}</label>
                                                <input type="text" id="metadescriptionen" class="form-control border-primary"
                                                    name="meta_description_en"
                                                     value="{{$member->getTranslation('meta_description', 'en')}}"
                                                    oninput="limitTextById('metadescriptionen', 170)"
                                                    placeholder="{{ __('dashboard.meta_description_en') }}">
                                                    @error('meta_description_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.meta_keywords_ar') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="meta_keywords_ar"  value="{{$member->getTranslation('meta_keywords', 'ar')}}"
                                                    placeholder="{{ __('dashboard.meta_keywords_ar') }}">
                                            </div>
                                            @error('meta_keywords_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.meta_keywords_en') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="meta_keywords_en"
                                                   value="{{$member->getTranslation('meta_keywords', 'en')}}"
                                                    placeholder="{{ __('dashboard.meta_keywords_en') }}">
                                            </div>
                                            @error('meta_keywords_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    </div>

                                    <div>



                                    </div>

                                    <div class="form-actions right">
                                        <button type="button" class="btn btn-warning mr-1"
                                            onclick="window.history.back();">
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
    <script src="{{ asset('UtilsJs/generateSlugFromTitle.js') }}"></script>
    <script src="{{ asset('UtilsJs/textLimiter.js') }}"></script>
    <script src="{{ asset('UtilsJs/summernote-config.js') }}"></script>
    <script>
        const uploadImageUrl = "{{ route('dashboard.sumernoteimage') }}";
    </script>
    <script src="{{ asset('UtilsJs/uploadimage-summernote.js') }}"></script>
@endsection
