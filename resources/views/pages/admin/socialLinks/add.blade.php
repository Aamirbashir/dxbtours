@extends('layouts.app', ['title' => "Social Link"])
@section('content')
@php
    if(old('name')){
        $name = old('name');
        $link = old('link');
        $icon = old('icon');
        $title = old('title');
        $status = old('status');
    }
    else if(isset($data) && $data){
        $name = $data->name;
        $link = $data->link;
        $icon = $data->icon;
        $title = $data->title;
        $status = $data->status;
    }
    else{
        $name = null;
        $link = null;
        $icon = null;
        $title = null;
        $status = null;
    }
@endphp
<div class="br-pagebody">
    <div class="br-section-wrapper">
        <form action="{{$action}}" autocomplete="off" id="myForm" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group col-md-4 col-lg-3 col-sm-6 col-xs-12">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$name}}"
                           id=""
                           placeholder="Enter Name">
                </div>
                <div class="form-group col-md-4 col-lg-3 col-sm-6 col-xs-12">
                    <label for="">Link</label>
                    <input type="text" class="form-control" name="link" value="{{$link}}"
                           id=""
                           placeholder="Enter Link">
                </div>
                <div class="form-group col-md-4 col-lg-3 col-sm-6 col-xs-12">
                    <label for="">Icon</label>
                    <div class="input-group">
                        <input type="text" id="menu_icon" class="form-control" placeholder="Click here" name="icon" value="{{$icon}}">
                        <div class="input-group-prepend">
                            <span style="width: 100px" class="input-group-text justify-content-center" id="icon-preview">@if ($icon) <i class="{{$icon}}"></i> @else Icon Preview @endif</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4 col-lg-3 col-sm-6 col-xs-12">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$title}}"
                           id=""
                           placeholder="Enter Title">
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
    @include('plugins.font-awesome-picker')
    @include('plugins.validator')
    @include('plugins.LoadingOverlay')
    @include('plugins.js-confirm')
    <script>
        $.fn.sidebarActive('{{ route('admin.social-links-index') }}')
        $('#menu_icon').iconpicker();

        $('#menu_icon').on('iconpickerSelected', function(event){
            $('#menu_icon').valid();
            $('#icon-preview').html('<i class="'+event.iconpickerValue+'"></i>')
        });

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
                                            window.location.href = "{{ route('admin.social-links-index') }}";
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
                link: {
                    required: true,
                },
                icon: {
                    required: true,
                },
                title: {
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
