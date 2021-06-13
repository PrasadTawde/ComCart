 
@extends('layouts/admin-layout')

@section('main')

<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form action="/subsubcategories-update/<?php echo $subsubcategories[0]->id; ?>" method="POST">
                        @csrf
                        <div class="card-header">
                            <div class="card-title">Update Sub-Category</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                @error('name')
                                <br>
                                <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                @enderror
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $subsubcategories[0]->name }}">                                    
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                @error('description')
                                <br>
                                <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                @enderror
                                <textarea class="form-control" id="description" name="description" rows="5" value="{{ $subsubcategories[0]->description }}">
                                    {{ $subsubcategories[0]->description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Submit</button>
                            <button class="btn btn-danger" onclick="window.location = '/subcategories';">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
