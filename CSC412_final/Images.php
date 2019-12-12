<?php
$image_array = array();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getPhotos($path){
$dir = $path['path'];

if($opendir = opendir($dir)){
    //read directory
    while($file = readdir($opendir)){
        if($file != "."&&$file!=".."){    
        $image_array[]= $dir.$file;
        }
    }
    return $image_array;
}
}


?>