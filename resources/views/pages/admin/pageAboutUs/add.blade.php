@extends('layouts.app', ['title' => "Update About Us"])
@section('content')
    @php
        if(old('description')){
            $description = old('description');
            $status = old('status');
        }
        else if(isset($data) && $data){
            $description = $data->description;
            $status = $data->status;
        }
        else{
            $description = null;
            $status = null;
        }
    @endphp
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{$action}}" id="myForm" autocomplete="off" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <div><textarea name="description" class="form-control" id="summernote" cols="30" rows="10">{{$description}}</textarea></div>
                            <label id="summernote-error" class="error" for="summernote"></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <h6 class="m-b-20 text-muted">Logo</h6>
                            <input type="file"  class="dropify" data-max-width="411" data-max-height="411" data-min-width="409" data-min-height="409" name="logo" accept="image/*"/>
                            <label id="logo-error" class="error" for="logo"></label>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('footer-js')
    @include('plugins.summernote')
    @include('plugins.dropify')
    @include('plugins.validator')
    @include('plugins.LoadingOverlay')
    @include('plugins.js-confirm')
    <script>
        $('.dropify').attr("data-default-file", '{{ $data->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($data->logoFile->id)]) : '' }}.jpg');
        $checkDropify = true;
        var drEvent = $('.dropify').dropify({
            error: {
                'minWidth': 'The image width is too small (410px min).',
                'maxWidth': 'The image width is too big (410px max).',
                'minHeight': 'The image height is too small (410px min).',
                'maxHeight': 'The image height is too big (410px max).',
            }
        }).on('change', function () {
            $checkDropify = true;
            // $('[name="logo"]').valid();
        });

        drEvent.on('dropify.errors', function(event, element){
            $checkDropify = false;
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }



        $('#summernote').summernote({
            height: 250,
        }).on("summernote.change", function (e) {
            $('#summernote').valid();
        });

        $.validator.addMethod("summernote", function(value, element) {
            if($('#summernote').summernote('isEmpty')){
                return false;
            }else{
                return true;
            }
        }, "This field is required");

        var _validator = $("#myForm").validate({
            ignore: "",
            submitHandler: function (form) {
                if($checkDropify){
                    $.ajax({
                        url: $(form).attr('action'),
                        method: "POST",
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            $('.br-section-wrapper').LoadingOverlay('show');
                        },
                        success: (response) => {
                            $('.br-section-wrapper').LoadingOverlay('hide');
                            if(response.status == "Error"){

                                showValidationErrors(_validator, response.errors);

                            }else if(response.status == "Success"){

                                $.confirm({
                                    title: response.status,
                                    content: response.html,
                                    theme: "light",
                                    type: "green",
                                    animation: 'scale',
                                    closeAnimation: 'scale',
                                    animateFromElement: false,
                                    buttons: {
                                        ok: {
                                            text: "",
                                            btnClass: "btn-green",
                                            action: function () {

                                            }
                                        }
                                    }
                                })

                            }
                        },
                        error: (xhr, ajaxOptions, thrownError) => {

                        }
                    })
                }else{
                    _validator.showErrors({"logo" : "Image is not valid"});
                }
            },
            rules: {
                description: {
                    summernote: true,
                },
                logo: {
                    required: {
                        depends: function (element) {
                            return $(element).attr('data-default-file') == ""
                        }
                    },
                },
                status: {
                    required: true,
                },
            }
        });

        @if($status)
        $('#status').val('{{$status}}').change()
        @endif
    </script>
@endpush
