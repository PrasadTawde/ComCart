 
@extends('layouts/admin-layout')

@section('main')

    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <form action="/manage-staff-add" method="POST">
                            @csrf
                            <div class="card-header">
                                <div class="card-title">Add new staff user</div>
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
                                    <label for="email">Email</label>
                                    @error('email')
                                    <br>
                                    <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                    @enderror
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">                                    
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a class="btn btn-danger" href="/manage-staff">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection