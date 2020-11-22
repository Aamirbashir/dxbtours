@extends('layouts.app', ['title' => "Add Services"])
@section('content')
    @php
        if(old('name')){
            $name = old('name');
            $title = old('title');
            $short_description = old('short_description');
            $long_description = old('long_description');
            $logo = old('logo');
            $status = old('status');
            $display_order=old('display_order');
            $seo_keywords=old('seo_keywords');
        }
        else if(isset($data) && $data){
            $name = $data->name;
            $title = $data->title;
            $short_description = $data->short_description;
            $long_description = $data->long_description;
            $logo = $data->logo;
            $status = $data->status;
            $display_order= $data->display_order;
            $seo_keywords=$data->seo_keywords;
        }
        else{
            $name = null;
            $title = null;
            $short_description = null;
            $long_description = null;
            $logo = null;
            $status = null;
            $display_order=null;
            $seo_keywords=null;
        }
    @endphp
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{$action}}" autocomplete="off" id="myForm" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$name}}"
                                       id=""
                                       placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$title}}"
                                       id=""
                                       placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">Short Description</label>
                                <textarea  class="form-control" name="short_description"
                                           id=""
                                           placeholder="Enter Name">{{$short_description}}</textarea>
                            </div>
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">KeyWords</label>
                                <textarea  class="form-control" name="seo_keywords"
                                           id=""
                                           placeholder="Enter Name">{{$seo_keywords}}</textarea>
                            </div>
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">Description</label>
                                <div>
                                    <textarea name="long_description" class="form-control" id="summernote" cols="30" rows="10">{{ $long_description }}</textarea>
                                </div>
                                <label id="summernote-error" class="error" for="summernote"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <h6 class="m-b-20 text-muted">File browser</h6>
                            <input type="file" data-max-width="2000" data-max-height="2000" data-min-width="100" data-min-height="100" data-default-file="{{ $data->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($data->logoFile->id)]) : '' }}.jpg" class="dropify" name="logo" accept="image/*"/>
                            <label id="logo-error" class="error" for="logo"></label>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="">Display</label>
                            <input type="number" class="form-control" name="display_order"  value="{{$display_order}}" id="display_order">
                            
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
    @include('plugins.validator')
    @include('plugins.LoadingOverlay')
    @include('plugins.js-confirm')
    @include('plugins.dropify')
    <script>
        $.fn.sidebarActive('{{ route('admin.services-index') }}')

        $('#summernote').summernote({
            height: 250,
        }).on("summernote.change", function (e) {
            $('#summernote').valid();
        });

        $checkDropify = true;
        var drEvent = $('.dropify').dropify({
            error: {
                'minWidth': 'The image width is too small (250px min).',
                'maxWidth': 'The image width is too big (250px max).',
                'minHeight': 'The image height is too small (250px min).',
                'maxHeight': 'The image height is too big (250px max).',
            }
        }).on('change', function () {
            $checkDropify = true;
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
                                                window.location.href = '{{ route('admin.services-index') }}'
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
                name: {
                    required: true,
                },
                title: {
                    required: true,
                },
                short_description: {
                    required: true,
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
                long_description: {
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
