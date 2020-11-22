@extends('layouts.admin')
@section('adminContent')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Header Text</h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="#">Admin Panel</a>
                                </li>
                                <li>
                                    <a href="#">Header Text</a>
                                </li>
                                <li class="active">
                                    List
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                        <div class="m-b-10" style="float:right;">
                            <a class="btn btn-primary float-md-right-sm-center" href="{{ route('admin.header-text-add') }}">Add Header Text</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
{{--                            <h4 class="header-title">Default Example</h4>--}}
{{--                            <p class="sub-header">--}}
{{--                                DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.--}}
{{--                            </p>--}}

                            <table id="datatable" width="100%" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
@endsection
@push('footer-js')
@include('plugins.datatable')
<script>
    $(function(){

        {{--var tajax = {--}}
        {{--    url:'{!! url()->current() !!}',--}}
        {{--    data: function (request) {--}}
        {{--        // The fields will be used for filtration.--}}
        {{--        // request.appointment_from = $('#appointment_from').val();--}}
        {{--        // request.service = $('#service').val(); // Your Fields--}}
        {{--    }--}}
        {{--};--}}

        $("#datatable").DataTable({
            "processing": true,
            "serverSide": true,
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            dom:
                "<'row datatble-header-row'<'col col-sm-4 col-xs-12'l><'col col-sm-4 col-xs-12 mb-sm-5 text-center'B><'col col-sm-4 col-xs-12'f>>" +
                "<'row datatble-body-row'<'col col-sm-12 col-xs-12'tr>>" +
                "<'row datatble-footer-row'<'col col-sm-5 col-xs-12'i><'c col-xs-12ol col-sm-7'p>>",
            ajax: '{!! url()->current() !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name'},
                { data: 'status', name: 'status'},
                { data: 'action', name: 'id' } // Your Other Columns
            ],
        } );
    });
</script>
@endpush
