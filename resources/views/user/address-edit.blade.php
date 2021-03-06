@extends('layouts/layout')

@section('main')

        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">
        
                                        <a href="/">Home</a></li>
                                    <li class="is-marked">
        
                                        <a href="/address-add">Address Book</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="dash">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">

                                    <!--====== Dashboard Features ======-->
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-1">
        
                                            <span class="dash__text u-s-m-b-16">Hello, {{ Auth::user()->name }}</span>
                                            <ul class="dash__f-list">
                                                <li>
        
                                                    <a class="{{ (request()->is('*my-account*')) ? 'dash-active' : '' }}" href="/my-account">Manage My Account</a></li>
                                                <li>
        
                                                    <a class="{{ (request()->is('profile*')) ? 'dash-active' : '' }}" href="/profile">My Profile</a></li>
                                                <li>
        
                                                    <a class="{{ (request()->is('address*')) ? 'dash-active' : '' }}" href="/address">Address Book</a></li>
                                                <li>
        
                                                    <a class="{{ (request()->is('orders*')) ? 'dash-active' : '' }}" href="/orders">My Orders</a></li>
                                                <li>

                                                    <a class="{{ (request()->is('my-products*')) ? 'dash-active' : '' }}" href="/my-products">My Products</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                @foreach ($address as $data)
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Address</h1>

                                            <span class="dash__text u-s-m-b-30">We need an address where we could deliver products.</span>
                                            <form class="dash-address-manipulation" action="/address-edit/{{ $data->id }}" method="POST">
                                                @csrf
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-fname">FIRST NAME *</label>
                                                        @error('first_name')
                                                            <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                        @enderror
                                                        <input class="input-text input-text--primary-style" type="text" id="address-fname" name="first_name" placeholder="Update First Name" value="{{ $data->first_name }}"></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-lname">LAST NAME *</label>
                                                        @error('last_name')
                                                            <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                        @enderror
                                                        <input class="input-text input-text--primary-style" type="text" id="address-lname" name="last_name" placeholder="Update Last Name" value="{{ $data->last_name }}"></div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-phone">PHONE *</label>
                                                        @error('phone_no')
                                                            <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                        @enderror
                                                        <input class="input-text input-text--primary-style" type="text" id="address-phone" name="phone_no" placeholder="Update Phone No." value="{{ $data->phone_no }}"></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-street">STREET ADDRESS *</label>
                                                        @error('street_address')
                                                            <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                        @enderror
                                                        <input class="input-text input-text--primary-style" type="text" id="address-street" name="street_address" placeholder="Update Street Address" value="{{ $data->address }}"></div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">
        
                                                        <!--====== Select Box ======-->
        
                                                        <label class="gl-label" for="address-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="address-country" disabled="">
                                                            <option value="india" selected="">India</option>
                                                        </select>
                                                        <!--====== End - Select Box ======-->
                                                    </div>
                                                    <div class="u-s-m-b-30">
        
                                                        <!--====== Select Box ======-->
                                                        <input type="text" value="{{ $data->state }}" hidden id="state">
                                                        <label class="gl-label" for="address-state">STATE/PROVINCE *</label>
                                                        @error('state')
                                                            <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                        @enderror
                                                        <select class="select-box select-box--primary-style" id="address_state" name="state">
                                                            <option selected value="">Choose State/Province</option>
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->name }}" 
                                                                    @if(old('state') == $state->name) {{ "selected" }} @endif 
                                                                    @if($data->state == $state->name) {{ "selected" }} @endif 
                                                                    >{{ $state->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <!--====== End - Select Box ======-->
                                                    </div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-city">TOWN/CITY *</label>
                                                        @error('city')
                                                            <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                        @enderror
                                                        <input class="input-text input-text--primary-style" type="text" id="address-city" name="city" placeholder="Update Town/City" value="{{ $data->city }}"></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-street">ZIP/POSTAL CODE *</label>
                                                        @error('pincode')
                                                            <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                        @enderror
                                                        <input class="input-text input-text--primary-style" type="text" id="address-postal" name="pincode" placeholder="Update Zip-Code" value="{{ $data->pincode }}"></div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="address-city">Type</label>
                                                        @error('address_type')
                                                            <span style="color: red; font-size: 80%;">{{ $message  }}</span>
                                                        @enderror
                                                        <div class="radio-box">
                                                            <input type="radio" id="address_type_home" name="address_type" value="Home"
                                                            @if ($data->type == 'Home')
                                                                {{ 'checked' }}
                                                            @endif
                                                            >
                                                            <div class="radio-box__state radio-box__state--primary">
                                                                <label class="radio-box__label" for="address_type_home">Home</label>
                                                            </div>
                                                        </div>
                                                        <div class="radio-box">
                                                            <input type="radio" id="address_type_office" name="address_type" value="Office"
                                                            @if ($data->type == 'Office')
                                                            {{ 'checked' }}
                                                            @endif
                                                            >
                                                            <div class="radio-box__state radio-box__state--primary">
                                                                <label class="radio-box__label" for="address_type_office">Office</label>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">
                                                        <a href="/address" class="btn btn--e-transparent-platinum-b-2">CANCEL</a>
                                                    </div>
                                                    <div class="u-s-m-b-30">
                                                        <button class="btn btn--e-brand-b-2" type="submit">UPDATE</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        </div>
        <!--====== End - App Content ======-->

@endsection

@section('jsscript')

<script type="text/javascript">
    $(document).ready(function(){
        var state = document.getElementById('state').value;
        $("#address_state.select option[value="+state+"]").prop("selected", true);
    });
</script>

@endsection