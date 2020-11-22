@extends('layouts.app', ['title' => "Dashboard"])
@section('content')
    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-info rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center mb-20">
                        <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Totol Enquiries</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"></p>
                        </div>
                    </div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-teal rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center mb-20">
                        <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Bookings</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer-js')
    <script>

    </script>
@endpush
