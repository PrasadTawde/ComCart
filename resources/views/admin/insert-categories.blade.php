 
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
                                    <h1 class="dash__h1 u-s-m-b-14">Add new category</h1>


                                    <form class="dash-address-manipulation" action="/insert-categories" method="POST">
                                     @csrf
                                     <div class="gl-inline">
                                      <div class="u-s-m-b-30">
                                        <tr>
                                            <td>
                                               <label class="gl-label" for="name">Name *</label>
                                                @error('name')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                    @enderror
                                                    <input class="input-text input-text--primary-style" type="text" id="address-fname" name="name" placeholder="Name" value="{{ old('name') }}"></div>
                                                </td>
                                            </div>

                                            <div class="gl-inline">
                                               <div class="u-s-m-b-30">
                                                <td>
                                                  <label class="gl-label" for="description">Description *</label>
                                                @error('description')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                    @enderror
                                                    <input class="input-text input-text--primary-style" type="text" id="address-lname" name="description" placeholder="Description" value="{{ old('description') }}"></div>
                                                </td>
                                            </div>
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
