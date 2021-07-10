@extends('layouts/admin-layout')

@section('main')

<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Auction Products</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <form class="dash-address-manipulation" action="/product-verification-update/{{$product_verifications[0]->auction_id}}" method="POST">
                            @csrf


                             <div class="u-s-m-b-30">

                                                <!--====== Select Box ======-->

                                                <label class="gl-label" for="status">status *</label>
                                                @error('status')
                                                    <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                @enderror
                                                <select class="select-box select-box--primary-style" id="user-status" name="status">
                                                    <option disabled="">Choose Status</option>
                                                  

                                                    <option value="processing" 
                                                    @if($product_verifications[0]->status == 'processing' ) {{ 'selected' }} 
                                                    @endif
                                                    >Processing</option>
                                                    <option value="approved" 
                                                    @if($product_verifications[0]->status == 'approved' ) {{ 'selected' }} 
                                                    @endif
                                                    >Approved</option>

                                                </select>
                                                <!--====== End - Select Box ======-->
                                            </div>
                            
                            <div class="form-group">
                                <label class="gl-label" for="user-remark">Remark *</label>
                                @error('remark')
                                <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                @enderror
                                <input class="input-text input-text--primary-style" type="text" id="user-remark" name="remark" placeholder="Remark" value="{{ old('remark') }}">
                            </div>
                            

                            <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('jsscript')
<script>
    $('#auctions-table').DataTable({
        "pageLength": 5,
    });
</script>
@endsection