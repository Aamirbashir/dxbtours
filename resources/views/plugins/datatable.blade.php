@push('plugin-css')
    <link href="{{ asset('public/admin/lib/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet">
@endpush

@push('plugin-js')
    <script src="{{ asset('public/admin/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>
@endpush
