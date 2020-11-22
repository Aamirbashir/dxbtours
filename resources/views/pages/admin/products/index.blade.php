@extends('layouts.app', ['title' => "Services"])
@section('content')
    <div class="br-pagebody">
        <div class="form-layout">
            <div class="widget-2 mb-10">
                <div class="card shadow-base overflow-hidden">
                    <div class="card-header bg-transparent pd-20">
                        <h6 class="card-title">Products Detail</h6>
                        <a href="{{ route('admin.products-add') }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Add Products</a>
                    </div>
                    <div class="card-body">
                        <div class="table-wrapper">
                            <table id="datatable1" width="100%" class="table display responsive nowrap v-align-middle">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                        <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Price</th>
                                    <th>Price Criteria</th>
                                    <th>Image</th>
                                    <th>Status</th>
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

        var table = "";
        $(function(){
            'use strict';
            var tajax = {
                url:'{!! url()->current() !!}',
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
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name'},
                      { data: 'long_description', name: 'long_description'},
                     { data: 'product_price', name: 'product_price'},
                      { data: 'price_criteria', name: 'price_criteria'},
                           { data: 'product_image', name: 'product_image'},
                            { data: 'status', name: 'Status'},
                    { data: 'action', name: 'id' }
                ],
            });
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
        });


    </script>
@endpush
