<?php

  $steamkey = 'Ваш Steam Key'; 
  
 $Msql_support = 1; // 1 - Msql  0 - SqLite3
    $host_adress = '127.0.0.1:3301';
    $db_name   = 'chatserver';
    $db_user = 'root';
    $db_pass = '260386';
    $charset_db = 'utf8';
  
  $ssylka_na_ikonki = 'http://87.110.93.78/chat/'; //ссылка где лежат папки с  [flags-mini,css,css_js.....]
  
  
/* #######################   STATS    ####################### */
/* ########################################################## */  
  $ssylka_na_stats = 'http://87.110.93.78/chat/stats.php';
  
  $stats_db_path        = 'db3.sqlite';    /// db3.sqlite
  $stats_db_path_week   = 'dbw3.sqlite';   /// dbw3.sqlite
  
  $title_migalka_stats = 'Статистика Серверов';
  
  $color_headers = '#777'; 
   
  $color_geo = '#777';
  $color_prestige = '#777';
  $color_nickname = '#3a87bc';  
  $color_kills = '#619fc9'; 
  $color_deaths = '#3d6d8e';  
  $color_kdratio = '#2a9125'; 
  
  $color_heads = '#999';  
  $color_skill = '#888';  
  $color_grenades = '#999';  
  $color_knife = '#999';
  $color_suicids = '#555'; 
  $color_date_time = 'silver';  
  $color_date_time_new = 'lime';  

  $color_ip = '#2a9125';
  $color_ban_knopki = 'red';


  $top_main_total=30; //количество строк на страницу
  
/* #######################   STATS    ####################### */ 
/* ########################################################## */ 

  $ssylka_na_chat = 'http://87.110.93.78/chat/index.php';
  
  $chatdb_path = 'chatdb.sqlite'; /// Не забываем поставить права 666 на этот файл, для автообновления гео флагов.
  $soob_na_page=70; //количество строк сообшений на страницу
  $title_migalka = 'Чат Серверов';
  $title_zagolovok_stranicy = 'zona-ato-game.ru';
  $main_servername = '<img src="http://zona-ato-game.ru/forum/uploads/monthly_2018_07/59de67b25928d.png.c17aa4b8f94eff15c8411bb4c029f7ec.png" alt="zona-ato-game.ru">';
  $cache_folder = "cache/"; // Адрес нахождения папки var/www/site/cache/
  $raznica_vremya = '0'; // +1 час // -1 час и т.д.
  
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
 "https://......8." => "Forum",
 "https://.....8.." => "Screenshots",
 "https://...8...." => "BanList"
 );  
     
  
/////MENU + INFO + RCON CONTROL  ///Все настройки на управление чата, меню...  тут
$multi_servers_array = array(
 "ip:212.109.217.69 port:28961 rcon:123 server_md5:28961" => "Dom HighXP",
 "ip:212.109.217.69 port:28962 rcon:123 server_md5:28962" => "War HighXP",
 "ip:212.109.217.69 port:28963 rcon:123 server_md5:28963" => "Sab Privat",
 "ip:212.109.217.69 port:28964 rcon:123 server_md5:28964" => "HardCore",
 "ip:212.109.217.69 port:28965 rcon:123 server_md5:28965" => "New Weapon",
 "ip:212.109.217.69 port:28966 rcon:123 server_md5:28966" => "Crossfire",
 "ip:212.109.217.69 port:28967 rcon:123 server_md5:28967" => "Gun Games",
 "ip:212.109.217.69 port:28968 rcon:123 server_md5:28968" => "Killhouse",
 "ip:212.109.217.69 port:28969 rcon:123 server_md5:28969" => "Nuketown",
 "ip:212.109.217.69 port:28960 rcon:123 server_md5:28960" => "CTF HighXP"
 );  
    

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
 
