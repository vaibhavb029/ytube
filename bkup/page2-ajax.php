<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Auto Load More Data on Page Scroll with Jquery & PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body><div class="container">
	<div class="row">
<!-- <div class="container">
   <h2 align="center">Auto Load More Data on Page Scroll with Jquery & PHP</a></h2>
   <br /> -->
   <div id="load_data"></div>
   <div id="load_data_message"></div>
   <br />
   <br />
   <br />
   <br />
   <br />
   <br />
  </div>
 </body>
</html>
<script>

$(document).ready(function(){
 var channelid = '<?php echo $_REQUEST['channelId'];?>';
 //alert(channelid);
//var channelid ='UCGS474QoP8SCnSo6hOCaayA';
 var limit = 7;
 var start = 0;
 var nextoken =0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
		//alert(nextoken);


  $.ajax({
   url:"fetch.php",
   method:"POST",
   datatype:"json",
   data:{limit:limit, start:start, channelid:channelid, nextoken:nextoken},
   cache:false,
   success:function(data)
   {
  //alert("vaibhav");
     //var myArray = JSON.parse(data);
	 //alert(data);
	var nameArr = data.split('###'); 
	//alert(nameArr); 
   // alert(nameArr[1]); 
      nextoken = nameArr[1];
	  
	 //var nextoken_set = nextoken;
    $('#load_data').append(nameArr[0]);
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = "inactive";
	 //var nextoken =nameArr[1];
	// alert(nextoken);
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }

 
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>