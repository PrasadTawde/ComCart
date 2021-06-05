 
@extends('layouts/admin-layout')

@section('main')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <h1 class="dash__h1 u-s-m-b-14">Add Subcategory</h1>


                                    <form class="dash-address-manipulation" action="/insert-subcategories" method="POST">
                                       @csrf


                                       <tr>
                                        <td>
                                         <label class="gl-label" for="name">Name *</label>
                                         @error('name')
                                         <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                         @enderror
                                         <input class="input-text input-text--primary-style" type="text" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                                     </td>

                                     <td>
                                      <label class="gl-label" for="description">Description *</label>
                                      @error('description')
                                      <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                      @enderror
                                      <input class="input-text input-text--primary-style" type="text" id="description" name="description" placeholder="Description" value="{{ old('description') }}">
                                  </td>

                                  <td>

                                      @error('category_id')
                                      <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                      @enderror

                                      <select class="js-states browser-default select2 custom-select" name="category_name" required id="id">
                                        <option value="option_select" disabled selected>Category</option>
                                        @foreach($subcategories as $category)
                                        <option value="{{ $category->id }}" >{{ $category->name}}</option>

                                        @endforeach
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                </td>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection