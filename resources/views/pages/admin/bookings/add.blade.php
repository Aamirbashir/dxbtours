@extends('layouts.app', ['title' => "Add Bookings"])
@section('content')
    @php
        if(old('service_name')){
            $service_name = old('service_name');
            $customer_name = old('customer_name');
            $customer_email = old('customer_email');
            $customer_cell= old('customer_cell');
            $customer_phone= old('customer_phone');
            $customer_address= old('customer_address');
            $booking_date = old('booking_date');
            $number_of_pax=old('number_of_pax');
            $total_collection=old('total_collection');
            $total_collected=old('total_collected');
            $total_balance=old('total_balance');
            $message=old('message');
            $agent=old('agent');
        }
        else if(isset($data) && $data){
            $service_name = $data->service_name;
            $customer_name = $data->customer_name;
            $customer_email = $data->customer_email;
            $customer_cell= $data->customer_cell;
            $customer_phone= $data->customer_phone;
            $customer_address= $data->customer_address;
            $booking_date = $data->booking_date;
            $number_of_pax=$data->number_of_pax;
            $total_collection=$data->total_collection;
            $total_collected=$data->total_collected;
            $total_balance=$data->total_balance;
             $message=$data->message;
             $agent=$data->agent;

        }
        else{
            $service_name =null;
            $customer_name =null;
            $customer_email =null;
            $customer_cell=null;
            $customer_phone=null;
            $customer_address=null;
            $booking_date =null;
            $number_of_paxnull;
            $total_collection=null;
            $total_collected=null;
            $total_balance=null;
             $message=null;
             $agent=null;
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
                                <label for="">Service Name</label>
                          <select class="form-control" name="service_name">
                                @foreach($products as $product)
                                <option value="{{$product->name}}">{{$product->name}}</option>
                                @endforeach
                   </select>
                            </div>
                                  
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="">Cusomter Name</label>
                                <input type="text" class="form-control" name="customer_name" value="{{$customer_name}}"
                                       id=""
                                       placeholder="Enter Name">
                            </div>
                              <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="">Cusomter cell</label>
                                <input type="number" class="form-control" name="customer_cell" value="{{$customer_cell}}"
                                       id=""
                                       placeholder="cell">
                            </div>
                             <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="">Cusomter phone</label>
                                <input type="number" class="form-control" name="customer_phone" value="{{$customer_phone}}"
                                       id=""
                                       placeholder="Enter phone">
                            </div>
                              <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="">Cusomter Email</label>
                                <input type="email" class="form-control" name="customer_email" value="{{$customer_email}}"
                                       id=""
                                       placeholder="Enter email">
                            </div>
                             <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <label for="">customer_address</label>
                                <textarea  class="form-control" name="customer_address"
                                           id=""
                                           placeholder="Enter customer_address">{{$customer_address}}</textarea>
                            </div>
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">Message</label>
                                <textarea  class="form-control" name="message"
                                           id=""
                                           placeholder="Enter message">{{$message}}</textarea>
                            </div>
                      
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                  
                        <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">Number of People</label>
                                <input type="nummber" class="form-control" name="number_of_pax" value="{{$number_of_pax}}"
                                       id=""
                                       placeholder="Enter phone">
                            </div>
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">Agent Name</label>
                                 <select name="agent" class="form-control">
                                     <option value="Aamir Bashir" {{ $agent == 'Aamir Bashir' ? 'selected' : '' }}>Aamir Bashir</option>
                                     <option value="Ehtisam Kiani" {{ $agent == 'Ehtisam Kiani' ? 'selected' : '' }}>Ehtisham Kiani</option>
                                 </select>
                            </div>
                             <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">Bookings Date</label>
                                <input type="date" class="form-control" name="booking_date" value="{{$booking_date}}"
                                       id=""
                                       placeholder="Booking Date">
                            </div>
                             <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">total_collection</label>
                                <input type="number" class="form-control" name="total_collection" value="{{$total_collection}}"
                                       id=""
                                       placeholder="total_collection">
                            </div>
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">total_collected</label>
                                <input type="number" class="form-control" name="total_collected" value="{{$total_collected}}"
                                       id=""
                                       placeholder="total_collected">
                            </div>
                            <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <label for="">Bookings Date</label>
                                <input type="number" class="form-control" name="total_balance" value="{{$total_balance}}"
                                       id=""
                                       placeholder="total_balance">
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
                                                window.location.href = '{{ route('admin.bookings-confirmBookings') }}'
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
                service_name: {
                    required: true,
                },
                customer_name: {
                    required: true,
                },
                 customer_cell: {
                    required: true,
                },
                 agent: {
                    required: true,
                },
                total_collection: {
                    required: true,
                },
                message: {
                    required: true,
                },
              
               
              
            }
        });

        
    </script>
@endpush
