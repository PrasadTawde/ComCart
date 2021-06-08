@extends('layouts/layout')

@section('main')

        <!--====== App Content ======-->
        <div class="app-content">

          <!--====== Section 1 ======-->
          <div class="u-s-p-y-60">

              <!--====== Section Content ======-->
              <div class="section__content">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-12 col-md-12 u-s-m-b-30">
                              <div class="empty">
                                  <div class="empty__wrap">

                                      <span class="empty__big-text">Payment Faild</span>
                                      <span class="empty__text-1">Your payment has been failed try again after later.</span>
                                      <a class="empty__redirect-link btn--e-brand" href="/">CONTINUE SHOPPING</a></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--====== End - Section Content ======-->
          </div>
          <!--====== End - Section 1 ======-->
      </div>
      <!--====== End - App Content ======-->

@endsection
