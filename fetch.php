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
	//header('Content-Type: application/json');
	$nextken = trim($_POST['nextoken']);
	//echo"<pre>";print_r($nextken);exit();
//if(isset($_POST["limit"], $_POST["start"]))
/*{*/
if($nextken == '0' ){
	//echo"<pre>";print_r("vaibhav");
 $link = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyCJSBh5QOBXQmGUQp_5VgFFIjvUMDMYyMw&channelId=".$_POST["channelid"]."&part=snippet,id&order=date&maxResults=".$_POST["limit"]."";
	
}else{
	
	//echo"<pre>";print_r("hi");exit();
$link= "https://www.googleapis.com/youtube/v3/search?key=AIzaSyCJSBh5QOBXQmGUQp_5VgFFIjvUMDMYyMw&channelId=".$_POST["channelid"]."&part=snippet,id&order=date&maxResults=".$_POST["limit"]."&pageToken=".$nextken."";

}
$data_array = json_decode(file_get_contents($link), true);
	$newnextken = $data_array['nextPageToken'];
 //$data_array = json_decode(file_get_contents($url), true);
 //echo"<pre>";print_r($data_array['items']);exit();
 $content_all="";
 foreach($data_array['items'] as $row){
 
    
	$content ='<div class="col-sm-12 other_posts widget widget_popular_videos"> 
                    <div class="col-md-3 media-left">
					<a href="video.php?channelId='.$row['snippet']['channelId'].'&&videoId='.$row['id']['videoId'].'&&title='.$row['snippet']['title'].'"><img src="'.$row['snippet']['thumbnails']['medium']['url'].'" width="150" alt=""></a></div>
						
                        <div class="col-md-9 media-body">
                            <a href="video.php?channelId='.$row['snippet']['channelId'].'&&videoId='.$row['id']['videoId'].'&&title='.$row['snippet']['title'].'">
                                <h5>'.$row['snippet']['title'].'</h5>
                            </a>
                            <div class="m0 meta_info views">'.$row['snippet']['description'].'</div>
                           
                        </div>
						</div><hr>';
						
			$content_all = 	$content_all . 	$content ;	
	   
	  }
	  echo $content_all. '### ' .$newnextken ;
	     // $return_array[0]= $html;
	      //$retun_array[1]= $newnextken;
		//echo"<pre>";print_r($retun_array[0]);exit();
	//$retun_array=array("content" => $content,
                  // "nextokens" => $newnextken);
					//echo"<pre>";print_r($retun_array[]);exit();
	   // echo json_encode($retun_array);
	 
	 
 
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