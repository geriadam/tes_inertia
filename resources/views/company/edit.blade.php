@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                @include('layouts.validation')
            @endif
            <div class="card">
                <div class="card-header">{{ __('Edit Perusahaan') }}</div>

                <div class="card-body">
                    {{ Form::open(['route' => ['company.update', $company->id],'files' => true, 'method' => 'PUT']) }}
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-6">
                                {!! Form::text('company_name', $company->company_name, ["class" => "form-control"]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>
                            <div class="col-md-6">
                                {!! Form::text('company_website', $company->company_website, ["class" => "form-control"]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span id="logo" class="input-group-text">minimal 100x100</span>
                                    </div>
                                    <div class="custom-file">
                                        <div class="col-md-12">
                                            {!! Form::file('file', ["class" => "custom-file-input", "id" => "logo"]) !!}
                                            <label for="logo" class="custom-file-label">Cari File</label>
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($company->company_logo) 
                                    && file_exists(App\Model\Company::IMAGE_STORAGE.$company->company_logo))
                                    <img 
                                        src="{{ url(App\Model\Company::IMAGE_STORAGE.$company->company_logo) }}" 
                                        alt="{{ $company->company_name }}" 
                                        width="100px" 
                                        height="100px"
                                    >
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
