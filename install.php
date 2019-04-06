<?php 
ini_set("display_errors",1);
error_reporting(E_ALL);
include("index_chat_cfg.php");
include_once("functions/words.php"); 
include_once("functions/chatdb_archive.php"); 
include_once("functions/functions.inc.php");  
try
{    	  
    $dsn = "mysql:host=$host_adress;dbname=$db_name;charset=$charset_db";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dbc = new PDO($dsn, $db_user, $db_pass, $opt);			  	 
	$dbc->exec('CREATE table IF NOT EXISTS `chat`(
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`servername` varchar(255)  NOT NULL,
			`s_port` varchar(50)  NOT NULL,
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
	)ENGINE=MyISAM  DEFAULT CHARSET=utf8;');	
	$st = $dbc->query('SELECT `image` FROM `chat`');
	$result = $st->fetchAll();
	if (sizeof($result) == 0){	
      header('Location: index.php');
       unlink('install.php');
		echo '<h1>Table created successfully</h1>' . "\n";}}
    catch(PDOException $e){die($e->getMessage());}
