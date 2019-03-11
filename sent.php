<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_start(); 

if (empty($_SESSION['username'])) 
	$_SESSION['username']=0;

if (!empty($_SESSION['username'])){
	$_GET['pass'] = $_SESSION['username'];
	 $passsword = $_SESSION['username'];	
}
 
if (!empty($_GET['pass'])) {
   $_POST['pass'] = $passsword;   
}

function getServer($key = null, $default = null) {
  if (null === $key) {
    return $_SERVER;
  }
  return (isset($_SERVER[$key])) ? $_SERVER[$key] : $default;
}
 
/**
 * Получить IP адрес клиента
 * @param boolean $proxy
 * @return string
 */
function getClientIp($proxy = true) {
  if ($proxy && getServer('HTTP_CLIENT_IP') != null) {
    $ip = getServer('HTTP_CLIENT_IP');
  } else if ($proxy && getServer('HTTP_X_FORWARDED_FOR') != null) {
    $ip = getServer('HTTP_X_FORWARDED_FOR');
  } else {
    $ip = getServer('REMOTE_ADDR');
  }
  return $ip;
}

//$linkhere = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$ipuser = getClientIp();

include("index_chat_cfg.php");
include_once("functions/words.php"); 
include_once("functions/chatdb_archive.php"); 
include_once("functions/functions.inc.php");  


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

if ((!empty($_GET['logout'])) && (!empty($_SESSION['username'])))
{	
echo 'Админ - '.$key.' вышел :)';
session_destroy();
}


  
if (!empty($_GET['rc'])) 
   $rc = $_GET['rc']; 
else
  	$rc = 0;

  if (empty($_GET['server']))
   $server = 0;
   else
	$server = $_GET['server']; 

  if (empty($_GET['svrnm']))
 $svrnm = '';
else
 $svrnm = $_GET['svrnm'];

  if (empty($_GET['gd']))
 $guid = '';
else
 $guid = $_GET['gd'];

if (empty($_GET['plyr']))
 $plyr = '';
else
 $plyr = $_GET['plyr'];

?>
<!DOCTYPE html>
<html>
<html lang="en" class="no-js">
	<head>
		<meta charset="windows-1251" />
		<meta name="robots" content="noindex,nofollow" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title><?php echo $title_zagolovok_stranicy ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>/css/recod-ru.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $ssylka_na_ikonki;?>/css/tooltip-classic.css" />
 <!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->		
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
$datetime = date('Y-m-d H:i:s');
$dthx = date('Y-m-d');
$chatdb = $chatdb_path;

$keey = 0;

if(!empty($key)){
if (!empty($_GET['md5'])) {
   $md5x = $_GET['md5']; 
   $server = $md5x;
}
else
	$md5x = 0;
                       foreach ($multi_servers_array as $arxx => $xxservername) { 
						   $zxх = explode("server_md5:", $arxx);
						   $fldd = $zxх[1];
						   $zf = explode("rcon:", $arxx);
						   $rcn = $zf[1];	
						   $zb = explode("port:", $arxx);
						   $prt = $zb[1];
						   $io = explode("ip:", $arxx);
						   $ipv = $io[1];
								   $server_md5 = strtok($fldd, " ");
							       $server_rconpass = strtok($rcn, " ");
							       $server_port = strtok($prt, " ");
							       $server_ip = strtok($ipv, " ");							   
 if($server == $server_md5){                   				   
$server_addr = "udp://" . $server_ip;
@$connect = fsockopen($server_addr, $server_port, $re, $errstr, 30);
if (!$connect) { die('Can\'t connect to COD gameserver.'); }


////  Проверка игрока на отсуствие  /////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
if (!empty($_GET['all'])){
stream_set_timeout($connect, 0, 36000); //1e5
$send = "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" status';
fwrite($connect, $send);
$output = fread($connect, 1);

if (!empty($output))
	{
	do
		{
		$status_pre = socket_get_status($connect);
		$output = $output . fread($connect, 1024); //1024
		$status_post = socket_get_status($connect);
		}

	while ($status_pre['unread_bytes'] != $status_post['unread_bytes']);
	};
$output = explode("\xff\xff\xff\xffprint\n", $output);
$output = implode('!', $output);
$output = explode("\n", $output);

if (preg_grep('/CoD4 X 1.8/', $output)) 
	$output = preg_grep('/[0-9]{1,8}[[:space:]][0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}(\b)/', $output);

foreach($output as $value)
	{

	if (strpos($value, $guid) !== false)
	  $keey = 1;
	}

if(empty($keey))
die ('</br><center>Мы его потеряли.</center>');

}
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
   if(empty($Msql_support)){
	$rc = iconv("utf-8", "windows-1251",$rc);	
	$xz = iconv("utf-8", "windows-1251",$xz);
   }	

 if((!empty($md5x)) && (!empty($rc)))
 {
if (file_exists($chatdb)){
try
{  

      if(empty($Msql_support))
    $db = new PDO('sqlite:' . $chatdb);
      else
	  {	  	  
    $dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $db = new PDO($dsn, $db_user, $db_pass, $opt);			  	  
	  }
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //отрубает базу при ошибке + в лог
//$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );   //продолжает работу, идет откладка в лог

$rc = '^3'.$rc;
$xz = '^1'.$xz;
	
if (empty($_GET['all'])){	
 rcon('say ^1'.$xz.': '.$rc, '');
						 
$data = [
    'servername' => $svrnm,
    'servermd5' => $server,
    'guid' => '0',
	'nickname' => $xz,
	'time' => $datetime,
	'timeh' => $dthx,
	'text' => $rc,
	'st1' => '0',
	'st1days' => '0',
	'st2' => '0',
	'st2days' => '0',
    'ip' => $ipuser,
	'geo' => 'ZAG',
	'z' => '0',
	't' => 'xl',
	'x' => '0',
	'c' => '0',
];


$sql = "INSERT INTO chat (servername, servermd5, guid, nickname, time, timeh, text, st1, st1days, st2, st2days, ip, geo, z, t, x, c) 
					VALUES (:servername, :servermd5, :guid, :nickname, :time, :timeh, :text, :st1, :st1days, :st2, :st2days, :ip, :geo, :z, :t, :x, :c)";

$stmt= $db->prepare($sql);
$stmt->execute($data);							 
						 
						 
}else{
if (!empty($keey)){		
 rcon('screentell '.$guid.' ^1'.$xz.': '.$rc, '');
   $plyrrc = $rc.' => '.$plyr;
$data = [
    'servername' => $svrnm,
    'servermd5' => $server,
    'guid' => '0',
	'nickname' => $xz,
	'time' => $datetime,
	'timeh' => $dthx,
	'text' => $plyrrc,
	'st1' => '0',
	'st1days' => '0',
	'st2' => '0',
	'st2days' => '0',
    'ip' => $ipuser,
	'geo' => 'ZAG',
	'z' => '0',
	't' => 'xl',
	'x' => '0',
	'c' => '0',
];


$sql = "INSERT INTO chat (servername, servermd5, guid, nickname, time, timeh, text, st1, st1days, st2, st2days, ip, geo, z, t, x, c) 
					VALUES (:servername, :servermd5, :guid, :nickname, :time, :timeh, :text, :st1, :st1days, :st2, :st2days, :ip, :geo, :z, :t, :x, :c)";
$stmt= $db->prepare($sql);
$stmt->execute($data);							 						
		}	
}
 
}
catch(PDOException $e){die($e->getMessage());}}	 
 
 
 }
}		   
	}					   				   
?>
</br>
<center>
<strong style="font-family: Impact;font-size:18px;">
<?php echo colorize($svrnm); ?>
</strong>
</center>
</br>
<center>
  Чат с игроком  <?php echo '=> <b>'.$plyr.'</b>';?>.
   <form>
 <input name="all" type="hidden" value="all">   
 <input name="plyr" type="hidden" value="<?php echo $plyr; ?>"> 
 <input name="svrnm" type="hidden" value="<?php echo $svrnm; ?>">
 <input name="md5" type="hidden" value="<?php echo $server; ?>">
 <input name="gd" type="hidden" value="<?php echo $guid; ?>">
 <input style="background:#333; width:295px; height: 28px; font-family: Titillium Web; color: #ccc; font-size:15px;" type="search" name="rc">
  </form>
</center>



<center>
  Чат с игроками.
   <form> 
 <input name="plyr" type="hidden" value="<?php echo $plyr; ?>"> 
 <input name="svrnm" type="hidden" value="<?php echo $svrnm; ?>">
 <input name="md5" type="hidden" value="<?php echo $server; ?>">
 <input name="gd" type="hidden" value="<?php echo $guid; ?>">
 <input style="background:#333; width:295px; height: 28px; font-family: Titillium Web; color: #ccc; font-size:15px;" type="search" name="rc">
  </form>
</center>


</body>
</html>	
<?php
}
else{
	echo("</br></br></br><center>Только для администратора!</center>");
	//sleep(9);
	//echo "<script>window.close();</script>";
	}
?>	