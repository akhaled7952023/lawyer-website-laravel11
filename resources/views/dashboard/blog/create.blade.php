@extends('layouts.dashboard.app')
@section('title')
    Create New Article
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
                                        href="{{ route('dashboard.blog.index') }}">{{ __('dashboard.blog') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard.create_article') }}</li>
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
                            <form id="myForm" class="form" action="{{ route('dashboard.blog.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>{{ __('dashboard.create_article') }}</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" style="margin-top: 20px">

                                                <label for="status-switch">{{ __('dashboard.status_blog') }}</label>
                                                <div style="margin-left: 10px; margin-right: 10px" id="status-switch"
                                                    class="btn-group" tabindex="0">
                                                    <a data-status="0" class="btn btn-default" title="Don't Say NO!!"
                                                        onclick="setStatus(0)">No</a>
                                                    <a data-status="1" class="btn btn-default" title="Say, Yes please!!"
                                                        onclick="setStatus(1)">Yes</a>
                                                </div>
                                                <input type="hidden" id="status-input" name="status" value="1">
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category">{{ __('dashboard.category') }}</label>
                                                <select id="category" name="service_id" class="form-control">
                                                    <option value="">{{ __('dashboard.no_category') }}</option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}"
                                                            {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                            {{ $service->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('service_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!--Start title-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.title_ar') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="title[ar]" value="{{ old('title.ar') }}"
                                                    placeholder="{{ __('dashboard.title_ar') }}">
                                                @error('title.ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.title_en') }}</label>
                                                <input type="text" id="userinput1" class="form-control border-primary"
                                                    name="title[en]" value="{{ old('title.en') }}"
                                                    placeholder="{{ __('dashboard.title_en') }}">
                                                @error('title.en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Start Slug ----------  -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userinput1">{{ __('dashboard.slug_ar') }}</label>
                                                <input type="text" id="slug_ar" class="form-control border-primary"
                                                    name="slug[ar]" value="{{ old('slug.ar') }}"
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
                                                    name="slug[en]" value="{{ old('slug.en') }}"
                                                    onchange="generateSlugFromTitle(this.value, 'slug_en')"
                                                    placeholder="{{ __('dashboard.slug_en') }}">
                                                @error('slug.en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Finish Slug ---------------------- -->

                                    <!-- Start Content  ---------------------- -->

                                    <!-- المحتوى العربي -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <label for="content_ar">{{ __('dashboard.content_ar') }}</label>
                                                    <textarea name="content_ar" id="ckeditor_ar" cols="30" rows="15" class="ckeditor-config">
                    {{ old('content_ar') }}
                </textarea>
                                                    @error('content_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <!-- المحتوى الإنجليزي -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <div class="custom-file">
                                                    <label for="content_en">{{ __('dashboard.content_en') }}</label>
                                                    <textarea name="content_en" id="ckeditor_en" cols="30" rows="15" class="ckeditor-config">
                    {{ old('content_en') }}
                </textarea>
                                                    @error('content_en')
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
                                                <input type="text" id="metatitlear"
                                                    class="form-control border-primary" name="meta_title_ar"
                                                    value="{{ old('meta_title_ar') }}"
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
                                                <input type="text" id="metatitleen"
                                                    class="form-control border-primary" name="meta_title_en"
                                                    value="{{ old('meta_title_en') }}"
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
                                                <input type="text" id="metadescriptionar"
                                                    class="form-control border-primary" name="meta_description_ar"
                                                    value="{{ old('meta_description_ar') }}"
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
                                                <input type="text" id="metadescriptionen"
                                                    class="form-control border-primary" name="meta_description_en"
                                                    value="{{ old('meta_description_en') }}"
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
                                                    name="meta_keywords_ar" value="{{ old('meta_keywords_ar') }}"
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
                                                    name="meta_keywords_en" value="{{ old('meta_keywords_en') }}"
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
    <script src="{{ asset('UtilsJs/generateSlugFromTitle.js') }}"></script>
    <script src="{{ asset('UtilsJs/textLimiter.js') }}"></script>
    <script src="{{ asset('UtilsJs/summernote-config.js') }}"></script>
    <script>
        const uploadImageUrl = "{{ route('dashboard.sumernoteimage') }}";
    </script>
    <script src="{{ asset('UtilsJs/uploadimage-summernote.js') }}"></script>



    <script>
   function setupCKEditor(id, defaultDirection) {
    CKEDITOR.replace(id, {
        contentsLangDirection: defaultDirection,
        height: 400,
        on: {
            instanceReady: function (event) {
                const editor = event.editor;

                // ضبط الاتجاه الافتراضي
                setEditorDirection(editor, defaultDirection);

                // التعامل مع الكتابة والبيست
                editor.on('contentDom', function () {
                    const editable = editor.editable();

                    // تغيير الاتجاه بناءً على النص المدخل
                    editable.attachListener(editable, 'input', function () {
                        adjustDirectionBasedOnText(editable);
                    });

                    // التعامل مع المحتوى الملصق
                    editable.attachListener(editable, 'paste', function () {
                        setTimeout(() => adjustDirectionBasedOnText(editable), 10);
                    });
                });
            }
        }
    });

    function setEditorDirection(editor, direction) {
        editor.editable().setAttribute('dir', direction);
        editor.editable().setStyle('text-align', direction === 'rtl' ? 'right' : 'left');
    }

    function adjustDirectionBasedOnText(editable) {
        const textContent = editable.getText().trim();

        if (/[\u0600-\u06FF]/.test(textContent)) {
            // النص عربي
            editable.setAttribute('dir', 'rtl');
            editable.setStyle('text-align', 'right');
        } else {
            // النص إنجليزي
            editable.setAttribute('dir', 'ltr');
            editable.setStyle('text-align', 'left');
        }
    }
}

// تطبيق CKEditor للحقلين
setupCKEditor('ckeditor_ar', 'rtl');
setupCKEditor('ckeditor_en', 'ltr');


      </script>
@endsection
