<?php 
//error_reporting(0);
//ini_set("display_errors",1);
error_reporting(E_ALL);
session_start(); 
date_default_timezone_set('America/New_York');
$key = '';
$startx = microtime(true);
$access = '2asdasdwq3dxaezw234cz234xczwrvzsr3cvzs3r5czsr';
include("index_chat_cfg.php");
//include_once("functions/chatdb_archive.php"); 
include_once("functions/functions.inc.php"); 
include_once("langctrl.php");  
include_once("functions/ranks.php");  
include_once("functions/geo.php"); 


function getDirContents($dir, &$results = array()){
   
if(is_dir($dir)) {
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
}


function hx($sc)
 {
  $sc = str_replace(array(
    "screenshots.php"
  ), '', $sc);
  return $sc . "";
 }
 
 
 function replace_meta($image){
$filecontent=file_get_contents($image);
$metapos=strpos($filecontent, "CoD4X");
$meta = substr($filecontent,$metapos);
$data=explode("\0",$meta);
 $hostname=$data[1];
 $map=$data[2];
 $playername=$data[3];
 $guid=$data[4];
 $shotnum=$data[5];
 $time=$data[6];
 
 
  $string = $hostname;
 
$string = str_replace("^^00", "", $string);
$string = str_replace("^^11", "", $string);
$string = str_replace("^^22", "", $string);
$string = str_replace("^^33", "", $string);
$string = str_replace("^^44", "", $string);
$string = str_replace("^^55", "", $string);
$string = str_replace("^^66", "", $string);
$string = str_replace("^^77", "", $string);
$string = str_replace("^^88", "", $string);
$string = str_replace("^^99", "", $string);
$string = str_replace("^0", "", $string);
$string = str_replace("^1", "", $string);
$string = str_replace("^2", "", $string);
$string = str_replace("^3", "", $string);
$string = str_replace("^4", "", $string);
$string = str_replace("^5", "", $string);
$string = str_replace("^6", "", $string);
$string = str_replace("^7", "", $string);
$string = str_replace("^8", "", $string);
$string = str_replace("^9", "", $string);
 
$hostname= $string;

$hostname = trim($hostname);

if (strpos($hostname, 'Round') !== false)
$hostname = strtok($hostname,'-');

$hostname = trim($hostname);

 $hostname = preg_replace('/[^ a-zа-яё\d]/ui', '_', $hostname);
 $hostname = str_replace(' ', '_', $hostname);

 $playername = preg_replace('/[^ a-zа-яё\d]/ui', '_', $playername);
 $playername = str_replace(' ', '_', $playername);
 //$time = date("H-i-s_d-m-Y", strtotime($time));
  if ($guid) 
    //return 'Guid_'.$guid.'_Name_'.$playername.'_Date_'.$time.'.jpg';
return $hostname;
  return false;  
  } 



 
function check_meta($image){
$filecontent=file_get_contents($image);
$metapos=strpos($filecontent, "CoD4X");
$meta = substr($filecontent,$metapos);
$data=explode("\0",$meta);
 $hostname=$data[1];
 $map=$data[2];
 $playername=$data[3];
 $guid=$data[4];
 $shotnum=$data[5];
 $time=$data[6];
 
 
  $string = $hostname;
 
$string = str_replace("^^00", "", $string);
$string = str_replace("^^11", "", $string);
$string = str_replace("^^22", "", $string);
$string = str_replace("^^33", "", $string);
$string = str_replace("^^44", "", $string);
$string = str_replace("^^55", "", $string);
$string = str_replace("^^66", "", $string);
$string = str_replace("^^77", "", $string);
$string = str_replace("^^88", "", $string);
$string = str_replace("^^99", "", $string);
$string = str_replace("^0", "", $string);
$string = str_replace("^1", "", $string);
$string = str_replace("^2", "", $string);
$string = str_replace("^3", "", $string);
$string = str_replace("^4", "", $string);
$string = str_replace("^5", "", $string);
$string = str_replace("^6", "", $string);
$string = str_replace("^7", "", $string);
$string = str_replace("^8", "", $string);
$string = str_replace("^9", "", $string);
 
$hostname= $string;

$hostname = trim($hostname); 
 
  
 $playername = preg_replace('/[^ a-zа-яё\d]/ui', '_', $playername);
 $playername = str_replace(' ', '_', $playername);
 $time = date("d-m-Y H:i:s", strtotime($time));
  
  if ((!empty($guid))&& (strlen($guid)>15))
    return $guid.' || '.$playername.' || '.$time.' || '.$hostname;
  else{
	 return '0 || 0 || 0 || 0 '; 
      }

  return false;  
  }  
   
 
 
function check_metahost($image){
$filecontent=file_get_contents($image);
$metapos=strpos($filecontent, "CoD4X");
$meta = substr($filecontent,$metapos);
$data=explode("\0",$meta);
 $hostname=$data[1];
 
  if ((!empty($guid))&& (strlen($guid)>15))
    return $hostname;
  else{
	 return ' '; 
      } 
 
  return false;  
  } 
 
 
 
$cpath = hx(__FILE__);  
include("login.php");
if (!empty($_COOKIE['user_online_login'])){		
foreach ($steam_users_id as $passw => $xy){
	$md5session = md5($_COOKIE['user_online_login']);
  if($md5session == md5($passw))
  {
	  $keyxxx=1;
	  $xz = $xy;
  }
  
  }} else $keyxxx = '';
  

if (is_numeric($keyxxx))
	$keyxxx = $keyxxx.'.1';
 
 
    //$keyxxx = 2;	
  /// $xz = 'AAAAAAAAAAAA';
  
  
$all_files = getDirContents($folder_of_screenshots);
 
$dataArray = $all_files; 
  
if(!empty($_REQUEST['page']))    
$currentPage = trim($_REQUEST['page']);
   else
  $currentPage = 0;	   
$perPage = 50;   
$numPages = ceil(count($dataArray) / $perPage);   
if(!$currentPage || $currentPage > $numPages)   
    $currentPage = 0;   
$start = $currentPage * $perPage;   
$end = ($currentPage * $perPage) + $perPage;   
  


$sfgsdg = 0;
 
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<title>Демо: изображения</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://fonts.googleapis.com/css?family=Exo+2:300,300italic,500,600&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">


  <title><?php echo $gallerytitle; ?></title>
		 
	<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_codbox;?>css/recod-rut.css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
 	<link href="<?php echo $ssylka_na_codbox;?>css/lightcase.css" rel="stylesheet" />
   <script src="<?php echo $ssylka_na_codbox;?>js/lightcase.js"></script>	 

 <script type="text/javascript">
	jQuery(document).ready(function($) {
		$('a[data-rel^=lightcase]').lightcase({
shrinkFactor: 0.9,
maxWidth: (window.screen.availWidth)-100,
maxHeight: (window.screen.availHeight)-210
});
	lightcase.resize({ width: 640 });
	});
</script>


 
 

<style>
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(480px, 1fr));
  grid-gap: 3px;
  align-items: stretch;
  }
 
</style>

</head>
<body>
  <header>
   
   
 
  
 <?php 
  echo '<main class="grid">';
  $slctr = 0;
  $slctre = 0;
  $selector = 0;
  
 
 
  
 foreach($dataArray AS $g) { 
 
 
 $eimage = str_replace($folder_web_of_screenshots_minus, "", $g);
 
    
  ++$slctre;
  ++$slctr;
    if($slctr == 1)
	{	
  // echo '<main class="grid">';



if($selector == 0)
{
	
	
$IEURL = explode("\\", $eimage);
$limx = substr_count($eimage, '\\');

$i = 0;
for ($i = 1; $i <= $limx; $i++) {
	
	 //echo '</br>'.$folder_of_screenshots_url.$IEURL[$i].'/'.basename($eimage);
	
    if (@fopen($folder_of_screenshots_url.$IEURL[$i].'/'.basename($eimage),'r'))
	{
     $eimagexm = $folder_of_screenshots_url.$IEURL[$i];
	 $selector = 1;
	}	

}

}

if($selector == 1)
	$eimagex = $eimagexm;
else
	$eimagex = $g;



	
	}	
   

    if($slctre == 4){
		$slctre = 4;
		$slctr = 0;
		}
	else			
echo '


<a href="'.$eimagex.'/'.basename($eimage).'" target="blank" data-rel="lightcase:myCollection" data-lc-caption="'.check_meta($g).'">
<span tooltip="'.replace_meta($g).'">
<img class="gallery-image" src="'.$eimagex.'/'.basename($eimage).'" width="480" height="390"></span></a>


'; 


 
    //if($slctre == 4)
	//{	$slctre = 0;
    //echo '</main>'; 			
	//}

 }
 
 
 
 
   
	 echo '</main>'; 
 

 ?> 
  

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $ssylka_na_codbox;?>css_js/fliplightbox/fliplightbox/fliplightbox.min.js"></script>
<script type="text/javascript">$('body').flipLightBox({ lightbox_flip_speed: 500, lightbox_border_color: '#666666' })</script>

  
</body>
</html>