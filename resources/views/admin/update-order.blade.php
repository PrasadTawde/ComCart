 
@extends('layouts/admin-layout')

@section('main')
<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($orders as $order)
                        <form action="/manage-order-update/{{ $order->order_id }}" method="POST">
                            @csrf
                            <div class="card-header">
                                <div class="card-title">Update Order</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div>
                                        <span style="font-weight: bold;">Title : </span>{{ $order->title }} <br>
                                        <span style="font-weight: bold;">Description : </span>{{ $order->description }}
                                    </div>                                
                                </div>
                                <div class="form-group">
                                    <label for="status" style="font-weight: bold;">Select Status</label>
                                    @error('status')
                                        <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                        @enderror
                                    <select class="form-control" id="status" name="status">
                                        <option disabled>Select Status</option>
                                        <option value="processing"
                                            @if ($order->status == 'processing')
                                                {{ 'selected' }}
                                            @endif
                                        >
                                            Processing
                                        </option>
                                        <option value="shipped"
                                            @if ($order->status == 'shipped')
                                                {{ 'selected' }}
                                            @endif
                                        >
                                            Shipped
                                        </option>
                                        <option value="delivered"
                                            @if ($order->status == 'delivered')
                                                {{ 'selected' }}
                                            @endif
                                        >
                                            Delivered
                                        </option>
                                        <option value="cancelled"
                                            @if ($order->status == 'cancelled')
                                                {{ 'selected' }}
                                            @endif
                                        >
                                            Cancelled
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Submit</button>
                                <a href="/manage-orders" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection