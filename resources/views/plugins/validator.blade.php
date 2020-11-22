@push('plugin-js')
    <script src="{{ asset('public/admin/plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/admin/plugins/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script>
        @if(!isset($onChange))
            $("body").on("change", "select, input, textarea", function(){
                $(this).valid()
            });
        @endif
        function showValidationErrors (validator, errorArray) {
            jsonError = {};
            $.each(errorArray,function (ii, ele) {
                $.each(ele,function (iii, elee) {
                    jsonError[ii] = elee;
                });
            })
            validator.showErrors(jsonError);
        }
    </script>
@endpush
