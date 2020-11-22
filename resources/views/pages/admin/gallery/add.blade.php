@extends('layouts.app', ['title' => "Add Gallery"])
@section('content')
    @php
        if(old('name')){
            $name = old('name');
            $service_id= old('service_id');
            $order=old('order');
        }
        else if(isset($data) && $data){
            $name = $data->name;
            $product_image = $data->ImageUrl;
             $service_id=$data->service_id;
             $order=$data->order;
          
        }
        else{
            $name = null;
            $service_id=null;
           $product_image=null;
           $order=$data->order;
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
                                <label for="">Service</label>
                               <select class="form-control" name="service_id">
                                   @foreach($services_list as $service)
                                   <option value="{{$service->id}}" {{ $service_id == $service->id ? 'selected' : '' }}>{{$service->name}}</option>
                                   @endforeach
                               </select>
                            </div>
                         
                           <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="">order</label>
                                <input type="number" class="form-control" name="order" value="{{$order}}"
                                       id=""
                                       placeholder="">
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <h6 class="m-b-20 text-muted">File browser</h6>
                        <input type="file" data-max-width="2000" data-max-height="2000" data-min-width="100" data-min-height="100" data-default-file="{{asset('storage/app/'.$data->imageUrl)}}" class="dropify" name="product_image" accept="image/*"/>
                            <label id="product_image-error" class="error" for="product_image"></label>
                        </div>
                       <div class="form-group">
                            <label for="">Status</label>
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
             
               
            }
        });

        // @if($status ?? '')
        // $('#status').val('{{$status ?? ''}}').change()
        @endif
    </script>
@endpush
