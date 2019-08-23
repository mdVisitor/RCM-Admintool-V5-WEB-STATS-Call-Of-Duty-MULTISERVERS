<?php 
////error_reporting(0);
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start(); 
$key = '';
$startx = microtime(true);
$access = '2asdasdwq3dxaezw234cz234xczwrvzsr3cvzs3r5czsr';
include("index_chat_cfg.php");
//include_once("functions/chatdb_archive.php"); 
include_once("functions/functions.inc.php"); include_once("langctrl.php");  
include_once("functions/ranks.php");  
include_once("functions/geo.php");  
//var_dump($geo_array);  
$columns_ipad = 2;   
$starting_page = 1; 
$antireloader = 0;

  if (!empty($_GET['columns'])) 
   $columnssearch = $_GET['columns'];
else
	$columnssearch = 3;


if($columnssearch == 3)
$pics_per_page = 33;
else if($columnssearch == 2)
$pics_per_page = 32;
else if($columnssearch == 1)
$pics_per_page = 30;

$columns_desktop = $columnssearch;


if (empty($cache_time))
	$cache_time = 20;

    $cc = round($cache_time, 0);       
    $xcache_time = $cc;
 
  if (!empty($_GET['searchh'])) 
  {
 
 $xsearch = $_GET['searchh'];
    $xsearch = trim($xsearch);
  }else
	$xsearch = '0';
 	
if (!empty($xsearch))
{
  if(((23>(strlen($xsearch))) && (18<(strlen($xsearch)))) && (ctype_digit($xsearch)))
  {
	   if (!empty($xsearch))
	   $search_nickname = '';
	   $guidsearch = $xsearch;
  }
  else
  {
       $guidsearch = '';
	   $search_nickname = $xsearch;			  
  }
}		
	
	if(!empty($guidsearch))
 $guidsearch = trim($guidsearch);
   if(!empty($search_nickname))
 $search_nickname = trim($search_nickname);	
	 
if(empty($key))
{
  $file = "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  $filemd5 = md5($file); 
  $cache_file = $cache_folder."$filemd5.html";
  if (file_exists($cache_file)) {
   if ((time() - $cc) < filemtime($cache_file)) {
      echo file_get_contents($cache_file); 
	  echo "<!-- --------- Cached with $xcache_time seconds --------- -->";
      exit; 
    }
	}
  ob_start();
  }
 
$layout = 'mainpos';  
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
  
function hx($sc)
 {
  $sc = str_replace(array(
    "screenshots.php"
  ), '', $sc);
  return $sc . "";
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
 
 
 
if(!file_exists($cpath . 'databases/screenshots.rcm')){
try
  {
    $screens = new PDO('sqlite:'. $cpath . 'databases/screenshots.rcm');
    $screens->exec("CREATE TABLE screens (
			id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,			
			guid bigint(24) NOT NULL,	
			player varchar(70) NOT NULL,
			image TEXT NOT NULL,
			reason tinyint(2) NOT NULL,
			size bigint(22) NOT NULL,
            time timestamp NOT NULL,
			dater timestamp NOT NULL,
			server varchar(32) NOT NULL,
			nameserver varchar(80) NOT NULL)"); 
    $screens = NULL;
  }
  catch(PDOException $e)
  {
    errorspdo('FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  } 
}  
  
if(!file_exists($cpath . 'databases/screenshots_banned.rcm')){
try
  {
    $screens_banned = new PDO('sqlite:'. $cpath . 'databases/screenshots_banned.rcm');
    $screens_banned->exec("CREATE TABLE screens (
			id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,			
			guid bigint(24) NOT NULL,	
			player varchar(70) NOT NULL,
			image TEXT NOT NULL,
			reason tinyint(2) NOT NULL,
			size bigint(22) NOT NULL,
            time timestamp NOT NULL,
			dater timestamp NOT NULL,
			server varchar(32) NOT NULL,
			nameserver varchar(80) NOT NULL)"); 
    $screens_banned = NULL;
  }
  catch(PDOException $e)
  {
    errorspdo('FILE:  ' . __FILE__ . '  Exception : ' . $e->getMessage());
  } 
}
 
 
 
 
 
 if(!empty($keyxxx))
 { 
  if (!empty($_GET['chhguid'])) 
   $chhguid = $_GET['chhguid'];
else
	$chhguid = '0';	 
	
 if(file_exists($cpath . 'databases/screenshots_banned.rcm')){
try {
       $screens_banned = new PDO('sqlite:'. $cpath . 'databases/screenshots_banned.rcm');	
	   $screens = new PDO('sqlite:'. $cpath . 'databases/screenshots.rcm');
       $screens_banned->query("UPDATE screens SET reason='0' WHERE guid = $chhguid");	
	   $screens->query("UPDATE screens SET reason='0' WHERE guid = $chhguid");	
	
    }
    catch (Exception $e) {
        die('Errors : ' . $e->getMessage());
    }
   }
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
  
  if ( isset( $_GET[ 'page' ] ) ) :
    $starting_page = max(1, intval( $_GET['page'] ) );
  endif;

  $sort_order = 1;



  if (!empty($_GET['nicknmesearch'])) 
   $nicknmesearch = $_GET['nicknmesearch'];
else
	$nicknmesearch = '0';
  
   $nicknmesearch = trim($nicknmesearch);	
  
  if (!empty($_GET['eserver'])) 
   $serversearch = $_GET['eserver'];
else
	$serversearch = '0';  


 if (!empty($_GET['banssearch'])) 
   $banssearch = $_GET['banssearch'];
else
    $banssearch = '0';  

 
  
 if(((!empty($keyxxx)) && (empty($_GET['logout']))) || ((!empty($_COOKIE['user_online_login'])) && (empty($_GET['logout'])))){ 
	$adminpl = '|<a href="'.$ssylka_na_codbox.'adminpanel.php?adminpanel='.$xz.'" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 18px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">АдминПанель</a>
	<a href="'.$ssylka_na_codbox.'?logout=logout&lg#Logout!" onclick="location.reload()" style="color:#000;text-shadow:0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #ffa500, 0 0 7px #ffa500, 0 0 18px #ffa500, 0 0 40px #ffa500, 0 0 65px #ffa500;" >Logout!</a>';

	 

$alarmaaax = 0;
/*
try
{	  	  
    $dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    
    $bdd = new PDO($dsn, $db_user, $db_pass);			  	  
   
	
$re=$bdd ->query("SELECT s_pg,n_heads FROM db_stats_2 where n_heads >= 15 limit 1");
while ($row = $re->fetch())	
{	
                   $csi_pg  = $row['s_pg'];
                  $n_heads  = $row['n_heads'];
				  $alarmaaax = 1;
}	
}
catch(Exception $e)
{
    
    die('Errors : '.$e->getMessage());
}	
	
 */  
	
	}else 
	$adminpl = '|<a href="'.$ssylka_na_codbox.'adminpanel.php" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 18px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">Логин</a>';


if (((!empty($_GET['logout'])) && (!empty($_SESSION['username']))) || ((!empty($_GET['logout'])) && (!empty($_COOKIE['user_online_login']))))
{	
echo 'Админ - '.$keyxxx.' вышел :)';
setcookie ( 'user_online_login', '', time()-2 );
session_destroy();
echo "<meta http-equiv='refresh' content='0'>";
} 

if(!empty($_COOKIE['user_online_login']))
	$keyxxx = $_COOKIE['user_online_login'];
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $gallerytitle; ?></title>
 		 
		<title><?php echo $title_zagolovok_stranicy ?></title>
		 
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_codbox;?>css/recod-rut.css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
 	<link href="<?php echo $ssylka_na_codbox;?>css/lightcase.css" rel="stylesheet" />
   <script src="<?php echo $ssylka_na_codbox;?>js/lightcase.js"></script>	 

<style>
/*МОДАЛЬНОЕ ОКНО*/
#bg_popup{
position: fixed;
width: 250px;
height:90px;
background: rgba(0, 0, 0, 0.4);
top: 80%;
right: 0;
bottom: 0;
left: 60%;}
    
.close{
display:block;
position:absolute;
top:1px;
right:5px;
width:20px;
height:20px;
color:#555;
background:#1BA600;
cursor:pointer;}

.flashing {
    animation-name: flash;
    animation-duration: 2s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
	border: solid 1px #111;
	opacity: 0.5;	
}
@keyframes flash {
    0% { background: #000 url(img/search-icon.png) no-repeat 9px center; }
	10% { background: #222 url(img/search-icon.png) no-repeat 9px center; }
    20% { background: #444 url(img/search-icon.png) no-repeat 9px center; }
	30% { background: #555 url(img/search-icon.png) no-repeat 9px center; }
    40% { background: #666 url(img/search-icon.png) no-repeat 9px center; }
	50% { background: #888 url(img/search-icon.png) no-repeat 9px center; }
    60% { background: #666 url(img/search-icon.png) no-repeat 9px center; }
	70% { background: #555 url(img/search-icon.png) no-repeat 9px center; }
    80% { background: #444 url(img/search-icon.png) no-repeat 9px center; }
	90% { background: #222 url(img/search-icon.png) no-repeat 9px center; }
    100% { background: #000 url(img/search-icon.png) no-repeat 9px center; }
}
.button2 {
	background: #333 url(img/camera.png) no-repeat -1px center;
	padding: 0px 0px 0px 0px;
	width: 48px;
	height: 48px;
	border: solid 1px #000;
	-webkit-border-radius: 1em;
	-moz-border-radius: 1em;
	border-radius: 1em;
	-webkit-transition: all .5s;
	-moz-transition: all .5s;
	transition: all .5s;	
}



</style>

<?php 

if (!empty($_GET['theme']))
$_SESSION['theme'] = $_GET['theme'];


if (!empty($_SESSION['theme'])){
	$_GET['theme'] = $_SESSION['theme'];
}
else
	$_GET['theme'] = 'dark';



if (($_GET['theme']) == 'dark') {?>
<style>
body{
  transition:0;
  background-color:#141e21; /* #002600 */
  color:#2eb4e9;
  margin: 0;
}

canvas {
  display: block;
  cursor: crosshair;
  position:static;
}

table{
 position:relative;	
}


.topbuttondark {
width:50px;
border:2px solid #ccc;
background:#f7f7f7;
text-align:center;
padding:10px;
position:fixed;
bottom:50px;
right:50px;
cursor:pointer;
color:#333;
font-family:verdana;
font-size:12px;
border-radius: 50px;
-moz-border-radius: 50px;
-webkit-border-radius: 50px;
-khtml-border-radius: 50px;
}
</style>
<?php }
else if (($_GET['theme'] == 'light')) {
?>
<style>
body{
  transition:0;
  background-color:#ddd; /* #002600 */
  color:#000;
  margin: 0;
}
 
table{
 position:relative;		
}

.topbutton {
width:50px;
border:2px solid #ccc;
background:#333;
text-align:center;
padding:10px;
position:fixed;
bottom:50px;
right:50px;
cursor:pointer;
color:#fff;
font-family:verdana;
font-size:12px;
border-radius: 50px;
-moz-border-radius: 50px;
-webkit-border-radius: 50px;
-khtml-border-radius: 50px;
}
</style>
<?php }?>

	
  <style type="text/css">
  body {
    margin: 0;
    background-color: #131212;
    text-align: center;
    font-family: 'Helvetica', sans-serif;
  }

  body * {
    color: #888;
  }
 
<?php
if($columns_desktop == 3){
?>
  .gallery-image{
	width: 100%;
	opacity: 0.5; /* Firefox, Chrome, Safari, Opera, IE >= 9 (preview) */
     height: 350px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;   
	} 
  .gallery-im{
	width: 100%;
	/* opacity: 1;  Firefox, Chrome, Safari, Opera, IE >= 9 (preview) */
     height: 350px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;   
	} 	
	
  .ff{
    border-width:1;
	height:45px;
	position:relative;
	width: 100%;
	color:#fff;
	margin-top:-60px;
	background-color: black;
	opacity:0.5;
    border-color: black;
    border-style: solid;
	font-size: 14px;
    }
	
   .ff_banned{
    border-width:1;
	height:45px;
	position:relative;
	width: 100%;
	color:#fff;
	margin-top:-60px;
	background-color: red;
	opacity:0.5;
    border-color: red;
    border-style: solid;
	font-size: 14px;
    }	
<?php
}
else if($columns_desktop == 2){
?>
  .gallery-image{
	width: 100%;
	opacity: 0.5; /* Firefox, Chrome, Safari, Opera, IE >= 9 (preview) */
     height: 450px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;   
	} 
  .gallery-im{
	width: 100%;
	/* opacity: 1;  Firefox, Chrome, Safari, Opera, IE >= 9 (preview) */
     height: 450px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;   
	} 
  .ff{
    border-width:1;
	height:58px;
	position:relative;
	width: 100%;
	color:#fff;
	margin-top:-70px;
	background-color: black;
	opacity:0.5;
    border-color: black;
    border-style: solid;
	font-size: 18px;
    }
	
   .ff_banned{
    border-width:1;
	height:58px;
	position:relative;
	width: 100%;
	color:#fff;
	margin-top:-70px;
	background-color: red;
	opacity:0.5;
    border-color: red;
    border-style: solid;
	font-size: 18px;
    }
	
<?php
}
else if($columns_desktop == 1){
?>
  .ff{
    border-width:1;
	height:85px;
	position:relative;
	width: 100%;
	color:#fff;
	margin-top:-80px;
	background-color: black;
	opacity:0.5;
    border-color: black;
    border-style: solid;
	font-size: 28px;
    }
	
   .ff_banned{
    border-width:1;
	height:85px;
	position:relative;
	width: 100%;
	color:#fff;
	margin-top:-80px;
	background-color: red;
	opacity:0.5;
    border-color: red;
    border-style: solid;
	font-size: 28px;
    }
  .gallery-image{
	width: 100%;
	opacity: 0.5; /* Firefox, Chrome, Safari, Opera, IE >= 9 (preview) */
     height: 650px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;   
	} 
  .gallery-im{
	width: 100%;
	/* opacity: 1;  Firefox, Chrome, Safari, Opera, IE >= 9 (preview) */
     height: 650px;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;   
	} 	
<?php
}
?>	
	
	
  .gallery-cl{
    background: url(banned-stamp.png);
background-position: 50% 45px;
background-repeat: no-repeat;
position: relative;
    } 	
	
	
  
  <?php if ( 'full' === $layout ) : ?>
  body img {
    width: 100%;
    height: auto;
  }
  <?php endif; ?>

  <?php if ( 'mainpos' === $layout ) : ?>
  body {
    margin: 5px;
  }

  .mainpos {
    column-count: <?php echo $columns_desktop; ?>;
    column-gap: 5px;
  }

  .mainpos img {
    background-color: #eee;
    display: inline-block;
    width: 100%;	
  }

  @media(max-width: 1024px) {
    .mainpos {
      column-count: <?php echo $columns_ipad; ?>;
    }
  }

  @media(max-width: 500px) {
    .mainpos {
      column-count: 1;
    }
  }
  <?php endif; ?>

  .nav svg {
    position: relative;
    top: 2px;
  }

  .nav a:hover {
    opacity: .5;
  }

  header p,
  footer p {
    font-size: 14px;
  }
  
  
a {
   text-decoration: none; /* Убираем подчёркивание */
   color: #ffa000; /* Цвет ссылок */
   /*text-shadow: 1px 1px 2px black, 0 0 16px #1919ff;  Параметры тени */
   text-shadow:0 0 15px rgba(46,180,233,0.69)
}   
/* mouse over link */
a:hover {
  color: green;
  text-decoration: none; /* Убираем подчёркивание */
}

/* selected link */
a:active {
  color: white;
  text-decoration: none; /* Убираем подчёркивание */
}  
  </style>
  
 

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
 
</head>
<body>


<div class="menuooo-center2">
 <div class="menuooo2">
<div id="menu">
        <ul>		
<?php		
		echo '<li>'.$adminpl.'</li>';		 
foreach ($ssylki_array as $arxx => $namessylka) {	
   echo '<li>| <a href="'.$arxx.'" style="color:#000;text-shadow: 0 0 2px #fff, 0 0 5px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;" target="_blank">'.$namessylka.'</a></li>';   
 } 
echo '<li>| <a href="'.$ssylka_na_codbox.'screenshots.php?banssearch=1" style="color:#000;text-shadow: 0 0 2px #fff, 0 0 5px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px red, 0 0 18px red, 0 0 40px red, 0 0 65px red;" target="_blank">Blacklist</a></li>'; 
 
 echo '</br>';	

 $df = 0; 
 $dfx = 0;
foreach ($screenshots_urls as $arx => $xservername) {
++$df;	
if($df > 10){echo '</br>'; $df = 0; ++$dfx;}
   echo '<li>| <a href="'.$arx.'&kills=sort">'.$xservername.'</a></li>';   
}
?>
        </ul>
	 
    </div>
</div></div> 



<?php

if($dfx == 1)
echo '</br></br>';
else if($dfx == 2)
	echo '</br></br></br>';
else if($dfx == 3)
	echo '</br></br></br></br>';
?>


</br></br>

<div class="absolute-style"> 
<?php
echo '<a href="'.$ssylka_na_codbox.'screenshots.php?main=0" style="padding-bottom: 40px;"> '. $main_servername . '</a>';



 if((!empty($keyxxx)) || (!empty($_COOKIE['user_online_login']))){	 
	 	 
       $dawDe = "<span tooltip=\"".$take_screen."\"><a href=\"".$ssylka_na_codbox."upload/index.php\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:".$cvet_text.";\"> <img src=\"".$ssylka_na_codbox."img/s_icon.png\" height=\"48px\" width=\"48px\"> </a></span>";	
?>
 
    <script type="text/javascript">
    function screenshot(){
        html2canvas(document.getElementById('container')).then(function(canvas) {
         //document.body.appendChild(canvas);
         // Get base64URL
		 
         var base64URL = canvas.toDataURL('image/jpeg', 0.9).replace('image/jpeg', 'image/octet-stream');
         // AJAX request
         $.ajax({
            url: 'ajaxfile.php',
            type: 'post',
            data: {image: base64URL},
            success: function(data){
               console.log('Upload successfully');
            }
         });
       });
     }
     </script>	 

<?php
 }
?>
   
	<span tooltip="Гуид, жмём Enter!" onClick="clearInterval(t)"> <a href="javascript:void(0);" onclick="viewdiv('mydiv');">
   <form id="demo-b">
 <input class="button flashing" type="search" name="searchh">
  </form> </a></span>
   
<?php 


if(empty($serversearch))
{

echo '&emsp;&emsp; &#128270;x<a href="'.$ssylka_na_codbox.'screenshots.php?columns=1" style="font-family: Ariel, fantasy; font-size: 20px; color:white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><b>1</b></a>'; 
               echo ' &emsp; &#128270;x<a href="'.$ssylka_na_codbox.'screenshots.php?columns=2" style="font-family: Ariel, fantasy; font-size: 20px; color:white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><b>2</b></a>'; 
               echo ' &emsp; &#128270;x<a href="'.$ssylka_na_codbox.'screenshots.php?columns=3" style="font-family: Ariel, fantasy; font-size: 20px; color:white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><b>3</b></a>'; 
}
else
{
echo '&emsp;&emsp; &#128270;x<a href="'.$ssylka_na_codbox.'screenshots.php?columns=1&eserver='.$serversearch.'" style="font-family: Ariel, fantasy; font-size: 20px; color:white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><b>1</b></a>'; 
               echo ' &emsp; &#128270;x<a href="'.$ssylka_na_codbox.'screenshots.php?columns=2&eserver='.$serversearch.'" style="font-family: Ariel, fantasy; font-size: 20px; color:white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><b>2</b></a>'; 
               echo ' &emsp; &#128270;x<a href="'.$ssylka_na_codbox.'screenshots.php?columns=3&eserver='.$serversearch.'" style="font-family: Ariel, fantasy; font-size: 20px; color:white; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><b>3</b></a>'; 	
}

			   
			   ?>

   
</div>	

</br></br></br></br></br>

<?php
if ( 'full' === $layout ) : ?>
  <header>
    <p>Scroll down to see the images.</p>
  </header>
<?php endif; ?>

<?php if ( 'mainpos' === $layout ) : ?>
  <div class="mainpos">
<?php endif;
//$all_files = (getDirContents($cpath));
 $all_files = (getDirContents($folder_of_screenshots));
 
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



if(file_exists($cpath . 'databases/screenshots.rcm')){
try
  {
    $screens = new PDO('sqlite:'. $cpath . 'databases/screenshots.rcm');
	$screens_banned = new PDO('sqlite:'. $cpath . 'databases/screenshots_banned.rcm');

if(!file_exists($cpath . 'screenshots/thumbs/'))
mkdir($cpath . 'screenshots/thumbs/'); 

if(!file_exists($cpath . 'screenshots/thumbs/'))
mkdir($cpath . 'screenshots/banned/');

 
$schetchik = 0;




foreach($dataArray AS $g) {
	
	if (strpos($g, '.jpg') !== false){
	
if(!file_exists($cpath . 'screenshots/thumbs/'.md5($g))){

if($schetchik<101){
	$xg = $cpath . 'screenshots/thumbs/'.md5($g);
    $text = "-";
    $fp = fopen($xg, "w");
    fwrite($fp, $text);	
		
$flserver = 0;
$fld = 0;
$nmm = 0;
$resizex = 0;	
$reponse = 0;
$guidxx = 0;
$sizeof = 0;
$md5_image = 0;
$esserver = 0; 
$mdserver = 0;
$zx = 0;
$srvx = 0;	
$ddt = 0;	
$eguid = 0;
$eplayer = 0;
$eimage = 0;
$ereason = 0;
$esize = 0;
$esserver = 0;	
$DD = 0;


 $pathhh = $g;
$filenameedit = check_meta($g);
 $g = str_replace($cpath, "", $g);

 $sizeof = (filesize($g));
	
    $filenameedit = str_replace($cpath, "", $filenameedit);
	$filenameedit = basename( $filenameedit, '.jpg' );
	   $zx = explode(" || ", $filenameedit);
	   $fld = $zx[0];
	   $nmm = $zx[1];
	   $ddt = $zx[2];
	   $srvx = trim($zx[3]);
	   $server = trim($zx[3]);
	   $guidxx = trim($fld);
	   $player = trim($nmm);
       $ddater = strtotime($ddt);

if(!empty($g)){
if(file_exists($cpath . 'databases/screenshots.rcm')){	
$resizex = $screens->query("SELECT COUNT(*) AS id FROM screens where image = '".$g."'"); 
$total_mess = $resizex->fetch();
$nn=$total_mess['id'];
}
else
{
	
$resizex = 0; 
$total_mess = 0;
$nn=0;	
}

}
else
{
	
$resizex = 0; 
$total_mess = 0;
$nn=0;	
}

if(empty($nn)){	
$mdserver = md5($srvx);

foreach($screenshots_anticheat_folders_name AS $ek) {
if (strpos($g, $ek) !== false){
$mdserver = md5($ek);
//$foldertofolder =  $cpath . 'screenshots/'.$ek;
$sfgsdg = 1;	
}}

			
$sql = "INSERT INTO screens (guid,player,image,reason,size,time,dater,server,nameserver) VALUES ('".$guidxx."','".$player."','".$g."','0','".$sizeof."','".$ddt."','".$ddater."','".$mdserver."','".$server."')";	

//if(empty($sfgsdg))
$screens->exec($sql);
//else
//$screens_banned->exec($sql);	

$schetchik++; 
}
	}
}
}

} 
                      $player = 'unknown';
	                  $eguid = 0;
                      $eplayer = 0;
					  $eimage = 0;
                      $ereason = 0;
					  $esize = 0;
					  $etime = 0;
					  $srvxx = 0;
					  $esserver = 0;

if (isset($_GET['page'])){$page = $_GET['page']; }else {$page = 1; }
$premierMessageAafficher = ($page - 1) * $pics_per_page;
 

if(!empty($serversearch)){
$rooo = $screens->query("SELECT COUNT(*) AS id FROM screens where server='".$serversearch."'"); 
$total_mess = $rooo->fetch();
$rooo=$total_mess['id'];	
$nb_pages = ceil($rooo / $pics_per_page); 
}
else if(!empty($guidsearch)){
$rooo = $screens->query("SELECT COUNT(*) AS id FROM screens where guid='".$guidsearch."'"); 
$total_mess = $rooo->fetch();
$rooo=$total_mess['id'];	
$nb_pages = ceil($rooo / $pics_per_page); 
}
else if(!empty($search_nickname)){
				$keyword=$search_nickname;
				$sqlup = "SELECT COUNT(*) AS id FROM screens where player LIKE :keyword"; 
				$reponse=$screens->prepare($sqlup);
				$reponse->bindValue(':keyword','%'.$keyword.'%');
				$reponse->execute();
                $total_mess = $reponse->fetch();
$rooo=$total_mess['id'];	
$nb_pages = ceil($rooo / $pics_per_page); 
}
else if(!empty($banssearch)){
$rooo = $screens_banned->query("SELECT COUNT(*) AS id FROM screens where reason=1"); 
$total_mess = $rooo->fetch();
$rooo=$total_mess['id'];	
$nb_pages = ceil($rooo / $pics_per_page); 
}
else
{
$rooo = $screens->query("SELECT COUNT(*) AS id FROM screens"); 
$total_mess = $rooo->fetch();
$rooo=$total_mess['id'];	
$nb_pages = ceil($rooo / $pics_per_page); 
}	


           if(!empty($guidsearch))
			{
				$resizex = $screens->query("SELECT COUNT(*) AS id FROM screens where guid='".$guidsearch."'"); 
                $total_mess = $resizex->fetch();
                $rx=$total_mess['id'];	
				$sqlup  = "SELECT * FROM screens WHERE guid='$guidsearch' GROUP BY image, guid ORDER BY dater desc LIMIT ".$premierMessageAafficher.", ".$pics_per_page; 
			} 
			else if(!empty($search_nickname)){
				$keyword=$search_nickname;
				
				$sqlup = "SELECT COUNT(*) AS id FROM screens where player LIKE :keyword"; 
				$reponse=$screens->prepare($sqlup);
				$reponse->bindValue(':keyword','%'.$keyword.'%');
				$reponse->execute();
                $total_mess = $reponse->fetch();
                $rx=$total_mess['id'];
				
				$resizex  = "SELECT * FROM screens where player LIKE :keyword LIMIT ".$premierMessageAafficher.", ".$pics_per_page; 
			
				$sqlup=$screens->prepare($resizex);
				$sqlup->bindValue(':keyword','%'.$keyword.'%');
				$sqlup->execute();
			} 
			else if(!empty($serversearch))
			{
				$resizex = $screens->query("SELECT COUNT(*) AS id FROM screens where server='".$serversearch."'"); 
                $total_mess = $resizex->fetch();
                $rx=$total_mess['id'];	
				$sqlup  = "SELECT * FROM screens WHERE server='$serversearch' GROUP BY image, guid ORDER BY dater desc LIMIT ".$premierMessageAafficher.", ".$pics_per_page; 
			}
			else if(!empty($banssearch))
			{
				$resizex = $screens_banned->query("SELECT COUNT(*) AS id FROM screens where reason=1"); 
                $total_mess = $resizex->fetch();
                $rx=$total_mess['id'];	
				$sqlup  = "SELECT * FROM screens WHERE reason=1 GROUP BY image, guid ORDER BY dater desc LIMIT ".$premierMessageAafficher.", ".$pics_per_page; 
			}else{ 
				$resizex = $screens->query("SELECT COUNT(*) AS id FROM screens"); 
                $total_mess = $resizex->fetch();
                $rx=$total_mess['id'];	
				$sqlup  = "SELECT * FROM screens WHERE dater GROUP BY image, guid ORDER BY dater desc LIMIT ".$premierMessageAafficher.", ".$pics_per_page; 
			}	
			
			   if(!empty($banssearch))
				     $result = $screens_banned->query($sqlup);
               else if(!empty($search_nickname))
				     $result = $sqlup;
			   else
                      $result = $screens->query($sqlup);
$alarmaaa = 0;	  
if(empty($antireloader)){	 
	                 foreach($result as $row){	
	                  $eguid = $row['guid'];
                      $eplayer = $row['player'];
					  $eimage = $row['image'];
                      $ereason = $row['reason'];
					  $esize = $row['size'];
					  $etime = $row['time'];
					  $srvxx = $row['nameserver'];
					  $esserver = $row['server'];
					  $baneimage = $eimage;	


 if ((strpos($_SERVER["REQUEST_URI"], 'screenshots.php?eserver=0') !== false)&&(!empty($server))){				  
foreach($screenshots_anticheat_folders_name AS $ek) {
$ek = md5($ek);	
if (strpos($esserver, $ek) !== false){
if(empty($alarmaaa)){	
if(empty($ereason)){
$alarmaaa = 1;	
$eeplayer = $eplayer;
}}

}}}
					  
					  
					  
		
	$xpuk = 0;	
if((!empty($banssearch)) && (strpos($eimage, "screenshots/banned") === false))
    $xpuk = 1;

if(empty($antireloader)){		
	$infooo = $eguid.' || '.$eplayer.' || '.$etime;				  
					  
$xplayerip = 0;	
$reponse = $ereason;	

$eimage = str_replace($folder_web_of_screenshots_minus, "", $eimage);

if((!empty($banssearch)) && (strpos($eimage, "screenshots/banned") !== false))
{
$folder_of_screenshots_url='';
$eimage='';
$folder_of_screenshots_url = $baneimage;
}

 		  
if($reponse > 0){	
echo '<div class="gallery-cl">'; 		
echo '<a href="'.$folder_of_screenshots_url.$eimage.'" target="blank" data-rel="lightcase:myCollection" data-lc-caption="'.$infooo.'"><span tooltip="'.clearnamex($srvxx).'">
<img class="gallery-image" src="'.$folder_of_screenshots_url.$eimage.'" height="70%" width="70%"></span></a></div>'; 	
}
if(empty($reponse)){	
   echo '<a href="'.$folder_of_screenshots_url.$eimage.'" target="blank" data-rel="lightcase:myCollection" data-lc-caption="'.$infooo.'"><span tooltip="'.clearnamex($srvxx).'">
<img class="gallery-im" src="'.$folder_of_screenshots_url.$eimage.'" height="70%" width="70%"></span></a>'; 	
}		  
		  		  
if($reponse > 0)
  echo  '<div class="ff_banned">';
if(empty($reponse))
	echo  '<div class="ff">';

	
	echo $infooo;
 		
	echo '<div style="left: 9px; position: relative; color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">';
	
	if(!empty($keyxxx)){
	echo  '<a href="'.$ssylka_na_codbox.'status.php?guid='.$eguid.'" target="_blank"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">[ Status ]</b></a>&emsp;';
	echo  '<a href="'.$ssylka_na_codbox.'mamba.php?guid='.$eguid.'" target="_blank"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">[ M ]</b></a>&emsp;';
	
	
	if(empty($reponse))
	  echo  '<a href="'.$ssylka_na_codbox.'redirect.php?chnick='.$eplayer.'&chip='.$xplayerip.'&chguid='.$eguid.'&xurl='.urlencode($folder_of_screenshots_url.$eimage).'&sservv='.urlencode($srvxx).'" style="font-size:16px;" target="_blank"> 
	  <b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px red, 0 0 65px red;">[ Ban ]</b></a>&emsp;';
	else
	  echo  '<a href="'.$ssylka_na_codbox.'screenshots.php?chhguid='.$eguid.'" style="font-size:16px;" target="_blank"> 
	  <b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px red, 0 0 65px red;">[ UnBan ]</b></a>&emsp;';

	echo  '<a href="'.$ssylka_na_codbox.'stats.php?search='.$eguid.'" target="_blank"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">[ Stats ]</b></a>&emsp;';
	echo  '<a href="'.$ssylka_na_codbox.'chat.php?search='.$eguid.'" target="_blank"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">[ Chat ]</b></a>&emsp;';
	echo  '<a href="'.$ssylka_na_codbox.'screenshots.php?searchh='.$eguid.'" target="_blank"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">[ Search ]</b></a>';
	echo  '<a href="'.$ssylka_na_codbox.'screenshots.php?eserver='.$esserver.'" target="_blank"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">[s]</b></a>';	
	}
	else
	{
	echo  '<a href="'.$ssylka_na_codbox.'screenshots.php?eserver='.$esserver.'" target="_blank"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">[s]</b></a>';	
      echo  '<a href="'.$ssylka_na_codbox.'screenshots.php?searchh='.$eguid.'" target="_blank"><b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">[ Search ]</b></a>';
	  //echo  '<a href="'.$ssylka_na_codbox.'redirect.php?chnick='.$eplayer.'&chip='.$xplayerip.'&chguid='.$eguid.'&xurl='.urlencode($folder_of_screenshots_url.$eimage).'&sservv='.urlencode($srvxx).'" style="font-size:16px;" target="_blank"> <b style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px red, 0 0 65px red;">[ Ban ]</b></a>&emsp;';
		
	}
	
	echo  '</div>';	  
	echo  '<hr style="height:5px;border:none;color:white;background-color:white;width:100%;" />';
	echo  '</div>'; 
	
	
}
					 }
					  }
					  
					  
$antireloader = 1;

					  
					  

    $screens_banned = NULL;
	$screens = NULL;
  }
  catch(PDOException $e)
  {
    echo 'ERROR';
  } 
}  
  



if ( 'mainpos' === $layout ) : ?>
  </div> </div><!-- .mainpos -->
<?php endif;

if (!empty($_GET['page']))
 $pagex = $_GET['page'];
else
	$pagex = 0;


 

 echo "<div class=\"pstrnav\">";
echo '<br/><div class="footerx"><div class="footer">'; 
 
  
if(!empty($banssearch))
$pageskey = ' <a href="?eserver='.$serversearch.'&columns='.$columns_desktop.'&banssearch=1&page=';	
else
$pageskey = ' <a href="?eserver='.$serversearch.'&columns='.$columns_desktop.'&page=';
//$page = $currentPage;
//$nb_pages = $numPages-1;


// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = $pageskey.'1">Первая</a> | '.$pageskey.($page - 1).'">Предыдущая</a> | ';
// Проверяем нужны ли стрелки вперед
if ($page != $nb_pages) $nextpage = ' | '.$pageskey. ($page + 1) .'">Следующая</a> | '.$pageskey.$nb_pages. '">Последняя</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 8 > 0) $page8left = ' '.$pageskey. ($page - 8) .'">'. ($page - 8) .'</a> | ';
if($page - 7 > 0) $page7left = ' '.$pageskey. ($page - 7) .'">'. ($page - 7) .'</a> | ';
if($page - 6 > 0) $page6left = ' '.$pageskey. ($page - 6) .'">'. ($page - 6) .'</a> | ';
if($page - 5 > 0) $page5left = ' '.$pageskey. ($page - 5) .'">'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' '.$pageskey. ($page - 4) .'">'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' '.$pageskey. ($page - 3) .'">'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' '.$pageskey. ($page - 2) .'">'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = $pageskey. ($page - 1) .'">'. ($page - 1) .'</a> | ';

if($page + 8 <= $nb_pages) $page8right = ' | '.$pageskey. ($page + 8) .'">'. ($page + 8) .'</a>';
if($page + 7 <= $nb_pages) $page7right = ' | '.$pageskey. ($page + 7) .'">'. ($page + 7) .'</a>';
if($page + 6 <= $nb_pages) $page6right = ' | '.$pageskey. ($page + 6) .'">'. ($page + 6) .'</a>';
if($page + 5 <= $nb_pages) $page5right = ' | '.$pageskey. ($page + 5) .'">'. ($page + 5) .'</a>';
if($page + 4 <= $nb_pages) $page4right = ' | '.$pageskey. ($page + 4) .'">'. ($page + 4) .'</a>';
if($page + 3 <= $nb_pages) $page3right = ' | '.$pageskey. ($page + 3) .'">'. ($page + 3) .'</a>';
if($page + 2 <= $nb_pages) $page2right = ' | '.$pageskey. ($page + 2) .'">'. ($page + 2) .'</a>';
if($page + 1 <= $nb_pages) $page1right = ' | '.$pageskey. ($page + 1) .'">'. ($page + 1) .'</a>';

// Вывод меню если страниц больше одной

if ($nb_pages > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page7left.$page6left.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$page6right.$page7right.$nextpage;
echo "</div>";
}
echo '</div></div></div> </br></br>';
include_once("footer.php");  

if (((!empty($alarmaaa))&&(!empty($keyxxx)))||((!empty($alarmaaax))&&(!empty($keyxxx)))){
?>
<div id="bg_popup">
  <a href="#" title="Закрыть" onclick="document.getElementById('bg_popup').style.display='none'; return false;">X</a>
<h3 style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;">Cheater 
<?php 
if (!empty($alarmaaa))
echo $eeplayer; 
else
echo '<a href="'.$ssylka_na_codbox.'stats.php?pgsearch='.$csi_pg.'"> => STATS!</a>';	
?> 
detected, in this page!</h3>
</div>
<?php } ?>


<!--RECOD.RU Call Of duty game series chat parser by LA|ROCCA -->
</body>
</html>
<?php
if(empty($key))
{
 $handle = fopen($cache_file, 'w'); // Открываем файл для записи и стираем его содержимое
  fwrite($handle, ob_get_contents()); // Сохраняем всё содержимое буфера в файл
  fclose($handle); // Закрываем файл
  ob_end_flush(); // Выводим страницу в браузере 
}

 //endif;
 ?>