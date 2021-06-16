@extends('layouts/admin-layout')

@section('main')

	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Add Staff</h4>
								<a href="/manage-staff-add" class="btn btn-primary btn-round ml-auto" role="button" aria-pressed="true">Add Staff</a>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="staff-table" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tbody>
										@csrf

										@foreach($staff_users as $staff_user)
										<tr>
											<td>{{ $staff_user->name }}</td>
											<td>{{ $staff_user->email }}</td>   
											
											<td>
												<div class="form-button-action">
													<a href="/manage-staff-remove/{{ $staff_user->id }}" class="btn btn-link btn-danger"data-toggle="tooltip" role="button"title="" data-original-title="Remove"onclick="return confirm('Are you sure you want to remove this staff user!')" ><i class="fa fa-times"></i>

														Remove</a>
												</div>
											</td>
										</tr>
										
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
@endsection

@section('jsscript')
<script>
	$('#staff-table').DataTable({
		"pageLength": 5,
	});
</script>
@endsection