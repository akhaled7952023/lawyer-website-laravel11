@extends('layouts.dashboard.app')
@section('title')
    Clients
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

                                <li class="breadcrumb-item active">{{__('dashboard.clients')}}</li>
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
                            <form class="form" action="{{ route('dashboard.clients.update' , $settings->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-new"></i>{{__('dashboard.clients')}}</h4>

                                    <div >

                                    <div class="card-body">
                                        <div class="repeater-default">
                                            <div data-repeater-list="clients">
                                                @foreach($clients as $index => $client)
                                                    <div data-repeater-item>
                                                        <div class="form row align-items-center">
                                                            <input type="hidden" name="clients[{{ $index }}][id]" value="{{ $client->id ?? '' }}">

                                                            <div class="form-group mb-1 col-sm-12 col-md-4">
                                                                <label for="social-link">{{ __('dashboard.client_link') }}</label>
                                                                <input type="text" class="form-control" name="clients[{{ $index }}][link]" value="{{ $client->link }}" placeholder="{{ __('dashboard.client_link') }}">
                                                            </div>


                                                            <div class="form-group col-sm-12 col-md-4">
                                                                <label for="inputGroupFile01_{{ $index }}">{{ __('dashboard.client_logo') }}</label>
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                           class="custom-file-input"
                                                                           id="inputGroupFile01_{{ $index }}"
                                                                           name="clients[{{ $index }}][logo]"
                                                                           accept="image/*"
                                                                           value="{{$client->link}}"
                                                                           onchange="updateFileNameAndPreview(this, 'preview-box_{{ $index }}')">
                                                                    <label class="custom-file-label" for="inputGroupFile01_{{ $index }}">{{ __('dashboard.logo') }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-2 text-center">
                                                                <label for="social-link"></label>
                                                                <div id="preview-box_{{ $index }}"
                                                                     style="border: 1px solid #ddd; padding: 5px; max-width:150px; text-align: center;">
                                                                    @if(isset($client->logo))
                                                                        <img src="{{ asset('uploads/general/' . $client->logo) }}" alt="Logo Preview" style="max-width: 150px; height:150px;">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if($client->id != 1 )
                                                            <div class="form-group col-sm-12 col-md-2 text-center">
                                                                <button type="button" style="margin-top: 25px" class="btn btn-danger" data-client-id="{{ $client->id }}" onclick="deleteClient(this)" >
                                                                    <i class="ft-x"></i> {{ __('dashboard.delete_client') }}
                                                                </button>
                                                            </div>

                                                            @endif


                                                        </div>
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group overflow-hidden">
                                                <button type="button" data-repeater-create class="btn btn-primary">
                                                    <i class="ft-plus"></i> {{ __('dashboard.add_new_client') }}
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
</div>
@endsection

@section('scripts')
    <script src="{{ asset('asset/dashboard/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>

    <script>
      $(document).ready(function () {
    $('.repeater-default').repeater({
        initEmpty: false,
        defaultValues: {
            'link': '',
            'icon': ''
        },
        show: function () {
    $(this).slideDown();

    $(this).find('input[type="file"]').val('');
    $(this).find('input[type="text"]').val('');
    $(this).find('div[id^="preview-box"]').html('');

    $(this).find('input[type="file"]').each(function (index) {
        const uniqueIndex = Date.now() + index;
        $(this).attr('id', `inputGroupFile01_${uniqueIndex}`);
        $(this).attr('onchange', `updateFileNameAndPreview(this, 'preview-box_${uniqueIndex}')`);
        $(this).closest('.form-group').next().find('div').attr('id', `preview-box_${uniqueIndex}`);
    });
},



        });
    });

    function deleteClient(button) {

   var remainingClients = $('div[data-repeater-item]').length;
   console.log(remainingClients);

    const clientId = $(button).data('client-id');
    var rowElement = $(button).closest('div[data-repeater-item]');

    if (clientId == 1 ) {
            alert("{{ __('dashboard.last_client_warning') }}");
        }

    else if (confirm("{{ __('dashboard.confirm_delete') }}") && (clientId  != null)) {
        $.ajax({
            url: "{{ route('dashboard.clients.delete', ['id' => ':id']) }}".replace(':id', clientId),
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.status === 201) {
                    rowElement.fadeOut(500, function() {
                        rowElement.remove();
                    });

                } else {
                    alert("{{ __('dashboard.error_in_delete') }}");
                }
            },
            error: function () {
                alert("{{ __('dashboard.error_in_delete') }}");
            }
        });
    }

   else if(clientId  == null){
        rowElement.remove();
    }
    else{

    }
}





        function updateFileNameAndPreview(input, previewBoxId) {
    const fileName = input.files[0]?.name;
    if (fileName) {
        input.nextElementSibling.textContent = fileName;
    }

    const previewBox = document.getElementById(previewBoxId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            if (previewBox) {
                previewBox.innerHTML = `<img src="${e.target.result}" alt="Logo Preview" style="max-width: 100%; height: auto;">`;
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}



    </script>

@endsection
