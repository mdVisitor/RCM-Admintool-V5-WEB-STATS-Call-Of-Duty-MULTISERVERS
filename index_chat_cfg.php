﻿<?php

  $ssylka_na_chat = 'http://87.110.93.78/chat/index.php';
  $ssylka_na_ikonki = 'http://87.110.93.78/chat/'; //ссылка где лежат папки с  [flags-mini,css,css_js.....]

  $steamkey = 'Ваш Steam Key';  
	 
  //$ssylka_na_chat = 'http://zona-ato-game.ru/chatserver/';
  //$ssylka_na_ikonki = 'http://zona-ato-game.ru/chatserver/'; //ссылка где лежат папки с  [flags-mini,css,css_js.....] 
  
  $chatdb_path = 'chatdb.sqlite'; /// Не забываем поставить права 666 на этот файл, для автообновления гео флагов.
  $soob_na_page=70; //количество строк сообшений на страницу
  $title_migalka = 'Чат Серверов';
  $title_zagolovok_stranicy = 'zona-ato-game.ru';
  $main_servername = '<img src="http://zona-ato-game.ru/forum/uploads/monthly_2018_07/59de67b25928d.png.c17aa4b8f94eff15c8411bb4c029f7ec.png" alt="zona-ato-game.ru">';
  $cache_folder = "cache/"; // Адрес нахождения папки var/www/site/cache/
  $raznica_vremya = '+1'; // +1 час // -1 час и т.д.
  
  $cvet_date_time = '#0099cc';  
  $cvet_nikov = '#3a87bc';
  $cvet_ip = '#2a9125';
  $cvet_ban_knopki = 'red';
  $cvet_text = '#B6B6B6';
  
  $pre_server = '^3|^1ZONA ATO^3|';  //название серверов, ключевое название! 
 
  $chatdbsize = 90; // 90.MB

  $t_server = "Сервер";
  $t_time = "Время";
  $t_city = "Страна";
  $t_nickname = "Имя";
  $t_messages = "Сообщения";
  
  $ip_for_gametracker = '212.109.217.69';
  
  
 $ssylki_array = array(
 "ссылка на форум" => "Forum",
 "ссылка на скрины" => "Screenshots",
 "ссылка на статистику" => "Статистика",
 "ссылка на банлист" => "BanList"
 );  
     
  
/////MENU + INFO + RCON CONTROL  ///Все настройки на управление чата, меню...  тут
$multi_servers_array = array(
 "ip:212.109.217.69 port:28961 rcon:123 server_md5:f14fdb1539a7162c339c8ebd836d974b" => "Dom HighXP",
 "ip:212.109.217.69 port:28962 rcon:123 server_md5:cacbad635d0dc802c7f67fa2bb5e699b" => "War HighXP",
 "ip:212.109.217.69 port:28963 rcon:123 server_md5:5f3b3aee144a27dee19fc1b5215b86ad" => "Sab Privat",
 "ip:212.109.217.69 port:28964 rcon:123 server_md5:adde28eb6e27084714ba6578914ed542" => "HardCore",
 "ip:212.109.217.69 port:28965 rcon:123 server_md5:f45a224b39c2d92f52b399461bd6fb46" => "New Weapon",
 "ip:212.109.217.69 port:28966 rcon:123 server_md5:530a6e7a347c30c7c99fecd285698b8c" => "Crossfire",
 "ip:212.109.217.69 port:28967 rcon:123 server_md5:4fe8439d8c5858e038b2934a954fedea" => "Gun Games",
 "ip:212.109.217.69 port:28968 rcon:123 server_md5:46c9909f3763c1489b50c4a563bdd91f" => "Killhouse",
 "ip:212.109.217.69 port:28969 rcon:123 server_md5:cde6894bedc68ed4810ba9393c93f576" => "Nuketown",
 "ip:212.109.217.69 port:28960 rcon:123 server_md5:811386b5f53dfaf034db5da6383bc367" => "CTF HighXP"
 );  
    
  
//////////////////////////// Примитивная логин система.
// Сайт..../chat/index.php?pass=124yt124124    // ставим в ссылку /chat/index.php?pass= пароль и вы в админке, каждому админу свой пв)
 
$ssylka_sourcebans = 'http://zona-ato-game.ru/sourcebans/index.php'; 
 
$steam_users_id = array(

 "124yt124124" => "Админ",
 "f124y12y412" => "Admin",  
 "7124y214y21y4" => "Admin2", 
 "92d4ece3e2bc14fdeaeb97ed99ebbbab0bfda47f71df7d8538242fa32ade08d7" => "Laroxxx",
 "1234456546457575755" => "Guest15163",
 "1eyey25215" => "Vip",
 "213123124124" => "Moderator"
 
 
 );	
 
 
  
 $Msql_support = 0; // 1 - Msql  0 - SqLite3
    $host_adress = '127.0.0.1:3301';
    $db_name   = 'chatserver';
    $db_user = 'root';
    $db_pass = '260386';
    $charset_db = 'utf8';