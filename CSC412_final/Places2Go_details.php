<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
   <head>
    <link rel ="stylesheet" type ='text/css' href= "css/site.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel='stylesheet' href='css/Gallery.css'>
  
    <title>Selected Trip</title>
       
          
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="background-color:#efefef">
          

 
        
          <nav class=" navbar-default navbar-inverse">
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
          </nav><br><br>
        <div class="container-gallery" id="background">
        

    <!-- /row -->
    
        </div>
          
        <br>
        <div class="centered">
  <button class="previous round" onclick="show_image('left')">&laquo; Previous </button>
  <button class="next round" onclick="show_image('right')">Next &raquo;    </button>
</div>
	        

 
    <div class="mainBody">
        <div class="container"> 
            
            
				<?php
                                include_once 'Images.php';
                                    $path;
                                    $image_array;
				//var_dump($_SERVER); // to get server params accessible from php
				// var_dump($_GET); // dump form variables or url variables
				if (isset($_GET) && isset($_GET['id'])){
                                 
					$string = file_get_contents("Json/PlacesGallery.json");
					$json_a = json_decode($string, true);

                                        
					//var_dump($json_a); // dump the file you read
					foreach ($json_a as $Location => $Location_item) {
					  	if(isset($Location_item['id']) && $Location_item['id'] == $_GET['id']){
                                                    $path = $Location_item;
                                                    $image_array=getPhotos($path);
						    if (isset($Location_item['description']))
						    {
						      echo "<div class='row'>";
						      echo "<div class='col-sm-4'><div class='centered' id='Title'>Overview</div>".$Location_item['description']."</div>";

						      if (isset($Location_item['key_features']))
						      {
						        echo "<div class='col-sm-4'><div class='centered' id='Title'>Key Features</div>".$Location_item['key_features']."</div>";
						      }
						      if (isset($Location_item['cautionary']))
						      {
						        echo "<div class='col-sm-4'><div class='centered' id='Title'>Cautionary</div>".$Location_item['cautionary']."</div>";
						      }
						      
						      echo "</div>";
						    }
						}
					}
                                        
				}
				else{
					echo "Invalid Id ";
				}
				?>
            
            
        </div></div>

<script>
    var images = [];
 window.onload=function(){
      
      var info = <?php echo json_encode($path['caption']);?>;            
      $('#page-head').text(info);
  }
      
      
var index = 0;      
images = <?php echo json_encode($image_array);?>;
document.getElementById("background").style.backgroundImage = "url('"+images[0]+"')";

function show_image(direction)
{
  if (direction == "left")
  {
    index--;
  }
  else
  {
    index++;
    index %= images.length;
  }
  
  if (index < 0)
  {
    index = images.length - 1;
  }
  
  document.getElementById("background").style.backgroundImage  = "url('"+images[index]+"')";
}
     


</script>

<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>


</script>
</body>
</html>