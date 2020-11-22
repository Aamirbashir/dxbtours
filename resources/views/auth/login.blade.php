<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0">

    <title>Login | {{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('public/admin/img/admin-fav-icon.png') }}">
    <!-- vendor css -->
    <link href="{{ asset('public/admin/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/admin/css/bracket.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/custom.css') }}">
    <style>
        .loadingoverlay_element {
            width: 28px !important;
        }
    </style>
</head>

<body>
<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
    <form method="POST" id="login-form" autocomplete="off" action="{{ route('admin.login') }}">
        @csrf
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> DXB Food <span class="tx-normal">]</span></div>
            <div class="tx-center mg-b-20">Login Here</div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter your Email">
                @error('email')
                    <label for="" class="error">{{ $message }}</label>
                @enderror
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                @error('password')
                <label for="" class="error">{{ $message }}</label>
                @enderror
                <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </div><!-- login-wrapper -->
    </form>
</div><!-- d-flex -->


<script src="{{ asset('public/admin/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script src="{{ asset('public/admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/jquery-loading-overlay-master/loadingoverlay.min.js') }}"></script>
<script>

    function showValidationError(validator, $errorArray) {
        jsonError = [];
        $.each($errorArray,function (ii, ele) {
            $.each(ele,function (iii, elee) {
                jsonError[ii] = elee;
            });
        })
        validator.showErrors(jsonError);
    }

    var _validator = $("#login-form").validate({
        submitHandler: function (form) {
            $.ajax({
                url: "{{ route('admin.login') }}",
                method: "POST",
                data: new FormData(form),
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('[type="submit"]').LoadingOverlay('show');
                },
                success: (response) => {
                    $('[type="submit"]').LoadingOverlay('hide');
                    if(response.status == "Error"){

                        showValidationError(_validator, response.errors);

                    }else if(response.status == "Success"){

                        window.location.href = "{{ route('admin.dashboard') }}";

                    }
                },
                error: (xhr, ajaxOptions, thrownError) => {

                }
            })
        },
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            }
        }
    });
</script>
</body>

</html>
