@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	@include('layouts.alert')
            <div class="card">
                <div class="card-header">
                	<div class="float-left">
                		{{ __('Karyawan') }}
                	</div>
                	<div class="float-right">
                		<a href="{{ route('employee.create') }}">Tambah</a>
                	</div>
                </div>

                <div class="card-body">
                	<div class="table-responsive">
                		<table class="table table-bordered table-hover">
	                    	<thead>
	                    		<th>Perusahaan</th>
	                    		<th>Nama</th>
	                    		<th>Telepon</th>
	                    		<th>Aksi</th>
	                    	</thead>
	                    	<tbody>
	                    		@foreach($employees as $employee)
	                    			<tr>
	                    				<td>
	                    					<a href="{{ route('company.show', ['id' => $employee->company_id]) }}">{{ $employee->company->company_name }}</a>
	                    				</td>
	                    				<td>
	                    					{{ $employee->employee_name }}
	                    				</td>
	                    				<td>
	                    					{{ $employee->employee_phone }}
	                    				</td>
	                    				<td>
	                    					<div role="group" aria-label="Record actions" class="btn-group">
	                    						<a href="{{ route('employee.show', ['id' => $employee->id]) }}" class="btn btn-primary btn-sm">
	                    							View
	                    						</a> 
	                    						<a href="{{ route('employee.edit', ['id' => $employee->id]) }}" class="btn btn-success btn-sm">
	                    							Edit
	                    						</a> 
	                    						<a href="{{ route('employee.destroy', ['id' => $employee->id]) }}" id="delete-btn" class="btn btn-danger btn-sm">
	                    							Delete
	                    						</a>
	                    					</div>
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
