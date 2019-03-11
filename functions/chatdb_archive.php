<?php
$chatdb = $chatdb_path;

if (!file_exists($chatdb)){
try
{   

      if(empty($Msql_support))
    $dbc = new PDO('sqlite:' . $chatdb);
      else
	  {	  	  
    $dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dbc = new PDO($dsn, $db_user, $db_pass, $opt);		  	  
	  }
	$dbc->exec('CREATE table IF NOT EXISTS `chat`(
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`servername` varchar(255)  NOT NULL,
			`servermd5` varchar(50)  NOT NULL,
			`guid` varchar(255)  NOT NULL,
			`nickname` varchar(255)  NOT NULL,
			`time` varchar(255)  NOT NULL,
			`timeh` varchar(255)  NOT NULL,			
			`text` varchar(255)  NOT NULL,			
			`st1` varchar(255)  NOT NULL,
			`st1days` varchar(255)  NOT NULL,			
			`st2` varchar(255)  NOT NULL,
            `st2days` varchar(255)  NOT NULL,			
			`ip` varchar(255)  NOT NULL,
			`geo` varchar(255)  NOT NULL,
			`z` varchar(20)  NOT NULL,
			`t` varchar(20)  NOT NULL,
			`x` varchar(20)  NOT NULL,
			`c` varchar(20)  NOT NULL,
			PRIMARY KEY (`id`)
	)');	
	$st = $dbc->query('SELECT image FROM chat');
	$result = $st->fetchAll();
	if (sizeof($result) == 0)
	{echo 'Table created successfully' . "\n";}}
    catch(PDOException $e){die($e->getMessage());}}	

if (filesize($chatdb_path) > ($chatdbsize * 1000000)) 
  {
 if(file_exists($chatdb_path)){
$file = $chatdb_path;
$newfile = "chat_archive/chat";
$datetime = date('Y.m.d H:i:s');
//if (!copy($file, $newfile."_".$datetime.".db")) {
  if (!rename($file, $newfile."_".$datetime.".db")) {
	
    echo "Error copy $file...\n";}else{		
echo "<br/>[".$datetime."]<font color='green'> Server :</font> <font color='silver'> Chat database $chatdbsize mb auto reset! </font> "; 				
if (!file_exists($chatdb_path)){
try
{   
      if(empty($Msql_support))
    $dbc = new PDO('sqlite:' . $chatdb);
      else
	  {	  	  
    $dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dbc = new PDO($dsn, $db_user, $db_pass, $opt);			  	  
	  }
	$dbc->exec('CREATE table chat(
			id INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
			servername varchar(255)  NOT NULL,
			servermd5 varchar(50)  NOT NULL,
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
	chmod($chatdb_path, 0666);
	$st = $dbc->query('SELECT image FROM chat');
	$result = $st->fetchAll();
	if (sizeof($result) == 0)
	{echo 'Table created successfully' . "\n";}}
    catch(PDOException $e){die($e->getMessage());}}	 
  }
  }  
	}