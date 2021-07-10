@extends('layouts/admin-layout')

@section('main')

	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Manage Accounts</h4>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="accounts-table" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Settlement</th>
										</tr>
									</thead>
									<tbody>
										@foreach($accounts as $account)

										<tr>
											<td>{{ $account->name }}</td>
											<td>{{ $account->email }}</td>
											<td>{{ $account->credit }}</td>
											<td>{{ $account->debit }}</td>
											<td>{{ $account->settlement }}</td>
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
	$('#accounts-table').DataTable({
		"pageLength": 5,
	});
</script>
@endsection