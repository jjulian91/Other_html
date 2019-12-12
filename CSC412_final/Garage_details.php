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
  
    <title>Gear Details</title>
       
         
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
               <li><a href="Places2Go.php">Recommended Trips</a></li>
               <li class="active"><a href="Garage.php">Garage</a></li>
             </ul>
          </div>
          </div>
        </nav>
    <div class="row">
 <div class="col-lg-12 text-center v-center">
             <h1  contenteditable="false" id="page-head"></h1>
             <br class="">
          </div>
    </div>
    <!-- /row -->
    <br class="">
</div>
 
    <div class="mainBody"><div class="container">    
    <div class="row">
      <div class="twelve columns">
         <!-- <div id="photos"></div> original code that displayed-->
         <div id="selected_photo">

				<?php
                                 $gear;
                                
				//var_dump($_SERVER); // to get server params accessible from php
				// var_dump($_GET); // dump form variables or url variables
				if (isset($_GET) && isset($_GET['id'])){

					$string = file_get_contents("Json/GearGallery.json");
					$json_a = json_decode($string, true);


					//var_dump($json_a); // dump the file you read
					foreach ($json_a as $Location => $Location_item) {
					  	if(isset($Location_item['id']) && $Location_item['id'] == $_GET['id']){
                                                    $gear=$Location_item;
						    if (isset($Location_item['image_url']))
						    {
                                                     echo " <div class='centered' id='Title'><div id='features'>Features:</div></div>";
                                                      echo "<div class='row'>";
						      echo "<div class='picbox col-sm-4'>";
						      echo "<figure>";
						      echo "<img class=\"frame\" src=\"" .$Location_item['my_img']. "\" onclick=\"document.location=this.src\">";
						      echo "</figure></div>";

						      if (isset($Location_item['features']))
						      {
						        echo "<div class='col-sm-8'>" .$Location_item['features']. "</div>";
						      }
						      echo "</div>";
						      
						    }
                                                    if(isset($Location_item['justification'])){
                                                    echo "<div class='centered' id='Title'>Reasoning:</div>";
                                                    echo "<div>".$Location_item['justification']."</div>";
                                                    }
                                                    if(isset($Location_item['honorable'])){
                                                    echo "<div class='centered' id='Title'>Honorable Mentions:</div>";
                                                    echo "<div>".$Location_item['honorable']."</div>";
                                                    }
                                                    
                                                    
						}
					}
				}
				else{
					echo "Invalid Id ";
				}
                                
				?>
             
             

         </div>
      </div>
</div>
</div> </div>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
    
  window.onload=function(){
    var info = <?php echo json_encode($gear['mygear']);?>;            
      $('#page-head').text(info);
    var ID = <?php echo json_encode($gear['id']);?>;
    if(ID == 7){
        $('#features').text("Outerwear Picks:");
    }
  }
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

</body>
</html>