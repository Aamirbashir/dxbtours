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
                    <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <label for="exampleInputEmail1">Description</label>
                        <div><textarea name="description" class="form-control" id="summernote" cols="30" rows="10">{{$description}}</textarea></div>
                        <label id="summernote-error" class="error" for="summernote"></label>
                    </div>
                    <div class="form-group col-md-4 col-lg-3 col-sm-6 col-xs-12">
                        <label for="exampleSelect1">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="Active">Active</option>
                            <option value="InActive">InActive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@push('footer-js')
    @include('plugins.summernote')
    @include('plugins.validator')
    @include('plugins.LoadingOverlay')
    @include('plugins.js-confirm')
    <script>

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
            },
            rules: {
                description: {
                    summernote: true,
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
