<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
   <head>
       <link rel ="stylesheet"  type=text/css href= "css/site.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel='stylesheet' href='css/Gallery.css'>
  
    <title>Recommended Trips</title>
       
       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container-getting">
          
          <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php">Back Country Capable</a>
            </div>
              <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
               <li><a href="GettingStarted.html">Getting Started</a></li> 
               <li class="active"><a href="Places2Go.php">Recommended Trips</a></li>
               <li><a href="Garage.php">Garage</a></li>
             </ul>
          </div>
          </div>
        </nav>
       
    <div class="row">
 <div class="col-lg-12 text-center v-center">
             <h1 class="" contenteditable="false">Recommended Trips</h1>
             <h1 class="sub">Select a photo to get more information about each trip</small></h1>
             <br class="">
          </div>
    </div>
    <!-- /row -->
    
</div>
 
    <div class="mainBody"><div class="container">    
    <div class="row">
      <div class="twelve columns">
          
         <!-- <div id="photos"></div> original code that displayed-->
         <div id="photos_from_file">
              
             
<?php

//var_dump($_SERVER); // to get server params accessible from php
$string = file_get_contents("Json/PlacesGallery.json");
$json_a = json_decode($string, true);
$i = 3;

//var_dump($json_a);
foreach ($json_a as $Location => $Location_item) {
    if($i%3 == 0)
    {echo "<div class='row'>";}
    if (isset($Location_item['image_url']) && isset($Location_item['id']))
    {
      echo "<div class='thumbnail col-sm-4'>";
      echo "<figure class='container-gallery'>";
      //echo "<img class=\"frame\" src=\"" .$Location_item['image_url']. "\" onclick=\"document.location=this.src\">";
      echo "<img class=\"frame\" src=\"" .$Location_item['image_url']. "\" onclick=\"document.location='http://".$_SERVER['HTTP_HOST'].$_SERVER['CONTEXT_PREFIX']."/Places2Go_details.php?id=".$Location_item['id']."'\">";

      if (isset($Location_item['caption']))
      {
        echo "<figcaption>" .$Location_item['caption'].  "</figcaption>";
        echo "</figure>";
      }
     
      echo "</div>";
    }
    $i+=1;
    if($i%3 == 0)
    {echo "</div>";}
     
}
?>


         </div>
      </div>
</div>
</div> </div>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

</body>
</html>
