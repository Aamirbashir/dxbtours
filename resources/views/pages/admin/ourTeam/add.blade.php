@extends('layouts.app', ['title' => "Add Team"])
@section('content')
    @php
        if(old('name')){
            $name = old('name');
            $designation = old('status');
            $intro = old('status');
            $icon = old('status');
        }
        else if(isset($data) && $data){
            $name = $data->name;
            $designation = $data->name;
            $intro = $data->name;
            $icon = $data->name;
            $status = $data->status;
        }
        else{
            $name = null;
            $designation = null;
            $intro = null;
            $icon = null;
            $status = null;
        }
    @endphp
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <form action="{{$action}}" autocomplete="off" enctype="multipart/form-data" id="myForm" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$name}}"
                                       placeholder="Enter Name here">
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" value="{{$designation}}"
                                       placeholder="Enter Designation here">
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label>Introduction</label>
                                <input type="text" class="form-control" name="intro" value="{{$intro}}"
                                       placeholder="Enter Introduction here">
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="exampleSelect1">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Active">Active</option>
                                    <option value="InActive">InActive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <h6 class="m-b-20 text-muted">Display Image</h6>
                            <input data-max-width="281" data-max-height="281" data-min-width="279" data-min-height="279" type="file" data-default-file="{{ $data->dp ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($data->dp->id)]) : '' }}.jpg" class="dropify" name="display_image" accept="image/*"/>
                            <label id="display_image-error" class="error" for="display_image"></label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h3>Social Links</h3>
                    <div id="ourTeamTable" class="table-responsive">
                        <table class="table table-sm table-hover" id="team-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th width="10%" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if( count($data->socials))
                                @foreach($data->socials as $key => $value)
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Enter Name here" value="{{$value->name}}" name="social_name[]">
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Enter Link here" value="{{$value->link}}" name="social_link[]">
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id="menu_icon{{$key}}" class="form-control menu_icon" placeholder="Click here" name="icon[]" value="{{$value->icon}}">
                                        <div class="input-group-prepend">
                                            <span style="width: 100px" class="input-group-text justify-content-center"> <i class="{{$value->icon}}"></i></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Enter Title here" value="{{$value->title}}" name="social_title[]">
                                </td>
                                <td class="text-center" style="vertical-align: middle">
                                    @if($key == 0)
                                        <button class="btn btn-sm btn-success addTeam" type="button"><i class="fa fa-plus"></i></button>
                                    @else
                                        <button class="btn btn-sm btn-danger removeTeam" type="button"><i class="far fa-trash-alt"></i></button>
                                    @endif                                </td>
                            </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Enter Name here" name="social_name[]">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Enter Link here" name="social_link[]">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" id="menu_icon0" class="form-control menu_icon" placeholder="Click here" name="icon[]" value="">
                                            <div class="input-group-prepend">
                                                <span style="width: 100px" class="input-group-text justify-content-center">@if ($icon) <i class="{{$icon}}"></i> @else Icon Preview @endif</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Enter Title here" name="social_title[]">
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                        <button class="btn btn-sm btn-success addTeam" type="button"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                    </div>
                </div>
                <button class="btn btn-success btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
@push('footer-js')
    @include('plugins.validator')
    @include('plugins.LoadingOverlay')
    @include('plugins.font-awesome-picker')
    @include('plugins.js-confirm')
    @include('plugins.dropify')
    <script>
        $.fn.sidebarActive('{{ route('admin.our-team-index') }}')

        $('body').on('iconpickerSelected', '.menu_icon', function(event){
            $(this).valid();
            $(this).closest('.input-group').find('.input-group-prepend span').html('<i class="'+event.iconpickerValue+'"></i>');
        });

        $checkDropify = true;
        var drEvent = $('.dropify').dropify({
            error: {
                'minWidth': 'The image width is too small (280px min).',
                'maxWidth': 'The image width is too big (280px max).',
                'minHeight': 'The image height is too small (280px min).',
                'maxHeight': 'The image height is too big (280px max).',
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

        $count = {{count($data->socials) ?? 1}};
        $("body").on("click", ".addTeam", function (e) {
            e.preventDefault();
            $html = '<tr>\n' +
                '<td>\n'+
                '<input type="text" class="form-control" placeholder="Enter Name here" name="social_name[]">\n'+
                '</td>\n'+
                '<td>\n'+
                '<input type="text" class="form-control" placeholder="Enter Link here" name="social_link[]">\n'+
                '</td>\n'+
                '<td>\n'+
                    '<div class="input-group">\n'+
                        '<input type="text" id="menu_icon'+$count+'" class="form-control menu_icon" placeholder="Click here" name="icon[]" value="">\n'+
                        '<div class="input-group-prepend">\n'+
                            '<span style="width: 100px" class="input-group-text justify-content-center"> Icon Preview </span>\n'+
                        '</div>\n'+
                    '</div>\n'+
                '</td>\n'+
            '<td>\n'+
            '<input type="text" class="form-control" placeholder="Enter Title here" name="social_title[]">\n'+
                '</td>\n'+
                '                                        <td class="text-center" style="vertical-align: middle">\n' +
                '                                            <button class="btn btn-sm btn-danger removeTeam" type="button"><i class="far fa-trash-alt"></i></button>\n' +
                '                                        </td>\n' +
                '                                    </tr>';
            $("#team-table tbody").append($html);
            iconPickerF($count)
            $count++;
        });

        function iconPickerF($count){
            $('#menu_icon'+$count).iconpicker({
                placement: "top",
            });
        }
        @if( count($data->socials))
            @foreach($data->socials as $key => $value)
                iconPickerF({{$key}});
            @endforeach
        @else
            iconPickerF('0');
        @endif


        $("body").on("click", ".removeTeam", function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

        function checkFields() {
            $error = true;
            $('[data-type="inValid"]').remove();
            $.each($("#ourTeamTable").find('input:visible'), function (ii, ele) {
                if($(ele).val() == ""){
                    $(ele).parents('td').append('<label data-type="inValid" class="error">This field is required</label>')
                    $error = false;
                }
            })
            return $error;
        }

        $("body").on("keyup change", "#ourTeamTable input", function (e) {
            $(this).closest('td').find('label').remove();
        });

        var _validator = $("#myForm").validate({
            ignore: "",
            submitHandler: function (form) {
                if(checkFields()){
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
                                                    window.location.href = '{{ route('admin.our-team-index') }}'
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
                        _validator.showErrors({"display_image" : "Image is not valid"});
                    }
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
                display_image: {
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

    </script>
@endpush
