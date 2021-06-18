@extends('layouts/admin-layout')

@section('main')

<div class="content">
	<div class="page-inner">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Auction Products</h4>

						</div>
					</div>
					<div class="card-body">
						<!-- Modal -->
						<div class="table-responsive">
							<table id="auctions-table" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>Title</th>
										<th>Description</th>
										<th>Image 1</th>
										<th>Image 2</th>
										<th>Minimum Bid Amount</th>
										<th>Starting Time</th>
										<th>Ending Time</th>
										<th>Status</th>
										<th>Remarks</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>
								<tbody>
									@csrf
									@foreach($auctions as $auction)
									<tr>
										<td>{{ $auction->title }}</td>
										<td>{{ $auction->description }}</td>
										<td>
											<div><img src="/fetch_auction_image_1/{{ $auction->auction_id }}" alt="" width="100" height="80"></div>
										</td>
										<td>
											<div><img src="/fetch_auction_image_2/{{ $auction->auction_id }}" alt="" width="100" height="80"></div>
										</td>
										<td>{{ $auction->min_bid_amount }}</td>
										<td>{{ $auction->starting_time }}</td>
										<td>{{ $auction->ending_time }}</td>
										<td>{{ $auction->status }}</td>
										<td>{{ $auction->remark }}</td>
										<td>
											<div class="form-button-action">
												<a href="/product-verification-update/{{ $auction->id }}" class="btn btn-link btn-primary btn-lg"data-toggle="tooltip" role="button"title="" data-original-title="Edit Task"><i class="fa fa-edit"></i></a>

												<a href="/product-verification-delete/{{$auction->id }}" class="btn btn-link btn-danger"data-toggle="tooltip" role="button"title="" data-original-title="Remove"onclick="return confirm('are you sure you want to delete ')" ><i class="fa fa-times"></i>

												Delete</a>

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
	$('#auctions-table').DataTable({
		"pageLength": 5,
	});
</script>
@endsection