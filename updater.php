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
 if (strpos($file_contents, '$i_search') === false){
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

}}		
		
		
if (strpos($g, 'en_lang.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
 if (strpos($file_contents, '$i_search') === false){
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
}}	


if (strpos($g, 'ru_lang.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
 if (strpos($file_contents, '$i_search') === false){
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
}}

//////////////////////////////////////	SCREENSHOTS UPDATE END


if (strpos($g, 'chat.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
 if (strpos($file_contents, '$i_chatn_forver') === false){

$file_contents = str_replace("'For ever!'","i_chatn_forver",$file_contents);
$file_contents = str_replace('[Chat Ban]','$i_chat_ban',$file_contents);
$file_contents = str_replace('[C.B. was Expired]','$i_chat_exp',$file_contents);
$file_contents = str_replace('[Censored]','$i_chat_censored',$file_contents);
$file_contents = str_replace("Первая","'.t_page_first.'",$file_contents);
$file_contents = str_replace("Предыдущая","'.t_page_pre.'",$file_contents);
$file_contents = str_replace("Следующая","'.t_page_next.'",$file_contents);
$file_contents = str_replace("Последняя","'.t_page_last.'",$file_contents);
$file_contents = str_replace('t_page_first','$t_page_first',$file_contents);
$file_contents = str_replace('t_page_pre','$t_page_pre',$file_contents);
$file_contents = str_replace('t_page_next','$t_page_next',$file_contents);
$file_contents = str_replace('t_page_last','$t_page_last',$file_contents);
$file_contents = str_replace('i_chatn_forver','$i_chatn_forver',$file_contents);
 
file_put_contents($path_to_file,$file_contents);		
}}


if (strpos($g, 'en_lang.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
 if (strpos($file_contents, '$i_chat_censored') === false){
$file_contents = str_replace("<?php",
"<?php
\n i_chatn_forver = 'For ever!';\n i_chat_ban  = '[Chat Ban]';\n i_chat_exp   = '[C.B. was Expired]';\n i_chat_censored = '[Censored]';
",$file_contents);

$file_contents = str_replace('i_chatn_forver','$i_chatn_forver',$file_contents);
$file_contents = str_replace('i_chat_ban','$i_chat_ban',$file_contents);
$file_contents = str_replace('i_chat_exp','$i_chat_exp',$file_contents);
$file_contents = str_replace('i_chat_censored','$i_chat_censored',$file_contents);

file_put_contents($path_to_file,$file_contents);		
}}	



if (strpos($g, 'ru_lang.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
 if (strpos($file_contents, '$i_chat_censored') === false){
$file_contents = str_replace("<?php",
"<?php
\n i_chatn_forver = 'На всегда!';\n i_chat_ban  = '[Чат Блок]';\n i_chat_exp   = '[Ч.Б. срок истек]';\n i_chat_censored = '[Цензура]';
",$file_contents);

$file_contents = str_replace('i_chatn_forver','$i_chatn_forver',$file_contents);
$file_contents = str_replace('i_chat_ban','$i_chat_ban',$file_contents);
$file_contents = str_replace('i_chat_exp','$i_chat_exp',$file_contents);
$file_contents = str_replace('i_chat_censored','$i_chat_censored',$file_contents);

file_put_contents($path_to_file,$file_contents);		
}}


//////////////меню
if (strpos($g, 'ru_lang.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
 if (strpos($file_contents, '$menu_detected') === false){
$file_contents = str_replace("<?php",
"<?php
////////// МЕНЮ
\n menu_main       = 'Главная';\n menu_medals     = 'Медали';\n menu_chats       = 'Чат';\n menu_chat_ban   = 'Банлист Чата';\n menu_forum      = 'Форум';\n menu_stats      = 'Статистика';\n menu_geo        = 'Гео';\n menu_banlist    = 'Банлист';\n menu_blacklist  = 'Блэклист';\n menu_status     = 'Статус';\n menu_screens    = 'Скриншоты';\n menu_mamba      = 'Мамба';\n menu_detected   = 'Подозрительные';
",$file_contents);

$file_contents = str_replace('menu_main','$menu_main',$file_contents);
$file_contents = str_replace('menu_medals','$menu_medals',$file_contents);
$file_contents = str_replace('menu_chats','$menu_chats',$file_contents);
$file_contents = str_replace('menu_chat_ban','$menu_chat_ban',$file_contents);
$file_contents = str_replace('menu_forum','$menu_forum',$file_contents);
$file_contents = str_replace('menu_stats','$menu_stats',$file_contents);
$file_contents = str_replace('menu_geo','$menu_geo',$file_contents);
$file_contents = str_replace('menu_banlist','$menu_banlist',$file_contents);
$file_contents = str_replace('menu_blacklist','$menu_blacklist',$file_contents);
$file_contents = str_replace('menu_status','$menu_status',$file_contents);
$file_contents = str_replace('menu_mamba','$menu_mamba',$file_contents);
$file_contents = str_replace('menu_screens','$menu_screens',$file_contents);
$file_contents = str_replace('menu_detected','$menu_detected',$file_contents);

file_put_contents($path_to_file,$file_contents);		
}}
 
if (strpos($g, 'en_lang.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
 if (strpos($file_contents, '$menu_detected') === false){
$file_contents = str_replace("<?php",
"<?php
////////// MENU
\n menu_main       = 'Main';\n menu_medals     = 'Medals';\n menu_chats       = 'Chat';\n menu_chat_ban   = 'Chat Ban';\n menu_forum      = 'Forum';\n menu_stats      = 'Stats';\n menu_geo        = 'Geo';\n menu_banlist    = 'Banlist';\n menu_blacklist  = 'Blacklist';\n menu_status     = 'Status';\n menu_screens    = 'Screenshots';\n menu_mamba      = 'Mamba';\n menu_detected   = 'Detected';
",$file_contents);

$file_contents = str_replace('menu_main','$menu_main',$file_contents);
$file_contents = str_replace('menu_medals','$menu_medals',$file_contents);
$file_contents = str_replace('menu_chats','$menu_chats',$file_contents);
$file_contents = str_replace('menu_chat_ban','$menu_chat_ban',$file_contents);
$file_contents = str_replace('menu_forum','$menu_forum',$file_contents);
$file_contents = str_replace('menu_stats','$menu_stats',$file_contents);
$file_contents = str_replace('menu_geo','$menu_geo',$file_contents);
$file_contents = str_replace('menu_banlist','$menu_banlist',$file_contents);
$file_contents = str_replace('menu_blacklist','$menu_blacklist',$file_contents);
$file_contents = str_replace('menu_status','$menu_status',$file_contents);
$file_contents = str_replace('menu_mamba','$menu_mamba',$file_contents);
$file_contents = str_replace('menu_screens','$menu_screens',$file_contents);
$file_contents = str_replace('menu_detected','$menu_detected',$file_contents);

file_put_contents($path_to_file,$file_contents);		
}}
 
 
 
 
 
 //index_chat_cfg.php
if (strpos($g, 'index_chat_cfg.php') !== false){
	
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
 if (strpos($file_contents, '$menu_stats') === false){
	 
$file_contents = str_replace('"ЧАТ"','$menu_chats',$file_contents);
$file_contents = str_replace('"Чат"','$menu_chats',$file_contents);
$file_contents = str_replace('"чат"','$menu_chats',$file_contents);
$file_contents = str_replace('"CHAT"','$menu_chats',$file_contents);
$file_contents = str_replace('"chat"','$menu_chats',$file_contents);
$file_contents = str_replace('"Chat"','$menu_chats',$file_contents);
$file_contents = str_replace('"Chatban"','$menu_chat_ban',$file_contents);
$file_contents = str_replace('"CHATBAN"','$menu_chat_ban',$file_contents);
$file_contents = str_replace('"chatban"','$menu_chat_ban',$file_contents);
$file_contents = str_replace('"БАНЛИСТ ЧАТА"','$menu_chat_ban',$file_contents);
$file_contents = str_replace('"Банлист Чата"','$menu_chat_ban',$file_contents);
$file_contents = str_replace('"Банлист чата"','$menu_chat_ban',$file_contents);
$file_contents = str_replace('"банлист чата"','$menu_chat_ban',$file_contents);
$file_contents = str_replace('"ФОРУМ"','$menu_forum',$file_contents);
$file_contents = str_replace('"Форум"','$menu_forum',$file_contents);
$file_contents = str_replace('"форум"','$menu_forum',$file_contents);
$file_contents = str_replace('"Forum"','$menu_forum',$file_contents);
$file_contents = str_replace('"FORUM"','$menu_forum',$file_contents);
$file_contents = str_replace('"stats"','$menu_stats',$file_contents);
$file_contents = str_replace('"STATS"','$menu_stats',$file_contents);
$file_contents = str_replace('"Stats"','$menu_stats',$file_contents);
$file_contents = str_replace('"Статистика"','$menu_stats',$file_contents);
$file_contents = str_replace('"СТАТИСТИКА"','$menu_stats',$file_contents);
$file_contents = str_replace('"статистика"','$menu_stats',$file_contents);
$file_contents = str_replace('"Geo"','$menu_geo',$file_contents);
$file_contents = str_replace('"GEO"','$menu_geo',$file_contents);
$file_contents = str_replace('"geo"','$menu_geo',$file_contents);
$file_contents = str_replace('"mamba"','$menu_mamba',$file_contents);
$file_contents = str_replace('"Mamba"','$menu_mamba',$file_contents);
$file_contents = str_replace('"MAMBA"','$menu_mamba',$file_contents);
$file_contents = str_replace('"БАНЛИСТ"','$menu_banlist',$file_contents);
$file_contents = str_replace('"Banlist"','$menu_banlist',$file_contents);
$file_contents = str_replace('"BANLIST"','$menu_banlist',$file_contents);
$file_contents = str_replace('"banlist"','$menu_banlist',$file_contents);
$file_contents = str_replace('"Банлист"','$menu_banlist',$file_contents);
$file_contents = str_replace('"банлист"','$menu_banlist',$file_contents);
$file_contents = str_replace('"СКРИНШОТЫ"','$menu_screens',$file_contents);
$file_contents = str_replace('"Скриншоты"','$menu_screens',$file_contents);
$file_contents = str_replace('"скриншоты"','$menu_screens',$file_contents);
$file_contents = str_replace('"Screenshots"','$menu_screens',$file_contents);
$file_contents = str_replace('"screenshots"','$menu_screens',$file_contents);
$file_contents = str_replace('"SCREENSHOTS"','$menu_screens',$file_contents);
file_put_contents($path_to_file,$file_contents);		
}}



if (strpos($g, '.php') !== false){
$path_to_file = $g;
$file_contents = file_get_contents($path_to_file);
 if (strpos($file_contents, 'favicon.ico') === false){
$file_contents = str_replace('</title>',
'</title>
<link rel="shortcut icon" href="<?php echo $ssylka_na_codbox;?>favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $ssylka_na_codbox;?>favicon.ico" type="image/x-icon">',$file_contents);
file_put_contents($path_to_file,$file_contents);		
}} 
 
 
		
}}


echo "<center><h1> UPDATE FINISHED! Please delete this file! Теперь удалите этот файл! </h1></center>";