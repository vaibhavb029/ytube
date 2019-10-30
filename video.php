<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>YouTube</title>

  <!-- Main Styling -->
  <link href="css/main.css" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">

  <!-- Open Sans Font -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700,900' rel='stylesheet' type='text/css'>
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="js/bootstrap.min.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>.col-md-2.video {
    margin-top: 25px;
}.you-list {
    margin-top: 15px;
}
.feature_body{display:block;}

</style>
</head>

<body>

   <!-- End Sidebar-wrapper -->

  <header>
    <div class="container-fluid">
      <div class="row">
        
     
      </div> <!-- End Row -->
    </div> <!-- End Container-Fluid -->
  </header> <!-- End Header -->

  <hr>
  <?php 
	  $chnnelid = $_REQUEST['channelId'];
	  $title= $_REQUEST['title'];
	// echo"<pre>";print_r($title);exit();
	
	  
	  ?>
<div class="container">
            <div class="row title_row">
                <h3>Authors Interview</h3>
            </div>
            <div class="row">
                 <div class="col-sm-7 feature_post">
                    <div class="media feature_post_inner">
                        <div class="media-left feature_img"><iframe width="650" height="415" src="https://www.youtube.com/embed/<?php echo $_REQUEST['videoId'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                        <div class="media-body feature_body">
                           <h4><?php echo $_REQUEST['title'];?></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et</p>
                            <div class="m0 meta_info posted">1 year ago</div>
                            <div class="m0 meta_info posted">by <a href="page-author.html">Masum Rana</a></div> 
                        </div>
                    </div>
                </div> 
                 
				<div class="col-sm-5 other_posts widget widget_popular_videos">
                    <div id="load_data"></div>
   <div id="load_data_message"></div>
   </div>
					
                    
                   <!-- <div class="row you-list">
                    <div class="media">
                        <div class="col-md-4 media-left"><a href="single-video.html"><img src="images/1.jpg" alt=""></a></div>
                        <div class="col-md-8 media-body">
                            <a href="single-video.html">
                                <h5>Nulla auctor lacinia lorem nec ornare donec accumsan venenatis dolor tristique</h5>
                            </a>
                            <div class="m0 meta_info views">34,000 views</div>
                            <div class="m0 meta_info posted">1 year ago</div>
                        </div>
                    </div>
				</div>-->
                
            </div>
        </div>
		
		
		<footer>
   
   </footer> <!-- End Footer -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/menu.js"></script>-->
  <script>
  $(document).ready(function(){
 var channelid = '<?php echo $_REQUEST['channelId'];?>';
 //alert(channelid);
//var channelid ='UCGS474QoP8SCnSo6hOCaayA';
 var limit = 50;
 var start = 0;
 var nextoken =0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
		//alert(nextoken);


  $.ajax({
   url:"fetch_3.php",
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
</body>

</html>