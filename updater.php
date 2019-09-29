<?php

function hx($sc)
 {
  $sc = str_replace(array(
    "updater.php"
  ), '', $sc);
  return $sc . "";
 }
 
$cpath = hx(__FILE__); 

function getDirContents($dir, &$results = array()){
    $files = scandir($dir);

    foreach($files as $kei => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
            $results[] = $path;
        } else if($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }
    return $results;
}

$dataArray = (getDirContents($cpath));


//print_r($dataArray);


foreach($dataArray AS $g) {
	if (strpos($g, '.php') !== false){
		
	
	
if (strpos($g, 'screenshots.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
/*
$file_contents = str_replace("include_once(\"functions/geo.php\");",
"include_once(\"functions/geo.php\");
\n define(\"SEARCH\", $search_inf);
\n define(\"Search\", \"Hello world.\");
",$file_contents);
*/
$file_contents = str_replace("[ Search ]","[ '.i_search.' ]",$file_contents);
$file_contents = str_replace("[ Stats ]","[ '.i_stats.' ]",$file_contents);
$file_contents = str_replace("[ Chat ]","[ '.i_chat.' ]",$file_contents);
$file_contents = str_replace("[ Status ]","[ '.i_status.' ]",$file_contents);
$file_contents = str_replace("[s]","[ '.i_server.' ]",$file_contents);
$file_contents = str_replace("[ Ban ]","[ '.i_ban.' ]",$file_contents);
$file_contents = str_replace("[ UnBan ]","[ '.i_unban.' ]",$file_contents);

$file_contents = str_replace('i_search.','$i_search.',$file_contents);
$file_contents = str_replace('i_stats.','$i_stats.',$file_contents);
$file_contents = str_replace('i_chat.','$i_chat.',$file_contents);
$file_contents = str_replace('i_status.','$i_status.',$file_contents);
$file_contents = str_replace('i_server.','$i_server.',$file_contents);
$file_contents = str_replace('i_ban.','$i_ban.',$file_contents);
$file_contents = str_replace('i_unban.','$i_unban.',$file_contents);

file_put_contents($path_to_file,$file_contents);		

}		
		
	



	
if (strpos($g, 'en_lang.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);

$file_contents = str_replace("<?php",
"<?php
\n i_search = 'Search';\n i_stats  = 'Stats';\n i_chat   = 'Chat';\n i_status = 'Status';\n i_server = 'Server';\n i_ban    = 'Ban';\n i_unban  = 'UnBan';
",$file_contents);

$file_contents = str_replace('i_search','$i_search',$file_contents);
$file_contents = str_replace('i_stats','$i_stats',$file_contents);
$file_contents = str_replace('i_chat','$i_chat',$file_contents);
$file_contents = str_replace('i_status','$i_status',$file_contents);
$file_contents = str_replace('i_server','$i_server',$file_contents);
$file_contents = str_replace('i_ban','$i_ban',$file_contents);
$file_contents = str_replace('i_unban','$i_unban',$file_contents);

file_put_contents($path_to_file,$file_contents);		
}	





if (strpos($g, 'ru_lang.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
$file_contents = str_replace("<?php",
"<?php
\n i_search = 'Поиск';\n i_stats  = 'Статистика';\n i_chat   = 'Чат';\n i_status = 'Статус';\n i_server = 'Сервер';\n i_ban    = 'Бан';\n i_unban  = 'РазБан';
",$file_contents);

$file_contents = str_replace('i_search','$i_search',$file_contents);
$file_contents = str_replace('i_stats','$i_stats',$file_contents);
$file_contents = str_replace('i_chat','$i_chat',$file_contents);
$file_contents = str_replace('i_status','$i_status',$file_contents);
$file_contents = str_replace('i_server','$i_server',$file_contents);
$file_contents = str_replace('i_ban','$i_ban',$file_contents);
$file_contents = str_replace('i_unban','$i_unban',$file_contents);

file_put_contents($path_to_file,$file_contents);		
}




	
		
}}


echo "<center><h1> UPDATE FINISHED! Please delete this file! Теперь удалите этот файл! </h1></center>";