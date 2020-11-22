@extends('layouts.app', ['title' => "Add Product"])
@section('content')
    @php
        if(old('name')){
            $name = old('name');
             $title = old('title');
            $service_id= old('service_id');
            $short_description = old('service_id');
            $long_description = old('long_description');
            $product_image = old('product_image');
            $status = old('status');
            $display_order=old('display_order');
            $product_price=old('product_price');
            $price_criteria=old('price_criteria');
            $number_of_pax=old('number_of_pax');
            $size=old('size');
            $discount_price=old('discount_price');
             $seo_keywords=old('seo_keywords');
        }
        else if(isset($data) && $data){
            $name = $data->name;
            $title=$data->title;
            $size=$data->size;
            $service_id= $data->service_id;
            $short_description = $data->short_description;
            $long_description = $data->long_description;
            $logo = $data->product_image;
            $status = $data->status;
            $display_order= $data->display_order;
            $product_price=$data->product_price;
            $price_criteria=$data->price_criteria;
              $number_of_pax=$data->number_of_pax;
              $discount_price=$data->discount_price;
              $seo_keywords=$data->seo_keywords;
        }
        else{
            $name = null;
            $service_id=null;
            $short_description = null;
            $long_description = null;
            $product_image = null;
            $status = null;
            $display_order=null;
            $product_price=null;
            $price_criteria=null;
            $number_of_pax=null;
            $size=null;
            $discount_price=null;
            $seo_keywords=null;
            $title=null;
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
                                <label for="">title</label>
                                <input type="text" class="form-control" name="title" value="{{$title}}"
                                       id=""
                                       placeholder="Enter title">
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="">Service</label>
                               <select class="form-control" name="service_id">
                                   @foreach($services_list as $service)
                                   <option value="{{$service->id}}" {{ $service_id == $service->id ? 'selected' : '' }}>{{$service->name}}</option>
                                   @endforeach
                               </select>
                            </div>
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">Short Description</label>
                                <textarea  class="form-control" name="short_description"
                                           id=""
                                           placeholder="Enter Name">{{$short_description}}</textarea>
                            </div>
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">Seo KeyWords</label>
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
                            <input type="file" data-max-width="2000" data-max-height="2000" data-min-width="100" data-min-height="100" data-default-file="{{ $data->logoFile ? route('get-file',['id' => \Illuminate\Support\Facades\Crypt::encrypt($data->logoFile->id)]) : '' }}.jpg" class="dropify" name="product_image" accept="image/*"/>
                            <label id="product_image-error" class="error" for="product_image"></label>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="InActive">InActive</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="">price</label>
                            <input type="number" class="form-control" name="product_price"  value="{{$product_price}}" id="display_order">
                            
                        </div>
                         <div class="form-group">
                            <label for="">Criteria</label>
                            <input type="text" class="form-control" name="price_criteria"  value="{{$price_criteria}}" id="price_criteria">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Number of Pax</label>
                            <input type="number" class="form-control" name="number_of_pax"  value="{{$number_of_pax}}" id="number_of_pax">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Size</label>
                            <input type="text" class="form-control" name="size"  value="{{$size}}" id="size">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Discount</label>
                            <input type="text" class="form-control" name="discount_price"  value="{{$discount_price}}" id="discount_price">
                            
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
        $.fn.sidebarActive('{{ route('admin.products-index') }}')

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
                                                window.location.href = '{{ route('admin.products-index') }}'
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
                    _validator.showErrors({"product_image" : "Image is not valid"});
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
                product_image: {
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
