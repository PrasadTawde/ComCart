@extends('layouts/admin-layout')

@section('main')

	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Add Sub-Sub-Category</h4>
								<a href="/subsubcategories-insert" class="btn btn-primary btn-round ml-auto" role="button" aria-pressed="true">Add New Sub-Sub-Category</a>
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
											<th>Sub-Sub-Catergory</th>
											<th>Description</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tbody>
										@csrf
										@foreach($data as $sub_sub_category)
										<tr>
											<td>{{ $sub_sub_category->category_name }}</td>
											<td>{{ $sub_sub_category->sub_category_name }}</td>
											<td>{{ $sub_sub_category->sub_sub_category_name }}</td>
											<td>{{ $sub_sub_category->description }}</td>
											<td>
												<div class="form-button-action">
													<a href="/subsubcategories-update/{{ $sub_sub_category->sub_sub_category_id }}" class="btn btn-link btn-primary btn-lg"data-toggle="tooltip" role="button"title="" data-original-title="Edit Task"><i class="fa fa-edit"></i></a>

													<a href="/subsubcategories-delete/{{ $sub_sub_category->sub_sub_category_id }}" class="btn btn-link btn-danger"data-toggle="tooltip" role="button"title="" data-original-title="Remove" onclick="return confirm('are you sure you want to delete this sub-sub-category')" ><i class="fa fa-times"></i>
														
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