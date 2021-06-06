@extends('layouts/admin-layout')

@section('main')

	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Add Sub-Category</h4>
								<a href="/insert-subcategories" class="btn btn-primary btn-round ml-auto" role="button" aria-pressed="true">Add New Sub-Category</a>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="sub-category-table" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Catergory</th>
											<th>Sub-Catergory</th>
											<th>Description</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tbody>
										@csrf
										@foreach($subcategories as $subcategory)
										<tr>
											<td>{{$subcategory->category_name}}</td>
											<td>{{$subcategory->name}}</td>
											<td>{{$subcategory->description}}</td>
											<td>
												<div class="form-button-action">
													<a href="/update-subcategories/{{ $subcategory->id }}" class="btn btn-link btn-primary btn-lg"data-toggle="tooltip" role="button"title="" data-original-title="Edit Task"><i class="fa fa-edit"></i></a>

													<a href="/delete-subcategories/{{ $subcategory->id }}" class="btn btn-link btn-danger"data-toggle="tooltip" role="button"title="" data-original-title="Remove" onclick="return confirm('are you sure you want to delete this subcategory')" ><i class="fa fa-times"></i>
														
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
	$('#sub-category-table').DataTable({
		"pageLength": 5,
	});
</script>
@endsection