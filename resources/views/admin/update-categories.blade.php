 
@extends('layouts/admin-layout')

@section('main')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="/update-categories/<?php echo $categories[0]->id; ?>" method="POST">
                        @csrf
                        <div class="card-header">
                            <div class="card-title">Update category</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                @error('name')
                                <br>
                                <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                @enderror
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $categories[0]->name }}">                                    
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                @error('description')
                                <br>
                                <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                @enderror
                                <textarea class="form-control" id="description" name="description" rows="5" value="{{ $categories[0]->description }}">{{ $categories[0]->description }}
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