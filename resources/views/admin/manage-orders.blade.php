@extends('layouts/admin-layout')

@section('main')

	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Manage Orders</h4>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="orders-table" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Title</th>
											<th>Description</th>
                                            <th>Amount</th>
                                            <th>Image</th>
                                            <th>Order Status</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tbody>
										@csrf

										@foreach($orders as $order)

										<tr>
											<td>{{ $order->title }}</td>
											<td>{{ $order->description }}</td>
											<td>{{ $order->amount }}</td>
											<td>
                                                <div>
                                                    <img src="/fetch_image_1/{{ $order->product_id }}" alt="" width="100" height="80">
                                                </div>
                                            </td>
                                            <td>{{ $order->status }}</td>
											<td>
												<div class="form-button-action">
													<a href="/manage-order-update/{{ $order->order_id }}" class="btn btn-link btn-primary btn-lg"data-toggle="tooltip" role="button"title="" data-original-title="Edit Task"><i class="fa fa-edit"></i></a>
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
	$('#orders-table').DataTable({
		"pageLength": 5,
	});
</script>
@endsection