<link href="css/main.css" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">

  <!-- Open Sans Font -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700,900' rel='stylesheet' type='text/css'>
<div class="container">
	<div class="row">
	
<?php
//if(isset($_POST["limit"], $_POST["start"]))
/*{*/
 $link = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyAz6Psv-OxGx-81e0udZ089oGHRGQfyzIY&channelId=".$_POST["channelid"]."&part=snippet,id&order=date&maxResults=".$_POST["limit"]."";
	$data_array = json_decode(file_get_contents($link), true);
 //$data_array = json_decode(file_get_contents($url), true);
 //echo"<pre>";print_r($data_array['items']);exit();
 
 foreach($data_array['items'] as $row){
 
    
	echo'<div class="col-sm-12 other_posts widget widget_popular_videos"> 
                    <div class="col-md-3 media-left">
					<a href="'.$row['snippet']['channelId'].'"><img src="'.$row['snippet']['thumbnails']['medium']['url'].'" width="150" alt=""></a></div>
						
                        <div class="col-md-9 media-body">
                            <a href="single-video.html">
                                <h5>'.$row['snippet']['title'].'</h5>
                            </a>
                            <div class="m0 meta_info views">'.$row['snippet']['description'].'</div>
                           <!-- <div class="m0 meta_info posted">1 year ago</div>-->
                        </div>
						</div><hr>';
	 
	 
	 
	 }
	 
	 
 
 /* while($row = mysqli_fetch_array($result))
 {
  echo '
  <h3>'.$row["post_title"].'</h3>
  <p>'.$row["post_description"].'</p>
  <p class="text-muted" align="right">By - '.$row["post_author"].'</p>
  <hr />
  ';
 } */
/*}*/

?>