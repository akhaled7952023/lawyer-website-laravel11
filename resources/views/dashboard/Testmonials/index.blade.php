@extends('layouts.dashboard.app')
@section('title')
    All Testimonials
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
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a>{{ __('dashboard.testmonials') }}</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">

                </div>
            </div>
            <div class="content-body">
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

                    <div class="card-content">
                        <div class="card-body">
                            <a href="{{ route('dashboard.testimonials.create') }}" class="btn btn-primary">{{ __('dashboard.create_testmonials') }}</a><br><br>
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('dashboard.customer_name') }}</th>
                                        <th scope="col">{{ __('dashboard.status_testmonials') }} </th>
                                        <th scope="col">{{ __('dashboard.operations') }} </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($testmonials as $testmonial)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td> {{ $testmonial->name }} </td>
                                            <td>
                                                @if ($testmonial->status == 1)
                                                    <button type="button" class="btn btn-success">
                                                        <i class="la la-check-circle"></i>
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="la la-smile-o"></i>
                                                    </button>
                                                @endif
                                            </td>



                                            <td>
                                                <div class="dropdown float-md-left">
                                                    <button class="btn btn-danger dropdown-toggle px-2"
                                                        id="dropdownBreadcrumbButton" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">{{ __('dashboard.operations') }}</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdmanagersownBreadcrumbButton">
                                                        <a class="dropdown-item"
                                                            href="{{ route('dashboard.testimonials.edit', $testmonial->id) }}"><i
                                                                class="la la-edit"></i>{{ __('dashboard.edit') }}</a>

                                                        <div class="dropdown-divider"></div><a class="dropdown-item"
                                                            href="javascript:void(0)"
                                                            onclick="if(confirm('{{ __('dashboard.delete_testimonial') }}')){document.getElementById('delete-form-{{ $testmonial->id }}').submit();} return false"><i
                                                                class="la la-trash"></i> {{ __('dashboard.delete') }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                        {{-- delete form  --}}
                                        <form id="delete-form-{{ $testmonial->id }}"
                                            action="{{ route('dashboard.testimonials.destroy', $testmonial->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>


                                    @empty
                                        <td colspan="4"> No Data</td>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $testmonials->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
