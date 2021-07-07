 
@extends('layouts/admin-layout')

@section('main')

    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <form action="/categories-insert" method="POST">
                            @csrf
                            <div class="card-header">
                                <div class="card-title">Add new category</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    @error('name')
                                    <br>
                                    <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                    @enderror
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}">                                    
                                </div>
                                <div class="form-group">
                                    <label for="name">Icon</label>
                                    @error('icon')
                                    <br>
                                    <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                    @enderror
                                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Enter icon name" value="{{ old('icon') }}">
                                    <small class="form-text text-muted">(Browse icons name from https://fontawesome.com/ and enter them here. eg. fas fa-tv)</small>                                        
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label><small class="form-text text-muted">(optional)</small>
                                    @error('description')
                                    <br>
                                    <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                    @enderror
                                    <textarea class="form-control" id="description" name="description" rows="5" value="{{ old('description') }}">
                                    </textarea>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <button class="btn btn-danger" onclick="window.location = '/categories';">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection
