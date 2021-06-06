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
								<a href="/insert-categories" class="btn btn-primary btn-round ml-auto" role="button" aria-pressed="true">Add Category</a>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="category-table" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Name</th>
											<th>Description</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Name</th>
											<th>Description</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										@csrf

										@foreach($categories as $category)

										<tr>
											<td>{{$category->name}}</td>
											<td>{{$category->description}}</td>
											
											<td>
												<div class="form-button-action">
													<a href="/update-categories/{{ $category->id }}" class="btn btn-link btn-primary btn-lg"data-toggle="tooltip" role="button"title="" data-original-title="Edit Task"><i class="fa fa-edit"></i></a>

													<a href="/delete-categories/{{ $category->id }}" class="btn btn-link btn-danger"data-toggle="tooltip" role="button"title="" data-original-title="Remove"onclick="return confirm('are you sure you want to delete this category')" ><i class="fa fa-times"></i>

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
	$('#category-table').DataTable({
		"pageLength": 5,
	});
</script>
@endsection