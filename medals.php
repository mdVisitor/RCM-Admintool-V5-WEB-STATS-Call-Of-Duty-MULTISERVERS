<?php
error_reporting(E_ALL);
///ini_set("display_errors",0);
///error_reporting(0);

if(empty($_SERVER["HTTP_USER_AGENT"]))
	$_SERVER["HTTP_USER_AGENT"] = 'aweac1awec0wgb8sw5se45';
$player_place_skillall = 0;
$player_place_killsall = 0;
$player_place_headsall = 0;
$player_place_skill = 0;
$player_place_kills = 0;
$player_place_heads = 0;
$paages = 0;
		//$dataPoints0 = 0;
		//$dataPoints1 = 0;
//$guider = 0;
session_start(); 
$guidy = 0;
$yip = 1000;
$prestige = 0;

function hx($sc)
 {
  $sc = str_replace(array(
    "medals.php"
  ), '', $sc);
  return $sc . "";
 }
$x_ff  = 0;
$cpath = hx(__FILE__);

$crn_v = $cpath."databases/cached_players_count/";	
if(!file_exists($crn_v))
	mkdir($crn_v, 0777, true);
$crn_s = $cpath."databases/cached_places/";	
if(!file_exists($crn_s))
	mkdir($crn_s, 0777, true);

$key = '';
$startx = microtime(true);
$today = date("Y-m-d");
include("login.php");
$access = '2asdasdwq3dxaezw234cz234xczwrvzsr3cvzs3r5czsr';
include("index_chat_cfg.php");
//include_once("functions/chatdb_archive.php"); 
include_once("functions/functions.inc.php"); include_once("langctrl.php");  
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

if (!empty($_COOKIE['user_online_login'])){		
foreach ($steam_users_id as $passw => $xy){
	$md5session = md5($_COOKIE['user_online_login']);
  if($md5session == md5($passw))
  {
	  $key=1;
	  $xz = $xy;
  }
  
  }} else $key = '';	
  
 

if (is_numeric($key))
	$key = $key.'.1';
 
if(((!empty($key)) && (empty($_GET['logout']))) || ((!empty($_COOKIE['user_online_login'])) && (empty($_GET['logout'])))){ //| права на базу данных => '.substr(sprintf('%o', fileperms($stats_db_path)), -4).' 
	
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

if(((!empty($key)) && (empty($_GET['logout']))) || ((!empty($_COOKIE['user_online_login'])) && (empty($_GET['logout'])))){ //| права на базу данных => '.substr(sprintf('%o', fileperms($stats_db_path)), -4).' 
	$adminpl = '|<a href="'.$ssylka_na_codbox.'adminpanel.php?adminpanel='.$xz.'" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 16px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">АдминПанель</a>
	<a href="'.$ssylka_na_codbox.'?logout=logout&lg#Logout!" onclick="location.reload()" style="color:#000;text-shadow:0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #ffa500, 0 0 7px #ffa500, 0 0 16px #ffa500, 0 0 40px #ffa500, 0 0 65px #ffa500;" >Logout!</a>';
}else 
	$adminpl = '|<a href="'.$ssylka_na_codbox.'adminpanel.php" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 16px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">Логин</a>';


if (((!empty($_GET['logout'])) && (!empty($_SESSION['username']))) || ((!empty($_GET['logout'])) && (!empty($_COOKIE['user_online_login']))))
{	
echo 'Админ - '.$key.' вышел :)';
setcookie ( 'user_online_login', '', time()-2 );
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

if (!empty($_GET['killmin'])) 
   $search_kills_min = $_GET['killmin']; 
else
  	$search_kills_min = 0;
 

if (!empty($_GET['headhotsperc'])) 
   $search_heads_percents = $_GET['headhotsperc']; 
else
   $search_heads_percents = 0;


if (!empty($_GET['accuaraccyyperc'])) 
   $search_accuaraccyyperc = $_GET['accuaraccyyperc']; 
else
   $search_accuaraccyyperc = 0;


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
$top_main_total=20;

 
if (!empty($_GET['search']))
{	
   $search_nickname = $_GET['search']; 
   $search_nickname = trim($search_nickname);
}
else
  	$search_nickname = 0;


if (!empty($_GET['srch'])){
    $search_b = $_GET['srch']; 
	   $search_b = trim($search_b);
}else
  	$search_b = 0;



  if(14>(strlen($search_b)))
  {
if (!empty($_GET['srch'])){ 
   $search_nicknamev = $_GET['srch']; 
    $search_nicknamev = trim($search_nicknamev);
}else
  	$search_nicknamev = 0;
  }

///03.05.2019
if (!empty($_GET['pgsearch'])) {
   $pgsearch = $_GET['pgsearch'];
   $search = 1;  
}else
  	$pgsearch = 0;

 

if (!empty($_GET['time'])) 
   $search_time = $_GET['time']; 
else
  	$search_time = 0;

if (!empty($_GET['timeh'])) 
$timesearch = $_GET['timeh'];
else
  	$timesearch = 0;
  
   if (empty($_GET['page']))
     $cache_time = 180;
  else
   $paages = $_GET['page'];	 


//if($paages < 1)
//$top_main_total=20;
 
 
 
  if (empty($_GET['server']))
  {
$cache_time = 180; 
$server = 0;
  }
   else
	$server = $_GET['server']; 

if (!empty($paages)){
	if($paages < 3)
  $cache_time = 180; 
    else
		$cache_time = 180*$paages;}

if (!empty($_GET['search']))
  $cache_time = 30; 

 
if (!empty($server))
		$cache_time = 180; 

if (empty($cache_time))
if (!empty($server))
	$cache_time = 300;

    $cc = round($cache_time, 0);       
    $xcache_time = $cc;

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
else
{
$cache_time = 180;	
  $file = "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  $filemd5 = md5(md5($file.$xz)); 
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
 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="robots" content="noindex,nofollow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title><?php echo $title_zagolovok_stranicy ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_codbox;?>css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_codbox;?>css/recod-ru.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_codbox;?>css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_codbox;?>css/tooltip-classic.css" />	
<script src="<?php echo $ssylka_na_codbox;?>css_js/RGraph/libraries/RGraph.svg.common.core.js"></script>
<script src="<?php echo $ssylka_na_codbox;?>css_js/RGraph/libraries/RGraph.svg.common.key.js"></script>
<script src="<?php echo $ssylka_na_codbox;?>css_js/RGraph/libraries/RGraph.svg.common.tooltips.js"></script>
<script src="<?php echo $ssylka_na_codbox;?>css_js/RGraph/libraries/RGraph.svg.line.js"></script>

<script src="<?php echo $ssylka_na_codbox;?>css_js/RGraph/libraries/RGraph.common.core.js"></script>
<script src="<?php echo $ssylka_na_codbox;?>css_js/RGraph/libraries/RGraph.common.dynamic.js"></script>
<script src="<?php echo $ssylka_na_codbox;?>css_js/RGraph/libraries/RGraph.meter.js"></script>


  <!-- Stylesheet -->
  <link rel="stylesheet" href="<?php echo $ssylka_na_codbox;?>css/pure-css-progress/assets/fonts/font-awesome-4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $ssylka_na_codbox;?>css/pure-css-progress/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo $ssylka_na_codbox;?>css/pure-css-progress/assets/css/cssprogress.css">

		
        <script type="text/javascript" src="<?php echo $ssylka_na_codbox;?>css_js/saturnx.js" async defer></script>
		<script type="text/javascript" src="<?php echo $ssylka_na_codbox;?>css_js/virus.js"></script>
		<script type="text/javascript" src="<?php echo $ssylka_na_codbox;?>css_js/html2canvas.js"></script>

          <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
		
		
        <!-- ТОЛКО ПОСЛЕ ВСЕХ jquery -->  
        <script src="<?php echo $ssylka_na_codbox;?>css_js/hBarChart.js"></script>	
       
	   <!-- <script src="<?php echo $ssylka_na_codbox;?>css_js/stax.js"></script> -->
	   
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
        bgColor: '#47689f',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#38537f',
            text: 'white'
        }
    });
})

$(function() {
    $("ul.chart").hBarChart();
    $("ul.chartday").hBarChart({
        bgColor: '#556211',
        textColor: '#fff',
        show: 'data',
        sorting: true,
        maxStyle: {
            bg: '#889d1b',
            text: 'white'
        }
    });
})  
</script>   
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->		

<style>
@keyframes rotateWordsSecond {
    0% { opacity: 1; animation-timing-function: ease-in; width: 0px; }
    10% { opacity: 0.3; width: 0px; }
    20% { opacity: 1; width: 100%; }
    27% { opacity: 0; width: 100%; }
    100% { opacity: 0; }
}
keyframes rotateWordsFirst {
    0% { opacity: 1; animation-timing-function: ease-in; height: 0px; }
    8% { opacity: 1; height: 16px; }
    19% { opacity: 1; height: 16px; }
    25% { opacity: 0; height: 16px; }
    100% { opacity: 0; }
}
.rw-words-1 span{
	animation: rotateWordsFirst 12s linear infinite 0s;
}
.rw-words-2 span{
	animation: rotateWordsSecond 12s linear infinite 0s;
}

.rw-words span:nth-child(2) { 
	animation-delay: 3s; 
	color: #FFF;
	background-color: black;
}
.rw-words span:nth-child(3) { 
	animation-delay: 6s; 
	color: #FFF;
    background-color: black;	
}
.rw-words span:nth-child(4) { 
	animation-delay: 9s; 
	color: #FFF;
    background-color: black;	
}
.rw-words span:nth-child(5) { 
	animation-delay: 12s; 
	color: #FFF;
    background-color: black;	
}
 
.rw-words span{
	position: absolute;
	opacity: 0;
	overflow: hidden;
	color: #FFF;
	margin-bottom: 45px;	
}
 .rw-words{ 
	display: inline;
	text-align: left;
	margin-right: 45%;
    margin-bottom: 45px;
	color: #FFF;
}
   .rw-sentence span{  
	position: absolute;   
	white-space: nowrap;
	font-weight: normal;
}
     
.rw-sentence{
	text-align: left;
}
     
.rw-wrapper{
	width: 50%;
	position: relative;
	margin: 20px auto 0 auto;
	font-family: 'Bree Serif';
	padding: 10px;
}
</style>

<style>

    div#cc1 {
		 
        width: 1050px;
        height: 250px;
    }

    div#cc2,
    div#cc3,
    div#cc4,
    div#cc5,
    div#cc6,
    div#cc7 {
        position: relative;
        float: left;
        width: 265px;
        height: 90px;
        border-right: 1px solid #ccc;
        box-sizing: border-box;
        margin-bottom: 15px;
    }
</style>

<style>

.glown0 {
    -webkit-animation: glown0 3.7s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown0 {
    0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
}

.glown1 {
    -webkit-animation: glown1 3.6s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown1 {
    0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
}


.glown2 {
    -webkit-animation: glown2 3.5s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown2 {
    0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
}

.glown3 {
    -webkit-animation: glown3 3.4s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown3 {
     0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
}

.glown4 {
    -webkit-animation: glown4 3.3s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown4 {
    0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
}
 
 
 .glown5 {
    -webkit-animation: glown5 3.2s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown5 {
    0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
}
 
 .glown6 {
    -webkit-animation: glown6 3.1s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown6 {
    0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
}
 
 
.glown7 {
    -webkit-animation: glown7 3s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown7 {
    0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
} 
 
.glown8 {
    -webkit-animation: glown8 2.9s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown8 {
    0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
}  
 
.glown9 {
    -webkit-animation: glown9 2.8s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.5;
}
@-webkit-keyframes glown9 {
    0% { 
        opacity: 0.3;

    }
    10% { 
        opacity: 0.5;

    }
    20% { 
        opacity: 0.7;

    }	
    60% { 
        opacity: 1.0;

    }
	80% { 
        opacity: 0.7;

    }
    90% { 
        opacity: 0.5;

    }	
    100% { 
        opacity: 0.2;

    }
}   
 
@keyframes pulsate{50%{color:#fff;text-shadow:0 -1px rgba(0,0,0,.3),0 0 5px #7CFC00,0 0 8px #7CFC00;}
}
#tel {
    color: rgb(34,139,34);
    text-shadow: 0 -1px rgba(0,0,0,.1);
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    -webkit-animation: pulsate 2.1s linear infinite;
    animation: pulsate 2.1s linear infinite;
}

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

 

.containerx {
width: 980px;	
position: relative;
top: -5px;

}

.containert {
position: absolute;
    margin-left: auto;
    margin-right: auto;
}

.headshot {
  position: absolute;
  top: 8px;
  left: 48%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;
}

.neck {
  position: absolute;
  top: 48px;
  left: 48%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;  
}


.torso_upper {
  position: absolute;
  top: 77px;
  left: 48%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;
 
}


.torso_lower {
  position: absolute;
  top: 115px;
  left: 48%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;
}


.right_arm_upper {
  position: absolute;
  top: 72px;
  left: 28%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}


.right_arm_lower {
  position: absolute;
  top: 103px;
  left: 17%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.right_hand{
  position: absolute;
  top: 133px;
  left: 8%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_arm_upper {
  position: absolute;
  top: 72px;
  right: 28%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}


.left_arm_lower {
  position: absolute;
  top: 103px;
  right: 17%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_hand{
  position: absolute;
  top: 133px;
  right: 8%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.right_leg_upper{
  position: absolute;
  top: 170px;
  left: 38%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.right_leg_lower{
  position: absolute;
  top: 210px;
  left: 35%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.right_foot{
  position: absolute;
  top: 260px;
  left: 34%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_leg_upper{
  position: absolute;
  top: 170px;
  right: 36%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_leg_lower{
  position: absolute;
  top: 210px;
  right: 32%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

}

.left_foot{
  position: absolute;
  top: 260px;
  right: 30%;
  color: #8cff40;
  text-shadow: 0 0 10px #000, 0 0 20px #000, 0 0 30px #000, 0 0 20px #000, 0 0 20px #000, 0 0 10px #000, 0 0 20px #000, 0 0 3px #000;

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



if (($_GET['theme']) == 'dark') {
$colortdztwo = '#333';	
$colortdzone = '#222';
$colortdzzero = '#111';
$color_heads = 'black';
$color_kdratio = "#2bb724";
$color_deaths = '#3d6d8e';
$color_kills = '#619fc9';
$color_medals = 'white'; 
$color_medals_nom = 'white'; 
$color_medals_action = 'yellow';
$color_skillers = 'black';
$color_date_timep = '#d17519';
$color_date_timepp = '#86b300';
$color_cip = 'green';

	?>
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
 min-width: 1100px; 
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
	
$colortdztwo = '#55526a';


$colortdzone = '#c7d0e5';
$colortdzzero = '#eeeeee';

$color_heads = 'black'; 
$color_kdratio = "#f9c368";
$color_deaths = '#bdc8ff';
$color_kills = '#b8ff95'; 
$color_medals = 'black';
$color_medals_nom = 'black'; 
$color_medals_action = '#bc3a08';
$color_skillers = 'white';
$color_date_timep = 'white';
$color_date_timepp = 'silver';
$color_nickname = 'white';
$color_prestige = 'white';
$color_cip = 'white';
	
?>
<style>
body{
  transition:0;
  background-color:#dedede; /* #002600 */
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
 min-width: 1100px;  
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
foreach ($ssylki_array as $arxx => $namessylka) {	
   echo '<li>| <a href="'.$arxx.'" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #FFF, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;" target="_blank">'.$namessylka.'</a></li>';   
} echo '</br>';	

	 $df = 0; 
 $dfx = 0;
foreach ($multi_servers_array as $arx => $xservername) {
	++$df;if($df > 10){echo '</br>'; $df = 0; ++$dfx;}
						   $zx = explode("server_md5:", $arx);
						   $fld = $zx[1];
						   $server_md5 = strtok($fld, " ");
   echo '<li>| <a href="'.$ssylka_na_codbox.'medals.php?server='.$server_md5.'&skill=sort">'.$xservername.'</a></li>';   
}
?>
        </ul>

    </div>
</div></div>


<?php

if($dfx == 1)
echo '</br></br></br></br>';
else if($dfx == 2)
	echo '</br></br></br></br></br>';
else if($dfx == 3)
	echo '</br></br></br></br></br></br>';
?>


 <div id="blockx">	
<div class="absolute-style"> 
<?php
echo '<a href="'.$ssylka_na_codbox.'medals.php?main='.$chatdbarc.'&skill=sort" style="padding-top: 40px;"> '. $main_servername . '</a>';



 if((!empty($key)) || (!empty($_COOKIE['user_online_login']))){	 
/*$seuiotf = substr(sprintf('%o', fileperms($stats_db_path)), -4);	
if($seuiotf != '0666')
chmod($stats_db_path, 0666);
*/
	 	 
       $dawDe = "<span tooltip=\"".$take_screen."\"><a href=\"".$ssylka_na_codbox."upload/index.php\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:".$cvet_text.";\"> <img src=\"".$ssylka_na_codbox."img/s_icon.png\" height=\"48px\" width=\"48px\"> </a></span>";	
?>
<span tooltip="Создать скриншот в один клик!">
<form class="button2" name="allsearch" method="get" action="<?php echo $ssylka_na_codbox;?>upload/index.php">
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
 <input class="button flashing" type="search" name="srch">
  </form> </a></span>
     
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
 
 	

			<h2><div class="abs-center time">
	<!-- <canvas id="canvas">Canvas is not supported by your browser.</canvas>-->
	</div> 
			</div></h2>
      
	   
	   <div class="rela-block flex-container button-container"><?php echo '&emsp;&emsp;'.$adminiinfo ?>
        </div>		
		
		
		
<?php
}
else
$search = $_GET['search'];
?>

 


<div id="blockx">
<?php

if(!empty($_SERVER["HTTP_USER_AGENT"])){
 $user_agent = $_SERVER["HTTP_USER_AGENT"];
  if (strpos($user_agent, "Firefox") !== false)  $browser = "Firefox";
  elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
  elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
  elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
  elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
  else $browser = "Неизвестный";
  //echo "Ваш браузер: $browser ";
   
  if ((strpos($_SERVER["REQUEST_URI"], '/medals.php?server=') !== false)||(strpos($_SERVER["REQUEST_URI"], '&main=0&server=2') !== false)) {
  
if($browser == "Firefox")
	echo '<br/><br/><br/>';
else
	echo '<br/><br/>';
  }else{
	  
if($browser == "Firefox")
	echo '<br/><br/><br/><br/>';
else
	echo '<br/><br/><br/>'; 
	  
  }
}else
	echo '<br/><br/><br/>';

$dtx2  = date('Y-m-d');

$psx = 0;
$psxz = 0;



$finder = 0;


if(!empty($_GET['info']))
{
	$infomore = $_GET['info'];
}
else 
	$infomore = '0';



$yosearch= '';



 if(!empty($_GET['srch']))
 {
$search = $_GET['srch'];
$infomore = 'min' ;
 }

 
 
if($infomore == 'min')
{
	


             $finder = $search;
			 $_GET['search'] = $finder;
			 $search= '';
			 echo '<br/><br/><br/>';
	
	
	
}
else if($infomore == 'max')
{
	

       $yosearch = $_GET['search'];
	   $search_nickname = '';
	   $psx = 1;
	
	
	
}
else
{
	
	
if (!empty($search))
{
	//$search = trim($search);
  if(((23>(strlen($search))) && (12<(strlen($search)))) && (ctype_digit($search)))
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

 

			
$crn_bf = $cpath."databases/cached_players_count/players_count.log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
$re=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1");
$total_mess = $re->fetch();
$killers=$total_mess['id'];

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $killers);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
  //echo time()-$filemtime;
   
      if (time()-$filemtime > 36400)  //21600  4 hours   //86400 24h
			{	
 
$re=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1");
$total_mess = $re->fetch();
$killers=$total_mess['id'];

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $killers);	
fclose($fpl);
			}
			
$fpl = file($crn_bf);
$killers = $fpl[0];



// }
/**/





/*
if($killers>900)
  $kills_limiter_top = round($killers/5); // Убираем нагрузки, от фрагов в топе
else if($killers>800)
  $kills_limiter_top = round($killers/6); // Убираем нагрузки, от фрагов в топе
else if($killers>700)
  $kills_limiter_top = round($killers/7); // Убираем нагрузки, от фрагов в топе
else if($killers>600)
  $kills_limiter_top = round($killers/8); // Убираем нагрузки, от фрагов в топе
else if($killers>500)
  $kills_limiter_top = round($killers/9); // Убираем нагрузки, от фрагов в топе
else if($killers>400)
  $kills_limiter_top = round($killers/10);
else if($killers>300)
  $kills_limiter_top = round($killers/15);
else if($killers>200)
  $kills_limiter_top = round($killers/20);
else if($killers>100)
  $kills_limiter_top = round($killers/25);
else 
	*/

if(empty($killers))
	$killers = 1000;

  $kills_limiter_top = round($killers/40);


//include_once("functions/db_msql_stats.php");	

//$total_messages = $reponse->fetch();
//$kolichestvi_soobsh=$total_messages['id']; 
$kolichestvi_soobsh=500; 

$nb_pages = ceil($kolichestvi_soobsh / $top_main_total); 
echo '<div align="center">';
 
if (isset($_GET['page'])){$page = $_GET['page']; }else {$page = 1; }
$premierMessageAafficher = ($page - 1) * $top_main_total;
//$reponse->closeCursor();
//$reponse = null;


	
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
 
 //echo '</br></br> <a href="#" style="font-size:13px; font-family: Ariel;">Время генерации: ' . ( microtime(true) - $startx ) . ' '.$t_tsek.' </a>';	
 
  
  
  
  
  
  
  
  
  
 
 
if((empty($paages))|| ($paages == 1)){ 
if ((strpos($_SERVER["REQUEST_URI"], '/medals.php?main=0&skill=sort') !== false) || ((strpos($_SERVER["REQUEST_URI"], '&skill=sort') !== false)&&(!empty($server))))
{
	
 if ((strpos($_SERVER["REQUEST_URI"], '&skill=sort') !== false)&&(!empty($server)))
 echo '</br>';	
	 
if(file_exists($stats_db_path_month)){
 
 	if (strpos($_SERVER["REQUEST_URI"], '/medals.php?main=0&skill=sort') !== false)
 	//   $rs = $dbm3day->query("SELECT servername,s_pg,w_port,s_player,s_kills,s_deaths,s_heads,s_lasttime,
   //w_guid FROM db_stats_day WHERE s_kills ORDER BY (s_kills+0) DESC LIMIT 3");
   
   
$rs = $dbm3day->query("SELECT P.servername,P.s_pg,P.w_port,P.s_player,P.s_kills,P.s_deaths,P.s_heads,P.s_lasttime,C.s_guid
      FROM db_stats_day P INNER JOIN db_stats_0 C 
	     ON P.s_pg = C.s_pg ORDER BY (s_kills+0) DESC LIMIT 3");
   
   
   
	else if((strpos($_SERVER["REQUEST_URI"], '&skill=sort') !== false)&&(!empty($server)))
	//   $rs = $dbm3day->query("SELECT servername,s_pg,w_port,s_player,s_kills,s_deaths,s_heads,s_lasttime,
  // w_guid FROM db_stats_day WHERE s_kills and w_port='$server' ORDER BY (s_kills+0) DESC LIMIT 3");
  
         $rs = $dbm3day->query("SELECT P.servername,P.s_pg,P.w_port,P.s_player,P.s_kills,P.s_deaths,P.s_heads,P.s_lasttime,C.s_guid
      FROM db_stats_day P INNER JOIN db_stats_0 C 
	     ON P.s_pg = C.s_pg WHERE P.w_port='$server' ORDER BY (s_kills+0) DESC LIMIT 3");
 
 $sss=0;
 
 
 foreach ($rs as $row){	 

	++$sss;
                $serverx    = $row['servername']; 
                $csi_pg       = $row['s_pg']; 
				$cntz       = $row['w_port'];
                $playername = $row['s_player'];
                $kills      = $row['s_kills'];
                $deaths     = $row['s_deaths'];				
                //$suicids    = $row['s_suicids'];				
                $heads      = $row['s_heads'];
                $lasttime   = $row['s_lasttime'];
                $guidi[]       = $row['s_guid'];
 
	 
	            $jarr_playername[] = $playername;
	            $akills[]      = $kills;
				$iarr_deaths[]     = $deaths;
				$iarr_sss[]        = $sss;
				$cs_pgi[]        = $csi_pg;
                //$iarr_cfour[]      = $cfour;				
           }
}		   
		   
if(!empty($akills[2])){
 echo '</br></br><section style="opacity: 0.6; width:70%; margin-top: -40px; margin-left: -40px;"><div class="container">
 <div class="col-md-6"><div><ul class="chartday">'; 		

 
$o = 0;
while ($o <= 2) {
   

echo '<li data-data="'.$akills[''.$o.''].'" sd-sd="22"> #'.$iarr_sss[''.$o.''].'<b>
 <a href="'.$ssylka_na_codbox.'stats.php?search='.$cs_pgi[''.$o.''].'&main='.$chatdbarc.'&info=max" style="font-size: 15px; font-family: Impact; color:black;
 text-shadow: 0 0 1px #fff, 0 0 2px #00cc00, 0 0 10px #fff, 0 0 4px #00cc00, 0 0 3px #fff, 0 0 6px #00cc00, 0 0 10px #fff, 0 0 15px #00cc00;
 ">'.html_entity_decode($jarr_playername[''.$o.'']).'</a>
 &emsp;</b>
<b> '.$t_kills.':</b> <b style="opacity: 0.9; color:lime;">'.$akills[''.$o.''].'</b>';
//echo '<b>'.$t_deaths.':</b> <b style="opacity: 0.9; color:lime;">'.$iarr_deaths[''.$o.''].'</b>
  


// if (strpos($_SERVER["REQUEST_URI"], '/stats.php?main=0') !== false) 
// echo '<strong style="opacity: 0.8; font-family: Ariel; color:white; font-size: 15px; text-shadow: 0 0 1px #fff, 0 0 2px #00cc00, 0 0 10px #00cc00, 0 0 4px #00cc00, 0 0 3px #00cc00, 0 0 6px #00cc00, 0 0 10px #00cc00, 0 0 15px #00cc00;"> TOP TODAY GENL</strong></li>';
//else
echo '<strong style="opacity: 0.8; font-family: Ariel; color:white; font-size: 15px; text-shadow: 0 0 1px #fff, 0 0 2px #00cc00, 0 0 10px #00cc00, 0 0 4px #00cc00, 0 0 3px #00cc00, 0 0 6px #00cc00, 0 0 10px #00cc00, 0 0 15px #00cc00;"> '.$t_top_today.'</strong></li>';

  

$o++;
}


 
 echo '</ul></div></div></div></section>'; 
} 

 
}else{echo '</br>';}
  ///////////////////// DAY TOP
    ///////////////////// DAY TOP
	  ///////////////////// DAY TOP
	    ///////////////////// DAY TOP
		  ///////////////////// DAY TOP
		    ///////////////////// DAY TOP 
 
   
  ///////////////////// DAY TOP
  ///////////////////// DAY TOP
  ///////////////////// DAY TOP
  ///////////////////// DAY TOP
  ///////////////////// DAY TOP  
  
  //$today = '2019-03-29';
  
  
  
if ((strpos($_SERVER["REQUEST_URI"], '/medals.php?main=0&skill=sort') !== false) || ((strpos($_SERVER["REQUEST_URI"], '&skill=sort') !== false)&&(!empty($server))))
{
	if(empty($akills[4])) 
 echo '</br>'; 
	 
if(file_exists($stats_db_path_week)){
 	if (strpos($_SERVER["REQUEST_URI"], '/medals.php?main=0&skill=sort') !== false)
 	   $rs = $dbw3->query("SELECT servername,s_pg,w_port,s_player,s_kills,s_deaths,s_heads,s_lasttime,w_guid FROM db_stats_week WHERE s_kills ORDER BY (s_kills+0) DESC LIMIT 3");
	else if((strpos($_SERVER["REQUEST_URI"], '&skill=sort') !== false)&&(!empty($server)))
	   $rs = $dbw3->query("SELECT servername,s_pg,w_port,s_player,s_kills,s_deaths,s_heads,s_lasttime,w_guid FROM db_stats_week WHERE s_kills and w_port='$server' ORDER BY (s_kills+0) DESC LIMIT 3");
 
 $sss=0;
 
 
 
 
 foreach ($rs as $row){	 

	++$sss;
                $serverx    = $row['servername'];
                $csy_pg       = $row['s_pg']; 				
                $cntz       = $row['w_port']; 
                $playername = $row['s_player'];
                $kills      = $row['s_kills'];
                $deaths     = $row['s_deaths'];				
                //$suicids    = $row['s_suicids'];				
                $heads      = $row['s_heads'];
                $lasttime   = $row['s_lasttime'];
                $guidt[]       = $row['w_guid'];
 
	 
	            $jarr_playernamex[] = $playername;
	            $iarr_skillx[]      = $kills;
				$iarr_deathsx[]     = $deaths;
				$iarr_sssx[]        = $sss;
				$cs_pg[]        = $csy_pg;
                //$iarr_cfour[]      = $cfour;				
           }
}		   
		   
if(!empty($iarr_skillx[2])){
 echo '</br><section style="opacity: 0.6; width:70%; margin-top: -40px; margin-left: -40px;"><div class="container">
 <div class="col-md-6"><div><ul class="chartweek">'; 		

 
$o = 0;
while ($o <= 2) {
   

 echo '<li data-data="'.$iarr_skillx[''.$o.''].'" sd-sd="22"> #'.$iarr_sssx[''.$o.''].'<b>
 <a href="'.$ssylka_na_codbox.'stats.php?search='.$cs_pg[''.$o.''].'&main='.$chatdbarc.'&info=max" style="font-size: 15px; font-family: Impact; color:black;
 text-shadow: 0 0 1px #fff, 0 0 2px #00cc00, 0 0 10px #fff, 0 0 4px #00cc00, 0 0 3px #fff, 0 0 6px #00cc00, 0 0 10px #fff, 0 0 15px #00cc00;
 ">'.html_entity_decode($jarr_playernamex[''.$o.'']).'</a>
 &emsp;</b>
<b> '.$t_kills.':</b> <b style="opacity: 0.9; color:lime;">'.$iarr_skillx[''.$o.''].'</b> '; 
//echo '<b>'.$t_deaths.':</b> <b style="opacity: 0.9; color:lime;">'.$iarr_deathsx[''.$o.''].'</b>'; 


// if (strpos($_SERVER["REQUEST_URI"], '/stats.php?main=0') !== false) 
// echo '<strong style="opacity: 0.8; font-family: Ariel; color:white; font-size: 15px; text-shadow: 0 0 1px #fff, 0 0 2px #00cc00, 0 0 10px #00cc00, 0 0 4px #00cc00, 0 0 3px #00cc00, 0 0 6px #00cc00, 0 0 10px #00cc00, 0 0 15px #00cc00;"> TOP WEEK GENL</strong></li>';
//else
echo '<strong style="opacity: 0.8; font-family: Ariel; color:white; font-size: 15px; text-shadow: 0 0 1px #fff, 0 0 2px #00cc00, 0 0 10px #00cc00, 0 0 4px #00cc00, 0 0 3px #00cc00, 0 0 6px #00cc00, 0 0 10px #00cc00, 0 0 15px #00cc00;"> '.$t_top_week.'</strong></li>';

  

$o++;
}


 
 echo '</ul></div></div></div></section>'; 
} 

}else{echo '</br>';}
  ///////////////////// WEEK TOP
    ///////////////////// WEEK TOP
	  ///////////////////// WEEK TOP
}else{echo '</br>';}
	 
 if((empty($search))&&(empty($server))){
 
/*
  if((!empty($key)) || (!empty($_COOKIE['user_online_login']))){	 
 
 echo '</br>';
   $shadow_green = 'color: #999; text-shadow: 0 0 1px #555, 0 0 2px #555, 0 0 30px #555, 0 0 4px #1f8000, 0 0 7px #1f8000, 0 0 13px #1f8000, 0 0 40px #1f8000, 0 0 21px #1f8000;';
  $shadow_red = 'color: #999; text-shadow: 0 0 1px #555, 0 0 2px #555, 0 0 30px #555, 0 0 4px #cc0032, 0 0 7px #cc0032, 0 0 13px #cc0032, 0 0 40px #cc0032, 0 0 21px #cc0032;';
  $shadow_not_click = 'color: #999; text-shadow: 0 0 1px #555, 0 0 2px #555, 0 0 30px #555, 0 0 4px #777, 0 0 7px #777, 0 0 13px #777, 0 0 40px #777, 0 0 21px #777;';
  $shadow_top_week = 'color: silver;text-shadow:0px 2px 5px #fdff00;';
  $shadow_top_month = 'color: silver;text-shadow:0px 2px 5px #fdff00;';
  
     
  echo '<table border="0"  id="container">';  
	echo "<tr>";
	

if (!empty($search_time))
$playeed = '1 h. =>'; 
 else
	$playeed = '1 h. =>';  

$dtx2  = date('Y-m-d H');

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}


echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";




if (!empty($search_time))
$playeed = '-1'; 
 else
	$playeed = '-1';  

$dtx2  = date('Y-m-d H', strtotime('-1 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";




if (!empty($search_time))
$playeed = '-2'; 
 else
	$playeed = '-2';  

$dtx2  = date('Y-m-d H', strtotime('-2 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-3'; 
 else
	$playeed = '-3';  

$dtx2  = date('Y-m-d H', strtotime('-3 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-4'; 
 else
	$playeed = '-4';  

$dtx2  = date('Y-m-d H', strtotime('-4 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";




if (!empty($search_time))
$playeed = '-5'; 
 else
	$playeed = '-5';  

$dtx2  = date('Y-m-d H', strtotime('-5 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-6'; 
 else
	$playeed = '-6';  

$dtx2  = date('Y-m-d H', strtotime('-6 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-7'; 
 else
	$playeed = '-7';  

$dtx2  = date('Y-m-d H', strtotime('-7 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";




if (!empty($search_time))
$playeed = '-8'; 
 else
	$playeed = '-8';  

$dtx2  = date('Y-m-d H', strtotime('-8 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-9'; 
 else
	$playeed = '-9';  

$dtx2  = date('Y-m-d H', strtotime('-9 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";


if (!empty($search_time))
$playeed = '-10'; 
 else
	$playeed = '-10';  

$dtx2  = date('Y-m-d H', strtotime('-10 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-11'; 
 else
	$playeed = '-11';  

$dtx2  = date('Y-m-d H', strtotime('-11 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-12'; 
 else
	$playeed = '-12';  

$dtx2  = date('Y-m-d H', strtotime('-12 hour'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";





if (!empty($search_time))
$playeed = 'Day =>'; 
 else
	$playeed = 'Day =>';  

$dtx2  = date('Y-m-d');

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";








if (!empty($search_time))
$playeed = '-1'; 
 else
	$playeed = '-1';  

$dtx2  = date('Y-m-d H', strtotime('-1 day'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";


if (!empty($search_time))
$playeed = '-2'; 
 else
	$playeed = '-2';  

$dtx2  = date('Y-m-d H', strtotime('-2 day'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-3'; 
 else
	$playeed = '-3';  

$dtx2  = date('Y-m-d H', strtotime('-3 day'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";




if (!empty($search_time))
$playeed = '-4'; 
 else
	$playeed = '-4';  

$dtx2  = date('Y-m-d H', strtotime('-4 day'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";


if (!empty($search_time))
$playeed = '-5'; 
 else
	$playeed = '-5';  

$dtx2  = date('Y-m-d H', strtotime('-5 day'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-6'; 
 else
	$playeed = '-6';  

$dtx2  = date('Y-m-d H', strtotime('-6 day'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
</center></td>";



if (!empty($search_time))
$playeed = '-7'; 
 else
	$playeed = '-7';  

$dtx2  = date('Y-m-d H', strtotime('-7 day'));

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 14px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
&emsp;</center></td>";

	  
	  echo "</tr>"; 
  echo '</table>';  
 
 
  }
 */
}
 
 
  
if(empty($search))
 echo '<table border="0"  id="container"> <div style="position: absolute;"> <canvas id="DigiRain"></canvas> <canvas id=c></canvas> </div>';  
 
 $i=0;
 $p=0;
 $ssssob = 0;
 $sort_msql_from_headers = 'sort'; 
 $pixelz = 0;
 
$h_skfld = $cpath."databases/cached_players_skill_history/";	
if(!file_exists($h_skfld))
	mkdir($h_skfld, 0777, true);

$h_sf = $cpath."databases/cached_players_skill_history_record/";	
if(!file_exists($h_sf))
	mkdir($h_sf, 0777, true);


while ($row = $reponse->fetch())	
{	

 if(!empty($search))
  echo '<table border="0"  id="container" width="90%"> <div style="position: absolute;"> <canvas id=c></canvas> </div>';              
  $guidxport  = 0;
  $prestige = 0;  
    $sk_sky = 0;
	$totalgames  = 0;
			    $guidxport  = $row['s_pg'];
                $serverx    = $row['servername']; 
                $cntz       = $row['s_port']; 
				$cntzh       = $row['s_port'];
                $playername = $row['s_player'];
                $place      = $row['w_place'];
                $kills      = $row['s_kills'];
                $deaths     = $row['s_deaths'];				
                $ratio      = $row['w_ratio'];
                $skill      = $row['w_skill'];
                $n_deaths  = $row['n_deaths'];
                $n_kills  = $row['n_kills'];
                $n_heads  = $row['n_heads'];
				$n_kills_min  = $row['n_kills_min'];
			    $totalgames   = $row['w_prestige'];
                $suicids    = $row['s_suicids'];				
                $heads      = $row['s_heads'];
				$damage      = $row['s_dmg'];
                //$nades      = $row['s_grenade'];
                $lasttime   = $row['s_lasttime'];
                $timee      = $row['s_time'];
                $guid       = $row['s_guid'];
                $geo        = $row['w_geo'];
				$fps        = $row['w_fps'];
				$ping       = $row['w_ping']; 	
                $melle      = $row['s_melle'];
				
				if(!empty($row['sort']))
				 $prestige     = $row['sort'];
			 
			 
			 	if(!empty($prestigexll))
				{
				 $row['sort'] = 99999;
                 $prestige  = 99999;  
		        }
				
				$guidr = $guid;
	
$sk_dt = 0;		
$sk_gd = 0;	
$sk_kd = 0;
$sk_sk = 0;

 
$h_skf = $cpath."databases/cached_players_skill_history/".$guidxport.".log";	
if(!file_exists($h_skf))
	touch($h_skf);

$h_jj = $cpath."databases/cached_players_skill_history_record/".$guidxport.".log";	
if(!file_exists($h_jj))
	touch($h_jj);
 
//$skdate = date('Y-m-d H:i');
$skdate = $lasttime;
  
if(filesize($h_skf) == 0)
{
	
	$fpl = fopen($h_skf, 'w+');
	fwrite($fpl, $skdate."%".$guidxport."%".$ratio."%".$skill."\n");	
    fclose($fpl);
}


$filemtime=filemtime($h_skf);

if (time()-$filemtime>= 120) 
{
$ilines = 0;
$handle = fopen($h_skf, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
		++$ilines;
		
$infr = explode("%", $line);

$sk_dt = trim($infr[0]);		
$sk_gd = trim($infr[1]);	
$sk_kd = trim($infr[2]);
$sk_sk = trim($infr[3]);	
	$recordgg[] = $sk_sk;	
    }
    fclose($handle);
}

 
 
$h_jj = $cpath."databases/cached_players_skill_history_record/".$guidxport.".log";
$handley = fopen($h_jj, "r");
if ($handley) {
    while (($liney = fgets($handley)) !== false){

    if(!empty($liney))
        $sk_sky = $liney;
    }
    fclose($handley);
}

if(!empty($sk_sky)){
if($sk_sky < max($recordgg))
{
 	$fplj = fopen($h_jj, 'w+');
	fwrite($fplj, max($recordgg)."\n");	
    fclose($fplj);	
}}


   if($ilines >= 90){
if($sk_dt != $skdate)	
{
$handle = fopen($h_skf, "r"); 
$first = fgets($handle,2048); #get first line.
$outfile="temp";
$o = fopen($outfile,"w");
while (!feof($handle)) {
    $buffer = fgets($handle,2048);
    fwrite($o,$buffer);
}
fclose($handle);
fclose($o);
rename($outfile,$file);	   
	   
if($sk_dt != $skdate)	
{	   
 	$fpl = fopen($h_skf, 'a');
	fwrite($fpl, $skdate."%".$guidxport."%".$ratio."%".$skill."\n");	
    fclose($fpl);
}	
}	
   }
   else
   {
if($sk_dt != $skdate)	
{	   
 	$fpl = fopen($h_skf, 'a');
	fwrite($fpl, $skdate."%".$guidxport."%".$ratio."%".$skill."\n");	
    fclose($fpl);
}	
   }
}





$crn_skfld = $cpath."databases/cached_players_skill/";	
if(!file_exists($crn_skfld))
	mkdir($crn_skfld, 0777, true);			
$crn_skf = $cpath."databases/cached_players_skill/".$guidxport.".log";	
if(!file_exists($crn_skf))
	touch($crn_skf);					
$filemtime=filemtime($crn_skf);
  
      if (time()-$filemtime < 600000)  // 7д.
			{	
				
if(filesize($crn_skf) == 0)
{
	
 	$fpl = fopen($crn_skf, 'w+');
	fwrite($fpl, $guidxport."%".$ratio."%".$skill);	
    fclose($fpl);
 
	}
	else
	{
		
$fpl = file($crn_skf);
$dfc = $fpl[0];

$infff = explode("%", $dfc);

$guidxport_skf = trim($infff[0]);		
$ratio_skf = trim($infff[1]);	
$skill_skf = trim($infff[2]);
	
	}
}
else if (time()-$filemtime>= 600000) 
{


 	$fpl = fopen($crn_skf, 'w+');
	fwrite($fpl, $guidxport."%".$ratio."%".$skill);	
    fclose($fpl);
}				
 
if(empty($guidxport_skf))
{				
$guidxport_skf = '';		
$ratio_skf = '';	
$skill_skf = '';
}
 
				
				
				
				
if (!empty($infomore))
{
	
//echo $guidxport.'='.$cntzh;	
//////////////////////////////////////////////////////////////////////////////////	
$crn_bf = $crn_s.$guidxport.".log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
///////LEVEL 2
 
if(empty($row['sort'])){
//$datetime = date('Y-m');
//$keyword=$datetime;

$re=$bdd ->query("SELECT sort, w_skill, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
		INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		        where db_stats_0.s_port=$cntz and DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $guidxport");

//$re=$bdd->prepare($sql);
//$re->bindValue(':keyword','%'.$keyword.'%');
//$re->execute(); 

while ($row = $re->fetch())	
{	
  $prestige = $row['sort'];
     	 
}
}

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $prestige);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
      $randomz = rand(100, 900);
	  $randomzx = $randomz + 9800;
   
      if (time()-$filemtime > $randomzx)  //21600  4 hours   //86400 24h
			{	
 
///////LEVEL 2


if(empty($search_skill)){
if(empty($row['sort'])){
//$datetime = date('Y-m');
//$keyword=$datetime;



$re=$bdd ->query("SELECT sort, w_skill, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
		INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		        where db_stats_0.s_port=$cntz and DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $guidxport");

//$re=$bdd->prepare($sql);
//$re->bindValue(':keyword','%'.$keyword.'%');
//$re->execute(); 

while ($row = $re->fetch())	
{	
  $prestige = $row['sort'];
     	 
}

}


$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $prestige);	
fclose($fpl);
			}}
			else
			{
$fpl = file($crn_bf);
if(!empty($fpl[0]))
$prestige = $fpl[0];
			}
//////////////////////////////////////////////////////////////////////////////////	
}					
else if (!empty($server))
{
 
//////////////////////////////////////////////////////////////////////////////////	
$crn_bf = $crn_s.md5($guidxport).".log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
///////LEVEL 2
if(empty($row['sort'])){
//$datetime = date('Y-m');
//$keyword=$datetime;
$re=$bdd ->query("SELECT sort, w_skill, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
		INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		        where db_stats_0.s_port=$server and DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $guidxport");

//$re=$bdd->prepare($sql);
//$re->bindValue(':keyword','%'.$keyword.'%');
//$re->execute(); 

while ($row = $re->fetch())	
{	
  $prestige = $row['sort'];
     	 
}
}
$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $prestige);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
      $randomz = rand(100, 900);
	  $randomzx = $randomz + 9800;
   
      if (time()-$filemtime > $randomzx)  //21600  4 hours   //86400 24h
			{	
 if(empty($search_skill)){
///////LEVEL 2
if(empty($row['sort'])){
//$datetime = date('Y-m');
//$keyword=$datetime;
$re=$bdd ->query("SELECT sort, w_skill, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
		INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		        where db_stats_0.s_port=$server and DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $guidxport");
//$re=$bdd->prepare($sql);
//$re->bindValue(':keyword','%'.$keyword.'%');
//$re->execute(); 
while ($row = $re->fetch())	
{	
  $prestige = $row['sort'];
     	 
}}

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $prestige);	
fclose($fpl);
			}}
			else
			{
$fpl = file($crn_bf);
$prestige = $fpl[0];
			}
//////////////////////////////////////////////////////////////////////////////////	


}
else
{

//////////////////////////////////////////////////////////////////////////////////	
$crn_bf = $crn_s.md5(md5($guidxport)).".log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
///////LEVEL 2
if(empty($row['sort'])){
//$datetime = date('Y-m');
//$keyword=$datetime;
$re=$bdd ->query("SELECT sort, w_skill,s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
		INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		        where DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000  
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $guidxport");
//$re=$bdd->prepare($sql);
//$re->bindValue(':keyword','%'.$keyword.'%');
//$re->execute(); 
while ($row = $re->fetch())	
{	
  $prestige = $row['sort'];
     	 
}
}
$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $prestige);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
      $randomz = rand(100, 900);
	  $randomzx = $randomz + 9800;
   
      if (time()-$filemtime > $randomzx)  //21600  4 hours   //86400 24h
			{	
///////LEVEL 2
 if(empty($search_skill)){
if(empty($row['sort'])){
//$datetime = date('Y-m');
//$keyword=$datetime;
$re=$bdd ->query("SELECT sort, w_skill, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
		INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		        where DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000 
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $guidxport");
//$re=$bdd->prepare($sql);
//$re->bindValue(':keyword','%'.$keyword.'%');
//$re->execute(); 
while ($row = $re->fetch())	
{	
  $prestige = $row['sort'];
     	 
}
}
$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $prestige);	
fclose($fpl);
			}}
			else
			{
$fpl = file($crn_bf);
$prestige = $fpl[0];
			}
//////////////////////////////////////////////////////////////////////////////////
}




 

if (!empty($search)){ 


 
$rej = $bdd->query("SELECT s_pg,cobra_,airstrike_ FROM db_stats_5 where s_pg = '".$guidxport."' LIMIT 1"); 
 
 
 while ($row = $rej->fetch())	
{	

                  $airstrikex         = $row['airstrike_']; 
                  $cobrax     = $row['cobra_'];
}




$reponseg = $bdd->query("SELECT s_pg,claymore,c4,grenade,artillery FROM db_stats_3 where s_pg = '".$guidxport."' LIMIT 1"); 
 
 while ($row = $reponseg->fetch())	
{	

//var_dump($row);

                 $claymore   = $row['claymore']; 
                 $c4         = $row['c4']; 
                 $grenade    = $row['grenade'];
                 $artillery  = $row['artillery']; 
	           
}




$killz = $kills-$airstrikex-$cobrax-$artillery-$c4-$grenade-$artillery;
} 				
				
				
				 
				$guidxportarr[] = $guidxport.'='.$guid;
				
				
		if (!empty($search)){		
				if(empty($heads))
				 $procent =	'0%';
                else
				 $procent = get_percentage($heads, $killz); 
				
				
				if(empty($damage))
				 $dmgprocent =	'0%';
                else
				 $dmgprocent = get_percentage($killz,$damage); 				
		}
		else
		{
				if(empty($heads))
				 $procent =	'0%';
                else
				 $procent = get_percentage($heads, $kills); 
				
				
				if(empty($damage))
				 $dmgprocent =	'0%';
                else
				 $dmgprocent = get_percentage($kills,$damage); 	
		}	
			
			
			
			$dmgprocentc = $dmgprocent;
			
				if(!empty($kills)){
				  if(!empty($deaths)){
		               $w_ratio = $kills/$deaths;
				        }}
				if(empty($w_ratio))
				 $w_ratio = 0;
			
        
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
				 
					 if(!empty($xyears)) $xyears = $xyears.'.'.$t_xyears.' '; else $xyears = '';
					 if(!empty($xmonth)) $xmonth = $xmonth.'.'.$t_xmonth.' '; else $xmonth = '';					 
					 if(!empty($xday)) $xday = $xday.'.'.$t_xday.' '; else $xday = '';
					 if(!empty($xhours)) $xhours = $xhours.'.'.$t_xhours.' '; else $xhours = '';					 
				     if(!empty($xmin)) $xmin = $xmin.'.'.$t_xmin.' '; else $xmin = '';
                     if(!empty($xsek)) $xsek = $xsek.'.'.$t_xsek.' '; else $xsek = '';	
					  
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
				
					 if(!empty($xyears)) $xyears = $xyears.'.'.$t_xyears.' '; else $xyears = '';
					 if(!empty($xmonth)) $xmonth = $xmonth.'.'.$t_xmonth.' '; else $xmonth = '';					 
					 if(!empty($xday)) $xday = $xday.'.'.$t_xday.' '; else $xday = '';
					 if(!empty($xhours)) $xhours = $xhours.'.'.$t_xhours.' '; else $xhours = '';					 
				     if(!empty($xmin)) $xmin = $xmin.'.'.$t_xmin.' '; else $xmin = '';
                     if(!empty($xsek)) $xsek = $xsek.'.'.$t_xsek.' '; else $xsek = '';	
					 
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
				  if($infomore != 'max')
				echo "<br/><br/><h3>".$t_search." - ". $search." </h3>";
			if($infomore == 'max')
				echo "<br/><br/>";

$my_stats = 0;

if (!empty($_GET['my_stats'])) 
   $my_stats = $_GET['my_stats']; 
else
  	$my_stats = 0;
			
      
if(!empty($my_stats)){
 if(empty($guidy)){     
if (empty($search))
{
	
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $yip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $yip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $yip = $_SERVER['REMOTE_ADDR'];
}	
 
 
 
$xl = $bdd->query('SELECT t0.s_pg,t0.s_guid, t0.s_port, t0.servername,t0.s_player,t0.s_time,t0.s_lasttime, t1.name, t1.ip, t1.guid 
   from db_stats_0 t0 
   join 
 (select name, ip, guid from x_up_players) 
 t1 ON 
 t0.s_guid = t1.guid 
   where t1.ip = "'.$yip.'" LIMIT 1');     
 
 /*
   $xl = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t2.w_ip = "'.$yip.'" LIMIT 1');    
*/  
     
while ($jk = $xl->fetch())	
{	
  $guidy  = $jk['s_guid'];
}


if(!empty($guidy)){
header("Location: ".$ssylka_na_codbox."stats.php?search=".$guidy."&main=0&info=min");
die();
}
else
{
header("Location: ".$ssylka_na_codbox."stats.php?skill=sort&main=0&information=NOT_FIND_PLAYER_IN_DATABASE");
die();	
}

				
} 
 }  }          

			if (!empty($server))
				echo "<h2>". colorize($serverx)." </h2>";
						else{
					 	
				 if (empty($search)){
					 if (empty($infomore))
				echo "<h2>".$t_general_stats."</h2>";
			          else
						  echo "</br></br>";
			 
				 }

						}
	
	
	
  $shadow_greenn = 'color: #000; text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 30px #000, 0 0 4px red, 0 0 7px red, 0 0 13px #000, 0 0 40px red, 0 0 21px #1f8000;';
  $shadow_green = 'color: #999; text-shadow: 0 0 1px #555, 0 0 2px #555, 0 0 30px #555, 0 0 4px #1f8000, 0 0 7px #1f8000, 0 0 13px #1f8000, 0 0 40px #1f8000, 0 0 21px #1f8000;';
  $shadow_red = 'color: #999; text-shadow: 0 0 1px #555, 0 0 2px #555, 0 0 30px #555, 0 0 4px #cc0032, 0 0 7px #cc0032, 0 0 13px #cc0032, 0 0 40px #cc0032, 0 0 21px #cc0032;';
  $shadow_not_click = 'color: #999; text-shadow: 0 0 1px #555, 0 0 2px #555, 0 0 30px #555, 0 0 4px #777, 0 0 7px #777, 0 0 13px #777, 0 0 40px #777, 0 0 21px #777;';
  $shadow_top_week = 'color: silver;text-shadow:0px 2px 5px #fdff00;';
  $shadow_top_month = 'color: silver;text-shadow:0px 2px 5px #fdff00;';
	if (!empty($search_time))
$playeed = $t_today; 
 else
	$playeed = $t_playing;  
 if($infomore != 'max'){	
	echo "<tr>";
	


	
if((empty($server))&&(!empty($search)))
echo "
<div style=\"margin-top:15px\"><center>
<h2 style=\"font-size:25px;height:30px;border:none;color:#222;background-color:".$colortdztwo.";width:90%;\"/>	
".colorize($servername)."<h2/></center></div>";	











 /*
if (empty($search)){	
if(empty($search_nnnnnnnnnnnnn)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;} 	   
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
#
</center></td>";		
}

    


if (!empty($finder)){	
if(empty($search_nnnnnnnnnnnnn)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;} 	   
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
".$t_server." 
</center></td>";		
}


if(empty($search_geo)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>
".$t_city." 
</center></td>";	

if(empty($search_prestige)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;

</center></td>";



if(empty($search_kills)){$shadowheader = $shadow_greenn;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?kills=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
 
</a>
</center></td>";	



 

if (!empty($key)){	

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ypip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ypip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ypip = $_SERVER['REMOTE_ADDR'];
}
	   
if(empty($_GET['ip'])){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>
".$t_nickname." / <span tooltip=\"My stats / Моя статистика\">
<a href=\"".$ssylka_na_codbox."stats.php?ip=".$ypip."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> 
<b id=\"tel\">".$t_nickmy."</b>
<img src=\"".$ssylka_na_codbox."/img/statz.gif\" height=\"19\" alt=\"chat\"> </a></span>
&emsp;
</center></td>";		   	   	   
}
else if (!empty($yip)){		   
if(empty($_GET['search'])){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>
".$t_nickname." / <span tooltip=\"My stats / Моя статистика\"><a href=\"".$ssylka_na_codbox."stats.php?my_stats=stats&main=".$chatdbarc."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> 
<b id=\"tel\">".$t_nickmy."</b>
<img src=\"".$ssylka_na_codbox."/img/statz.gif\" height=\"19\" alt=\"chat\"> </a></span>
&emsp;
</center></td>";		   	   	   
}
else
{

if(empty($_GET['search'])){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>
".$t_nickname."
&emsp;
</center></td>";
 
}







if(empty($search_kills)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_kills." top\"><a href=\"".$ssylka_na_codbox."stats.php?kills=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_kills."
</a></span>
</center></td>";	

if(empty($search_deaths)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_deaths." top\"><a href=\"".$ssylka_na_codbox."stats.php?deaths=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_deaths."
</a></span>
</center></td>";	

if(empty($search_ratiokd)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_kd." top\"><a href=\"".$ssylka_na_codbox."stats.php?ratios=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_kd."
</a></span>
</center></td>";


if(empty($search_heads)){$shadowheader = $shadow_green; $agreen_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $agreen_image_shadow = 'red';}
if(empty($search_heads)){$shadowheader = $shadow_green; $green_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $green_image_shadow = 'red';}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_heads." top\">
<a href=\"".$ssylka_na_codbox."stats.php?headhotsperc=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
<img src=\"".$ssylka_na_codbox."/img/head-shot-png.png\" 
style=\"-webkit-filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");\" height=\"24px\" width=\"24px\">
</a></span>
</center></td>";


if(empty($search_heads)){$shadowheader = $shadow_green; $agreen_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $agreen_image_shadow = 'red';}
if(empty($search_heads)){$shadowheader = $shadow_green; $green_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $green_image_shadow = 'red';}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_accuracy." top\"><a href=\"".$ssylka_na_codbox."stats.php?accuaraccyyperc=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
<img src=\"".$ssylka_na_codbox."/img/accuracy.png\" 
style=\"-webkit-filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");\" height=\"24px\" width=\"24px\">
</a></span>
</center></td>";

if($infomore != 'max'){
if(empty($search_kills_min)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_kills_min." top\">
<a href=\"".$ssylka_na_codbox."stats.php?killmin=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" 
style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">

<img src=\"".$ssylka_na_codbox."/img/loading.gif\" 
style=\"-webkit-filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");\" height=\"18px\" width=\"18px\">

</a></span>
</center></td>";
}


if(empty($search_skill)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_skill." top\"><a href=\"".$ssylka_na_codbox."stats.php?skill=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_skill."
</a></span>
</center></td>";

	

 
if (empty($search)){
if(empty($search_knife)){$shadowheader = $shadow_green; $agreen_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $agreen_image_shadow = 'red';}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?knife=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
<img src=\"".$ssylka_na_codbox."/img/knife-icon.png\" 
style=\"-webkit-filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");\" height=\"24px\" width=\"24px\">
</a>
</center></td>";
}

if (!empty($search)){
if(empty($search_suecides)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?suecides=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_info."
</a>
</center></td>";
} 




if (!empty($search)){
if(empty($search_suecides)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?suecides=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_soul."
</a>
</center></td>";
}

if (!empty($search_time))
$playeed = $t_today; 
 else
	$playeed = $t_playing;  



if (empty($search)){

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
&emsp;</center></td>";

}
  





	  
	  echo "</tr>";		
	}
	
}
	
	
	
	 $i++;	
	 
 
 
 
 
 
 
 
 
 if($infomore != 'max'){
 
 if(($search)&&($i > 1)){
 	echo "<tr>";
	




	
if (empty($search)){	
if(empty($search_nnnnnnnnnnnnn)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;} 	   
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
#
</center></td>";		
}

   





if((empty($server))&&(!empty($search)))
echo "
<div style=\"margin-top:15px\"><center>
<h2 style=\"font-size:25px;height:30px;border:none;color:#222;background-color:".$colortdztwo.";width:90%;\"/>	
".colorize($servername)."<h2/></center></div>";	


if (!empty($finder)){	
if(empty($search_nnnnnnnnnnnnn)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;} 	   
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
".colorize($servername)." 
</center></td>";		
}



if(empty($search_geo)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>
".$t_city." 
</center></td>";	

if(empty($search_prestige)){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;

</center></td>";



if(empty($search_kills)){$shadowheader = $shadow_greenn;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?kills=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
 
</a>
</center></td>";	




 
if (!empty($yip)){		   
if(empty($_GET['search'])){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>
".$t_nickname." / <span tooltip=\"".$t_nickmy." статистика\"><a href=\"".$ssylka_na_codbox."stats.php?my_stats=stats&main=".$chatdbarc."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> ".$t_nickmy."<img src=\"".$ssylka_na_codbox."/img/statz.gif\" height=\"19\" alt=\"chat\"> </a></span>
&emsp;
</center></td>";		   	   	   
}
else
{

if(empty($_GET['search'])){$shadowheader = $shadow_not_click;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>
".$t_nickname."
&emsp;
</center></td>";
 
}







if(empty($search_kills)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "
<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_kills." top\"><a href=\"".$ssylka_na_codbox."stats.php?kills=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_kills."
</a></span>
</center></td>";	

if(empty($search_deaths)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_deaths." top\"><a href=\"".$ssylka_na_codbox."stats.php?deaths=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_deaths."
</a></span>
</center></td>";	

if(empty($search_ratiokd)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_kd." top\"><a href=\"".$ssylka_na_codbox."stats.php?ratios=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_kd."
</a></span>
</center></td>";
if(empty($search_heads)){$shadowheader = $shadow_green; $agreen_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $agreen_image_shadow = 'red';}
if(empty($search_heads)){$shadowheader = $shadow_green; $green_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $green_image_shadow = 'red';}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_heads." top\">
<a href=\"".$ssylka_na_codbox."stats.php?headhotsperc=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
<img src=\"".$ssylka_na_codbox."/img/head-shot-png.png\" 
style=\"-webkit-filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");\" height=\"24px\" width=\"24px\">
</a></span>
</center></td>";

if(empty($search_heads)){$shadowheader = $shadow_green; $agreen_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $agreen_image_shadow = 'red';}
if(empty($search_heads)){$shadowheader = $shadow_green; $green_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $green_image_shadow = 'red';}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_accuracy." top\"><a href=\"".$ssylka_na_codbox."stats.php?accuaraccyyperc=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
<img src=\"".$ssylka_na_codbox."/img/accuracy.png\" 
style=\"-webkit-filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");\" height=\"24px\" width=\"24px\">
</a></span>
</center></td>";


if($infomore != 'max'){
if(empty($search_kills_min)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_kills_min." top\">
<a href=\"".$ssylka_na_codbox."stats.php?killmin=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" 
style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">

<img src=\"".$ssylka_na_codbox."/img/loading.gif\" 
style=\"-webkit-filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");\" height=\"18px\" width=\"18px\">

</a></span>
</center></td>"; 
}


if(empty($search_skill)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<span tooltip=\"".$t_skill." top\"><a href=\"".$ssylka_na_codbox."stats.php?skill=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_skill."
</a></span>
</center></td>";	

 

 
 
 
if (empty($search)){
if(empty($search_knife)){$shadowheader = $shadow_green; $agreen_image_shadow = 'lime';}else{$shadowheader = $shadow_red; $agreen_image_shadow = 'red';}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?knife=".$sort_msql_from_headers."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
<img src=\"".$ssylka_na_codbox."/img/knife-icon.png\" 
style=\"-webkit-filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");filter: drop-shadow(8px 8px 12px ".$agreen_image_shadow.");\" height=\"24px\" width=\"24px\">
</a>
</center></td>";
}


if (!empty($search)){
if(empty($search_suecides)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?suecides=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_info."
</a>
</center></td>";
} 




if (!empty($search)){
if(empty($search_suecides)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?suecides=".$sort_msql_from_headers."&main=". $chatdbarc."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$t_soul."
</a>
</center></td>";
}

if (!empty($search_time))
$playeed = $t_today; 
 else
	$playeed = $t_playing;  



if (empty($search)){

if(empty($search_lastshot)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> <center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"background:".$colortdztwo.";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\">
".$playeed."
</a>
&emsp;</center></td>";

}
  
	  echo "</tr>";	
 
 }}
 
  
////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 
  if($infomore != 'max')
       echo "<tr>";   
	   
	   
	   
	 if($infomore != 'max')   
if (empty($search)){		   
	      
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver; font-size: 16px;font-size:".$auto_font.";\"><b>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?server=".$cntz."&main=".$chatdbarc."\">
<b style=\"color:".$color_cip.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 4px #555, 0 0 7px #000, 0 0 3px #000, 0 0 4px #555, 0 0 1px #000;\">
".($premierMessageAafficher+$i)."</b></a></b></td>"; 

}

$gli = $i;
if($gli > 10)
	$gli = 0;
 if($infomore != 'max')
	 
// <a href=\"".$ssylka_na_codbox."stats.php?search=".$guidxport."&info=max\" class=\"glown".$gli."\" target=\"_blank\">
 
if (!empty($finder)){	 	   
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver; 
font-size: 16px;width:250px;font-size:".$auto_font.";\"> 
<center>&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?search=".$guidxport."&info=max\" target=\"_blank\">

<b style=\"position: absolute;color:".$color_ip.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 4px #000, 0 0 7px #000, 0 0 3px #555, 0 0 1px #111, 0 0 5px #000;\">
".colorize($servername)."
</b>

<b style=\"color:#FFF;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 4px #000, 0 0 7px #000, 0 0 3px #555, 0 0 1px #111, 0 0 5px #000;\">
<section class=\"rw-words\">
	<b class=\"rw-sentence\">
		<div class=\"rw-words rw-words-2\">
		    <span>".$moreinfo_more."</span>
			<span>".$moreinfo_more."</span>
			<span>".$moreinfo_here."</span>
			<span>&emsp;</span>
			<span>".colorize($servername)."</span>
		</div>
	</b>
</section>
</b>
</a>
</center></td>";		
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


if(empty($fullgeo))
	$fullgeo ='';

 if($infomore != 'max'){
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&nbsp;
<a href=\"".$ssylka_na_codbox."stats.php?xgeo=".$geo."&main=".$chatdbarc."\">
<b style=\"color:".$color_geo.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 30px #000, 0 0 2px ".$color_geo.", 0 0 2px ".$color_geo.", 0 0 3px ".$color_geo.", 0 0 1px ".$color_geo.", 0 0 2px ".$color_geo.";\">
";
echo '<span tooltip="'.$fullgeo.'"> 
<img src="'.$ssylka_na_codbox.'/flags-mini/'.$geo.'.png" alt="'.$fullgeo.'"></span>';
echo "</b></a></td>"; 
 }
   
  
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
						   $rano = explode("image:", $fld);
                           $rankname = $rano[0];
  }}
  
  if(empty($rankimg))
	  $rankimg = 'null.png';
    if(empty($rankname))
	  $rankname = '0';
      if(empty($rankxx))
	  $rankxx = '0';
  
 $rankname =  '"'.$rankname.'"'; 
 if($infomore != 'max')
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&nbsp;
<span tooltip=".$rankname."><img src=\"".$ssylka_na_codbox."img/ranks/".$rankimg."\" height=\"20px\" alt=\"".$rankname."\" title=\"".$rankname."\"></span>
<b style=\"font-size:13px;color:".$color_prestige.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_prestige.", 0 0 2px ".$color_prestige.", 0 0 1px ".$color_prestige.", 0 0 2px ".$color_prestige.", 0 0 3px ".$color_prestige.";\">".$rankxx." </b></td>"; 
    
	 
if((!empty($search_skill))&&($search_skill = 'sort'))	
{	



if(!empty($guidxport)){ 
$placedskillnum = 0;
$placedskill = 0;
$placedskill = $premierMessageAafficher+$i;
if((!empty($placedskill))&&(!empty($server))){
	
	
$crn_bfx = $crn_s."_GUID_".$guid."_SERVER_".$server."_SPG_".$guidxport.".skillplace";	
if(!file_exists($crn_bfx))
{
	touch($crn_bfx);
$fplx = fopen($crn_bfx, 'w+');
fwrite($fplx, $placedskill);	
fclose($fplx);
}	
else
{
$fplx = file($crn_bfx);
$placedskillnum = $fplx[0];	
}	

if(empty($placedskillnum))
	$placedskillnum = '111111111111';

	if(trim($placedskillnum) != trim($placedskill))
	{
		
$fplx = fopen($crn_bfx, 'w+');
fwrite($fplx, $placedskill);	
fclose($fplx);		
		
	$bdd->query("UPDATE db_stats_2 SET w_place='" . $placedskill . "' WHERE s_pg='" . $guidxport . "'");
 //echo "</br> DEBUG MODE: $guid = $placedskillnum != $placedskill";
	
	}
}}

if((prestige_image($premierMessageAafficher+$i)) == 'prestige/null.png')  
 $prestigstyle = 'style="filter: alpha(Opacity=20);opacity: 0.2;"';
else
	$prestigstyle = '';
    if($infomore != 'max') 
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&nbsp;   
<span tooltip=\"".prestige_info($premierMessageAafficher+$i)."\"><img src=\"".$ssylka_na_codbox."img/".prestige_image($premierMessageAafficher+$i)."\" height=\"20px\" ".$prestigstyle."> </span>
</td>";     
} 
 else
 {
	 if((prestige_image($prestige)) == 'prestige/null.png')  
 $prestigstyle = 'style="filter: alpha(Opacity=20);opacity: 0.2;"';
else
	$prestigstyle = '';
  if($infomore != 'max')   
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&nbsp;   
<span tooltip=\"".prestige_info($prestige)."\"><img src=\"".$ssylka_na_codbox."img/".prestige_image($prestige)."\" height=\"20px\" ".$prestigstyle."> </span>
</td>";  	 
 }	 
   
   if($infomore != 'max')
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<a href=\"".$ssylka_na_codbox."stats.php?search=".$guid."&main=".$chatdbarc."&info=min\">
<b style=\"color:".$color_nickname.";text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
<span tooltip=".$guid.">".html_entity_decode($playername)."</span></b></a></td>"; 


  if($infomore != 'max')
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:".$color_kills.";text-shadow: 0 0 1px black, 0 0 2px black, 0 0 3px black, 0 0 2px black, 0 0 2px black, 0 0 1px black, 0 0 2px black, 0 0 3px ".$color_kills.";\">
<span tooltip=\"($t_series : $n_kills) [ min : $n_kills_min ]\">".$kills."</span></b></td>"; 
   
  if($infomore != 'max')
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:".$color_deaths.";text-shadow: 0 0 1px black, 0 0 2px black, 0 0 3px black, 0 0 2px black, 0 0 2px black, 0 0 1px black, 0 0 2px ".$color_deaths.", 0 0 3px black;\">
<span tooltip=\"($t_series : $n_deaths )\">".$deaths."</span></b></td>"; 
  
 
if(empty($guidxport_skf))
{				
$guidxport_skf = 0;		
$ratio_skf = 0;	
$skill_skf = 0;
}
 
 
if($ratio_skf < $rrattio)
	$possc = " <img src=\"".$ssylka_na_codbox."img/icon-list-up.png\" width=\"7px\">&nbsp;";
else if($ratio_skf > $rrattio)
    $possc = " <img src=\"".$ssylka_na_codbox."img/icon-list-down.png\" width=\"7px\">&nbsp;";	
else
    $possc = " <img src=\"".$ssylka_na_codbox."img/icon-list-same.png\" width=\"7px\">&nbsp;"; 
 
 
  if($infomore != 'max')
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:".$color_kdratio.";text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black, 0 0 3px ".$color_kdratio.", 0 0 5px black, 0 0 7px black;\">
<span tooltip=\" $ratio_skf / ($kills/$deaths)\">".$possc.$rrattio."</span></b></td>"; 
 
 
  
 if (!empty($search))
 $procent =  "<center>&emsp;
<b style=\"color:".$color_heads."; color: Silver; font-family: Titillium Web; font-size: 15px; text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 4px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 1px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 3px ".$color_heads.";\">".$heads."</b></br>&emsp;
<b style=\"color: #777777; font-family: Impact; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\">".$procent."</b></center>"; 
else
	$procent = "<b style=\"color: Silver; font-family: Titillium Web; font-size: 
15px; text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 4px ".$color_heads.", 
0 0 2px ".$color_heads.", 0 0 1px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 3px ".$color_heads.";\">&emsp;".$procent
."</b>";
 if($infomore != 'max')
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9;\">
<span tooltip=\"$t_series : $n_heads / $heads\">".$procent."</span></td>";




 if (!empty($search))
 $dmgprocent =  "<center>&emsp;<b style=\"color:".$color_heads."; color: Silver; font-family: Titillium Web; font-size: 15px; text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 4px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 1px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 3px ".$color_heads.";\">".$damage."</b></br>&emsp;
<b style=\"color: #777777; font-family: Impact; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\">".$dmgprocent."</b></center>"; 
else
	$dmgprocent = "<b style=\"color: Silver; font-family: Titillium Web; font-size: 15px; text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 4px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 1px ".$color_heads.", 0 0 2px ".$color_heads.", 0 0 3px ".$color_heads.";\">&emsp;".$dmgprocent
."</b>";
 if($infomore != 'max')
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9;\">
<span tooltip=\"$t_damages : $damage\">".$dmgprocent."</span></td>";

 
 
 
if($infomore != 'max'){ 
 echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:$color_skillers; text-shadow: 0 0 1px black, 0 0 2px green, 0 0 30px green, 0 0 4px green, 0 0 7px green, 0 0 3px green, 0 0 8px green, 0 0 6px green;\">
<span tooltip=\"$n_kills_min \">".$n_kills_min."</span>&nbsp;</b></td>";
}
 


if(empty($guidxport_skf))
{				
$guidxport_skf = 0;		
$ratio_skf = 0;	
$skill_skf = 0;
}
 
 
if($skill_skf < $skill)
	$possc = " <img src=\"".$ssylka_na_codbox."img/icon-list-up.png\" width=\"7px\">&nbsp;";
else if($skill_skf > $skill)
    $possc = " <img src=\"".$ssylka_na_codbox."img/icon-list-down.png\" width=\"7px\">&nbsp;";	
else
    $possc = " <img src=\"".$ssylka_na_codbox."img/icon-list-same.png\" width=\"7px\">&nbsp;";
  if($infomore != 'max')
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:$color_skillers; text-shadow: 0 0 1px black, 0 0 2px green, 0 0 30px green, 0 0 4px green, 0 0 7px green, 0 0 3px green, 0 0 8px green, 0 0 6px green;\">
<span tooltip=\"$t_skill : $skill_skf / $skill \">".$possc.(floor($skill*1000)/1000)."</span>&nbsp;</b></td>";
 
 
 
 if($infomore != 'max')
if (empty($search)){
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">&emsp;
<b style=\"color:".$color_knife.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_knife.", 0 0 2px ".$color_knife.", 0 0 1px ".$color_knife.", 0 0 2px ".$color_knife.", 0 0 3px ".$color_knife.";\">
<span tooltip=\"$t_knife : $melle\">".$melle."</span></b></td>";
}
 if($infomore != 'max')
if (!empty($search)){
	$fgfps = "<b style=\"font-size: 14px;color:#000;text-shadow: 0 0 1px lime, 0 0 2px #000, 0 0 3px lime, 0 0 2px ".$color_suicids.", 0 0 2px ".$color_suicids.", 0 0 1px ".$color_suicids.", 0 0 2px ".$color_suicids.", 0 0 3px ".$color_suicids.";\">
&emsp;Fps: ".$fps."</br>&emsp;Ping: ".$ping."</b>";
 
 if($infomore != 'max')
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 16px;font-size:".$auto_font.";\">
 ".$fgfps."
 </td>";
}

 if($infomore != 'max')
if (!empty($search)){
if(empty($search_suecides)){$shadowheader = $shadow_green;}else{$shadowheader = $shadow_red;}
echo "<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";font-family: Verdana; font-size: 16px;font-size:".$auto_font_title.";".$shadowheader."\"> &emsp;
".$suicids."
</td>";
}

 if($infomore != 'max') 
if (empty($search)){

echo "<td tooltip=".$lasttime." style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: Silver;font-size: 13px;font-size:".$auto_font.";\"> 
	
	<span tooltip=\"Player in Mamba\"><a href=\"".$ssylka_na_codbox."mamba.php?guid=".$guid."\" target=\"_blank\">[M]</a></span>		 
	<span tooltip=\"Player in Screenshots\"><a href=\"".$ssylka_na_codbox."screenshots.php?searchh=".$guid."\" target=\"_blank\">[S]</a></span>		 
				   
       &emsp;<span style=\"color:$color_date_timep;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> $t_ago: </span> | 
	         <span style=\"color:yellow;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> ".$timee2."&emsp;</span>
  </br>&emsp;<span style=\"color:$color_date_timepp;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> &emsp; $t_tottal: </span> |
             <span style=\"color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$lasttime2."&emsp;</span>
 
			 </td>";


}
 if($infomore != 'max')
	  echo "</tr>";	



if($infomore != 'max')
if(!empty($search))
echo '</table>';


 

if($infomore == 'max')
{
?>

 





 
<center>
  
          <?php  echo "<h2 style=\"font-size:32px;height:30px;border:none;color:#111; width: 1100px;\"/>	
".colorize($servername)."<h2/>"; 
?>
          
       
  <table style="opacity: 0.9; width: 1100px;border-radius: 5px; border: 4px solid #000;" border="1">
   
 <tr>  
   <td align = "center" style="opacity: 0.9; background:#111;width:10%;margin-left: auto;margin-right: auto;">
         <div class="cssProgress">
           </br>
          <?php  echo '<span tooltip="'.$fullgeo.'"> 
<img src="'.$ssylka_na_codbox.'/flags-mini/'.$geo.'.png" height = "40px" alt="'.$fullgeo.'"></span>'; 
?>
          
        </div>
 </td> 
 
    <td align = "center" style="opacity: 0.9; background:#111;width:15%;margin-left: auto;margin-right: auto;text-align: left;">
         <div class="cssProgress">
          <div class="progress3">
		  </br>
 <?php   

 echo "<b style=\"font-size:14px;color:black;text-align: left;text-shadow: 0 0 1px ".$color_nickname.", 0 0 3px ".$color_nickname.", 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
 NAME: </b> <span tooltip=".$guid.">
 
 <b style=\"font-size:14px; color:".$color_nickname.";text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
 ".html_entity_decode($playername)."
 </b>
 
 </span></br>";
 echo "<b style=\"font-size:14px;color:black;text-align: left;text-shadow: 0 0 1px ".$color_nickname.", 0 0 3px ".$color_nickname.", 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
 GUID:</b> <span tooltip=".html_entity_decode($playername).">
  <b style=\"font-size:14px; color:".$color_nickname.";text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
 
 ".$guid."
  </b>
 </span> ";
 
 ?>  
          </div>
        </div>
 </td>
 
  
  
    <td align = "center" style="opacity: 0.9; background:#111;width:15%;margin-left: auto;margin-right: auto;">
         <div class="cssProgress">
          <div class="progress3">
<?php   
 
 if ($ping < 20)
     $styleping = "<b style=\"font-size:12px; color:#7CFC00; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";
 else if ($ping < 30)
	$styleping = "<b style=\"font-size:12px; color:#ADFF2F; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">"; 
 else if ($ping < 40)
	 $styleping = "<b style=\"font-size:12px; color:#7FFF00; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";
 else if ($ping < 50)
	 $styleping = "<b style=\"font-size:12px; color:#9ACD32; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";
 else if ($ping < 60)
	 $styleping = "<b style=\"font-size:12px; color:#32CD32; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";
 else if ($ping < 80)
	 $styleping = "<b style=\"font-size:12px; color:#00FF7F; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";
 else if ($ping < 100) 
	 $styleping = "<b style=\"font-size:12px; color:yellow; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";
 else if ($ping < 150) 
	 $styleping = "<b style=\"font-size:12px; color:#DAA520; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";
 else if ($ping < 180) 
	 $styleping = "<b style=\"font-size:12px; color:#FF8C00; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";
 else if ($ping < 200)
	 $styleping = "<b style=\"font-size:12px; color:#FF4500; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";
 else
     $styleping = "<b style=\"font-size:12px; color:red; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">";	 
 
 

?>   

<canvas id="cvs" width="90" height="60">
    [No canvas support]
</canvas>

<script>
    meter = new RGraph.Meter({
        id: 'cvs',
        min: 0,
        max: 200,
		value:75,
        value: <?php echo $ping-20; ?>,
        options: {
            anglesStart: RGraph.PI + 0.5,
            anglesEnd: RGraph.TWOPI - 0.55,
            linewidthSegments: 5,
            textSize: 1,
            colorsStroke: '#111',
            segmentsRadiusStart: 35,
			needleColor: '#ff14eb',
            border: 0,
            centerpinFill: 'white',
            centerpinStroke: 'gray',			
            tickmarksSmallCount: 0,
            tickmarksLargeCount: 0,
            adjustable: true,
            needleRadius: 20,
            colorsRanges: [
                [0,30,'Gradient(#afa:#0f0:#0c0:#030)'],
				[30,60,'Gradient(#afa:#0f0:#0c0:#030)'],
				[60,100,'Gradient(#ffa:#ff0:#cc0:#330)'],
				[100,150,'Gradient(#ffa:#ff0:#cc0:#330)'],
				[150,200,'Gradient(#f00:#f00:#c00:#300)']
            ]			
        }
    }).on('beforedraw', function (obj)
    {
        RGraph.clear(obj.canvas, '#111');
    }).draw();
</script>



<?php
echo $styleping; 
echo 'Ping: '.$ping;
echo '</b>&emsp;';
echo "<b style=\"font-size:12px; color:#fff; text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black;\">FPS: ".$fps."</b>";
?>


          </div>
        </div>
 </td>  
  
   
  
  
    <td align = "center" style="opacity: 0.9; background:#111;width:25%;margin-left: auto;margin-right: auto;">
         <div class="cssProgress">
          <div class="progress3">
		  
		   </br>
<?php   
 
 
if($ratio_skf < $rrattio)
	$possco = " <img src=\"".$ssylka_na_codbox."img/icon-list-up.png\" height=\"13px\">&nbsp;";
else if($ratio_skf > $rrattio)
    $possco = " <img src=\"".$ssylka_na_codbox."img/icon-list-down.png\" height=\"13px\">&nbsp;";	
else
    $possco = " <img src=\"".$ssylka_na_codbox."img/icon-list-same.png\" height=\"13px\">&nbsp;";  
 
echo "<b style=\"color:".$color_kdratio.";text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black, 0 0 3px ".$color_kdratio.", 0 0 5px black, 0 0 7px black;\">
<span tooltip=\" $ratio_skf / ($kills/$deaths)\">".$possco.' K/D: '.$rrattio." &emsp;&emsp;(".$kills." / ".$deaths.")  </span></b>"; 

echo "<b style=\"color:silver;text-shadow: 0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 6px black, 0 0 3px ".$color_kdratio.", 0 0 5px black, 0 0 7px black;\">
<span tooltip=\" $ratio_skf / ($kills/$deaths)\">  </br> (".$t_kills." / ".$t_deaths.") </span></b>"; 



echo "<hr style=\"display:block;color:silver; margin:0; padding:0;border: 0;
height: 1px;
background: #000;
background-image: -webkit-linear-gradient(left, #fff, #000, #fff);
background-image: -moz-linear-gradient(left, #fff, #000, #fff);
background-image: -ms-linear-gradient(left, #fff, #000, #fff);
background-image: -o-linear-gradient(left, #fff, #000, #fff);\" />
<div style=\"margin-top:-14px;\" />
<b style=\"font-size:14px;color:green;text-shadow:0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 3px black, 0 0 2px black, 0 0 2px ".$color_kdratio.", 0 0 3px black, 0 0 5px black;\">
<span tooltip=\" $t_damages : $damage\">  </br> ".$t_damages." : ".$dmgprocentc."</span> ($kills/$damage) &emsp;&emsp; </b></div>"; 
?>   
          </div>
        </div>
 </td>    
  
  
  
  
 
</tr>  
</table>

 
 
 <table style="opacity: 0.9; width: 1100px;border-radius: 5px; border: 4px solid #000;" border="1">  
   <tr>
    <td align = "center" style="opacity: 0.9; background:#111;width:50%;margin-left: auto;margin-right: auto;">
	
	</br>
<?php

 $sefes = rand(42, 69);
 $sefesf = rand(74, 99);
 $nextprolvll = get_percentage($sefes,$sefesf);


$numimgj = 0;
$stoprg = 0;
foreach ($prestige_images as $numimg => $preimage){
   $numimgt = $numimg;
  if($preimage == prestige_image($prestige))
  {  						   
	$numimgj = $numimg;
  }
   
  
  if($stoprg != 1)
	  {
  if($numimgj+1==$numimgt)
  {
  $stoprg = 1;	  
  $preprestgj = $preimage;
  }
     }
  

  }
  



$numimgjj = 0;
$stoprgj = 0;
$stoprgjw = 0;
foreach ($prestige_images as $numimgjj => $preimagej){
   $numimgtj = $numimgjj;




  if($stoprgjw != 1)
	  {
  if($numimgtj==$numimgj-1)
  {
  $stoprgjw = 1;	  
   $previosprestgu = $preimagej;
  }
     }


  if($stoprgj != 1)
	  {
  if($numimgtj==$numimgj+1)
  {
  $stoprgj = 1;	  
  $nextprestg = $preimagej;
  }
     }
  

  }


if(!empty($previosprestgu))
echo "<b style=\"font-size:14px; color:".$color_nickname.";text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\"> 
  Prev:
</b>
&emsp; <img src=\"".$ssylka_na_codbox."img/".$previosprestgu."\" height=\"30px\" ".$prestigstyle."> "; 
 

//if(!empty($prestige))
echo "&emsp;&emsp;&emsp;<span tooltip=\"".prestige_info($prestige)."\"><img src=\"".$ssylka_na_codbox."img/".prestige_image($prestige)."\" height=\"60px\" ".$prestigstyle."> </span>"; 

if(!empty($nextprestg))
echo "&emsp;&emsp;<b style=\"font-size:14px; color:".$color_nickname.";text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
  Next:
</b>
&emsp; <img src=\"".$ssylka_na_codbox."img/".$nextprestg."\" height=\"30px\" ".$prestigstyle.">  "; 


?>
 
        <div class="cssProgress">
          <div class="progress3">
            <div class="cssProgress-bar cssProgress-active" data-percent="75" style="width: <?php echo $nextprolvll; ?>;">
              <span class="cssProgress-label">Skill: <?php echo  $skill; ?> / Skill Prestige <?php echo $nextprolvll; ?></span>
            </div>
          </div>
        </div>	
	</td>
 
    <td align = "center" style="opacity: 0.9; background:#111;width:50%;margin-left: auto;margin-right: auto;">
	</br>
<?php

foreach ($ranked as $rkilled => $rnk){
  $rankxi = $rnk;
  if($kills >= $rkilled)
  {  $rankx = $rnk;
    $rkilledxy = $rkilled;
                    		$zx = explode("rank:", $rankx);
						   $fld = $zx[1];
						   $rankxx = strtok($fld, " ");
						   
						   $zx = explode("image:", $rankx);
						   $fld = $zx[1];
						   $rankimg = strtok($fld, " ");
						
						   $zx = explode("name:", $rankx);
						   $fld = $zx[1];
						   $rano = explode("image:", $fld);
                           $rankname = $rano[0];						   
						   
						   }} 
  
  $nowlelelm = $rankxx;
  
foreach ($ranked as $rkilled => $rnkn){
                    	   $zxn = explode("rank:", $rnkn);
						   $fldn = $zxn[1];
						   $rankxxn = strtok($fldn, " ");
						   
						   $zxn = explode("image:", $rnkn);
						   $fldn = $zxn[1];
						   $rankimgn = strtok($fldn, " ");
						    
						   $zxn = explode("name:", $rnkn);
						   $fldn = $zx[1];
						   $rano = explode("image:", $fldn);
                           $ranknamen = $rano[0];							   
						   
						   
if($rankxx+1 == $rankxxn)
  { 
 $levelrankxxn = $rankxxn;
 $rankxt = $rnkn;
 $rkilledx = $rkilled;
                    	   $zxn = explode("rank:", $rnkn);
						   $fldn = $zxn[1];
						   $rankxxnw = strtok($fldn, " ");
						   
						   $zxn = explode("image:", $rnkn);
						   $fldn = $zxn[1];
						   $rankimgnw = strtok($fldn, " ");
						    
						   $zxnp = explode("name:", $rankxt);
						   $fldnp = $zxnp[1];
						   $rano = explode("image:", $fldnp);
                           $ranknamenw = $rano[0];
  }	}  
  
  
  
 foreach ($ranked as $rkilled => $rnknp){
                    	   $zxnp = explode("rank:", $rnknp);
						   $fldnp = $zxnp[1];
						   $rankxxnp = strtok($fldnp, " ");
						   
						   $zxnp = explode("image:", $rnknp);
						   $fldnp = $zxnp[1];
						   $rankimgnp = strtok($fldnp, " ");
						   
						   $zxnp = explode("name:", $rnknp);
						   $fldnp = $zxnp[1];
						   $rano = explode("image:", $fldnp);
                           $ranknamenp = $rano[0];
if($rankxx-1 == $rankxxnp)
  { 
 $levelrankxxnp = $rankxxnp;
 $rankxtp = $rnknp;
 $rkilledxp = $rkilled;
                    	   $zxnp = explode("rank:", $rnknp);
						   $fldnp = $zxnp[1];
						   $rankxxnwp = strtok($fldnp, " ");
						   
						   $zxnp = explode("image:", $rnknp);
						   $fldnp = $zxnp[1];
						   $rankimgnwp = strtok($fldnp, " ");
						   
						   $zxnp = explode("name:", $rnknp);
						   $fldnp = $zxnp[1];
						   $rano = explode("image:", $fldnp);
                           $ranknamenwp = $rano[0];
  }	} 
  
  
  if(empty($rankimg))
	  $rankimg = 'null.png';
    if(empty($rankname))
	  $rankname = '0';
      if(empty($rankxx))
	  $rankxx = '0';
  
  
  if(empty($rankimgnw))
	  $rankimgnw = '';
    if(empty($ranknamenw))
	  $ranknamenw = '0';
      if(empty($rankxxnw))
	  $rankxxnw = '0'; 
 
						  
 

//echo '</BR> new '.$rankxt.' / '.$rkilledx.'==='.$levelrankxxn; 
//echo '</BR> prev '.$rankxtp.' / '.$rkilledxp.'===='.$levelrankxxnp; 
 
 
 $nextprolvl = get_percentage($kills,$rkilledx);
 if(!empty($rankimgnwp))
echo "<span tooltip=\"".$ranknamenwp."\"><img src=\"".$ssylka_na_codbox."img/ranks/".$rankimgnwp."\" height=\"30px\" alt=\"".$ranknamenwp."\" title=\"".$ranknamenwp."\"></span>

<b style=\"font-size:14px; color:".$color_nickname.";text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
 kills: $rkilledxp
</b>
";
 
echo "&emsp;&emsp;&emsp;<span tooltip=\"".$rankname."\"><img src=\"".$ssylka_na_codbox."img/ranks/".$rankimg."\" height=\"60px\" alt=\"".$rankname."\" title=\"".$rankname."\"></span>
<b style=\"font-size:14px; color:".$color_nickname.";text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
  kills:  $rkilledxy
</b>

"; 
 if(!empty($rankimgnw))
echo "&emsp;&emsp;&emsp;<span tooltip=\"".$ranknamenw."\"><img src=\"".$ssylka_na_codbox."img/ranks/".$rankimgnw."\" height=\"30px\" alt=\"".$ranknamenw."\" title=\"".$ranknamenw."\"></span>
<b style=\"font-size:14px; color:".$color_nickname.";text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 3px #000, 0 0 3px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 1px ".$color_nickname.", 0 0 2px ".$color_nickname.", 0 0 3px ".$color_nickname.";\">
  kills: $rkilledx
</b>";

?>
        <div class="cssProgress">
          <div class="progress3">
            <div class="cssProgress-bar cssProgress-success cssProgress-active" data-percent="<?php echo $nextprolvl; ?>" style="width: <?php echo $nextprolvl; ?>;">
              <span class="cssProgress-label"> Kills: <?php echo $kills; ?> / Rank: <?php echo $nowlelelm; ?> / <?php echo $nextprolvl; ?></span>
            </div>
          </div>
        </div>
		</td>
   </tr> 
   
    
  </table> 
</center>

  <br/>
<?php
}














if($infomore == 'max'){
if (!empty($search)){
			       if(empty($head)) $head = 0;			
			if(empty($torso_lower)) $torso_lower = 0;	
			if(empty($torso_upper)) $torso_upper = 0;	
		if(empty($right_arm_lower)) $right_arm_lower = 0;	
		 if(empty($left_leg_upper)) $left_leg_upper = 0;	
			       if(empty($neck)) $neck = 0;	
		if(empty($right_arm_upper)) $right_arm_upper = 0;	
			  if(empty($left_hand)) $left_hand = 0;	
		 if(empty($left_arm_lower)) $left_arm_lower = 0;	
			       if(empty($none)) $none = 0;	
		if(empty($right_leg_upper)) $right_leg_upper = 0;	
		 if(empty($left_arm_upper)) $left_arm_upper = 0;	
		if(empty($right_leg_lower)) $right_leg_lower = 0;	
			  if(empty($left_foot)) $left_foot = 0;	
			 if(empty($right_foot)) $right_foot = 0;	
			 if(empty($right_hand)) $right_hand = 0;									
		 if(empty($left_leg_lower)) $left_leg_lower = 0;	
	
			       if(!empty($head)) $head = 0;			
			if(!empty($torso_lower)) $torso_lower = 0;	
			if(!empty($torso_upper)) $torso_upper = 0;	
		if(!empty($right_arm_lower)) $right_arm_lower = 0;	
		 if(!empty($left_leg_upper)) $left_leg_upper = 0;	
			       if(!empty($neck)) $neck = 0;	
		if(!empty($right_arm_upper)) $right_arm_upper = 0;	
			  if(!empty($left_hand)) $left_hand = 0;	
		 if(!empty($left_arm_lower)) $left_arm_lower = 0;	
			       if(!empty($none)) $none = 0;	
		if(!empty($right_leg_upper)) $right_leg_upper = 0;	
		 if(!empty($left_arm_upper)) $left_arm_upper = 0;	
		if(!empty($right_leg_lower)) $right_leg_lower = 0;	
			  if(!empty($left_foot)) $left_foot = 0;	
			 if(!empty($right_foot)) $right_foot = 0;	
			 if(!empty($right_hand)) $right_hand = 0;									
		 if(!empty($left_leg_lower)) $left_leg_lower = 0;
	
$us = $bdd->query("SELECT s_pg,head,torso_lower,torso_upper,right_arm_lower,
	left_leg_upper,neck,right_arm_upper,left_hand,
left_arm_lower,none,right_leg_upper,left_arm_upper,right_leg_lower,left_foot,right_foot,
right_hand,left_leg_lower FROM db_stats_hits where s_pg = '".$guidxport."' LIMIT 1");  
 while ($t = $us->fetch())	
{	
			       $head = $t['head'];			
			$torso_lower = $t['torso_lower'];	
			$torso_upper = $t['torso_upper'];	
		$right_arm_lower = $t['right_arm_lower'];	
		 $left_leg_upper = $t['left_leg_upper'];	
			       $neck = $t['neck'];	
		$right_arm_upper = $t['right_arm_upper'];	
			  $left_hand = $t['left_hand'];	
		 $left_arm_lower = $t['left_arm_lower'];	
			       $none = $t['none'];	
		$right_leg_upper = $t['right_leg_upper'];	
		 $left_arm_upper = $t['left_arm_upper'];	
		$right_leg_lower = $t['right_leg_lower'];	
			  $left_foot = $t['left_foot'];	
			 $right_foot = $t['right_foot'];	
			 $right_hand = $t['right_hand'];									
		 $left_leg_lower = $t['left_leg_lower'];	
}



if (($_GET['theme']) == 'light')
echo "</br><div style=\"width: 1100px; height: 340px; border-radius: 5px; border: 4px solid #999;\">";
else
echo "</br><div style=\"width: 1100px; height: 340px; border-radius: 5px; border: 4px solid #000;\">";

echo "</br><div class=\"containerx\"> 
<div class=\"containert\">
<img src=\"".$ssylka_na_codbox."img/body/allmodels-vx.png\" width=\"220px\">
  
  <div class=\"headshot\"><span tooltip=\"$hit_head $head\">".round((get_percentage($head, $killz)))."%</span></div>
  
  <div class=\"torso_lower\"><span tooltip=\"$hit_torso_lower $torso_lower\">".round((get_percentage($torso_lower, $killz)))."%</span></div>
  
  <div class=\"torso_upper\"><span tooltip=\"$hit_torso_upper $torso_upper\">".round((get_percentage($torso_upper, $killz)))."%</span></div>
  <div class=\"neck\"><span tooltip=\"$hit_neck $neck\">".round((get_percentage($neck, $killz)))."%</span></div>
  <div class=\"right_arm_upper\"><span tooltip=\"$hit_right_arm_upper $right_arm_upper\">".round((get_percentage($right_arm_upper, $killz)))."%</span></div>
  <div class=\"right_arm_lower\"><span tooltip=\"$hit_right_arm_lower $right_arm_lower\">".round((get_percentage($right_arm_lower, $killz)))."%</span></div>
  <div class=\"right_hand\"><span tooltip=\"$hit_right_hand $right_hand\">".round((get_percentage($right_hand, $killz)))."%</span></div>
  <div class=\"left_arm_upper\"><span tooltip=\"$hit_left_arm_upper $left_arm_upper\">".round((get_percentage($left_arm_upper, $killz)))."%</span></div>
  <div class=\"left_arm_lower\"><span tooltip=\"$hit_left_arm_lower $left_arm_lower\">".round((get_percentage($left_arm_lower, $killz)))."%</span></div>
  <div class=\"left_hand\"><span tooltip=\"$hit_left_hand $left_hand\">".round((get_percentage($left_hand, $killz)))."%</span></div>  

  <div class=\"right_leg_upper\"><span tooltip=\"$hit_right_leg_upper $right_leg_upper\">".round((get_percentage($right_leg_upper, $killz)))."%</span></div>  
  <div class=\"right_leg_lower\"><span tooltip=\"$hit_right_leg_lower $right_leg_lower\">".round((get_percentage($right_leg_lower, $killz)))."%</span></div> 
  <div class=\"right_foot\"><span tooltip=\"$hit_right_foot $right_foot\">".round((get_percentage($right_foot, $killz)))."%</span></div> 
  
  <div class=\"left_leg_upper\"><span tooltip=\"$hit_left_leg_upper $left_leg_upper\">".round((get_percentage($left_leg_upper, $killz)))."%</span></div>  
  <div class=\"left_leg_lower\"><span tooltip=\"$hit_left_leg_lower $left_leg_lower\">".round((get_percentage($left_leg_lower, $killz)))."%</span></div> 
  <div class=\"left_foot\"><span tooltip=\"$hit_left_foot $left_foot\">".round((get_percentage($left_foot, $killz)))."%</span></div>   
  
</div></div> 

 
";	
	
*/	
	
$guid = $search; 
$server_port = $cntz;
 
 
 ///////LEVEL 1
 
 if($infomore=='max')
 $reponsex=$bdd ->query("SELECT s_pg,s_guid,s_player from db_stats_0 where s_pg = $yosearch limit 1");
else
 $reponsex=$bdd ->query("SELECT s_pg,s_guid,s_player from db_stats_0 where s_guid = $guid and s_port=$server_port limit 1");
 
 
while ($row = $reponsex->fetch())	
{	
     $playerUID = $row['s_pg'];
     $player = $row['s_player'];	 
} 
 
//////////////////////////////////////////////////////////////////////////////////	
$crn_bf = $crn_s.md5(md5(md5($playerUID))).".log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, w_skill, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_port, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_2.s_port, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg		
        WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_2.s_port = $server_port and db_stats_1.s_kills >= 1000
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUID");	 
 
 
while ($row = $rex->fetch())	
{	
  $player_place_skill = $row['sort'];
     	 
} 

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_skill);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
      $randomz = rand(100, 900);
	  $randomzx = $randomz + 9800;
   
      if (time()-$filemtime > $randomzx)  //21600  4 hours   //86400 24h
			{	
///////LEVEL 2
 if(empty($search_skill)){
$rex=$bdd ->query("SELECT sort, w_skill, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_port, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_2.s_port, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg		
        WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_2.s_port = $server_port and db_stats_1.s_kills >= 1000
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUID");	 
 
 
while ($row = $rex->fetch())	
{	
  $player_place_skill = $row['sort'];
     	 
}
 
$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_skill);	
fclose($fpl);}
			}
			else
			{
$fpl = file($crn_bf);
$player_place_skill = $fpl[0];
			}
//////////////////////////////////////////////////////////////////////////////////	
	 
//////////////////////////////////////////////////////////////////////////////////	
$crn_bf = $crn_s.$server_port.md5(md5(md5($playerUID))).".log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, s_kills, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, s_kills, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_1.s_kills, db_stats_1.s_pg, db_stats_0.s_lasttime
        FROM db_stats_1
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
        WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_0.s_port = $server_port and db_stats_1.s_kills >= 1000
        ORDER BY s_kills DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUID");	 
 
 
while ($row = $rex->fetch())	
{	
    $player_place_kills = $row['sort'];
     	 
} 

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_kills);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
      $randomz = rand(100, 900);
	  $randomzx = $randomz + 9800;
   
      if (time()-$filemtime > $randomzx)  //21600  4 hours   //86400 24h
			{	
			 if(empty($search_skill)){
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, s_kills, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, s_kills, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_1.s_kills, db_stats_1.s_pg, db_stats_0.s_lasttime
        FROM db_stats_1
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
        WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_0.s_port = $server_port and db_stats_1.s_kills >= 1000
        ORDER BY s_kills DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUID");	 
 
 
while ($row = $rex->fetch())	
{	
    $player_place_kills = $row['sort'];
     	 
}
			 
$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_kills);	
fclose($fpl);}
			}
			else
			{
$fpl = file($crn_bf);
$player_place_kills = $fpl[0];
			}
//////////////////////////////////////////////////////////////////////////////////	
	
 	 
//////////////////////////////////////////////////////////////////////////////////	
$crn_bf = $crn_s.$server_port."_".md5(md5($playerUID)).".log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, s_heads, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, s_heads, s_pg, s_port, s_lasttime
    FROM
    (
        SELECT db_stats_1.s_heads, db_stats_1.s_pg, db_stats_0.s_port, db_stats_0.s_lasttime
        FROM db_stats_1
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
        WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_0.s_port = $server_port and db_stats_1.s_kills >= 1000
        ORDER BY s_heads DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUID");	 
 
 
while ($row = $rex->fetch())	
{	
    $player_place_heads = $row['sort'];
     	 
} 

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_heads);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
      $randomz = rand(100, 900);
	  $randomzx = $randomz + 9800;
   
      if (time()-$filemtime > $randomzx)  //21600  4 hours   //86400 24h
			{	
			 if(empty($search_skill)){
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, s_heads, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, s_heads, s_pg, s_port, s_lasttime
    FROM
    (
        SELECT db_stats_1.s_heads, db_stats_1.s_pg, db_stats_0.s_port, db_stats_0.s_lasttime
        FROM db_stats_1
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
        WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_0.s_port = $server_port and db_stats_1.s_kills >= 1000
        ORDER BY s_heads DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUID");	 
 
 
while ($row = $rex->fetch())	
{	
    $player_place_heads = $row['sort'];
     	 
} 

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_heads);	
fclose($fpl);
			}}
			else
			{
$fpl = file($crn_bf);
$player_place_heads = $fpl[0];
			}
//////////////////////////////////////////////////////////////////////////////////		
	
	
	
	
   
 if($infomore=='max')
 $reponsex=$bdd ->query("SELECT s_pg,s_guid,s_player from db_stats_0 where s_pg = $yosearch limit 1");
else
 $reponsex=$bdd ->query("SELECT s_pg,s_guid,s_player from db_stats_0 where s_guid = $guid and s_port=$server_port limit 1");
  
 
 
 
while ($row = $reponsex->fetch())	
{	
     $playerUIDall = $row['s_pg'];
     //$player = $row['s_player'];	 
} 
 
  
	
//////////////////////////////////////////////////////////////////////////////////	
$crn_bf = $crn_s.md5($server_port)."_".md5(md5($playerUID)).".log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, w_skill, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
		        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		 where DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000 
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUIDall");	 
 
 
while ($row = $rex->fetch())	
{	
  $player_place_skillall = $row['sort'];
     	 
} 

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_skillall);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
      $randomz = rand(100, 900);
	  $randomzx = $randomz + 9800;
   
      if (time()-$filemtime > $randomzx)  //21600  4 hours   //86400 24h
			{
 if(empty($search_skill)){				
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, w_skill, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, w_skill, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_2.w_skill, db_stats_2.s_pg, db_stats_0.s_lasttime
        FROM db_stats_2
        INNER JOIN db_stats_1
        ON db_stats_2.s_pg = db_stats_1.s_pg
		        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		 where DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000 
        ORDER BY w_skill DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUIDall");	 
 
 
while ($row = $rex->fetch())	
{	
  $player_place_skillall = $row['sort'];
     	 
} 

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_skillall);	
fclose($fpl);
			}}
			else
			{
$fpl = file($crn_bf);
$player_place_skillall = $fpl[0];
			}
//////////////////////////////////////////////////////////////////////////////////			
 
//////////////////////////////////////////////////////////////////////////////////	
$crn_bf = $crn_s.md5(md5($server_port))."_".md5(md5($playerUID)).".log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, s_kills, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, s_kills, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_1.s_kills, db_stats_1.s_pg, db_stats_0.s_lasttime
        FROM db_stats_1
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		where DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000 
        ORDER BY s_kills DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUIDall");	 
 
 
while ($row = $rex->fetch())	
{	
    $player_place_killsall = $row['sort'];
     	 
}

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_killsall);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
      $randomz = rand(100, 900);
	  $randomzx = $randomz + 9800;
   
      if (time()-$filemtime > $randomzx)  //21600  4 hours   //86400 24h
			{	
			 if(empty($search_skill)){
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, s_kills, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, s_kills, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_1.s_kills, db_stats_1.s_pg, db_stats_0.s_lasttime
        FROM db_stats_1
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		where DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000 
        ORDER BY s_kills DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUIDall");	 
 
 
while ($row = $rex->fetch())	
{	
    $player_place_killsall = $row['sort'];
     	 
}

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_killsall);	
fclose($fpl);
			}}
			else
			{
$fpl = file($crn_bf);
$player_place_killsall = $fpl[0];
			}
//////////////////////////////////////////////////////////////////////////////////
 		
//////////////////////////////////////////////////////////////////////////////////	
$crn_bf = $crn_s.md5(md5($server_port))."__".md5(md5($playerUID)).".log";	
if(!file_exists($crn_bf))
{
	touch($crn_bf);
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, s_heads, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, s_heads, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_1.s_heads, db_stats_1.s_pg, db_stats_0.s_lasttime
        FROM db_stats_1
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		where DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000 
        ORDER BY s_heads DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUIDall");	 
 
 
while ($row = $rex->fetch())	
{	
    $player_place_headsall = $row['sort'];
     	 
}

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_headsall);	
fclose($fpl);
}	
				
$filemtime=filemtime($crn_bf);
   
      $randomz = rand(100, 900);
	  $randomzx = $randomz + 9800;
   
      if (time()-$filemtime > $randomzx)  //21600  4 hours   //86400 24h
			{	
			 if(empty($search_skill)){
///////LEVEL 2
///////LEVEL 2
$rex=$bdd ->query("SELECT sort, s_heads, s_lasttime
FROM
(
    SELECT @sort:=@sort + 1 AS sort, s_heads, s_pg, s_lasttime
    FROM
    (
        SELECT db_stats_1.s_heads, db_stats_1.s_pg, db_stats_0.s_lasttime
        FROM db_stats_1
        INNER JOIN db_stats_0
        ON db_stats_1.s_pg = db_stats_0.s_pg
		where DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= db_stats_0.s_lasttime and db_stats_1.s_kills >= 1000 
        ORDER BY s_heads DESC
    ) sub0
    CROSS JOIN (SELECT @sort:=0) sub2
) sub1
WHERE sub1.s_pg = $playerUIDall");	 
 
 
while ($row = $rex->fetch())	
{	
    $player_place_headsall = $row['sort'];
     	 
}

$fpl = fopen($crn_bf, 'w+');
fwrite($fpl, $player_place_headsall);	
fclose($fpl);
			}}
			else
			{
$fpl = file($crn_bf);
$player_place_headsall = $fpl[0];
			}
//////////////////////////////////////////////////////////////////////////////////	
	
$shadowheader = 'color: #000; text-shadow: 0 0 1px #000, 0 0 1px #fff, 0 0 2px #000, 0 0 3px #fff, 0 0 2px #fff, 0 0 3px #fff, 0 0 3px #000, 0 0 4px #fff;';
echo " 
 <a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"font-family: Impact;font-size: 17px;\">
".$playeed_date."
</a> 
     </br>
	 
&emsp;<span style=\"font-size: 15px;color:#d17519;text-shadow: 0 0 1px lime, 0 0 2px #000, 0 0 3px lime, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> $t_lasttime: </span>  
      <span style=\"font-size: 15px;color:#d17519;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> ".$lasttime."&emsp;</span>
      <span style=\"font-size: 15px;color:#21a300;text-shadow: 0 0 1px red, 0 0 2px #000, 0 0 3px red, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> $t_timee: </span>  
      <span style=\"font-size: 15px;color:#21a300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$timee."&emsp;</span>
 ";

	
echo "</br></br> 
 <a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"font-family: Impact;font-size: 17px;\">
".$playeed."
</a> 
     </br>
	 
&emsp;<span style=\"font-size: 15px;color:#d17519;text-shadow: 0 0 1px lime, 0 0 2px #000, 0 0 3px lime, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> $t_ago: </span>  
      <span style=\"font-size: 15px;color:#d17519;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> ".$timee2."&emsp;</span>
      <span style=\"font-size: 15px;color:#21a300;text-shadow: 0 0 1px red, 0 0 2px #000, 0 0 3px red, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> $t_tottal: </span>  
      <span style=\"font-size: 15px;color:#21a300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$lasttime2."&emsp;</span>
 ";	
	
 

 
 
 
 
 
echo "</br></br>";	
echo " 
 <a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"font-family: Impact;font-size: 17px;\">
".$t_player_place_all."
</a> 
   </br>    
	   
&emsp;<span style=\"font-size: 15px;color:red;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> $t_player_place_skill: </span>   
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:red;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> ".$player_place_skillall."&emsp;</span>
      <span style=\"font-size: 15px;color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\">  $t_player_place_kills: </span>  
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$player_place_killsall."&emsp;</span>	
	
      <span style=\"font-size: 15px;color:#86b300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\">".$t_player_place_heads.": </span>  
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:#86b300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$player_place_headsall."&emsp;</span>";	
	 
 
 
 
 
 
 
 
echo "</br></br>";	
echo " 
 <a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"font-family: Impact;font-size: 17px;\">
".$t_player_place."
</a> 
   </br>    
	   
&emsp;<span style=\"font-size: 15px;color:red;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> $t_player_place_skill: </span>   
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:red;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> ".$player_place_skill."&emsp;</span>
      <span style=\"font-size: 15px;color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\">  $t_player_place_kills: </span>  
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$player_place_kills."&emsp;</span>	
	
      <span style=\"font-size: 15px;color:#86b300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\">".$t_player_place_heads.": </span>  
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:#86b300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$player_place_heads."&emsp;</span>";	
	












	
echo "</br></br>";	
	
	
echo " 
 <a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"font-family: Impact;font-size: 17px;\">
".$t_series."
</a> 
   </br>    
	   
&emsp;<span style=\"font-size: 15px;color:red;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> $t_kills: </span>   
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:red;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> ".$n_kills."</span> 
	  
	  <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:pink;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\">(&nbsp;".$n_kills_min."/min &nbsp;) &emsp;</span>
      
	  
	  <span style=\"font-size: 15px;color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\">  $t_deaths: </span>  
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$n_deaths."&emsp;</span>	
	
      <span style=\"font-size: 15px;color:#86b300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\">".$t_heads.": </span>  
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:#86b300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$n_heads."&emsp;</span>
	  
	  </BR></BR>
	  	<span tooltip=\"Player in Mamba\"><a href=\"".$ssylka_na_codbox."mamba.php?guid=".$guidr."\" target=\"_blank\">[Mamba]</a></span>		 
	<span tooltip=\"Player in Screenshots\"><a href=\"".$ssylka_na_codbox."screenshots.php?searchh=".$guidr."\" target=\"_blank\">[Screenshots]</a></span>
	  ";	


echo "</br>";		
 
/*
echo "</br></br>";	 
echo " 
 <a href=\"".$ssylka_na_codbox."stats.php?time=".$dtx2."&main=". $chatdbarc."&server=".$server."\" style=\"font-family: Verdana; font-size: 15px;".$shadowheader."\">
".$t_series."
</a> 
   </br>    
	   
&emsp;<span style=\"font-size: 15px;color:red;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> $t_kills: </span>   
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:red;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 1px ".$color_date_time.", 0 0 2px ".$color_date_time.", 0 0 3px ".$color_date_time.";\"> ".$n_kills."&emsp;</span>
      <span style=\"font-size: 15px;color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\">  $t_deaths: </span>  
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:lime;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$n_deaths."&emsp;</span>	
	
      <span style=\"font-size: 15px;color:#86b300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\">".$t_heads.": </span>  
      <span style=\"font-family: Ariel, fantasy;font-size: 15px;color:#86b300;text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px lime, 0 0 2px lime, 0 0 1px lime, 0 0 2px lime, 0 0 3px lime;\"> ".$n_heads."&emsp;</span>";	
*/			
	

echo "</div>";
 





 

if($infomore == 'max'){
///////////////////////////////////////////////////////// HISTORY
echo "<h2> ".$lang_skill_history." </h2>";	
$totalsizesk = 0;
$totalsizekd = 0;


$sk_sky = 0;
$h_jj = $cpath."databases/cached_players_skill_history_record/".$guidxport.".log";
$handley = fopen($h_jj, "r");
if ($handley) {
    while (($liney = fgets($handley)) !== false){

    if(!empty($liney))
        $sk_sky = $liney;
    }
    fclose($handley);
}

$h_skf = $cpath."databases/cached_players_skill_history/".$guidxport.".log";
$ilines = 0;
$handle = fopen($h_skf, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
if(!empty($line)){		
 
$infr = explode("%", $line);

$sk_dt = trim($infr[0]);		
$sk_gd = trim($infr[1]);	
$sk_kd = trim($infr[2]);
$sk_sk = trim($infr[3]);

$sk_dtc = $sk_dt;
++$ilines;
        $sk_df = explode("-", $sk_dt);
		$sk_df[1];
		$sk_df[2];
		
		$ftm = $sk_df[1].'-'.$sk_df[2];
		$ftmj = explode(" ", $ftm);
		$timep = $ftmj[0];
		
		$sk_du = explode(":", $sk_dt);
		$newtt = $sk_du[0].':'.$sk_du[1];
        $ftmg = explode(" ", $newtt);
		$timeq = $ftmg[1];
		
		$sk_dt = $timep;
		
		$dataPoints0[$sk_dt] = $sk_dt;
		
 
	    $sk_dt = $timep.' '.$timeq;
	    $dataPointsskdata[] = $sk_sk.' ['.$sk_dtc.']';
	         
		$dataPoints1[] = $sk_sk;
		$totalsizesk = $totalsizesk + $sk_sk;
		
		$dataPoints2[] = $infr[2];
		$totalsizekd = $totalsizekd + $sk_kd;
	     
		$newsktb = round($sk_sk/100);
	    $dataPointsx[] = $newsktb;  
		
		$newsktk = $sk_kd/0.2345;
		$dataPointskd[] = $newsktk;
    }}
    fclose($handle);
}
 
 $players_dtx = implode("','", $dataPoints0);
 $players_skillx = implode(",", $dataPoints1);
 $players_ratiox = implode(",", $dataPoints2);
 $players_skillx_tab = implode(",", $dataPointsx);
 $players_kdx_tab = implode(",", $dataPointskd);
  $players_skillxdata = implode("','", $dataPointsskdata);

 if(!empty($sk_sky))
 $maxpoindata =  $sk_sky; //max($dataPoints1);
else
 $maxpoindata =  max($dataPoints1);	

 $maxpoindatakd = max($dataPoints2);
 $maxpoindatab =  $maxpoindata+100;
 
 if(!empty($totalgames))
 $infoox  = '  /  '.$t_tottal.' - '.$totalgames;
else
 $infoox  = '';	
 
 echo '<h4>'.$ilines.' - '.$t_total_games.'. '.$infoox.'</h4>';
 
  $avg_skills = (floor(($totalsizesk/$ilines)*1000)/1000);
  $avg_ratios = (floor(($totalsizekd/$ilines)*1000)/1000);
  
define("dtx", "'".$players_dtx."'");
define("skillx", $players_skillx);
define("skillxdata", "'".$players_skillxdata."'");
define("tabskillx", $players_skillx_tab);
//define("ratiiox", $players_ratiox);
define("tabkdx", $players_kdx_tab); 

 
if (($_GET['theme']) == 'light'){
?> 
<div style="width: 1100px; height: 380px;color:#FFFFFF; border-radius: 5px; border: 4px solid #999;">
<br/>
    <div id="cc1"></div>
    <div id="cc4"></div>
    <div id="cc5"></div>
    <div id="cc6"></div>
    <div id="cc7"></div>
</div><br/>
<script>
    data   = [<?php echo skillx; ?>];
	data2   = [<?php echo skillxdata; ?>];
    tooltips = [];
    
    // Create the tooltips
    for (var i=0; i<data2.length; i+=1) {
        tooltips[i] = String(data2[i])
    }

    l1 = new RGraph.SVG.Line({
        id: 'cc1',
        data: data,
        options: {
			tooltips: tooltips,
            key: [<?php echo "'".$lang_skill_history_sk_archive."'"; ?>],
            keyColorShape: 'circle',
            keyTextSize: 10,
            keyOffsetx: -220,
            marginTop: 35,
            filled: true,
			textColor:  'black',
            colors: ['#058DC7'],
            linewidth: 5,
            tickmarksStyle: 'filledcircle',
            filledOpacity:  0.75,
            filledColors:  ['#E6F4FA'],
            textSize: 9,
            yaxis: false,
            yaxisScaleMax: <?php echo $maxpoindatab; ?>,
            yaxisLabelsCount: 4,
            xaxis:false,
            xaxisLabels: [<?php echo dtx; ?>],
            backgroundGridBorder: false,
            backgroundGridVlines: false,
            backgroundGridHlinesCount: 2
        }
    }).draw();
    
    // Set the GLOBALS to the required configuration so it doesn't have to continually set
    RGraph.SVG.GLOBALS.backgroundGrid = false;
    RGraph.SVG.GLOBALS.marginLeft     = 15;
    RGraph.SVG.GLOBALS.marginRight    = 15;
    RGraph.SVG.GLOBALS.marginTop      = 15;
    RGraph.SVG.GLOBALS.marginBottom   = 5;
    RGraph.SVG.GLOBALS.filled         = true;
    RGraph.SVG.GLOBALS.colors         = ['#058DC7'];
 
    RGraph.SVG.GLOBALS.filledColors   = ['#E6F4FA'];
    RGraph.SVG.GLOBALS.textSize       = 8;
    RGraph.SVG.GLOBALS.yaxis          = false;
    RGraph.SVG.GLOBALS.yaxisScaleMax  = 20;
    RGraph.SVG.GLOBALS.yaxisScale     = false;
    RGraph.SVG.GLOBALS.xaxis          = false;
    RGraph.SVG.GLOBALS.backgroundGrid = false;
    
    // The smaller charts
    
    l4 = new RGraph.SVG.Line({id: 'cc4',data: [<?php echo tabskillx; ?>]}).draw();
    l5 = new RGraph.SVG.Line({id: 'cc5',data: [<?php echo tabkdx; ?>]}).draw();
    l6 = new RGraph.SVG.Line({id: 'cc6',data: [<?php echo tabskillx; ?>]}).draw();
    l7 = new RGraph.SVG.Line({id: 'cc7',data: [<?php echo tabkdx; ?>]}).draw();

    x    = 5;
    y    = 10;
    size = 8;
    
    RGraph.SVG.text({object: l4, x: x, y: y, text: <?php echo "'".$lang_skill_history_sk_record."'"; ?>,size: size});
    RGraph.SVG.text({object: l5, x: x, y: y, text: <?php echo "'".$lang_skill_history_kd_record."'"; ?>,size: size});
    RGraph.SVG.text({object: l6, x: x, y: y, text: <?php echo "'".$lang_skill_history_sk_avg."'"; ?>,size: size});
    RGraph.SVG.text({object: l7, x: x, y: y, text: <?php echo "'".$lang_skill_history_kd_avg."'"; ?>,size: size});

    y    = 30;
    size = 16;
    
    RGraph.SVG.text({object: l4, x: x, y: y, text: <?php echo $maxpoindata; ?>,size: size});
    RGraph.SVG.text({object: l5, x: x, y: y, text: <?php echo $maxpoindatakd; ?>,size: size});
    RGraph.SVG.text({object: l6, x: x, y: y, text: <?php echo $avg_skills; ?>,size: size});
    RGraph.SVG.text({object: l7, x: x, y: y, text: <?php echo $avg_ratios; ?>,size: size});
</script>
<?php
}else{
?>
<div style="width: 1100px; height: 380px; color:#FFFFFF;  border-radius: 5px; border: 4px solid #000;">
    <br/>
	<div id="cc1"></div>
    <div id="cc4"></div>
    <div id="cc5"></div>
    <div id="cc6"></div>
    <div id="cc7"></div>
</div><br/>
<script>
    data   = [<?php echo skillx; ?>];
	data2   = [<?php echo skillxdata; ?>];
    tooltips = [];
    
    // Create the tooltips
    for (var i=0; i<data2.length; i+=1) {
        tooltips[i] = String(data2[i])
    }

    l1 = new RGraph.SVG.Line({
        id: 'cc1',
        data: data,
        options: {
			tooltips: tooltips,
            key: [<?php echo "'".$lang_skill_history_sk_archive."'"; ?>],
            keyColorShape: 'circle',
			keyLabelsColor:  ['#000'],
            keyTextSize: 10,
            keyOffsetx: -220,
            marginTop: 35,
            filled: true,
			textColor:  'white',
            colors: ['#058DC7'],
            linewidth: 5,
            tickmarksStyle: 'filledcircle',
            filledOpacity:  0.75,
            filledColors:  ['#696969'],
            textSize: 9,
            yaxis: false,
            yaxisScaleMax: <?php echo $maxpoindatab; ?>,
            yaxisLabelsCount: 4,
            xaxis:false,
            xaxisLabels: [<?php echo dtx; ?>],
            backgroundGridBorder: false,
            backgroundGridVlines: false,
            backgroundGridHlinesCount: 2
        }
    }).draw();
    
    // Set the GLOBALS to the required configuration so it doesn't have to continually set
    RGraph.SVG.GLOBALS.backgroundGrid = false;
    RGraph.SVG.GLOBALS.marginLeft     = 15;
    RGraph.SVG.GLOBALS.marginRight    = 15;
    RGraph.SVG.GLOBALS.marginTop      = 15;
    RGraph.SVG.GLOBALS.marginBottom   = 5;
    RGraph.SVG.GLOBALS.filled         = true;
    RGraph.SVG.GLOBALS.colors         = ['#058DC7'];
	RGraph.SVG.GLOBALS.textColor      = ['#ffffff'];
	RGraph.SVG.GLOBALS.color          = ['#ffffff'];
    RGraph.SVG.GLOBALS.filledColors   = ['#696969'];
    RGraph.SVG.GLOBALS.textSize       = 8;
    RGraph.SVG.GLOBALS.yaxis          = false;
    RGraph.SVG.GLOBALS.yaxisScaleMax  = 20;
    RGraph.SVG.GLOBALS.yaxisScale     = false;
    RGraph.SVG.GLOBALS.xaxis          = false;
    RGraph.SVG.GLOBALS.backgroundGrid = false;
    
    // The smaller charts
    
    l4 = new RGraph.SVG.Line({id: 'cc4',textColor: 'white',color: 'white',data: [<?php echo tabskillx; ?>]}).draw();
    l5 = new RGraph.SVG.Line({id: 'cc5',textColor: 'white',color: 'white',data: [<?php echo tabkdx; ?>]}).draw();
    l6 = new RGraph.SVG.Line({id: 'cc6',textColor: 'white',color: 'white',data: [<?php echo tabskillx; ?>]}).draw();
    l7 = new RGraph.SVG.Line({id: 'cc7',textColor: 'white',color: 'white',data: [<?php echo tabkdx; ?>]}).draw();

    x    = 5;
    y    = 10;
    size = 8;
    
    RGraph.SVG.text({object: l4, x: x, y: y, textColor: 'white',color: 'white', text: <?php echo "'".$lang_skill_history_sk_record."'"; ?>,size: size});
    RGraph.SVG.text({object: l5, x: x, y: y, textColor: 'white',color: 'white', text: <?php echo "'".$lang_skill_history_kd_record."'"; ?>,size: size});
    RGraph.SVG.text({object: l6, x: x, y: y, textColor: 'white',color: 'white', text: <?php echo "'".$lang_skill_history_sk_avg."'"; ?>,size: size});
    RGraph.SVG.text({object: l7, x: x, y: y, textColor: 'white',color: 'white', text: <?php echo "'".$lang_skill_history_kd_avg."'"; ?>,size: size});

    y    = 30;
    size = 16;
    
    RGraph.SVG.text({object: l4, x: x, y: y, textColor: 'white',color: 'white', text: <?php echo $maxpoindata; ?>,size: size});
    RGraph.SVG.text({object: l5, x: x, y: y, textColor: 'white',color: 'white', text: <?php echo $maxpoindatakd; ?>,size: size});
    RGraph.SVG.text({object: l6, x: x, y: y, textColor: 'white',color: 'white', text: <?php echo $avg_skills; ?>,size: size});
    RGraph.SVG.text({object: l7, x: x, y: y, textColor: 'white',color: 'white', text: <?php echo $avg_ratios; ?>,size: size});
</script>

<?php
}


 
unset($dataPoints0);
unset($dataPoints1);
unset($dataPoints2);
unset($dataPointskd);
unset($dataPointsskdata);
///////////////////////////////////////////////////////// HISTORY

$totalsizesk = 0;
$totalsizekd = 0;


$sk_sky = 0;
$h_jj = $cpath."databases/cached_players_skill_history_record/".$guidxport.".log";
$handley = fopen($h_jj, "r");
if ($handley) {
    while (($liney = fgets($handley)) !== false){

    if(!empty($liney))
        $sk_sky = $liney;
    }
    fclose($handley);
}

$h_skf = $cpath."databases/cached_players_skill_history/".$guidxport.".log";
$ilines = 0;
$handle = fopen($h_skf, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
if(!empty($line)){		
 
$infr = explode("%", $line);

$sk_dt = trim($infr[0]);		
$sk_gd = trim($infr[1]);	
$sk_kd = trim($infr[2]);
$sk_sk = trim($infr[3]);

$sk_dtc = $sk_dt;
             ++$ilines;
        $sk_df = explode("-", $sk_dt);
		$sk_df[1];
		$sk_df[2];
		
		$ftm = $sk_df[1].'-'.$sk_df[2];
		$ftmj = explode(" ", $ftm);
		$timep = $ftmj[0];
		
		$sk_du = explode(":", $sk_dt);
		$newtt = $sk_du[0].':'.$sk_du[1];
        $ftmg = explode(" ", $newtt);
		$timeq = $ftmg[1];
		
		$sk_dt = $timep;
		
		$dataPoints0[$sk_dt] = $sk_dt;
		
 
	    $sk_dt = $timep.' '.$timeq;
	    $dataPointsskdata[] = $sk_kd.' ['.$sk_dtc.']';
	         
		$dataPoints1[] = (($sk_kd/3)*133);
		$totalsizesk = $totalsizesk + $sk_sk;
		
		$dataPoints2[] = $infr[2];
		$totalsizekd = $totalsizekd + $sk_kd;
	     
		$newsktb = round($sk_sk/100);
	    $dataPointsx[] = $newsktb;  
		
		$newsktk = $sk_kd/0.2345;
		$dataPointskd[] = $newsktk;
    }}
    fclose($handle);
}
 
 $players_dtx = implode("','", $dataPoints0);
 $players_skillx = implode(",", $dataPoints1);
 $players_ratiox = implode(",", $dataPoints2);
 $players_skillx_tab = implode(",", $dataPointsx);
 $players_kdx_tab = implode(",", $dataPointskd);
  $players_skillxdata = implode("','", $dataPointsskdata);

 if(!empty($sk_sky))
 $maxpoindata =  $sk_sky; //max($dataPoints1);
else
 $maxpoindata =  max($dataPoints1);	

 $maxpoindatakd = max($dataPoints2);
 $maxpoindatab =  $maxpoindata+100;
 
 
  $avg_skills = (floor(($totalsizesk/$ilines)*1000)/1000);
  $avg_ratios = (floor(($totalsizekd/$ilines)*1000)/1000);
  
define("dtxx", "'".$players_dtx."'");
define("skillxx", $players_skillx);
define("skillxdatax", "'".$players_skillxdata."'");
define("tabskillxx", $players_skillx_tab);
//define("ratiiox", $players_ratiox);
define("tabkdxx", $players_kdx_tab); 

 
if (($_GET['theme']) == 'light'){
?> 

<script>
    data   = [<?php echo skillxx; ?>];
	data2   = [<?php echo skillxdatax; ?>];
    tooltips = [];
    
    // Create the tooltips
    for (var i=0; i<data2.length; i+=1) {
        tooltips[i] = String(data2[i])
    }

    l1 = new RGraph.SVG.Line({
        id: 'cc1',
        data: data,
        options: {
			tooltips: tooltips,
            key: [<?php echo "' K/D ".$lang_skill_history."'"; ?>],
            keyColorShape: 'circle',
            keyTextSize: 10,
            keyOffsetx: -224,
            marginTop: 18,
            filled: true,
			textColor:  'black',
            colors: ['#0FF'],
            linewidth: 5,
            tickmarksStyle: 'filledcircle',
            filledOpacity:  0.75,
            filledColors:  ['#E6F4FA'],
            textSize: 9,
            yaxis: false,
            yaxisScaleMax: <?php echo $maxpoindatab; ?>,
            yaxisLabelsCount: 4,
            xaxis:false,
            xaxisLabels: [<?php echo dtxx; ?>],
            backgroundGridBorder: false,
            backgroundGridVlines: false,
            backgroundGridHlinesCount: 2
        }
    }).draw();
    

</script>
<?php
}else{
?>

<script>
    data   = [<?php echo skillxx; ?>];
	data2   = [<?php echo skillxdatax; ?>];
    tooltips = [];
    
    // Create the tooltips
    for (var i=0; i<data2.length; i+=1) {
        tooltips[i] = String(data2[i])
    }

    l1 = new RGraph.SVG.Line({
        id: 'cc1',
        data: data,
        options: {
			tooltips: tooltips,
            key: [<?php echo " 'K/D ".$lang_skill_history."'"; ?>],
            keyColorShape: 'circle',
			keyLabelsColor:  ['#000'],
            keyTextSize: 10,
            keyOffsetx: -224,
            marginTop: 18,
            filled: true,
			textColor:  'white',
            colors: ['#0FF'],
            linewidth: 5,
            tickmarksStyle: 'filledcircle',
            filledOpacity:  0.75,
            filledColors:  ['#696969'],
            textSize: 9,
            yaxis: false,
            yaxisScaleMax: <?php echo $maxpoindatab; ?>,
            yaxisLabelsCount: 4,
            xaxis:false,
            xaxisLabels: [<?php echo dtxx; ?>],
            backgroundGridBorder: false,
            backgroundGridVlines: false,
            backgroundGridHlinesCount: 2
        }
    }).draw();
</script>
 
<?php
}






}




	}
}
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




echo '<div class="footerx"><div class="footer">';




if((empty($paages))|| ($paages == 1)){

///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
if ((strpos($_SERVER["REQUEST_URI"], '/medals.php?main=0&skill=sort') !== false) 
|| (strpos($_SERVER["REQUEST_URI"], '/medals.php') !== false) 
|| ((strpos($_SERVER["REQUEST_URI"], '&skill=sort') !== false)&&(!empty($server))))
{


echo "
<center><h2>$medals</h2></center>";
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
	
if (!empty($server))
$serverxxx = 'where t0.s_port="'.$server.'" and';
else
$serverxxx = 'where';	


	
if(!file_exists($cpath."databases/_cached_medals/"))
  mkdir($cpath."databases/_cached_medals/", 0777, true);	
	
$crn_skill = $cpath."databases/_cached_medals/skill.php";
if(!file_exists($crn_skill))touch($crn_skill);

$crn_kills = $cpath."databases/_cached_medals/kills.php";
if(!file_exists($crn_kills))touch($crn_kills);

$crn_heads = $cpath."databases/_cached_medals/heads.php";
if(!file_exists($crn_heads))touch($crn_heads);

$crn_melle = $cpath."databases/_cached_medals/melle.php";
if(!file_exists($crn_melle))touch($crn_melle);

$crn_cobra = $cpath."databases/_cached_medals/cobra.php";
if(!file_exists($crn_cobra))touch($crn_cobra);

$crn_n_kills = $cpath."databases/_cached_medals/n_kills.php";
if(!file_exists($crn_n_kills))touch($crn_n_kills);	

$crn_n_heads = $cpath."databases/_cached_medals/n_heads.php";
if(!file_exists($crn_n_heads))touch($crn_n_heads);

$crn_n_deaths = $cpath."databases/_cached_medals/n_deaths.php";
if(!file_exists($crn_n_deaths))touch($crn_n_deaths);

$crn_grenade = $cpath."databases/_cached_medals/grenade.php";
if(!file_exists($crn_grenade))touch($crn_grenade);
	
$crn_deaths = $cpath."databases/_cached_medals/deaths.php";
if(!file_exists($crn_deaths))touch($crn_deaths);

$crn_suicide = $cpath."databases/_cached_medals/suicide.php";
if(!file_exists($crn_suicide))touch($crn_suicide);

$crn_ratio = $cpath."databases/_cached_medals/ratio.php";
if(!file_exists($crn_ratio))touch($crn_ratio);

$crn_kill_min = $cpath."databases/_cached_medals/kill_min.php";
if(!file_exists($crn_kill_min))touch($crn_kill_min);

$crn_camp = $cpath."databases/_cached_medals/camper.php";
if(!file_exists($crn_camp))touch($crn_camp);

$crn_anti_skill = $cpath."databases/_cached_medals/anti_skill.php";
if(!file_exists($crn_anti_skill))touch($crn_anti_skill);


include_once("functions/pages/kill_min.php");
include_once("functions/pages/skill.php"); 	
include_once("functions/pages/kills.php");
include_once("functions/pages/heads.php"); 
include_once("functions/pages/melle.php");  
include_once("functions/pages/cobra.php");
include_once("functions/pages/n_kills.php");
include_once("functions/pages/n_heads.php");
include_once("functions/pages/n_deaths.php");
include_once("functions/pages/grenade.php");
include_once("functions/pages/deaths.php");
include_once("functions/pages/suicide.php");
include_once("functions/pages/ratio.php");
include_once("functions/pages/camper.php");
include_once("functions/pages/anti_skill.php");


 
$i = 0;

 echo "<center><h3>$medals_pro</h3></center>
 
<table width=\"480 px\" align=\"center\">
<tbody>
<tr>

 

<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center><img src=\"".$ssylka_na_codbox."img/medals/skill.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">$medals_skill</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$skiller_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$skiller</a> </br> $skill</center></td>
<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_killer.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">$medals_killer</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$killer_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$killer</a>  </br> $kills</center> </td>
<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_headshot.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">$medals_headshots</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$headers_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$headers</a>  </br> $heads</center></td>
<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center><img src=\"".$ssylka_na_codbox."img/medals/Rank_Icon_04_platinum.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">K/D Ratio</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$ratioxr_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$ratioxrpl</a> </br>$ratioxr</center></td>
<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_knifekills.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">$medals_knife</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$knifer_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$knifer</a> </br> $knifes</center></td>
</tr>
</tbody>
</table> ";

 

echo "</br><table width=\"480 px\" align=\"center\">
<tbody>
<tr>
<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_explosivekiller.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">".$medals_grenade."</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$grenadekiller_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">".$grenadekiller."</a> </br> ".$grenade."   </center></td>
<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_cobra_20.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">".$medals_cobra."</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$cobrakiller_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">".$cobrakiller."</a> </br>".$cobra."</center></td>


<td style=\"background:" . ($i % 2 ? $colortdzone : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_killer_series.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">".$medals_series." </br> ".$medals_killer."</b></br>
<a href=\"".$ssylka_na_codbox."stats.php?search=".$n_killkiller_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">".$n_killkiller."</a> </br> ".$n_kills."</center></td>

<td style=\"background:" . ($i % 2 ? $colortdzone : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_killer_minute.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">".$medals_series."</b>/<b style=\"color: red;\">min</b> </br> <b style=\"color: ".$color_medals_nom.";\"> ".$medals_killer."</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$n_kills_min_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">".$n_kills_minr."</a> </br> ".$n_kills_min."</center></td>

<td style=\"background:" . ($i % 2 ? $colortdzone : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_headshot_series.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">".$medals_series." </br> ".$medals_headshots."</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$n_headers_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">".$n_headers."</a> </br> ".$n_heads."</center></td>

</tr>
</tbody>
</table> ";





/*

 echo "<center><h3>$medals_series</h3></center>
 
<table width=\"480 px\" align=\"center\">
<tbody>

<tr>
<td style=\"background:" . ($i % 2 ? $colortdzone : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_killer_series.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">$medals_killer</b></br>
<a href=\"".$ssylka_na_codbox."stats.php?search=".$n_killkiller_guid."&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$n_killkiller</a> </br> $n_kills</center></td>

<td style=\"background:" . ($i % 2 ? $colortdzone : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_killer_minute.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">$medals_killer /min </b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$n_kills_min_guid."&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">".$n_kills_minr."</a> </br> $n_kills_min</center></td>


<td style=\"background:" . ($i % 2 ? $colortdzone : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/medal_pro_headshot_series.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">$medals_headshots</b> </br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$n_headers_guid."&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$n_headers</a> </br> $n_heads</center></td>
</tr>

</tbody>
</table> ";

*/



echo "<center><h3>$medals_anti</h3></center>
 
<table width=\"480 px\" align=\"center\">
<tbody>

	
<tr>
<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/anti_skill.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">Anti $medals_skill</b></br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$skiller_anti_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$skiller_anti</a> </br>$skill_anti</center></td>


<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/medal_anti_no1target_series.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">$medals_series $medals_deaths</b></br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$n_deaths_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$n_deaths</a> </br>$n_death</center></td>

<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/medal_anti_no1target.png\" width=\"80px\"> </br><b style=\"color: ".$color_medals_nom.";\">$medals_deaths</b></br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$antideaths_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$antideaths</a> </br>$s_deaths</center></td>
<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/suicidemaset.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">$medals_suicides</b></br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$suicider_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$suicider</a> </br>$suicids</center></td>
<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals_action.";font-size: 16px;\"><center></br><img src=\"".$ssylka_na_codbox."img/medals/medal_anti_caper.png\" width=\"80px\"> </br> <b style=\"color: ".$color_medals_nom.";\">CAMP</b></br> 
<a href=\"".$ssylka_na_codbox."stats.php?search=".$camp_guid."&info=min&main=".$chatdbarc."\" style=\"font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\">$campl</a> </br>$campr</center></td>

</tr>


</tbody>
</table> ";



 /*
 <td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\"><center></br>
<img src=\"".$ssylka_na_codbox."img/medals/medal_or_ak.png\" width=\"80px\"> </br> Pro AK-47</br> $n_headers : $n_heads</center></td>

<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\"><center></br>
<img src=\"".$ssylka_na_codbox."img/medals/medal_or_m4.png\" width=\"80px\"> </br> Pro M4</br> $n_headers : $n_heads</center></td>

<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\"><center></br>
<img src=\"".$ssylka_na_codbox."img/medals/medal_or2_ak74.png\" width=\"80px\"> </br> Pro AK-74</br> $n_headers : $n_heads</center></td>


<td style=\"background:" . ($i % 2 ? $colortdzzero : $colortdzone) . ";opacity: 0.9; font-family: Titillium Web; color: ".$color_medals.";font-size: 16px;\"><center></br>
<img src=\"".$ssylka_na_codbox."img/medals/medal_pro_artillery.png\" width=\"80px\"> </br> Pro AK-74</br> $n_headers : $n_heads</center></td>

*/
 
}
catch(Exception $e)
{
    
    die('Errors : '.$e->getMessage());
}


}
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
///////////////////////////////MEDALS
}

echo '</br></br> <a href="#" style="font-size:13px; font-family: Ariel;"> '.$t_total_players.': '.$killers.'  </BR> '.$t_top.' : '.$kolichestvi_soobsh.' / '.$kills_limiter_top.'+'.$t_killx2.'!</a>';			
echo '</br></br> <a href="#" style="font-size:13px; font-family: Ariel;">'.$t_gen.' ' . ( microtime(true) - $startx ) . ' '.$t_tsek.' </a>';	
echo "</br> <a href=\"#\" style=\"font-size:13px; font-family: Ariel;\">$t_cachedw $xcache_time $t_tsek</a>";

include_once("footer.php");

if((!empty($key)) || (!empty($_COOKIE['user_online_login']))){
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
  	 	
echo '</div></div>';
}

echo '</div></div></br>';


/*

echo '

<embed src="'.$ssylka_na_codbox.'img/x.mp3" autostart="true" hidden="true" loop="false" width="3" height="2" align="bottom"> </embed>

<div style="visibility: hidden;">
<audio controls autoplay>
  <source src="'.$ssylka_na_codbox.'img/x.mp3" type="audio/mp3">
  Your browser does not support the audio element.
</audio>
</div>

';
*/


if (($_GET['theme']) == 'light') 
  echo '<a href="'.$ssylka_na_codbox.'medals.php?theme=dark" title="Вернуться к началу" class="topbutton">Style</a>';
else
  echo '<a href="'.$ssylka_na_codbox.'medals.php?theme=light" title="Вернуться к началу" class="topbuttondark">Style</a>';

echo '</br></br>  
<!--RECOD.RU Call Of duty game series chat parser by LA|ROCCA --> ';
 
 
 $handle = fopen($cache_file, 'w'); // Открываем файл для записи и стираем его содержимое
  fwrite($handle, ob_get_contents()); // Сохраняем всё содержимое буфера в файл
  fclose($handle); // Закрываем файл
  ob_end_flush(); // Выводим страницу в браузере 
 
?>
</div></body>
</html>		