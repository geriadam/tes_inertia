@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	@include('layouts.alert')
            <div class="card">
                <div class="card-header">
                	<div class="float-left">
                		{{ __('Perusahaan') }}
                	</div>
                	<div class="float-right">
                		<a href="{{ route('company.create') }}">Tambah</a>
                	</div>
                </div>

                <div class="card-body">
                	<div class="table-responsive">
                		<table class="table table-bordered table-hover">
	                    	<tbody>
                    			<tr>
                                    <th>
                                        Logo
                                    </th>
                    				<td>
                    					@if(!empty($company->company_logo) 
                                            && file_exists(App\Model\Company::IMAGE_STORAGE.$company->company_logo))
                                            <img 
                                                src="{{ url(App\Model\Company::IMAGE_STORAGE.$company->company_logo) }}" 
                                                alt="{{ $company->company_name }}" 
                                                width="100px" 
                                                height="100px"
                                            >
                                        @endif
                    				</td>
                                </tr>
                                <tr>
                                    <th>
                                        Nama
                                    </th>
                    				<td>
                    					{{ $company->company_name }}
                    				</td>
                                </tr>
                                <tr>
                                    <th>
                                        Website
                                    </th>
                    				<td>
                    					{{ $company->company_website }}
                    				</td>
                                </tr>
                                <tr>
                                    <th>
                                        Jumlah Karyawan
                                    </th>
                    				<td>
                    					{{ $company->employee->count() }}
                    				</td>
                    			</tr>
	                    	</tbody>
	                    </table>
                	</div>
            		<div class="table-responsive">
            			<h3>List Karyawan</h3>
            			<table class="table table-bordered table-hover">
	                    	<thead>
	                    		<th>Nama</th>
	                    		<th>Telepon</th>
	                    	</thead>
	                    	<tbody>
	                    		@foreach($employees as $employee)
	                    			<tr>
	                    				<td>
	                    					{{ $employee->employee_name }}
	                    				</td>
	                    				<td>
	                    					{{ $employee->employee_phone }}
	                    				</td>
	                    			</tr>
	                    		@endforeach
	                    	</tbody>
	                    </table>
	                    {{ $employees->render() }}
            		</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
