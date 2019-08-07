<?php
$access = '2asdasdwq3dxaezw234cz234xczwrvzsr3cvzs3r5czsr';
include("index_chat_cfg.php");
//include_once("functions/chatdb_archive.php"); 
include_once("functions/functions.inc.php"); include_once("langctrl.php");  
include_once("functions/ranks.php");  
include_once("functions/geo.php");  
//var_dump($geo_array);
function hxr($sc)
 {
  $sc = str_replace(array(
    "langctrl.php"
  ), '', $sc);
  return $sc . "";
 }
$cpath = hxr(__FILE__); 

if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']))
{
 
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($lang){
    case "ru":
        //echo "PAGE RU";
        include($cpath."languages/ru_lang.php");
        break;
    //case "it":
        //echo "PAGE IT";
    //    include($cpath."languages/it_lang.php");
    //    break;
    case "en":
        //echo "PAGE EN";
        include($cpath."languages/en_lang.php");
        break;        
    default:
        //echo "PAGE EN - Setting Default";
        include($cpath."languages/en_lang.php");
        break;
}
}
else
{
	include($cpath."languages/en_lang.php");
}