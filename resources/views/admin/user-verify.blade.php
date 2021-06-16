@extends('layouts/admin-layout')

@section('main')

	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Add Category</h4>
								<a href="/categories-insert" class="btn btn-primary btn-round ml-auto" role="button" aria-pressed="true">Add Category</a>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="user-verify-table" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Name</th>
											<th>Details</th>
											<th>Status</th>
											<th>Remarks</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tbody>
										@csrf

										@foreach($users as $user)

										<tr>
											<td>{{ $user->name }}</td>
											<td>
                                                <div class="card-body ">
                                                    <div class="row">
                                                        <div>
                                                            <b>Document Type:</b> <small>{{ $user->document_type }}</small><br>
                                                            <b>Identification No:</b> <small>{{ $user->identification_no }}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
											<td>{{ $user->status }}</td>
											<td>{{ $user->remark }}</td>
											
											<td>
												<div class="form-button-action">
													<a href="/user-verify-update/{{ $user->verify_id }}" class="btn btn-link btn-primary btn-lg"data-toggle="tooltip" role="button"title="" data-original-title="Edit Task"><i class="fa fa-edit"></i></a>
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
	$('#user-verify-table').DataTable({
		"pageLength": 5,
	});
</script>
@endsection