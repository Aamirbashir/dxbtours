@push('plugin-css')
    <link href="{{ asset('public/admin/lib/toastr-master/toastr.min.css') }}" rel="stylesheet">
@endpush

@push('plugin-js')
    <script src="{{ asset('public/admin/lib/toastr-master/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
@endpush
