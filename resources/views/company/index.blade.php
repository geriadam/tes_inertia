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
	                    	<thead>
	                    		<th>Logo</th>
	                    		<th>Nama</th>
	                    		<th>Website</th>
	                    		<th>Jumlah Karyawan</th>
	                    		<th>Aksi</th>
	                    	</thead>
	                    	<tbody>
	                    		@foreach($companies as $company)
	                    			<tr>
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
	                    				<td>
	                    					{{ $company->company_name }}
	                    				</td>
	                    				<td>
	                    					{{ $company->company_website }}
	                    				</td>
	                    				<td>
	                    					{{ $company->employee->count() }}
	                    				</td>
	                    				<td>
	                    					<div role="group" aria-label="Record actions" class="btn-group">
	                    						<a href="{{ route('company.show', ['id' => $company->id]) }}" class="btn btn-primary btn-sm">
	                    							View
	                    						</a> 
	                    						<a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-success btn-sm">
	                    							Edit
	                    						</a> 
	                    						<a href="{{ route('company.destroy', ['id' => $company->id]) }}" id="delete-btn" class="btn btn-danger btn-sm">
	                    							Delete
	                    						</a>
	                    					</div>
	                    				</td>
	                    			</td>
	                    		@endforeach
	                    	</tbody>
	                    </table>
	                    {{ $companies->render() }}
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
