<?php
////error_reporting(0);
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start(); 
$key = '';
$startx = microtime(true);

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
include_once("functions/words.php"); 
include_once("functions/chatdb_archive.php"); 
include_once("functions/functions.inc.php");  
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





///ТОЛЬКО ЛАЙТ
////////////////////////////////////////////////////////////
$Msql_support = 0;








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
 
if(((!empty($key)) && (empty($_GET['logout']))) || ((!empty($_COOKIE['user_online_x'])) && (empty($_GET['logout'])))){ //| права на базу данных => '.substr(sprintf('%o', fileperms($chatdb_path)), -4).' 
	
if(empty($Msql_support))
	$adminiinfo = ''.$xz.' | БД: '.$sizzedb = (int)(filesize($chatdb_path) / 1000000).' Мб';
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

if(((!empty($key)) && (empty($_GET['logout']))) || ((!empty($_COOKIE['user_online_x'])) && (empty($_GET['logout'])))){ //| права на базу данных => '.substr(sprintf('%o', fileperms($chatdb_path)), -4).' 
	$adminpl = '|<a href="'.$ssylka_na_chat.'adminpanel.php?adminpanel='.$xz.'" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 18px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">АдминПанель</a>
	<a href="'.$ssylka_na_chat.'?logout=logout&lg#Logout!" onclick="location.reload()" style="color:#000;text-shadow:0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #ffa500, 0 0 7px #ffa500, 0 0 18px #ffa500, 0 0 40px #ffa500, 0 0 65px #ffa500;" >Logout!</a>';
}else 
	$adminpl = '|<a href="'.$ssylka_na_chat.'adminpanel.php" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 18px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">Логин</a>';


if (((!empty($_GET['logout'])) && (!empty($_SESSION['username']))) || ((!empty($_GET['logout'])) && (!empty($_COOKIE['user_online_x']))))
{	
echo 'Админ - '.$key.' вышел :)';
setcookie ( 'user_online_x', '', time()-2 );
session_destroy();
echo "<meta http-equiv='refresh' content='0'>";
}

$cache_time = 12;
             //header("Refresh:".$cache_time);
  
if (!empty($_GET['geo'])) 
   $geosearch = $_GET['geo']; 
else
  	$geosearch = 0;

if (!empty($_GET['archive'])) 
{
   $chatdbarc = $_GET['archive'];
   $chatdb_path = dirname( __FILE__ ) . '/chat_archive/'.$chatdbarc;   
}
   else
  	$chatdbarc = 0;

if (!empty($_GET['ip'])) 
   $search_ip = $_GET['ip']; 
else
  	$search_ip = 0;

if (!empty($_GET['st1'])) 
   $statusx1 = $_GET['st1']; 
else
  	$statusx1 = 0;

if (!empty($_GET['st2'])) 
   $statusx2 = $_GET['st2']; 
else
  	$statusx2 = 0;

if(empty($soob_na_page))   
$soob_na_page=40; 

if (!empty($_GET['search'])) 
   $searchplayername = $_GET['search']; 
else
  	$searchplayername = 0;

if (!empty($_GET['timeh'])) 
$timesearch = $_GET['timeh'];
else
  	$timesearch = 0;
  
   if (empty($_GET['page']))
     $cache_time = 12;
  else
   $paages = $_GET['page'];	  
 
  if (empty($_GET['server']))
  {
$cache_time = 12; 
$server = 0;
  }
   else
	$server = $_GET['server']; 

if (!empty($paages)){
	if($paages < 3)
  $cache_time = 12; 
    else
		$cache_time = 10*$paages;}

if (!empty($_GET['search']))
  $cache_time = 55; 

 
if (!empty($server))
		$cache_time = 25; 

if (empty($cache_time))
if (!empty($server))
	$cache_time = 10;

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
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>css/matrix.min.css">
        <script type="text/javascript" src="<?php echo $ssylka_na_ikonki;?>css_js/matrix.min.js" async defer></script>
		<script type="text/javascript" src="<?php echo $ssylka_na_ikonki;?>css_js/html2canvas.js"></script>
		
 <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		
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

<?php if ((empty($_GET['theme'])) || (!empty($_GET['theme']) == 'dark')) {?>
<style>
body{
  transition:0;
  background-color:#141e21; /* #002600 */
  color:#2eb4e9;
  margin: 0;
}
</style>
<?php }
else if ((!empty($_GET['theme']) == 'light')) {
?>
<style>
body{
  transition:0;
  background-color:#ccc; /* #002600 */
  color:#ddd;
  margin: 0;
}
</style>
<?php }?>	
 <script type="text/javascript">
setInterval(function(){ 
$("#blockx").load("<?php echo $file ?> #blockx"); 
}, 6000);
 </script> 
 
  
<script>
var newTxt="<?php echo $title_migalka ?>";
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
   echo '<li>| <a href="'.$ssylka_na_chat.'?server='.$server_md5.'">'.$xservername.'</a></li>';   
}
foreach ($ssylki_array as $arxx => $namessylka) {	
   echo '<li>| <a href="'.$arxx.'" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #990694, 0 0 7px #990694, 0 0 18px #990694, 0 0 40px #990694, 0 0 65px #990694;" target="_blank">'.$namessylka.'</a></li>';   
}
?>
        </ul>
	
<div class="absolute-style"> 
<?php
echo '<a href="'.$ssylka_na_chat.'?archive='.$chatdbarc.'" style="padding-bottom: 40px;"> '. $main_servername . '</a>';

 if((!empty($key)) || (!empty($_COOKIE['user_online_x']))){	 
$seuiotf = substr(sprintf('%o', fileperms($chatdb_path)), -4);

if(empty($Msql_support)){	
if($seuiotf != '0666')
chmod($chatdb_path, 0666);	
}	 
       $dawDe = "<span tooltip=\"Забрать скриншот! Жди 5 сек.\"><a href=\"".$ssylka_na_ikonki."upload/index.php\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:".$cvet_text.";\"> <img src=\"".$ssylka_na_ikonki."img/s_icon.png\" height=\"48px\" width=\"48px\"> </a></span>";	
?>
<span tooltip="Создать скриншот в один клик!">
<form class="button2" name="allsearch" method="get" action="<?php echo $ssylka_na_chat;?>upload/index.php">
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
     
                <div v-for="(group,key) in bTime" v-show="key !== 'h1' || group !== '0000'" class="flex-container flex bit-container">
                    <div v-for="bit in group" :class="['flex', 'bit', (bit === '1')?'lit':'']"></div>
                </div>
            </div>
			<h1><div class="abs-center time"><div id="mydiv" style="display:block;"> 
			<span id="time" ><!-- <span id="time" >10</span> --> <canvas id="DigiRain"></canvas> <canvas id=c></canvas></span>  
			</div></div></h1>
        <div class="rela-block flex-container button-container"><?php echo '&emsp;&emsp;'.$adminiinfo ?>
        </div>

<?php
}
else
$search = $_GET['search'];
?>

 
<br/><br/>

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
$psxzl = 0;
if (!empty($search))
{
	//$search = trim($search);
  if(((23>(strlen($search))) && (18<(strlen($search)))) && (ctype_digit($search)))
  {
	   if (!empty($searchplayername))
	   $searchplayername = '';
	   $psx = 1;
  }
	   else if(!ctype_digit($search))
	   {
             $searchplayername = $search;
			 $_GET['search'] = $searchplayername;
			 $search= '';
			 echo '<br/><br/><br/>';
	   }
		 else{
			 $searchplayername = $search;
			 $_GET['search'] = $searchplayername;
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
//chmod($chatdb_path, 0666);
$chatdb = $chatdb_path;


 
try
{
      
if(empty($Msql_support)){	  
$bddx = new PDO('sqlite:' . $chatdb);
$bddx->exec('CREATE table chat(
			id INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
			servername varchar(255)  NOT NULL,
			s_port varchar(50)  NOT NULL,
			guid varchar(255)  NOT NULL,
			nickname varchar(255)  NOT NULL,
			time varchar(255)  NOT NULL,
			timeh varchar(255)  NOT NULL,			
			text varchar(255)  NOT NULL,			
			st1 varchar(255)  NOT NULL,
			st1days varchar(255)  NOT NULL,			
			st2 varchar(255)  NOT NULL,
            st2days varchar(255)  NOT NULL,			
			ip varchar(255)  NOT NULL,
			geo varchar(255)  NOT NULL,
			z varchar(20)  NOT NULL,
			t varchar(20)  NOT NULL,
			x varchar(20)  NOT NULL,
			c varchar(20)  NOT NULL
	)');	  
	  
}  
	  
	  
	  if(empty($Msql_support))
    $bdd = new PDO('sqlite:' . $chatdb);
      else
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
	  }
//$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //отрубает базу при ошибке + в лог
//$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );   //продолжает работу, идет откладка в лог


$а = 0;
$xpip = 0;
$number_of_rows = 0;

 include_once("functions/db_msql.php");	

$total_messages = $reponse->fetch();
$kolichestvi_soobsh=$total_messages['id']; 

$nb_pages = ceil($kolichestvi_soobsh / $soob_na_page);?>
<div align="center">
<?php
if (isset($_GET['page'])){$page = $_GET['page']; }else {$page = 1; }
$premierMessageAafficher = ($page - 1) * $soob_na_page;
$reponse->closeCursor();
$reponse = null;

if(empty($auto_clear_msql_txt))
	$auto_clear_msql_txt = 20000;
if(($kolichestvi_soobsh > $auto_clear_msql_txt)&&(!empty($Msql_support))){
    $query = "SELECT min(ID) FROM chat";
    $stmt   = $bdd->prepare($query);
    $result = $stmt->execute();
   $min    = $stmt->fetchColumn();	
   $minplus = $min+10000;
   $bdd->exec("DELETE from chat WHERE id BETWEEN $min AND $minplus");
}


if($kolichestvi_soobsh > 1000){
$sql = "SELECT count(*) FROM `chat` WHERE `id` AND `t`= '0'"; 
$result = $bdd->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn();

if(($number_of_rows > 2000)&&(!empty($Msql_support))){
    $query = "SELECT min(ID) FROM chat WHERE `t`= '0'";
    $stmt   = $bdd->prepare($query);
    $result = $stmt->execute();
    $min    = $stmt->fetchColumn();	
	
    $query = "SELECT max(ID) FROM chat WHERE `t`= '0'";
    $stmt   = $bdd->prepare($query);
    $result = $stmt->execute();
    $maxxx    = $stmt->fetchColumn();		
	
    $maxxxx = $maxxx - 2500;
	
    $bdd->exec("DELETE from `chat` WHERE (`t`= '0') AND (`id` BETWEEN $min AND $maxxx)");
}

if(($number_of_rows > 7000)&&(empty($Msql_support))){
    $query = "SELECT min(ID) FROM chat WHERE `t`= '0'";
    $stmt   = $bdd->prepare($query);
    $result = $stmt->execute();
    $min    = $stmt->fetchColumn();	
	
    $query = "SELECT max(ID) FROM chat WHERE `t`= '0'";
    $stmt   = $bdd->prepare($query);
    $result = $stmt->execute();
    $maxxx    = $stmt->fetchColumn();		
	
    $maxxxx = $maxxx-2500;
	
    $bdd->exec("DELETE from `chat` WHERE (`t`= '0') AND (`id` BETWEEN $min AND $maxxx)");
}
}	
 	


 include_once("functions/db_msql_list.php");
 
 echo '<table border="0" id="container">';
 $i=0;
 $ssssob = 0;
 
 $pixelz = 0;
while ($dannye = $reponse->fetch())	
{	

$xplayerip = $dannye['ip']; 
$xpnickname = $dannye['nickname'];
$serverx = $dannye['servername']; 
$cntz = $dannye['s_port'];
$guidxx = $dannye['guid'];
$txt = $dannye['text'];
$geo = $dannye['geo'];

$servername = str_replace($pre_server, "", $serverx);
	if($i == 0) 
	{	//echo "<center><a href='index.php'><h1 style=\"font-family: Impact, fantasy;\">" . colorize($main_servername) . "</h1></a></center>";	

            if (!empty($search))
				echo "<br/><br/><h3>Search - ". $search." </h3>";
			
             if (!empty($server))
				echo "<h2 style=\"font-family: Impact, fantasy;\">". colorize($serverx)." </h2>";

	echo "<tr>";
	
	if (empty($server))
echo "<td style=\"background:#333; height: 28px; font-family: Impact, fantasy; color: #ccc; font-size:14px;\"> <center>&emsp;".$t_server."&emsp;</center></td>";	
echo "<td style=\"background:#333; height: 28px; font-family: Impact, fantasy; color: #ccc; font-size:14px;\"> <center> <b>".$t_time." </b></center></td>
	  <td style=\"background:#333; height: 28px; font-family: Impact, fantasy; color: #ccc; font-size:14px;\"> <center> <b>".$t_city." </b></center></td>
	  <td style=\"background:#333; height: 28px; font-family: Impact, fantasy; color: #ccc; font-size:14px;\"> <center> <b>".$t_nickname."</b> </center></td>
	  ";
	  
	  if((!empty($key)) || (!empty($_COOKIE['user_online_x'])))	
	  echo "<td style=\"background:#333; height: 28px; font-family: Impact, fantasy; color: #ccc; font-size:14px;\"> <center> <b>IP</b> </center></td>";
	  
	  if((!empty($key)) || (!empty($_COOKIE['user_online_x'])))	
	  echo "<td style=\"background:#333; height: 28px; font-family: Impact, fantasy; color: #ccc; font-size:14px;\"> <center> <b>Ban</b> </center></td>";	  
	  
	  echo "<td style=\"background:#333; height: 28px; font-family: Impact, fantasy; color: #ccc; font-size:14px;\"> <center> <b>".$t_messages."</b> (".$kolichestvi_soobsh."/".$number_of_rows.") </center></td>
	</tr>";		
	}
	
$i++;	
$ssssob = $i;
//$geo = mb_strtolower($geo);
          
		       if(((strlen($txt) > 40))&& ($pixelz == 0))
			   {
				$pixelz = 1;   
	        $pixels = 13;
			   }
	           else
			   { 
		       $pixelz = 1;
			$pixels = 15;
			   }
			   

	echo "<tr>";
	if (empty($server)){
	echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.8;color: white; font-size:15px;\"> <a href=\"".$ssylka_na_chat."?server=".$cntz."&archive=".$chatdbarc."\">&emsp;</a>    
<div class=\"tooltip\"><a href=\"".$ssylka_na_chat."?server=".$cntz."&archive=".$chatdbarc."\" class=\"tip\">" . colorize($servername) . " </a>
  <div class=\"tooltip-content\">";
 foreach ($multi_servers_array as $arx => $xservername) {
                           $zb = explode("port:", $arx);
						   $prt = $zb[1];
						   
						   $zx = explode("server_md5:", $arx);
						   $fld = $zx[1];
						   
						   $io = explode("ip:", $arx);
						   $ipv = $io[1];
						   
						           $server_md5 = strtok($fld, " ");
                                   $server_port = strtok($prt, " ");
							       $server_ip = strtok($ipv, " ");
								   
								   
								   $ipport = $ip_for_gametracker.":".$server_port;

	 if($server_md5 == $cntz)
 echo "<a href=\"https://www.gametracker.com/server_info/$ipport/\" target=\"_blank\"><img src=\"https://cache.gametracker.com/server_info/$ipport/b_160_400_0_FFFFFF_C5C5C5_FFC500_000000_0_0_0.png\" border=\"0\" width=\"160px\" height=\"8px\" alt=\"\"/></a>
  ";   }
		 
echo "<div class=\"tooltip-arrow\"></div>
</div></div><a href=\"$ssylka_na_chat?server=$cntz&archive=$chatdbarc\">&emsp;</a></td>";

    }

    $tm = str_replace(".", "-", $dannye['time']);
	$tm = trim($tm);
	
	if(empty($raznica_vremya_admin))
	$raznica_vremya_admin = '-1';
	
	if($geo == 'zag')
      $tm = $tm.'';
    else
		$tm = date( "Y-m-d H:i:s", strtotime( $tm." ".$raznica_vremya." hour" ) );
	
	$xxtime = trim($tm);
    $tm = str_replace("-", ".", $tm);
	
	$tm = time_elapsed_string($xxtime);
	//$db_date = new DateTime($xxtime);
    //$unix_db_date = $db_date->getTimestamp();
    //$tm = getDateString($unix_db_date);
	
	$ttim = $dannye['timeh'];
 
	echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;\"> 
	
	<span tooltip=\"$xxtime\">&nbsp;<a href=\"".$ssylka_na_chat."?timeh=".$ttim."&archive=". $chatdbarc."\"><b style=\"color:".$cvet_date_time.";\">" . $tm . "&emsp;</b> </a> </span>  </td>";
	echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;\">";
	
	
	
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
	
	
	if(!empty($geo))
	  echo '<a href="'.$ssylka_na_chat.'?geo='.$geo.'&archive='. $chatdbarc.'"><span tooltip="'.$fullgeo.'"> <img src="'.$ssylka_na_ikonki.'/flags-mini/'.$geo.'.png" width="24" height="12" alt="'.$fullgeo.'"></span></a>';
	else{
/*	*/		
////////////////////////////////////////////// 
 if((($psxz < 20)&&(!empty($Msql_support)))||(($psxz < 40)&&(empty($Msql_support)))){
 $oss=$bdd ->query("SELECT * From chat where x='1' and guid='$guidxx' limit 1");
while ($xnc = $oss->fetch())
{ 
   if((!empty($xnc['geo']))||(!empty($xnc['ip'])))
   {
	   ++$psxz;
	   ++$psxzl;
   $strana = $xnc['geo']; 
   $ipaddr = $xnc['ip'];
   
   	/// + псевдо загрузка флагов
	echo '<a href="'.$ssylka_na_chat.'?geo='.$strana.'&archive='.$chatdbarc.'"><span tooltip="'.$strana.'"><img src="'.$ssylka_na_chat.'/flags-mini/'.$strana.'.png" width="24" height="12" alt="'.$strana.'"></span></a>';
   
   if($psxzl < 2)
   $bdd->exec("UPDATE chat SET geo='$strana', ip='$ipaddr',x='1' WHERE guid='$guidxx' and z='0'");
  
   }
 }
	}
	}
    echo "</td>";
	$xstatus = '0';
    $st1 = $dannye['st1'];
    $st1poisk =  $st1;
    $st1days = $dannye['st1days'];
    $st2 = $dannye['st2'];
    $st2poisk =  $st2;
    $st2days = $dannye['st2days']; 
 /*   	
   echo '</br> '.$st1;
   echo ' - '.$st1days;
   echo '</br> '.$st2;
   echo ' = '.$st2days;
 */ 
   $st1 = str_replace(' ', '', $st1);
   $st2 = str_replace(' ', '', $st2);
	
	if($st1days < 1)
	{   $st1 = '';
		$st1days = '';
	}
	
	
	if (is_numeric($st2)) 
	{
	$st2days = $st2;
	
	if($st2days == 1)
	$st2 = "VIPGOLD";
	if($st2days > 1)
	$st2 = "VIP";
	
	}
	
  
	if ($st2days < 1)
	{
		$st2 = '';
		$st2days = '';
	}
	

        if($st1 == "ADMINISTRATOR")
	   $xstatus = 'A';
   else if($st1 == "ADMIN")
	   $xstatus = 'M';
   else if($st1 == "VIPGOLD")
	     $xstatus = 'V';
   else if($st1 == "VIP")
	   $xstatus = 'V';
   else if($st1 == "VIPBONUS")
   {
	   $xstatus = 'V';  
	   $st1days = $st1days."/1000";
   }
   
   if($st2 == "VIPGOLD")
	   $xstatus = $vip_status2 = 'V';
   else if($st2 == "VIP")
	     $xstatus =  $vip_status2 = 'V';
   else if($st2 == "VIPBONUS")
	   {
	   $xstatus = $vip_status2 = 'V';
       $st1days = $st1days."/1000";	   
       }	   
   
   $xstatus = '';
   $vip_statusicon = '<img src="'.$ssylka_na_ikonki.'/img/123.png" height="14px" width="14px">';
   
	
   /*
   if ( self.pers["super_admin"] >= 0 )  
    logPrint("PS; ADMINISTRATOR;" + self getGuid() + ";" + self.pers["super_admin"] +"\n");  
    else 
 if ( self.pers["_admin"] >= 0 )  
    logPrint("PS; ADMIN;" + self getGuid() + ";" + self.pers["_admin"] +"\n");
    else
 if ( self.pers["vipegold"] >= 0 )
 logPrint("PS; VIPGOLD;" + self getGuid() + ";" + self.pers["vipegold"] +"\n");
    else
 if ( self.pers["vipexp"] >= 0 ) 
    logPrint("PS; VIP;" + self getGuid() + ";" + self.pers["vipexp"] +"\n");
 else
    if ( self.pers["vipebonus"] >= 0 )
    logPrint("PS; VIPBONUS;" + self getGuid() + ";" + self.pers["vipebonus"] +"\n");
  */
  
/////////////////////////////////////////////// 		
/**/	
	echo ' ';	
	 
   		 if(empty($Msql_support))
		  $nnx = iconv("windows-1251", "utf-8",$xpnickname);
	    else
		  $nnx = iconv("utf-8", "windows-1251",$xpnickname);	
   

   echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web;\">";	       
			echo '<span tooltip="'.$guidxx.'">  <a href="'.$ssylka_na_chat.'?search='.$guidxx.'&archive='.$chatdbarc.'">';      	
		echo "<b style=\"color:".$cvet_nikov.";\">" . colorize($nnx) . "</b> ";
		   echo '</a></span>';

		   if($st1 == "ADMINISTRATOR")
			echo '<span tooltip="'.$st1.'"><a href="'.$ssylka_na_chat.'?st1='.$st1poisk.'&archive='.$chatdbarc.'" style="color:yellow; font-family: Arial Black; font-size:15px;">&#9813;</а></span>';
			  else if($st1 == "ADMIN")
			     echo '<span tooltip="'.$st1.'"><a href="'.$ssylka_na_chat.'?st1='.$st1poisk.'&archive='.$chatdbarc.'" style="color:orange; font-family: Arial Black; font-size:15px;">&#9814;</а></span>';
	
			if($st1 == "VIPGOLD")
	    echo '<span tooltip="'.$st1.'"><b class="bstyle2 flashing2"><a href="'.$ssylka_na_chat.'?st1='.$st1poisk.'&archive='.$chatdbarc.'">'.$vip_statusicon.'</a></b></span>';			 	
			else if($st1 == "VIPBONUS")
		echo '<span tooltip="'.$st1.' - Kills '.$st1days.' ">  <b class="bstyle1 flashing1"><a href="'.$ssylka_na_chat.'?st1='.$st1poisk.'&archive='.$chatdbarc.'">'.$vip_statusicon.'</a></b></span>';		
		    else if($st1 == "VIP")
		echo '<span tooltip="'.$st1.' - Days['.$st1days.']">  <b class="bstyle3 flashing3"><a href="'.$ssylka_na_chat.'?st1='.$st1poisk.'&archive='.$chatdbarc.'">'.$vip_statusicon.'</a></b></span>';
	       
   
	if($st2 == "VIPGOLD")
       echo '<span tooltip="'.$st2.'"><b class="bstyle2 flashing2"><a href="'.$ssylka_na_chat.'?st1='.$st2poisk.'&archive='.$chatdbarc.'">'.$vip_statusicon.'</a></b></span>';			 				
	else if($st2 == "VIPBONUS")
		echo '<span tooltip="'.$st2.' - Kills '.$st2days.' ">  <b class="bstyle1 flashing1"><a href="'.$ssylka_na_chat.'?st1='.$st2poisk.'&archive='.$chatdbarc.'">'.$vip_statusicon.'</a></b></span>';			
	else if($st2 == "VIP")
		echo '<span tooltip="'.$st2.' - Days['.$st2days.']">  <b class="bstyle3 flashing3"><a href="'.$ssylka_na_chat.'?st1='.$st2poisk.'&archive='.$chatdbarc.'">'.$vip_statusicon.'</a></b></span>';

					echo ' </td>';	
	$xstatus = '';	
    $st1 = '';	
    $st2 = '';	
	$st1days = '';
	$st2days = '';
	$vip_statusicon = '';
	$pl_vip_days = '';
	$vip_status2 = '';
		  if((!empty($key)) || (!empty($_COOKIE['user_online_x'])))	{
	  echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;\"><b>&emsp;<a href=\"".$ssylka_na_chat."?ip=".$xplayerip."&archive=".$chatdbarc."\"><b style=\"color:".$cvet_ip.";\">".$xplayerip."</b></a></b></td>";

	 }
		  if((!empty($key)) || (!empty($_COOKIE['user_online_x'])))	{
	  echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver;\">&nbsp;";	  
      //echo '<a href="'.$ssylka_sourcebans.'?p=admin&c=bans&xnickname='.$xpnickname.'&xip='.$xplayerip.'&xguid='.$guidxx.' " style="font-size:16px;" target="_blank"> <b style="color:"'.$cvet_ban_knopki.';">[B]</b> </a> ';
      echo '<a href="https://zona-ato-game.ru/monitoring/redirect.php?chnick='.$xpnickname.'&chip='.$xplayerip.'&chguid='.$guidxx.' " style="font-size:16px;" target="_blank"> <b style="color:"'.$cvet_ban_knopki.';">[B]</b> </a> ';
	  echo "</td>";	
	
		  }	 
  
		if(empty($key))	{
		 $txtemptycnt = substr_count($txt,' ');	
		 if((strlen($txt) > 70) && ($txtemptycnt < 3))
		 $txt = strlen($txt) > 35 ? substr($txt,0,35)."...." : $txt;
	    }
	  
		 $txt = wordwrap($txt, 60, "</br>&emsp;", 1);
 
		 if(empty($Msql_support))
		  $txt = iconv("windows-1251", "utf-8",$txt);
	  
        //  echo "</br>".$txt;
  		//  echo "windows-1251  ".iconv("windows-1251", "utf-8",$txt);
		//  echo "utf-8  ".iconv("utf-8", "windows-1251",$txt);	
  
  
$zzz = mb_strtolower(matmat($txt));
$tgh = 0;
$usedBadWords = array();
foreach($matnie as $val) //:
{
   if(preg_match('/'.$val.'/si',$zzz)) 
	   //$usedBadWords[] = $val;
      $tgh = 1;
} 
//endforeach;
                       foreach ($multi_servers_array as $arxx => $xxservername) {
 
						   $zxх = explode("server_md5:", $arxx);
						   $fldd = $zxх[1];
						   
						   $zf = explode("rcon:", $arxx);
						   $rcn = $zf[1];	
						   
						   $zb = explode("port:", $arxx);
						   $prt = $zb[1];
						   
						   $io = explode("ip:", $arxx);
						   $ipv = $io[1];
						   
							       $server_name = $xxservername;
								    $server_md5 = strtok($fldd, " ");
							       $server_rconpass = strtok($rcn, " ");
							       $server_port = strtok($prt, " ");
							       $server_ip = strtok($ipv, " ");							   
 if($server_md5 == $cntz){
   if($tgh == 1)
  {  
 if((!empty($key)) || (!empty($_COOKIE['user_online_x'])))
 $txt = "<div class=\"flascensor\">".$txt." [Censored] </div>";
else	
 $txt = "<div class=\"tooltip\"><div class=\"flascensor\">[Censored]</div>
  <div class=\"tooltip-content2\">  
 Статья 20.1 КоАП РФ - Мелкое хулиганство
1. Мелкое хулиганство, то есть нарушение общественного порядка, выражающее явное неуважение к обществу, сопровождающееся нецензурной бранью в общественных местах...
    <div class=\"tooltip-arrow\"></div>
</div></div>";
 }
  else
	$txt = '&emsp;'.$txt.'&emsp;'; 

       $txt = "<a href=\"".$ssylka_na_ikonki."sent.php?server=".$server_md5."&svrnm=".$servername."&gd=".$guidxx."&plyr=".$xpnickname."\" 
onclick=\"window.open(this.href, '', 'scrollbars=1,height='+Math.min(350, screen.availHeight)+',width='+Math.min(590, screen.availWidth)); 
return false;\" style=\"color:".$cvet_text.";\"> ".colorize($txt)."</a>";

								   
 }}
  
//if(!empty(implode(",",$usedBadWords)))
//echo 'Слова '.implode(",",$usedBadWords).' запрещены';
 
		  if(empty($txt))
		  echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: silver;\"> &emsp;<strong>Connected</strong>&emsp;</td> </tr>";
	      else
			echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";opacity: 0.9; font-family: Titillium Web; color: Silver; font-size: ".$pixels."px;\"><strong>" . $txt . "</strong></td></tr>";  
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


$fff = $soob_na_page - $ssssob;

$t = 0;
for ($i = 1 ; $i <= $nb_pages ; $i++)
{
    $t++;
	
	if (empty($search)){
		
		if (($nb_pages == $page) && ($nb_pages == $t))
		{
			  
			for ($k = 1 ; $k <= $fff; $k++)
			{
		 if($soob_na_page < $ssssob + 10)
		  echo '</br>';
	        }
		 
		 }
	}	
}	

echo '<br/><div class="footerx"><div class="footer">';

if (is_numeric($key))	
$pageskey = '<a href="'.$ssylka_na_chat.'?pass=' . $passsword .'&server=' . $server .'&search=' . $search .'&geo=' . $geosearch .'&timeh=' . $timesearch .'&st1=' . $statusx1 .'&st2=' . $statusx2 .'&ip=' . $search_ip.'&archive=' . $chatdbarc.'&page=';    
 else
$pageskey = '<a href="'.$ssylka_na_chat.'?server=' . $server .'&search=' . $search .'&geo=' . $geosearch .'&timeh=' . $timesearch .'&st1=' . $statusx1 .'&st2=' . $statusx2.'&page=';


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
		if(($_GET['page']) == $i)        // font-size: 18px;
			$pi = '<b class="flashingf">&nbsp;'.$i.'&nbsp;</b>';             	
if(!empty($searchplayername))
	$searchplayername = $search;
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