 
@extends('layouts/admin-layout')

@section('main')

<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="/insert-subcategories" method="POST">
                        @csrf
                        <div class="card-header">
                            <div class="card-title">Add new Sub-Category</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">Select Category</label>
                                @error('category')
                                      <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                      @enderror
                                <select class="form-control" id="category" name="category">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach($subcategories as $category)
                                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Sub-Category Name</label>
                                @error('name')
                                <br>
                                <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                @enderror
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}">                                    
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                @error('description')
                                <br>
                                <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                @enderror
                                <textarea class="form-control" id="description" name="description" rows="5" value="{{ old('description') }}">
                                </textarea>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Save</button>
                            <button class="btn btn-danger" onclick="window.location = '/subcategories';" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection