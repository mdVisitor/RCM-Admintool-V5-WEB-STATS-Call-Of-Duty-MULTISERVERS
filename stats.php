﻿<?php
////error_reporting(0);
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start(); 

function hx($sc)
 {
  $sc = str_replace(array(
    "stats.php"
  ), '', $sc);
  return $sc . "";
 }
$x_ff  = 0;
$cpath = hx(__FILE__);

$key = '';
$startx = microtime(true);
$today = date("Y-m-d");
if (empty($_SESSION['username'])) 
	$_SESSION['username']=0;

if (!empty($_SESSION['username'])){
	$_GET['pass'] = $_SESSION['username'];
	 $passsword = $_SESSION['username'];	
}
 
if ((!empty($_GET['pass'])) && (!empty($_SESSION))) {
   $_POST['pass'] = $passsword;   
}

include("index_chat_cfg.php");
include_once("functions/chatdb_archive.php"); 
include_once("functions/functions.inc.php");  
include_once("functions/ranks.php");  
include_once("functions/geo.php");  
//var_dump($geo_array);


if (empty($Msql_support))
$Msql_support = 0;
if (empty($host_adress))
    $host_adress = '0';
if (empty($db_name))
    $db_name   = '0';
if (empty($db_user))
    $db_user = '0';
if (empty($db_pass))
    $db_pass = '0';
if (empty($charset_db))
    $charset_db = '0';

if (!empty($passsword)){		
foreach ($steam_users_id as $passw => $xy){
  if(md5($passsword) == md5($passw))
  {
	  $key=1;
	  $xz = $xy;
  }
  
  }} else $key = '';	
  

if (is_numeric($key))
	$key = $key.'.1';
 
if(((!empty($key)) && (empty($_GET['logout']))) || ((!empty($_COOKIE['user_online_x'])) && (empty($_GET['logout'])))){ //| права на базу данных => '.substr(sprintf('%o', fileperms($stats_db_path)), -4).' 
	
if(empty($Msql_support))
	$adminiinfo = ''.$xz.' | БД: '.$sizzedb = (int)(filesize($stats_db_path) / 1000000).' Мб';
else
{
	
try
{	  	  
    $dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::NULL_TO_STRING => NULL,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $bdd = new PDO($dsn, $db_user, $db_pass, $opt);			  	  
    $sth = $bdd->query('SHOW TABLE STATUS');
    $sizeoff = $sth->fetch(PDO::FETCH_ASSOC)["Data_length"];

  
	
}
catch(Exception $e)
{
    
    die('Errors : '.$e->getMessage());
}	

	$adminiinfo = ''.$xz.' | БД: '.$sizzedb = (int)($sizeoff / 1000000).' Мб';

}	
	}else $adminiinfo = '';	

if(((!empty($key)) && (empty($_GET['logout']))) || ((!empty($_COOKIE['user_online_x'])) && (empty($_GET['logout'])))){ //| права на базу данных => '.substr(sprintf('%o', fileperms($stats_db_path)), -4).' 
	$adminpl = '|<a href="'.$ssylka_na_stats.'adminpanel.php?adminpanel='.$xz.'" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 16px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">АдминПанель</a>
	<a href="'.$ssylka_na_stats.'?logout=logout&lg#Logout!" onclick="location.reload()" style="color:#000;text-shadow:0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #ffa500, 0 0 7px #ffa500, 0 0 16px #ffa500, 0 0 40px #ffa500, 0 0 65px #ffa500;" >Logout!</a>';
}else 
	$adminpl = '|<a href="'.$ssylka_na_stats.'adminpanel.php" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 16px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">Логин</a>';


if (((!empty($_GET['logout'])) && (!empty($_SESSION['username']))) || ((!empty($_GET['logout'])) && (!empty($_COOKIE['user_online_x']))))
{	
echo 'Админ - '.$key.' вышел :)';
setcookie ( 'user_online_x', '', time()-2 );
session_destroy();
echo "<meta http-equiv='refresh' content='0'>";
}

$cache_time = 400;
             //header("Refresh:".$cache_time);
  
if (!empty($_GET['geo'])) 
   $geosearch = $_GET['geo']; 
else
  	$geosearch = 0;

if (!empty($_GET['main'])) 
{
   $chatdbarc = $_GET['main'];
   $stats_db_path = dirname( __FILE__ ) . '/chat_archive/'.$chatdbarc;   
}
   else
  	$chatdbarc = 0;

if (!empty($_GET['ip'])) 
   $search_ip = $_GET['ip']; 
else
  	$search_ip = 0;

if (!empty($_GET['kills'])) 
   $search_kills = $_GET['kills']; 
else
  	$search_kills = 0;

if (!empty($_GET['deaths'])) 
   $search_deaths = $_GET['deaths']; 
else
  	$search_deaths = 0;

if (!empty($_GET['ratios'])) 
   $search_ratiokd = $_GET['ratios']; 
else
  	$search_ratiokd = 0;

if (!empty($_GET['headhots'])) 
   $search_heads = $_GET['headhots']; 
else
  	$search_heads = 0;
if (!empty($_GET['skill'])) 
   $search_skill = $_GET['skill']; 
else
  	$search_skill = 0;
if (!empty($_GET['grenades'])) 
   $search_grenades = $_GET['grenades']; 
else
  	$search_grenades = 0;
if (!empty($_GET['knife'])) 
   $search_knife = $_GET['knife']; 
else
  	$search_knife = 0;

if (!empty($_GET['suecides'])) 
   $search_suecides = $_GET['suecides']; 
else
  	$search_suecides = 0;

if (!empty($_GET['cfour'])) 
   $search_cfour = $_GET['cfour']; 
else
  	$search_cfour = 0;
 

if (!empty($_GET['xgeo'])) 
   $search_geo = $_GET['xgeo']; 
else
   $search_geo = 0;



if(empty($top_main_total))   
$top_main_total=40; 

if (!empty($_GET['search'])) 
   $search_nickname = $_GET['search']; 
else
  	$search_nickname = 0;

if (!empty($_GET['timeh'])) 
$timesearch = $_GET['timeh'];
else
  	$timesearch = 0;
  
   if (empty($_GET['page']))
     $cache_time = 240;
  else
   $paages = $_GET['page'];	  
 
  if (empty($_GET['server']))
  {
$cache_time = 240; 
$server = 0;
  }
   else
	$server = $_GET['server']; 

if (!empty($paages)){
	if($paages < 3)
  $cache_time = 240; 
    else
		$cache_time = 60*$paages;}

if (!empty($_GET['search']))
  $cache_time = 240; 

 
if (!empty($server))
		$cache_time = 60; 

if (empty($cache_time))
if (!empty($server))
	$cache_time = 300;

    $cc = round($cache_time, 0);       
    $xcache_time = $cc;

if(empty($key))
{
  $file = "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  $filemd5 = md5($file); 
  $cache_file = $cache_folder."/$filemd5.html";
  if (file_exists($cache_file)) {
   if ((time() - $cc) < filemtime($cache_file)) {
      echo file_get_contents($cache_file); 
	  echo "<!-- --------- Cached with $xcache_time seconds --------- -->";
      exit; 
    }
	}
  ob_start();
  }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="robots" content="noindex,nofollow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title><?php echo $title_zagolovok_stranicy ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>css/recod-ru.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>css/tooltip-classic.css" />
        <script type="text/javascript" src="<?php echo $ssylka_na_ikonki;?>css_js/saturnx.js" async defer></script>
		<script type="text/javascript" src="<?php echo $ssylka_na_ikonki;?>css_js/html2canvas.js"></script>

          <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
		
		
        <!-- ТОЛКО ПОСЛЕ ВСЕХ jquery -->  
        <script src="<?php echo $ssylka_na_ikonki;?>css_js/hBarChart.js"></script>	
       
	   <!-- <script src="<?php echo $ssylka_na_ikonki;?>css_js/stax.js"></script> -->
	   
<script>	   
$(function() {
    $("ul.chart").hBarChart();
    $("ul.chart1").hBarChart({
        bgColor: '#289403',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#820223',
            text: 'white'
        }
    });
})	

$(function() {
    $("ul.chart").hBarChart();
    $("ul.chart2").hBarChart({
        bgColor: '#238292',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#6f021e',
            text: 'white'
        }
    });
})	


$(function() {
    $("ul.chart").hBarChart();
    $("ul.chart3").hBarChart({
        bgColor: '#696402',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#5d0219',
            text: 'white'
        }
    });
})

$(function() {
    $("ul.chart").hBarChart();
    $("ul.chart4").hBarChart({
        bgColor: '#195d02',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#4a0114',
            text: 'white'
        }
    });
}) 


$(function() {
    $("ul.chart").hBarChart();
    $("ul.chart5").hBarChart({
        bgColor: '#195d02',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#4a0114',
            text: 'white'
        }
    });
})
$(function() {
    $("ul.chart").hBarChart();
    $("ul.chart6").hBarChart({
        bgColor: '#238292',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#4a0114',
            text: 'white'
        }
    });
})


$(function() {
    $("ul.chart").hBarChart();
    $("ul.chart7").hBarChart({
        bgColor: '#686402',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#4a0114',
            text: 'white'
        }
    });
})
$(function() {
    $("ul.chart").hBarChart();
    $("ul.chartweek").hBarChart({
        bgColor: '#686402',
        textColor: '#fff',
		fontStyle: 'Impact',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#c0890a',
            text: 'white'
        }
    });
})

$(function() {
    $("ul.chart").hBarChart();
    $("ul.chart8").hBarChart({
        bgColor: '#195d02',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#4a0114',
            text: 'white'
        }
    });
})  
</script>   
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->		
<style>
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

if(empty($_GET['theme']))
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

</style>
<?php }
else if (($_GET['theme'] == 'light')) {
?>
<style>
body{
  transition:0;
  background-color:#C0C0C0; /* #002600 */
  color:#000;
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



</style>
<?php }?>

	

 
  
<script>
var newTxt="<?php echo $title_migalka_stats ?>";
var oldTxt=document.title;
 
function migalka(){
    if(document.title==oldTxt){
        document.title=newTxt;
    }else{
        document.title=oldTxt;
    }
}
 
var timer = setInterval(migalka,1000);
</script>


 <script>
 $(document).ready(function(){

        var $menu = $("#menu");

        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("default")
                           .addClass("fixed transbg")
                           .fadeIn('fast');
                });
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("fixed transbg")
                           .addClass("default")
                           .fadeIn('fast');
                });
            }
        });//scroll

        $menu.hover(
            function(){
                if( $(this).hasClass('fixed') ){
                    $(this).removeClass('transbg');
                }
            },
            function(){
                if( $(this).hasClass('fixed') ){
                    $(this).addClass('transbg');
                }
            });//hover
    });//jQuery
 </script>
 
 
  <script> 
            function mouseover() { 
                document.getElementById("gfg").style.color = "red"; 
            } 
              
            function mouseout() { 
                document.getElementById("gfg").style.color = "green"; 
            } 
        </script> 
 
 
 
	</head>
<body>
 
<script> 
addEventListener('click', function (event) {
    if (event.target.id == 'found') {
        
    }
}, true);
</script>
<div class="menuooo-center2">
 <div class="menuooo2">
<div id="menu">
        <ul>		
<?php		
		echo '<li>'.$adminpl.'</li>';
foreach ($multi_servers_array as $arx => $xservername) {	
						   $zx = explode("server_md5:", $arx);
						   $fld = $zx[1];
						   $server_md5 = strtok($fld, " ");
   echo '<li>| <a href="'.$ssylka_na_stats.'?server='.$server_md5.'&kills=sort">'.$xservername.'</a></li>';   
}
foreach ($ssylki_array as $arxx => $namessylka) {	
   echo '<li>| <a href="'.$arxx.'" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #990694, 0 0 7px #990694, 0 0 16px #990694, 0 0 40px #990694, 0 0 65px #990694;" target="_blank">'.$namessylka.'</a></li>';   
}
?>
        </ul>
	
<div class="absolute-style"> 
<?php
echo '<a href="'.$ssylka_na_stats.'?main='.$chatdbarc.'" style="padding-bottom: 40px;"> '. $main_servername . '</a>';

 if((!empty($key)) || (!empty($_COOKIE['user_online_x']))){	 
$seuiotf = substr(sprintf('%o', fileperms($stats_db_path)), -4);	
if($seuiotf != '0666')
chmod($stats_db_path, 0666);	 	 
       $dawDe = "<span tooltip=\"Забрать скриншот! Жди 5 сек.\"><a href=\"".$ssylka_na_ikonki."upload/index.php\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:".$cvet_text.";\"> <img src=\"".$ssylka_na_ikonki."img/s_icon.png\" height=\"48px\" width=\"48px\"> </a></span>";	
?>
<span tooltip="Создать скриншот в один клик!">
<form class="button2" name="allsearch" method="get" action="<?php echo $ssylka_na_stats;?>upload/index.php">
<input class="button2" type="button" onclick="screenshot();">
</form>
</span>
<form id="demo-b" name="allsearchkk" method="get">
<?php echo $dawDe;?> 
</form>
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
   	<span tooltip="ИП адрес игрока, жмём Enter!" onClick="clearInterval(t)"> <a href="javascript:void(0);" onclick="viewdiv('mydiv');">
   <form id="demo-b">
 <input class="button flashing" type="search" name="ip">
  </form> </a></span>

<?php
 }
?>
   
	<span tooltip="Гуид или имя игрока, жмём Enter!" onClick="clearInterval(t)"> <a href="javascript:void(0);" onclick="viewdiv('mydiv');">
   <form id="demo-b">
 <input class="button flashing" type="search" name="search">
  </form> </a></span>
     
</div>		
	
    </div>
</div></div>


 <script type="text/javascript">
function viewdiv(id){
var el=document.getElementById(id);
if(el.style.display=="block"){
el.style.display="none";
} else {
el.style.display="block";
}
}
</script>
 
<?php	

if (empty($_GET['search']))
	
{ $search = 0;?>
 
 	
<div id="timer">
     
            </div>
			<h2><div class="abs-center time"><div id="mydiv" style="display:block;"> 
			<span id="time" >
			
			 <canvas id="canvas">Canvas is not supported by your browser.</canvas>
			
			</span>  
			</div></div></h2>
        <div class="rela-block flex-container button-container"><?php echo '&emsp;&emsp;'.$adminiinfo ?>
        </div>		
		
		
		
<?php
}
else
$search = $_GET['search'];
?>

 


<div id="blockx">
<?php

 $user_agent = $_SERVER["HTTP_USER_AGENT"];
  if (strpos($user_agent, "Firefox") !== false)  $browser = "Firefox";
  elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
  elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
  elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
  elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
  else $browser = "Неизвестный";
  //echo "Ваш браузер: $browser ";
if($browser == "Firefox")
	echo '<br/><br/>';
else
	echo '<br/>';

$psx = 0;
$psxz = 0;
if (!empty($search))
{
	//$search = trim($search);
  if(((23>(strlen($search))) && (18<(strlen($search)))) && (ctype_digit($search)))
  {
	   if (!empty($search_nickname))
	   $search_nickname = '';
	   $psx = 1;
  }
	   else if(!ctype_digit($search))
	   {
             $search_nickname = $search;
			 $_GET['search'] = $search_nickname;
			 $search= '';
			 echo '<br/><br/><br/>';
	   }
		 else{
			 $search_nickname = $search;
			 $_GET['search'] = $search_nickname;
              $search= '';	
              echo '<br/><br/><br/>';			  
	    }
}	
  
////////////////////////////////////////////////////////////////////////////////////				   
////////////////////////////////////////////////////////////////////////////////////
//////////////////////                                        ////////////////////// 
//////////////////////        CHAT SQLITE WALL ON SITE        ////////////////////// 			
//////////////////////                                        ////////////////////// 
////////////////////////////////////////////////////////////////////////////////////			
////////////////////////////////////////////////////////////////////////////////////	
//chmod($stats_db_path, 0666);
$chatdb = $stats_db_path;


 
try
{
	  
	  if(empty($Msql_support))
	  {
	
	
	if(!empty($stats_db_path))
	{
	
    $bdd =  new PDO('sqlite:' . $stats_db_path);
	$dbw3 = new PDO('sqlite:' . $stats_db_path_week);
    $dbm3day = new PDO('sqlite:' . $stats_db_path_month);
	}
	
	  }
      else
	  {	  	  
    $dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		
		//PDO::ATTR_EMULATE_PREPARES => true,
		
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::NULL_TO_STRING => NULL,
    ];
    $bdd = new PDO($dsn, $db_user, $db_pass, $opt);	
    $dbw3 = $bdd;
    $dbm3day = $bdd;
	  }
//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //отрубает базу при ошибке + в лог
//$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );   //продолжает работу, идет откладка в лог

 



$а = 0;
$xpip = 0;
$number_of_rows = 0;

 include_once("functions/db_msql_stats.php");	

$total_messages = $reponse->fetch();
$kolichestvi_soobsh=$total_messages['id']; 

$nb_pages = ceil($kolichestvi_soobsh / $top_main_total);?>
<div align="center">
<?php
if (isset($_GET['page'])){$page = $_GET['page']; }else {$page = 1; }
$premierMessageAafficher = ($page - 1) * $top_main_total;
$reponse->closeCursor();
$reponse = null;


	
$mobile_browser = '0';
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;}
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;}     
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;}    
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0) {
    $mobile_browser = 0;} 
if ($mobile_browser > 0) {
 	echo '</br></br></br>';
	$auto_font = '';
	$auto_font_title = '';
	$auto_font_title_week = '';}
	      else{  
	$auto_font = '';
	$auto_font_title = '';
	$auto_font_title_week = '';}	

 include_once("functions/db_msql_list_stats.php");

  ///////////////////// DAY TOP
  ///////////////////// DAY TOP
  ///////////////////// DAY TOP
  ///////////////////// DAY TOP
  ///////////////////// DAY TOP  
  
  //$today = '2019-03-29';
  
  
  
if ((strpos($_SERVER["REQUEST_URI"], '/stats.php?main=0') !== false) || ((strpos($_SERVER["REQUEST_URI"], '&kills=sort') !== false)&&(!empty($server))))
{
	 


if(!file_exists($stats_db_path_week)){
 
    $dbm3day = new PDO('sqlite:'. $stats_db_path_week);
    $dbm3day->exec("CREATE TABLE db_stats_week 
	(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 
			servername varchar(255)  NOT NULL,
			s_pg varchar(50) NOT NULL,			
			w_guid varchar(32)  NOT NULL,
			w_port varchar(10) NOT NULL,			
			s_player varchar(90)  NOT NULL,
			s_kills varchar(10) NOT NULL,
			s_deaths varchar(10) NOT NULL,							
			s_heads varchar(8) NOT NULL,
            s_time datetime NOT NULL,			
			s_lasttime datetime NOT NULL)"); 
    $dbm3day = NULL;
   }
 $dbm3day = new PDO('sqlite:' . $stats_db_path_week);	



	 
	$check_users_table = $dbm3day->prepare("SELECT s_kills FROM db_stats_week");
if($check_users_table == TRUE) {
	
	


/*
	
 //if(empty($Msql_support)){
if(file_exists($stats_db_path_week)){
	if (strpos($_SERVER["REQUEST_URI"], '/stats.php?main=0') !== false)
 	   $stmt = $dbw3->prepare("SELECT * FROM db_stats_week WHERE s_kills AND s_lasttime = :s_lasttime ORDER BY (s_kills+0) DESC LIMIT 5");
	else if((strpos($_SERVER["REQUEST_URI"], '&kills=sort') !== false)&&(!empty($server)))
		$stmt = $dbw3->prepare("SELECT * FROM db_stats_week WHERE s_kills AND s_lasttime = :s_lasttime AND w_port='$server' ORDER BY (s_kills+0) DESC LIMIT 5");
    $stmt->execute(array(':s_lasttime' => ''.$today.'%'));
    $rs = $stmt->fetchAll();	
 }else{
	if (strpos($_SERVER["REQUEST_URI"], '/stats.php?main=0') !== false)
 	   $stmt = $dbw3->prepare("SELECT * FROM db_stats_week WHERE s_kills AND s_lasttime LIKE ? ORDER BY (s_kills+0) DESC LIMIT 5");
	else if((strpos($_SERVER["REQUEST_URI"], '&kills=sort') !== false)&&(!empty($server)))
		$stmt = $dbw3->prepare("SELECT * FROM db_stats_week WHERE s_kills AND s_lasttime LIKE ? AND s_port='$server' ORDER BY (s_kills+0) DESC LIMIT 5");
    $stmt->execute(array(''.$today.'%'));
    $rs = $stmt->fetchAll();
 }

*/
 
 
 	if (strpos($_SERVER["REQUEST_URI"], '/stats.php?main=0') !== false)
 	   $rs = $dbm3day->query("SELECT * FROM db_stats_week WHERE s_kills ORDER BY (s_kills+0) DESC LIMIT 5");
	else if((strpos($_SERVER["REQUEST_URI"], '&kills=sort') !== false)&&(!empty($server)))
	   $rs = $dbm3day->query("SELECT * FROM db_stats_week WHERE s_kills and w_port='$server' ORDER BY (s_kills+0) DESC LIMIT 5");
 
 $sss=0;
 
 
 foreach ($rs as $row){	 

	++$sss;
                $serverx    = $row['servername']; 
                $cntz       = $row['w_port']; 
                $playername = $row['s_player'];
                $kills      = $row['s_kills'];
                $deaths     = $row['s_deaths'];				
                //$suicids    = $row['s_suicids'];				
                $heads      = $row['s_heads'];
                $lasttime   = $row['s_lasttime'];
                $guid       = $row['w_guid'];
 
	 
	            $jarr_playername[] = $playername;
	            $iarr_skill[]      = $kills;
				$iarr_deaths[]     = $deaths;
				$iarr_sss[]        = $sss;
                //$iarr_cfour[]      = $cfour;				
           }
}		   
		   
if(!empty($iarr_skill[4])){
 echo '<section style="opacity: 0.4; width:70%; margin-top: -40px; margin-left: -40px;"><div class="container">
 <div class="col-md-6"><div><ul class="chartweek">'; 		

 
$o = 0;
while ($o <= 4) {
   

 echo '<li data-data="'.$iarr_skill[''.$o.''].'" sd-sd="22"> NR-'.$iarr_sss[''.$o.''].' &#128293;<b>'.$jarr_playername[''.$o.''].'</b>&#128293; 
<b>Kills:</b> <b style="opacity: 0.9; color:lime;">'.$iarr_skill[''.$o.''].'</b>
<b>Deaths:</b> <b style="opacity: 0.9; color:lime;">'.$iarr_deaths[''.$o.''].'</b>
 '; 


 if (strpos($_SERVER["REQUEST_URI"], '/stats.php?main=0') !== false) 
 echo '<strong style="opacity: 0.7; font-family: Impact; font-size: 15px;"> TOP WEEK FROM ALL SERVERS</strong></li>';
else
echo '<strong style="opacity: 0.7; font-family: Impact; font-size: 15px;"> TOP WEEK</strong></li>';

  

$o++;
}


 
 echo '</ul></div></div></div></section>'; 
} 












}else{echo '</br></br>';}
  ///////////////////// DAY TOP
    ///////////////////// DAY TOP
	  ///////////////////// DAY TOP
	    ///////////////////// DAY TOP
		  ///////////////////// DAY TOP
		    ///////////////////// DAY TOP
			
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
if(empty($search))
 echo '<table border="0"  id="container">';  
 
 $i=0;
 $p=0;
 $ssssob = 0;
 $sort_msql_from_headers = 'sort'; 
 $pixelz = 0;
 
while ($row = $reponse->fetch())	
{	

 if(!empty($search))
  echo '<table border="0"  id="container" width="90%">';              


			    $guidxport  = $row['s_pg'];
                $serverx    = $row['servername']; 
                $cntz       = $row['s_port']; 
                $playername = $row['s_player'];
                $place      = $row['w_place'];
                $kills      = $row['s_kills'];
                $deaths     = $row['s_deaths'];				
                $ratio      = $row['w_ratio'];
                $skill      = $row['w_skill'];
			    $prestige   = $row['w_prestige'];
                $suicids    = $row['s_suicids'];				
                $heads      = $row['s_heads'];
                //$nades      = $row['s_grenade'];
                $lasttime   = $row['s_lasttime'];
                $timee      = $row['s_time'];
                $guid       = $row['s_guid'];
                $geo        = $row['w_geo'];
				$fps        = $row['w_fps'];
				$ping       = $row['w_ping']; 	
                $melle      = $row['s_melle'];


				 
				$guidxportarr[] = $guidxport;
				
				
				if(empty($heads))
				 $procent =	'0%';
                else
				 $procent = get_percentage($heads, $kills); 
				
			
				if(!empty($kills)){
				  if(!empty($deaths)){
		               $w_ratio = $kills/$deaths;
				        }}
				if(empty($w_ratio))
				 $w_ratio = 0;
		
		$iplacer=$p+1;
		
                       if(!file_exists($cpath.'/cache/cron_update_'.$guidxport))
                               touch($cpath.'/cache/cron_update_'.$guidxport);
	
                            $cr = filemtime($cpath.'/cache/cron_update_'.$guidxport);
                            if (time() - $cr >= 60 * 60) {
                                file_put_contents($cpath.'/cache/cron_update_'.$guidxport, "");
			
			
	            $bdd->query("UPDATE db_stats_2 SET w_place='$iplacer', w_ratio='$w_ratio' WHERE s_pg='".$guidxport."'");	
                                                         }
			
        
		$ratio = $w_ratio;
		

		
                // количество дней (разница)
				 if((!empty($timee))&&(!empty($lasttime))){
					 
                      $now = new DateTime(); // текущее время на сервере
					
					
                     $datetime1 =  DateTime::createFromFormat("Y-m-d H:i:s", $lasttime);//создаем из переменной
                     $datetime2 =  DateTime::createFromFormat("Y-m-d H:i:s", $timee);
                     $raznica = $datetime1->diff($datetime2);//разница					
					 $xyears = $raznica->y; // кол-во лет
					 $xmonth = $raznica->m; // кол-во mesac
					 $xday = $raznica->d;   // кол-во дней
					 $xhours = $raznica->h; // кол-во часов
					 $xmin = $raznica->i;   // кол-во минут
                     $xsek = $raznica->s;   // кол-во c		

			  if(!empty($xday)){
				if((!empty($xhours))&&($xhours > 0)){ 
				  if((!empty($xmin))&&($xmin > 0)){
					  //$xmin = '';
				     if((!empty($xsek))&&($xsek > 0))
					   $xsek = '';
				  }
				} 
			  }
					
	/*				
					
					 if(!empty($xyears)) $xyears = $xyears.'. год '; else $xyears = '';
					 if(!empty($xmonth)) $xmonth = $xmonth.'. месяц '; else $xmonth = '';					 
					 if(!empty($xday)) $xday = $xday.'. день '; else $xday = '';
					 if(!empty($xhours)) $xhours = $xhours.'. час '; else $xhours = '';					 
				     if(!empty($xmin)) $xmin = $xmin.'. мин '; else $xmin = '';
                     if(!empty($xsek)) $xsek = $xsek.'. сек '; else $xsek = '';	
	*/				 
					 
					 if(!empty($xyears)) $xyears = $xyears.'. year '; else $xyears = '';
					 if(!empty($xmonth)) $xmonth = $xmonth.'. month '; else $xmonth = '';					 
					 if(!empty($xday)) $xday = $xday.'. day '; else $xday = '';
					 if(!empty($xhours)) $xhours = $xhours.'. hour '; else $xhours = '';					 
				     if(!empty($xmin)) $xmin = $xmin.'. min '; else $xmin = '';
                     if(!empty($xsek)) $xsek = $xsek.'. sec '; else $xsek = '';	
					 					 
					 
					 
					 
                     $lasttime2 = $xyears.''.$xmonth.''.$xday.''.$xhours.''.$xmin; //.''.$xsek;	
				 
				     $strrwer = strlen($lasttime2);
				 
				      if($strrwer > 75)
                        $lasttime2 = $today;
			
					 
					 $date = DateTime::createFromFormat("Y-m-d H:i:s", $lasttime); // задаем дату в любом формате
					 $interval = $now->diff($date); // получаем разницу в виде объекта DateInterval
					 $xyears = $interval->y; // кол-во лет
					 $xmonth = $interval->m; // кол-во mesac
					 $xday = $interval->d;   // кол-во дней
					 $xhours = $interval->h; // кол-во часов
					 $xmin = $interval->i;   // кол-во минут
                     $xsek = $interval->s;   // кол-во c	
                  
			  if(!empty($xday)){
				if((!empty($xhours))&&($xhours > 0)){ 
				  if((!empty($xmin))&&($xmin > 0)){
					  //$xmin = '';
				     if((!empty($xsek))&&($xsek > 0))
					   $xsek = '';
				  }
				} 
			  }
				
	/*				
					
					 if(!empty($xyears)) $xyears = $xyears.'. год '; else $xyears = '';
					 if(!empty($xmonth)) $xmonth = $xmonth.'. месяц '; else $xmonth = '';					 
					 if(!empty($xday)) $xday = $xday.'. день '; else $xday = '';
					 if(!empty($xhours)) $xhours = $xhours.'. час '; else $xhours = '';					 
				     if(!empty($xmin)) $xmin = $xmin.'. мин '; else $xmin = '';
                     if(!empty($xsek)) $xsek = $xsek.'. сек '; else $xsek = '';	
	*/				 
					 
					 if(!empty($xyears)) $xyears = $xyears.'. year '; else $xyears = '';
					 if(!empty($xmonth)) $xmonth = $xmonth.'. month '; else $xmonth = '';					 
					 if(!empty($xday)) $xday = $xday.'. day '; else $xday = '';
					 if(!empty($xhours)) $xhours = $xhours.'. hour '; else $xhours = '';					 
				     if(!empty($xmin)) $xmin = $xmin.'. min '; else $xmin = '';
                     if(!empty($xsek)) $xsek = $xsek.'. sec '; else $xsek = '';		
					 
					 
                     $timee2 = $xyears.''.$xmonth.''.$xday.''.$xhours.''.$xmin.''.$xsek;
					 
					 if(empty($timee2))
						 $timee2 = " сейчас"; 
					 
					 
					 
				     $strrwer = strlen($timee2);
				      if($strrwer > 75)
					    $timee2 = $lasttime;					 
			
                 } else{$lasttime2 = 0;  $timee = 0; $timee2 = 0;}		  
 
                $arr_playername[] = $playername;
				$arr_kills[] = $kills;
				$arr_ratio[] = $ratio;
				$arr_skill[] = $skill;
                $arr_heads[] = $heads;
				$guidxx[]    = $guid;
				
				$ratiocount = 0;
				if(empty($ratio)){	
				if(!empty($deaths)){
					if(!empty($kills)){
				$rrattio = round(($kills/$deaths),2);
				$ratiocount = 1;
				}}}
				 
				  if(empty($ratiocount))
				 $rrattio =  round($ratio,2); 
			
$servername = str_replace($pre_server, "", $serverx);
	if($i == 0) 
	{	//echo "<center><a href='index.php'><h1 style=\"font-family: Ariel;\">" . colorize($main_servername) . "</h1></a></center>";	

            if (!empty($search))
				echo "<br/><br/><h3>Search - ". $search." </h3>";
			
             if (!empty($server))
				echo "<h2>". colorize($serverx)." </h2>";
	

 
  $shadow_green = 'color: #999; text-shadow: 0 0 1px #555, 0 0 2px #555, 0 0 30px #555, 0 0 4px #1f8000, 0 0 7px #1f8000, 0 0 13px #1f8000, 0 0 40px #1f8000, 0 0 21px #1f8000;';
  $shadow_red = 'color: #999; text-shadow: 0 0 1px #555, 0 0 2px #555, 0 0 30px #555, 0 0 4px #cc0032, 0 0 7px #cc0032, 0 0 13px #cc0032, 0 0 40px #cc0032, 0 0 21px #cc0032;';
  $shadow_not_click = 'color: #999; text-shadow: 0 0 1px #555, 0 0 2px #555, 0 0 30px #555, 0 0 4px #777, 0 0 7px #777, 0 0 13px #777, 0 0 40px #777, 0 0 21px #777;';
  $shadow_top_week = 'color: silver;text-shadow:0px 2px 5px #fdff00;';
  $shadow_top_month = 'color: silver;text-shadow:0px 2px 5px #fdff00;';
	
 


	echo "<tr>";
	
	
if (empty($search)){	
if(empty($search_nnnnnnnnnnnnn)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;} 	   
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
#
</center></td>";		
}
else
	{
		
if(empty($search_nnnnnnnnnnnnn)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;} 	   
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
Server 
</center></td>";	
		
	}
   

if(empty($search_geo)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>
Geo
</center></td>";	

if(empty($search_prestige)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;

</center></td>";



if(empty($search_kills)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?kills=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
 
</a>
</center></td>";	



if(empty($_GET['search'])){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>
Nickname
&emsp;
</center></td>";



if(empty($search_kills)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?kills=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
Kills
</a>
</center></td>";	

if(empty($search_deaths)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?deaths=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
Deaths
</a>
</center></td>";	

if(empty($search_ratiokd)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?ratios=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
K/D
</a>
</center></td>";

if(empty($search_heads)){$shadowheader = $shadow_green; $green_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $green_image_shadow = 'red';}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?headhots=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
Heads</a>
</center></td>";	

if(empty($search_skill)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?skill=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
Skill
</a>
</center></td>";	

 
if (empty($search)){
if(empty($search_knife)){$shadowheader = $shadow_green; $agreen_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $agreen_image_shadow = 'red';}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?knife=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
<img src=\"".$ssylka_na_ikonki."/img/knife-icon.png\" 
style=\"-webkit-filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");\" height=\"24px\" width=\"24px\">
</a>
</center></td>";
}


if (!empty($search)){
if(empty($search_suecides)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?suecides=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
Info
</a>
</center></td>";
} 




if (!empty($search)){
if(empty($search_suecides)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?suecides=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
Soul
</a>
</center></td>";
}


  

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_stats."?time=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:#333;font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
Playing
</a>
&emsp;</center></td>";
	  
	  echo "</tr>";		
	}
	 $i++;	
	 
 
 
////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
 
       echo "<tr>";   
	   
if (empty($search)){		   
	      
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver; font-size: 16px;font-size:".$auto_font.";\"><b>&emsp;
<a href=\"".$ssylka_na_stats."?server=".$cntz."&main=".$chatdbarc."\">
<b style=\"color:".$color_ip.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 30px #000, 0 0 4px #555, 0 0 7px #555, 0 0 13px #555, 0 0 40px #555, 0 0 21px #555;\">
".($premierMessageAafficher+$i)."</b></a></b></td>"; 

}else
{
	
	
	
	
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver; font-size: 16px;font-size:".$auto_font.";\"><b>&emsp;
<a href=\"".$ssylka_na_stats."?server=".$cntz."&main=".$chatdbarc."\">
<b style=\"color:".$color_ip.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 30px #000, 0 0 4px #555, 0 0 7px #555, 0 0 13px #555, 0 0 40px #555, 0 0 21px #555;\">
".colorize($servername)."</b></a></b></td>"; 

	
	
	
	
	
}



foreach($geo_array as $arrr => $sd)
{
    foreach($sd as $w => $geon)
    {
		if($geo == $geon)
		{
	    ////ENG		
     //echo "<br/>".$sd[2].' => '.$geon;
	    $fullgeo = $sd[2];
	    }
    
	}	
	
}



echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&nbsp;
<a href=\"".$ssylka_na_stats."?xgeo=".$geo."&main=".$chatdbarc."\">
<b style=\"color:".$color_geo.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 30px #000, 0 0 2px ".$color_geo.", 0 0 2px ".$color_geo.", 0 0 3px ".$color_geo.", 0 0 1px ".$color_geo.", 0 0 2px ".$color_geo.";\">
";
echo '<span tooltip="'.$fullgeo.'"> 
<img src="'.$ssylka_na_ikonki.'/flags-mini/'.$geo.'.png" alt="'.$fullgeo.'"></span>';
echo "</b></a></td>"; 
   
   
  
foreach ($ranked as $rkilled => $rnk){
  if($kills >= $rkilled)
  {  $rankx = $rnk;
						   $zx = explode("rank:", $rankx);
						   $fld = $zx[1];
						   $rankxx = strtok($fld, " ");
						   
						   $zx = explode("image:", $rankx);
						   $fld = $zx[1];
						   $rankimg = strtok($fld, " ");
						   
						   $zx = explode("name:", $rankx);
						   $fld = $zx[1];
						   $rankname = strtok($fld, " ");
  }}
  
  if(empty($rankimg))
	  $rankimg = 'null.png';
    if(empty($rankname))
	  $rankname = '0';
      if(empty($rankxx))
	  $rankxx = '0';

echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&nbsp;
<span tooltip=".$rankname."><img src=\"".$ssylka_na_ikonki."img/ranks/".$rankimg."\" width=\"20px\" alt=\"".$rankname."\" title=\"".$rankname."\"></span>
<b style=\"font-size:13px;color:".$color_prestige.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_prestige.", 0 0 2px ".$color_prestige.", 0 0 1px ".$color_prestige.", 0 0 2px ".$color_prestige.", 0 0 3px ".$color_prestige.";\">".$rankxx." </b></td>"; 
    
if((prestige_image($prestige)) == 'prestige/null.png')  
 $prestigstyle = 'style="filter: alpha(Opacity=20);opacity: 0.2;"';
else
	$prestigstyle = '';
    
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&nbsp;   
<img src=\"".$ssylka_na_ikonki."img/".prestige_image($prestige)."\" width=\"20px\" alt=\"".prestige_image($prestige)."\" title=\"".prestige_image($prestige)."\" ".$prestigstyle."> 
</td>";     
   
  
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<a href=\"".$ssylka_na_stats."?search=".$guid."&main=".$chatdbarc."\">
<b style=\"color:".$color_nickname.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 2px #000, 0 0 2px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
<span tooltip=".$guid.">".$playername."</span></b></a></td>"; 


 
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:".$color_kills.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_kills.", 0 0 2px ".$color_kills.", 0 0 1px ".$color_kills.", 0 0 2px ".$color_kills.", 0 0 3px ".$color_kills.";\">
".$kills."</b></td>"; 
   
 
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:".$color_deaths.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_deaths.", 0 0 2px ".$color_deaths.", 0 0 1px ".$color_deaths.", 0 0 2px ".$color_deaths.", 0 0 3px ".$color_deaths.";\">
".$deaths."</b></td>"; 
  
 
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:".$color_kdratio.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 30px #000, 0 0 4px ".$color_kdratio.", 0 0 7px ".$color_kdratio.", 0 0 13px ".$color_kdratio.", 0 0 40px ".$color_kdratio.", 0 0 21px ".$color_kdratio.";\">
".$rrattio."</b></td>"; 
 
 
  
 if (!empty($search))
 $procent =  "<center>&emsp;<b style=\"color:".$color_heads."; color: Silver; font-family: Titillium Web; font-size: 15px; text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 4px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 1px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 3px ".$color_heads.";\">".$heads."</b></br>&emsp;
<b style=\"color: #777777; font-family: Impact; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\">".$procent."</b></center>"; 
else
	$procent = "<b style=\"color: Silver; font-family: Titillium Web; font-size: 15px; text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 4px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 1px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 3px ".$color_heads.";\">&emsp;".$procent
."</b>";

echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9;\">
<span tooltip=\"$heads\">".$procent."</span></td>";
  
 
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:black; text-shadow: 0 0 1px black, 0 0 2px green, 0 0 30px green, 0 0 4px green, 0 0 7px green, 0 0 13px green, 0 0 40px green, 0 0 11px green;\">
".(floor($skill*1000)/1000)."</b></td>";
 
 
 

if (empty($search)){
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:".$color_knife.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_knife.", 0 0 2px ".$color_knife.", 0 0 1px ".$color_knife.", 0 0 2px ".$color_knife.", 0 0 3px ".$color_knife.";\">
".$melle."</b></td>";
}

if (!empty($search)){
	$fgfps = "<b style=\"font-size: 14px;color:#000;text-shadow: 0 0 1px lime, 0 0 2px #000, 0 0 3px lime, 0 0 2px ".$color_suicids.", 0 0 2px ".$color_suicids.", 0 0 1px ".$color_suicids.", 0 0 2px ".$color_suicids.", 0 0 3px ".$color_suicids.";\">
&emsp;Fps: ".$fps."</br>&emsp;Ping: ".$ping."</b>";
 

echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">
 ".$fgfps."
 </td>";
}


if (!empty($search)){
if(empty($search_suecides)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> &emsp;
".$suicids."
</td>";
}



echo "<td tooltip=".$lasttime." style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 13px;font-size:".$auto_font.";\"> 
  
       &emsp;<span style=\"color:#d17519;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> Ago: </span> | 
	         <span style=\"color:yellow;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> ".$timee2."&emsp;</span>
  </br>&emsp;<span style=\"color:#86b300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> &emsp; Total: </span> |
             <span style=\"color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$lasttime2."&emsp;</span>

</td>";
	  
	  
	  
	  echo "</tr>";	

if(!empty($search))
echo '</table>';



echo'

    <tr bgcolor="#f0f0f0">';
	
 if (!empty($search)) 
include("functions/weapons_table.php");	 
	
echo'
</tr>
	
';








	
			 }



echo '</table>';














 

















 
 

 	






	
 // if(!empty($key))
 //  echo '</div>';
	
// if ($currentDateTime >= $startDateTime && $currentDateTime <= $endDateTime) {
 //echo "Сейчас чистим : " . date("Y-m-d H:i:s", $currentDateTime) ."\n";
// $bdd->exec("DELETE FROM chat WHERE text = '0' and nickname = '0'");
//}

if (!$reponse) {
    echo "\nPDO::errorInfo():\n";
    print_r($bdd->errorInfo());
}

$reponse->closeCursor();
$reponse = null;
}
catch(Exception $e)
{
    
    die('Errors : '.$e->getMessage());
}


$fff = $top_main_total - $ssssob;

$t = 0;
for ($i = 1 ; $i <= $nb_pages ; $i++)
{
    $t++;
	
	if (empty($search)){
		
		if (($nb_pages == $page) && ($nb_pages == $t))
		{
			  
			for ($k = 1 ; $k <= $fff; $k++)
			{
		 if($top_main_total < $ssssob + 10)
		  echo '</br>';
	        }
		 
		 }
	}	
}	

echo '<br/><div class="footerx"><div class="footer">';

if (is_numeric($key))	
$pageskey = '<a href="'.$ssylka_na_stats.'?pass=' . $passsword .'&server=' . $server .'&search=' . $search .'&xgeo=' . $search_geo .'&timeh=' . $timesearch .'&kills=' . $search_kills .'&deaths=' . $search_deaths .'&ip=' . $search_ip.'&main=' . $chatdbarc.'&page=';    
 else if  ((($search_kills == 'sort') && (!empty($server))))
 {
	$search_kills = '0';
$pageskey = '<a href="'.$ssylka_na_stats.'?server=' . $server .'&knife='. $search_knife .'&search=' . $search .'&xgeo=' . $search_geo.'&skill=' . $search_skill.'&headhots=' . $search_heads .'&timeh=' . $timesearch .'&kills=' . $search_kills .'&ratios='. $search_ratiokd .'&deaths=' . $search_deaths.'&page=';
 }
 else
$pageskey = '<a href="'.$ssylka_na_stats.'?server=' . $server .'&knife='. $search_knife .'&search=' . $search .'&xgeo=' . $search_geo.'&skill=' . $search_skill.'&headhots=' . $search_heads .'&timeh=' . $timesearch .'&kills=' . $search_kills .'&ratios='. $search_ratiokd .'&deaths=' . $search_deaths.'&page=';

  
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


echo "</br><span style=\"color:#006699;text-decoration:underline;cursor:pointer;font-size:11px;\" onclick=\" document.getElementById('instruction').style.display = (document.getElementById('instruction').style.display=='none'?'inline':'none');\">
                Все страницы</span>";
echo '<div id="instruction" style="display: none; width: 100%;"></br></br>';	

$t = 0;
for ($i = 1 ; $i <= $nb_pages ; $i++)
{
    $t++;
		$pi = $i;
		
	  if(!empty($_GET['page']))
		if(($_GET['page']) == $i)        // font-size: 16px;
			$pi = '<b class="flashingf">&nbsp;'.$i.'&nbsp;</b>';             	
if(!empty($search_nickname))
	$search_nickname = $search;
echo '&nbsp;'.$pageskey.$i.'">' . $pi.  ' </a> ';       
		}
echo '</div>';
		
echo '</br></br> <a href="#" style="font-size:13px; font-family: Ariel;">Время генерации: ' . ( microtime(true) - $startx ) . ' сек. </a>';	
echo "</br> <a href=\"#\" style=\"font-size:13px; font-family: Ariel;\">Cached with $xcache_time s.</a>";


if((!empty($key)) || (!empty($_COOKIE['user_online_x']))){
	echo '</br><div class="footerxx"><div class="footer2">';
/*
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];
 
if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
else $ip = $remote;
*/
//$linkhere = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//logFile(' '.$xz.' - '.$key.' IP - '.$ip.' Url - '.$linkhere);	
$chat_archive = 'chat_archive/';
echo "</br></br></br>"; 
$dir  = $chat_archive;
$files = scandir($dir);
foreach ($files as $keye => $valuee) {
	if(strlen($valuee) > 5)
    echo '<a href="'.$ssylka_na_ikonki.$chat_archive.$valuee.'">'.$valuee.'</a> <br/>';
}	 	
echo '</div></div>';
}

echo '</div></div></br>';

echo '

<embed src="'.$ssylka_na_ikonki.'img/x.mp3" autostart="true" hidden="true" loop="false" width="3" height="2" align="bottom"> </embed>

<div style="visibility: hidden;">
<audio controls autoplay>
  <source src="'.$ssylka_na_ikonki.'img/x.mp3" type="audio/mp3">
  Your browser does not support the audio element.
</audio>
</div>

';

echo '</br></br>  
<!--RECOD.RU Call Of duty game series chat parser by LA|ROCCA --> ';
if(empty($key))
{
 $handle = fopen($cache_file, 'w'); // Открываем файл для записи и стираем его содержимое
  fwrite($handle, ob_get_contents()); // Сохраняем всё содержимое буфера в файл
  fclose($handle); // Закрываем файл
  ob_end_flush(); // Выводим страницу в браузере 
}
?>
</div></body>
</html>		