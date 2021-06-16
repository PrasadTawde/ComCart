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
							<table id="category-table" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th>title</th>
										<th>Description</th>
										<th>Img1</th>
										<th>Img2</th>
										<th>min_bid_amount</th>
										<th>starting_time</th>
										<th>ending_time</th>


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
											<div><img src="/fetch_image_1/{{ $auction->id }}" alt="" width="100" height="80"></div>
										</td>
										<td>
											<div><img src="/fetch_image_2/{{ $auction->id }}" alt="" width="100" height="80"></div>
										</td>

										<td>{{ $auction->min_bid_amount }}</td>
										<td>{{ $auction->starting_time }}</td>
										<td>{{ $auction->ending_time }}</td>
										<td>

										<div class="form-button-action">
											<a href="/product-verification-insert/{{ $auction->id }}" class="btn btn-link btn-primary btn-lg"data-toggle="tooltip" role="button"title="" data-original-title="Edit Task"><i class="fa fa-edit"></i></a>

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