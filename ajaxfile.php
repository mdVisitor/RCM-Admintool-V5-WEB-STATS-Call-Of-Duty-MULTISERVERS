<?php 
$image = $_POST['image'];

$location = "upload/";

$image_parts = explode(";base64,", $image);

$image_base64 = base64_decode($image_parts[1]);

$tm = date( "Y-m-d_H-i-s");
$filename = "screenshot_".$tm.'__'.uniqid().'.jpg';

$file = $location . $filename;

file_put_contents($file, $image_base64);