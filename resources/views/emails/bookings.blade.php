<!DOCTYPE html>
<html>
<head>
    <title>DXB Tours & Travel Bookings Details</title>
</head>
<body>
   
    <p>Hi {{$details['customer_name']}}</p>
    <p>Thank for booking with us you booking has been confirmed</p>
 <p>Package: {{$details['service_name']}}<br>
 	Date:	 {{$details['booking_date']}}	<br>
 	No of Adult: {{$details['adultNumber']}}<br>
 	No of pax: {{$details['number_of_pax']}}<br>
 	No of Kids: {{$details['kidsNumber']}}<br>
 	Total amount: {{$details['total_collection']}}<br>
 	Deposit: N/A <br>
 	Remaining: {{$details['total_collection']}}<br>
 	Contact Person:{{$details['customer_name']}}<br>
 	Mobile Number:{{$details['customer_cell']}}<br>
 	Phone: {{$details['customer_phone']}}<br>
 	Location:{{$details['location']}}<br>

 </p>

    <p>For your booking queries. Please contact on below Number</p>
   
    <p>Mobile Number:+971 52 517 0000</p>
    <p>Best Regards</p>
     <p>Dxb Tours & Travel</p>
</body>
</html>