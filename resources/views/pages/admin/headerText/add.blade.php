@extends('layouts.app', ['title' => "Add Header Text"])
@section('content')
    @php
        if(old('name')){
            $name = old('name');
            $status = old('status');
        }
        else if(isset($data) && $data){
            $name = $data->name;
            $status = $data->status;
        }
        else{
            $name = null;
            $status = null;
        }
    @endphp
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{$action}}" autocomplete="off" id="myForm" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-md-4 col-lg-3 col-sm-6 col-xs-12">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$name}}"
                               id="exampleInputEmail1"
                               placeholder="Enter Name">
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
    @include('plugins.validator')
    @include('plugins.LoadingOverlay')
    @include('plugins.js-confirm')
    <script>
        $.fn.sidebarActive('{{ route('admin.header-text-index') }}')

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
                                                window.location.href = "{{ route('admin.header-text-index') }}";
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
                    name: {
                        required: true,
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
