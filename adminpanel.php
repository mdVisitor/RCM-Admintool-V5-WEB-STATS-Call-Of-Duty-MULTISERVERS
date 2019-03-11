<?php
////error_reporting(0);
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start(); 
$startx = microtime(true);
include("index_chat_cfg.php");
?>
<!DOCTYPE html>
<html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="robots" content="noindex,nofollow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title><?php echo $title_zagolovok_stranicy ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>/css/recod-ru.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>/css/tooltip-classic.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->		
<style>
body{
  transition:0;
  background-color:#141e21; /* #002600 */
  color:#2eb4e9;
  margin: 0;
}
</style>
</head>
<body>
<?php	
 
if(strlen($steamkey) < 30)
   die ("</BR></BR></BR></BR></BR></BR>NO PERMISSIONS!</BR></BR></BR>");
 
include_once("functions/words.php"); 
include_once("functions/chatdb_archive.php"); 
include_once("functions/functions.inc.php"); 
$tt = 0;
 
if (empty($_SESSION['username'])) {
require 'functions/openid.php';
$script = $ssylka_na_chat;
try {
 $openid = new LightOpenID($script);
 if(!$openid->mode) {
 $openid->identity = 'http://steamcommunity.com/openid/?l=russian';
 header('location: '.$openid->authUrl());
 } elseif ($openid->mode == 'cancel') {
 echo 'User has canceled authentication';
 } else 
 
 {
	 
 if($openid->validate()) {
 $id = $openid->identity;
 $ptn = "/^https:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
 preg_match($ptn, $id, $matches);

 $url = "https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$steamkey&steamids=$matches[1]";
 $json_object = file_get_contents($url);
 $json_decoded = json_decode($json_object);

 foreach ($json_decoded->response->players as $player) {
 //echo '<img src="'.$player->avatarmedium.'"> <a href="'.$player->profileurl.'">'.htmlspecialchars($player->personaname).'</a><hr>';
 //echo "<br/>Player ID: $player->steamid <br/>Player Name: $player->personaname<br/>Profile URL: $player->profileurl<br/>SmallAvatar: <img src='$player->avatar'/> ";
                       $_SESSION['username'] = $player->steamid;
					   
					foreach ($steam_users_id as $passw => $xy)
					{
						 $md5plpsw = md5($player->steamid);
	                     $md5passw = md5($passw);
                        if((trim($md5passw)) == (trim($md5plpsw)))
							$tt = 1;
					}					
 }
   
 } else {
 echo 'User is not logged in.';
 }
 }
} catch(ErrorException $e) {
 echo $e->getMessage();
}
}

if ((empty($_COOKIE['user_online_x'])) && ($tt == 1))
{
$parsehost = parse_url($ssylka_na_chat);
$gamehost = $parsehost['host'];
setcookie("user_online_x", trim(md5($md5plpsw)), time() + (86400*2), "/~cookie_".$md5plpsw."/", $gamehost, 1);			
}
	


if ((empty($_SESSION)) && ($tt == 0))
	die ("</BR></BR></BR></BR></BR></BR>NO PERMISSIONS!</BR></BR></BR>");
	
if (!empty($_SESSION['username'])){		
foreach ($steam_users_id as $passw => $xy){
	$md5session = md5($_SESSION['username']);
  if($md5session == md5($passw))
  {
	  $key=1;
	  $xz = $xy;
  }
  
  }} else $key = '';
 
if(((!empty($key)) && (empty($_GET['logout']))) || ((!empty($_COOKIE['user_online_x'])) && (empty($_GET['logout'])))){ //| права на базу данных => '.substr(sprintf('%o', fileperms($chatdb_path)), -4).' 
	$adminiinfo = ''.$xz.' | БД: '.$sizzedb = (int)(filesize($chatdb_path) / 1000000).' Мб';
}else $adminiinfo = '';	

if(((!empty($key)) && (empty($_GET['logout']))) || ((!empty($_COOKIE['user_online_x'])) && (empty($_GET['logout'])))){ //| права на базу данных => '.substr(sprintf('%o', fileperms($chatdb_path)), -4).' 
	$adminpl = '|<a href="'.$ssylka_na_chat.'adminpanel.php?adminpanel='.$xz.'" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 18px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">АдминПанель</a>
	<a href="'.$ssylka_na_chat.'?logout=logout&lg#Logout!" onclick="location.reload()" style="color:#000;text-shadow:0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #ffa500, 0 0 7px #ffa500, 0 0 18px #ffa500, 0 0 40px #ffa500, 0 0 65px #ffa500;" >Logout!</a>';
}else 
	$adminpl = '|<a href="'.$ssylka_na_chat.'adminpanel.php" target="_blank" onclick="location.reload()" style="color:#000;text-shadow: 0 0 1px #fff, 0 0 2px #fff, 0 0 30px #fff, 0 0 4px #00cc00, 0 0 7px #00cc00, 0 0 18px #00cc00, 0 0 40px #00cc00, 0 0 65px #00cc00;">Логин</a>';


if (((!empty($_GET['logout'])) && (!empty($_SESSION['useradminsteam']))) ||  ((!empty($_GET['logout'])) && (!empty($_COOKIE['user_online_x']))))
{	
echo 'Админ - '.$key.' вышел :)';
session_destroy();
}
 
if (empty($_GET['search']))
	
{ $search = 0;?>
 
<div id="timer">
     
                <div v-for="(group,key) in bTime" v-show="key !== 'h1' || group !== '0000'" class="flex-container flex bit-container">
                    <div v-for="bit in group" :class="['flex', 'bit', (bit === '1')?'lit':'']"></div>
                </div>
            </div>
			<h1><div class="abs-center time"><div id="mydiv" style="display:block;"> 
			<span id="time" ><!-- <span id="time" >10</span> --> <canvas id="DigiRain"></canvas> </span>  
			</div></div></h1>
        <div class="rela-block flex-container button-container"><?php echo '&emsp;&emsp;'.$adminiinfo ?>
        </div>
<?php
}
else
$search = $_GET['search'];
?>
<div class="absolute-style"> 
<?php
echo "<a href='".$ssylka_na_chat."'>" . $main_servername . "</a>";
?>   
</div>
<div class="menuooo-center2">
<div class="menuooo2">
<div id="menu">
        <ul>		
<?php		
echo '<li>'.$adminpl.'</li>';
foreach ($multi_servers_array as $arx => $xservername) {	
$zx = explode("server_md5:", $arx);$fld = $zx[1];$server_md5 = strtok($fld, " ");
echo '<li>| <a href="'.$ssylka_na_chat.'?server='.$server_md5.'">'.$xservername.'</a></li>'; }
?>
</ul></div></div></div>
<?php


echo '<div align="center"><br/><br/><br/><br/>
<center><table border="1" width="60%" cellpadding="5">
<tr>
    <td style="background:#555; color:orange; font-size:18px; font-family: Georgia; text-align: center; width:60%;"><b>Настройки</b></td>
</tr>
</table>
 
<center><table border="1" width="60%" cellpadding="5">
   <tr>
    <th style="background:#444;font-size:16px; font-family: Georgia; width:30%;"><b>Функция</b></th>
    <th style="background:#444;font-size:16px; font-family: Georgia;"><b>Переменные</b></th>
   </tr>
   <tr>
    <td style="background:#222;font-size:15px; font-family: Ariel; color:silver;">Смена стиля чата:</td>
    <td style="background:#222;font-size:15px; font-family: Ariel; color:silver;">

	<form name="changetheme" method="get" action="'.$ssylka_na_chat.'">
  <p>
   <input type="radio" name="theme" value="light"> Светлый <Br>
   <input type="radio" name="theme" value="dark"> Темный  <Br>
  </p>
<p><input type="submit" value="Активировать"></p>
 </form>
 
	</td>
  </tr>
  </table>


<br/><br/>
 
   
 <table border="1" width="60%" cellpadding="5">
<tr>
    <td style="background:#555;color:red;font-size:18px;font-family:Georgia;text-align:center;width:60%;"><b>Скриншоты.</b></td>
</tr> 
</table> 
   <table border="1" width="60%" cellpadding="5">
   <tr>
    <th style="background:#444;font-size:16px; font-family: Georgia; width:30%;"><b>Функция</b></th>
    <th style="background:#444;font-size:16px; font-family: Georgia;"><b>Переменные</b></th>
   </tr>  
   <tr>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver;">Ссылка скриншотов.</td>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver;"> <a href="'.$ssylka_na_ikonki.'upload/">Ссылка на скриншоты</a> </td>
  </tr> 
 </table>
 

 <br/><br/>
<table border="1" width="60%" cellpadding="5">
<tr>
    <td style="background:#555; color:orange; font-size:18px; font-family: Georgia; text-align: center; width:60%;"><b>Поиск</b></td>
</tr>
</table>
<table border="1" width="60%" cellpadding="5">
  <tr>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver; width:30%; height: 90px;">Поиск слов, <br/>гуида, <br/>ип, <br/>ников в чате:</td>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver; height: 90px;">
 <form name="allsearch" method="get" action="'.$ssylka_na_chat.'">
  <p>
   <input type="radio" name="what" value="guid"> Гуид <Br>
   <input type="radio" name="what" value="ip"> Ип адрес<Br>
   <input type="radio" name="what" value="ip"> Ип проверка в черных базах. <Br>
   <input type="radio" name="what" value="nick"> Имя <Br>
   <input type="radio" name="what" value="geo"> Дислокация / Страна <Br>
   <input type="radio" name="what" value="words"> Матные слова - все <Br>
   <input type="radio" name="what" value="word"> Матные слова - список, через запятую. <Br>
  </p>
<p>
   <textarea name="search" cols="40" rows="2"></textarea></p>
  <p><input type="submit" value="Отправить">
   <input type="reset" value="Очистить"></p>
 </form>
	</td>
  </tr>
   </table>
   
   
   <br/><br/>
   
 <table border="1" width="60%" cellpadding="5">
<tr>
    <td style="background:#555;color:red;font-size:18px;font-family:Georgia;text-align:center;width:60%;"><b>Базы данных.</b></td>
</tr> 
</table> 
   <table border="1" width="60%" cellpadding="5">
   <tr>
    <th style="background:#444;font-size:16px; font-family: Georgia; width:30%;"><b>Функция</b></th>
    <th style="background:#444;font-size:16px; font-family: Georgia;"><b>Переменные</b></th>
   </tr>  
   <tr>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver;">Просмотр архивов базы данных в чате.</td>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver;">';	
$chat_archive = 'chat_archive/'; 
$dir  = $chat_archive;
$files = scandir($dir);
foreach ($files as $keye => $valuee) {
	if(strlen($valuee) > 5)
    echo '<a href="'.$ssylka_na_chat.'?archive='.$valuee.'">'.$valuee.'</a><br/>';
}		
echo '	
	</td>
  </tr>
   <tr>
    <td style="background:#222;font-size:15px; font-family: Ariel; color:silver;">Архивы базы данных.</td>
    <td style="background:#222;font-size:15px; font-family: Ariel; color:silver;">';	
 	
$chat_archive = 'chat_archive/'; 
$dir  = $chat_archive;
$files = scandir($dir);
foreach ($files as $keye => $valuee) {
	if(strlen($valuee) > 5)
    echo '<a href="'.$ssylka_na_ikonki.$chat_archive.$valuee.'">'.$valuee.'</a> <br/>';
}		
echo '
	</td>
  </tr>
   <tr>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver;">Обслуживание:</td>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver;">База данных, и ее архиватор.</td>
  </tr> 
 </table>
 
 
 
 <br/><br/>
  <table border="1" width="60%" cellpadding="5">
<tr>
    <td style="background:#555;color:orange; font-size:18px; font-family: Georgia; text-align: center; width:60%;"><b>Логирование.</b></td>
</tr> 
</table> 
<table border="1" width="60%" cellpadding="5">
   <tr>
    <th style="background:#444;font-size:16px; font-family: Georgia; width:30%;"><b>Логи</b></th>
    <th style="background:#444;font-size:16px; font-family: Georgia;"><b>Файл</b></th>
   </tr>
   <tr>
    <td style="background:#222;font-size:15px; font-family: Ariel; color:silver;"><b>Лог администратора:</b></td>
    <td style="background:#222;font-size:15px; font-family: Ariel; color:silver;"><b><a href="'.$ssylka_na_chat.'/logFile.txt" target = "_blank"> logFile.txt </a></b></td>
  </tr>
   <tr>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver;">Лог 2</td>
    <td style="background:#111;font-size:15px; font-family: Ariel; color:silver;">Файл 2</td>
  </tr>   
 </table>
 </center>
 </br></br></div>
';

if((!empty($key)) || (!empty($_COOKIE['user_online_x']))){
	echo '</br><div class="footerxx"><div class="footer2">';
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];
 
if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
else $ip = $remote;
$linkhere = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
logFile(' '.$xz.' - '.$key.' IP - '.$ip.' Url - '.$linkhere);	
$chat_archive = 'chat_archive/';
echo "</br>"; 	 	
echo '</div></div>';
}
?>
</body>
</html>