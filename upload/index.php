<?php
////error_reporting(0);
ini_set("display_errors",1);
error_reporting(E_ALL);
$dir = __DIR__ . '/'; 
if($handle = opendir($dir)){
    while(false !== ($file = readdir($handle))) {
        if($file != "." && $file != "..")  {
            if (strpos($file, ".jpg") !== false){
	      // текущее время 
          $time_sec=time(); 
		  $time_file = filemtime($file);
          // тепрь узнаем сколько прошло времени (в секундах) 
          $time=$time_sec-$time_file; 
		  //$fdg = " $file был изменен: " . date ("F d Y H:i:s.", filemtime($file));
		    $fdg = "=> ".$file;
           if($time < 200)
			   echo '<a href="'.$file.'">'.$fdg.'</a></br>';
		   if($time > 1800)
		   unlink($file);
			}
        }
    }   
} else {
    echo 'Ошибка открытия директории';
}