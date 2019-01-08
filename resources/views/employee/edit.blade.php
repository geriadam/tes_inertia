@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                @include('layouts.validation')
            @endif
            <div class="card">
                <div class="card-header">{{ __('Edit Karyawan') }}</div>
                <div class="card-body">
                    {{ Form::open(['route' => ['employee.update', $employee->id], 'method' => 'PUT']) }}
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Perusahaan') }}</label>
                            <div class="col-md-6">
                                {!! Form::select('company_id', $company, $employee->company_id, ["class" => "form-control"]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-6">
                                {!! Form::text('employee_name', $employee->employee_name, ["class" => "form-control"]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Telepon') }}</label>
                            <div class="col-md-6">
                                {!! Form::text('employee_phone', $employee->employee_phone, ["class" => "form-control"]) !!}
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
