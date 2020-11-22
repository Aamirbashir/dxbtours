@extends('layouts.app', ['title' => "Bookings"])
@section('content')
    <div class="br-pagebody">
        <div class="form-layout">
            <div class="widget-2 mb-10">
                <div class="card shadow-base overflow-hidden">
                    <div class="card-header bg-transparent pd-20">
                        <h6 class="card-title">Bookins Detail</h6>
                     
                    </div>
                    <div class="card-body">
                        <div class="table-wrapper">
                            <table id="datatable1" width="100%" class="table display responsive nowrap v-align-middle">
                                <thead>
                                <tr>
                                    <th>service_name</th>
                                    <th>email</th>
                                    <th>contact</th>
                                    <th>message</th>
<th>number_of_pax</th>
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
                 { data: 'service_name', name: 'service_name' },
                    { data: 'email', name: 'email' },
                    { data: 'contact', name: 'contact'},
                    { data: 'message', name: 'message'},
                     { data: 'number_of_pax', name: 'number_of_pax'},
                    { data: 'action', name: 'id' }
                ],
            });
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
        });


    </script>
@endpush
