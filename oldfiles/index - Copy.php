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

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>.col-md-2.video {
    margin-top: 25px;
}</style>
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

  
  
  <div class="container-fluid">
    <div class="row">

      <div class="main-videos">
        

        <div class="col-md-4">

      </div> <!-- End Main Videos -->

    </div> <!-- End Row -->
  </div> <!-- End Container-Fluid -->

  <hr>

  <div class="container-fluid">
    <div class="row">
      <div class="single-channel">
      <?php $link = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyDz_8HS2wJ92OZf0QqQR3k7VN55PrOuum4&part=snippet&type=channel&q=microsoft&maxResults=50";
	$data_array = json_decode(file_get_contents($link), true);
	//$r_data =$data;
	//echo"<pre>";print_r($data_array['items']);exit();
	
	foreach($data_array['items'] as $rows){?>
	  <div class="col-md-2 video">
            <div class="area">
              <?php 
	
	
	echo'<a href="page2-ajax.php?channelId='.$rows['id']['channelId'].'"><img src="'.$rows['snippet']['thumbnails']['medium']['url'].'" class="img-circle"/></a>';
    echo'<a href="'.$rows['id']['channelId'].'"><h4>'.$rows['snippet']['channelTitle'].'</h4></a>';
	//echo'<p><span>679K subscribers</span></p>';
				
	
	
	?>

             <!--<img src="images/microsoft.jpg" alt="video" class="img-circle">-->
             

            </div> <!-- End Area -->

            
                    
        </div> <!-- End Video -->
	
     <?php } ?>
        

      </div> <!-- End Single Channel -->
    </div> <!-- End Row -->
  </div> <!-- End Container-Fluid -->

  
  
  
  
  
  
  
  
  
  
  
  

  <footer>
   
   </footer> <!-- End Footer -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/menu.js"></script>
</body>

</html>