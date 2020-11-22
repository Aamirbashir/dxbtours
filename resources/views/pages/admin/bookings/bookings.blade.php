@extends('layouts.app', ['title' => "Confirm Bookings"])
@section('content')
    <div class="br-pagebody">
        <div class="form-layout">
            <div class="widget-2 mb-10">
                <div class="card shadow-base overflow-hidden">
                    <div class="card-header bg-transparent pd-20">
                        <h6 class="card-title">Bookins Detail</h6>
                          <a href="{{ route('admin.bookings-add') }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Add Bookings</a>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                        <input type="date" id="booking_date" onchange='getdata()' name="booking_date" placeholder="select date" class="col-md-6 form-control">
                    </div>
                        <div class="table-wrapper">
                            <table id="datatable1" width="100%" class="table display responsive nowrap v-align-middle">
                                <thead>
                                <tr>
              <th>service_name</th> 
               <th>agent</th>
            <th>customer_name</th>
            <th>customer_email</th> 
            <th>customer_cell</th> 
            <th>customer_phone</th>
            <th>customer_address</th> 
            <th>booking_date</th>
            <th>number_of_pax</th>
            <th>total_collection</th>
            <th>total_collected</th>
            <th>total_balance</th>
            <th>message</th>
           
                                    <th width="10%">Action</th>
                                </tr>

                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer-js')
    @include('plugins.select2')
    @include('plugins.datatable')
    @include('plugins.js-confirm')
    <script>
   
        var date=$("#booking_date").val();
        var table = "";
        $(function(){
            'use strict';
            var tajax = {
                url:'{!! url()->current() !!}'+'/'+date,
                data:date
            };
            table = $('#datatable1').DataTable({
                responsive: true,
                "lengthMenu": [ 5, 10, 25, 50 ],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "processing": true,
                "serverSide": true,
                ajax: tajax,
                columns: [
            { data: 'service_name', name: 'service_name' },
                {data:'agent',name:'agent'},
            {data:'customer_name', name:'customer_name'},
            {data:'customer_email',name:'customer_email'}, 
            {data:'customer_cell',name:'customer_cell'}, 
            {data:'customer_phone',name:'customer_phone'},
            {data:'customer_address',name:'customer_address'}, 
            {data:'booking_date',name:'booking_date'},
            {data:'number_of_pax',name:'number_of_pax'},
            {data:'total_collection',name:'total_collection'},
            {data:'total_collected',name:'total_collected'},
            {data:'total_balance',name:'total_balance'},
            {data:'message',name:'message'},
        
            { data: 'action', name: 'id' }
                ],
            });
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
        });


    </script>
@endpush
