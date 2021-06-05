@extends('layouts/admin-layout')

@section('main')

		<div class="main-panel">
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
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Row
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Create a new row using this form, make sure you fill them all</p>
													<form>
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Name</label>
																	<input id="addName" type="text" class="form-control" placeholder="fill name">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Position</label>
																	<input id="addPosition" type="text" class="form-control" placeholder="fill position">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Office</label>
																	<input id="addOffice" type="text" class="form-control" placeholder="fill office">
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
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
			
		</div>
		
		@endsection