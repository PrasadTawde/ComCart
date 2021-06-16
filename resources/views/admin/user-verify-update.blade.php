 
@extends('layouts/admin-layout')

@section('main')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($users as $user)
                        <form action="/user-verify-update/{{ $user->verify_id}}" method="POST">
                            @csrf
                            <div class="card-header">
                                <div class="card-title">Update category</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="details"><h4>Details</h4</label>
                                    <p>
                                        <b>Document Type:</b> <span>{{ $user->document_type }}</span><br>
                                        <b>Identification No:</b> <span>{{ $user->identification_no }}</span><br>
                                        <b>Date Of Birth:</b> <span>{{ $user->date_of_birth }}</span>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="status">Select Category</label>
                                    @error('status')
                                        <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                        @enderror
                                    <select class="form-control" id="status" name="status">
                                        <option disabled>Select Status</option>
                                        <option value="processing" @if ($user->status == 'processing')
                                            {{ 'selected' }}
                                        @endif>Processing</option>
                                        <option value="verified" @if ($user->status == 'verified')
                                            {{ 'selected' }}
                                        @endif>Verified</option>
                                        <option value="canceled" @if ($user->status == 'canceled')
                                            {{ 'selected' }}
                                        @endif>canceled</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <small>(Optional)</small>
                                    @error('remarks')
                                    <br>
                                    <span style="color: red; font-size: 85%;">{{ $message  }}</span>
                                    @enderror
                                    <textarea class="form-control" id="remarks" name="remarks" rows="5" value="{{ $user->remark }}">{{ $user->remark }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <button class="btn btn-danger" onclick="window.location = '/user-verify';">Cancel</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection