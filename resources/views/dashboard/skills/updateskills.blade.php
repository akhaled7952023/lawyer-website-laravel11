@extends('layouts.dashboard.app')
@section('title')
    Skills
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

                                <li class="breadcrumb-item active">{{ __('dashboard.skills') }}</li>
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
                            <form class="form" action="{{ route('dashboard.skills.update', $skills->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>{{ __('dashboard.skills') }}</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.title_ar') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="title_ar" placeholder="{{ __('dashboard.title_ar') }}"
                                                    value="{{ $skills->getTranslation('title', 'ar') }}">
                                                @error('title_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.title_en') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="title_en" placeholder="{{ __('dashboard.title_en') }}"
                                                    value="{{ $skills->getTranslation('title', 'en') }}">
                                                @error('title_en')
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
                                                        data-default-file="{{ asset('uploads/general/' . $skills->image) }}">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>


                                            </fieldset>
                                        </div>
                                    <!--Start Skills-->
                                        <div class="card-body">

                                            <center>
                                                <h4 style="margin-bottom: 20px;font-style:oblique; font-weight: bold">{{ __('dashboard.skills') }}</h4>
                                            </center>
                                            <div class="repeater-default">

                                                <div data-repeater-list="skills">
                                                    @foreach ($skills->skills as $index => $skill)
                                                        <div data-repeater-item>
                                                            <div class="form row align-items-center">
                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label
                                                                        for="name_ar">{{ __('dashboard.skill_name_ar') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        name="skills[{{ $index }}][name_ar]"
                                                                        value="{{ $skill['name_ar'] ?? '' }}"
                                                                        placeholder="{{ __('dashboard.enter_skill_name_ar') }}" >

                                                                        @error('skills.' . $index . '.name_ar')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                </div>

                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label
                                                                        for="name_en">{{ __('dashboard.skill_name_en') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        name="skills[{{ $index }}][name_en]"
                                                                        value="{{ $skill['name_en'] ?? '' }}"
                                                                        placeholder="{{ __('dashboard.enter_skill_name_en') }}" >

                                                                        @error('skills.' . $index . '.name_en')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                </div>

                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label
                                                                        for="percentage">{{ __('dashboard.percentage') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        name="skills[{{ $index }}][percentage]"
                                                                        value="{{ $skill['percentage'] ?? '' }}"
                                                                        placeholder="{{ __('dashboard.enter_percentage') }}" >

                                                                        @error('skills.' . $index . '.percentage')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                </div>


                                                                <div class="form-group col-sm-12 col-md-3 text-center">
                                                                    <button type="button" style="margin-top: 25px" class="btn btn-danger" data-repeater-delete>
                                                                        <i class="ft-x"></i> {{ __('dashboard.delete') }}
                                                                    </button>
                                                                </div>


                                                            </div>


                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="form-group overflow-hidden">
                                                    <button type="button" data-repeater-create class="btn btn-primary">
                                                        <i class="ft-plus"></i> {{ __('dashboard.add') }}
                                                    </button>
                                                </div>

                                            </div>
                                        </div>

                                    <!--End Skills-->

                                    <!--Start Counters-->
                                    <div class="card-body">

                                        <center>
                                            <h4 style="margin-bottom: 20px;font-style:oblique; font-weight: bold">{{ __('dashboard.counters') }}</h4>
                                        </center>
                                        <div class="repeater-default">

                                            <div data-repeater-list="counters">
                                                @foreach ($skills->counters as $index => $counter)
                                                    <div data-repeater-item>
                                                        <div class="form row align-items-center">
                                                            <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                <label
                                                                    for="name_ar">{{ __('dashboard.name_ar_counter') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="counters[{{ $index }}][name_ar]"
                                                                    value="{{ $counter['name_ar'] ?? '' }}"
                                                                    placeholder="{{ __('dashboard.enter_counter_name_ar') }}" >

                                                                    @error('counters.' . $index . '.name_ar')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                            </div>


                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label
                                                                        for="name_en">{{ __('dashboard.name_en_counter') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        name="counters[{{ $index }}][name_en]"
                                                                        value="{{ $counter['name_en'] ?? '' }}"
                                                                        placeholder="{{ __('dashboard.enter_counter_name_en') }}" >

                                                                        @error('counters.' . $index . '.name_en')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                </div>

                                                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                                                    <label
                                                                        for="value">{{ __('dashboard.counter_value') }}</label>
                                                                    <input type="text" class="form-control"
                                                                        name="counters[{{ $index }}][value]"
                                                                        value="{{ $counter['value'] ?? '' }}"
                                                                        placeholder="{{ __('dashboard.counter_value') }}" >

                                                                        @error('counters.' . $index . '.value')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                </div>


                                                            <div class="form-group col-sm-12 col-md-3 text-center">
                                                                <button type="button" style="margin-top: 25px" class="btn btn-danger" data-repeater-delete>
                                                                    <i class="ft-x"></i> {{ __('dashboard.delete') }}
                                                                </button>
                                                            </div>


                                                        </div>


                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="form-group overflow-hidden">
                                                <button type="button" data-repeater-create class="btn btn-primary">
                                                    <i class="ft-plus"></i> {{ __('dashboard.add') }}
                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                    <!--End Counters-->




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
@endsection

@section('scripts')
    <script src="{{ asset('asset/dashboard/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('UtilsJs/repeater.js') }}"></script>

<script>

</script>
@endsection
