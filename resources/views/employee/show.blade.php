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
	                    	<tbody>
                    			<tr>
                    				<th>
                    					Nama
                    				</th>
                    				<td>
                    					{{ $employee->employee_name }}
                    				</td>
                    			</tr>
                    			<tr>
                    				<th>
                    					Telepon
                    				</th>
                    				<td>
                    					{{ $employee->employee_phone }}
                    				</td>
                    			</tr>
                    			<tr>
                    				<th>
                    					Karyawan Perusahaan
                    				</th>
                    				<td>
                    					{{ $employee->company->company_name }}
                    				</td>
                    			</tr>
	                    	</tbody>
	                    </table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
