<?php
 function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'год',
        'm' => 'месяц',
        'w' => 'неделя',
        'd' => 'день',
        'h' => 'час',
        'i' => 'минут',
        's' => 'секунд',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . '. ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ' : 'сейчас';
}
 
/*
$date1 = time()-(60*60*24*1);
$date2 = time();
$date3 = time()+(60*60*24*1);
*/

function logFile($textLog) {
	global $ssylki;
$file = "logFile.txt";
$text = "";
//$text .= print_r($textLog);//Выводим переданную переменную
$text .= "\n". date('Y-m-d H:i:s') .$textLog; //Добавим актуальную дату после текста или дампа массива
$fOpen = fopen($file,'a');
fwrite($fOpen, $text);
fclose($fOpen);
}

function rcon($sz, $zreplace = '')
{
	global $connect, $server_rconpass;
	fwrite($connect, "\xff\xff\xff\xff" . 'rcon "' . $server_rconpass . '" ' . strtr($sz, array(
		'%s' => $zreplace
	)));
	$output = fread($connect, 1); //512
	usleep(200);
	return $output;
}

// Colorize Function
function colorize($string) {
$string = substr($string, 0, 777);
$string = str_replace("^^00", "</font><font color=\"gray\">", $string);
$string = str_replace("^^11", "</font><font color=\"red\">", $string);
$string = str_replace("^^22", "</font><font color=\"lime\">", $string);
$string = str_replace("^^33", "</font><font color=\"yellow\">", $string);
$string = str_replace("^^44", "</font><font color=\"#6666ff\">", $string);
$string = str_replace("^^55", "</font><font color=\"aqua\">", $string);
$string = str_replace("^^66", "</font><font color=\"fuchsia\">", $string);
$string = str_replace("^^77", "</font><font color=\"white\">", $string);
$string = str_replace("^^88", "</font><font color=\"pink\">", $string);
$string = str_replace("^^99", "</font><font color=\"silver\">", $string);
$string = str_replace("^^00", "</font><font color=\"gray\">", $string);
$string = str_replace("^11", "</font><font color=\"red\">", $string);
$string = str_replace("^22", "</font><font color=\"lime\">", $string);
$string = str_replace("^33", "</font><font color=\"yellow\">", $string);
$string = str_replace("^44", "</font><font color=\"#6666ff\">", $string);
$string = str_replace("^55", "</font><font color=\"aqua\">", $string);
$string = str_replace("^66", "</font><font color=\"fuchsia\">", $string);
$string = str_replace("^77", "</font><font color=\"white\">", $string);
$string = str_replace("^88", "</font><font color=\"pink\">", $string);
$string = str_replace("^99", "</font><font color=\"silver\">", $string);
$string = str_replace("^^1", "</font><font color=\"red\">", $string);
$string = str_replace("^^2", "</font><font color=\"lime\">", $string);
$string = str_replace("^^3", "</font><font color=\"yellow\">", $string);
$string = str_replace("^^4", "</font><font color=\"#6666ff\">", $string);
$string = str_replace("^^5", "</font><font color=\"aqua\">", $string);
$string = str_replace("^^6", "</font><font color=\"fuchsia\">", $string);
$string = str_replace("^^7", "</font><font color=\"white\">", $string);
$string = str_replace("^^8", "</font><font color=\"pink\">", $string);
$string = str_replace("^^9", "</font><font color=\"silver\">", $string);
$string = str_replace("^0", "</font><font color=\"gray\">", $string);
$string = str_replace("^1", "</font><font color=\"red\">", $string);
$string = str_replace("^2", "</font><font color=\"lime\">", $string);
$string = str_replace("^3", "</font><font color=\"yellow\">", $string);
$string = str_replace("^4", "</font><font color=\"#6666ff\">", $string);
$string = str_replace("^5", "</font><font color=\"aqua\">", $string);
$string = str_replace("^6", "</font><font color=\"fuchsia\">", $string);
$string = str_replace("^7", "</font><font color=\"white\">", $string);
$string = str_replace("^8", "</font><font color=\"pink\">", $string);
$string = str_replace("^9", "</font><font color=\"silver\">", $string);
$string = str_replace("^", "", $string);
return $string . "</font>";
}
	
  	
function clearnamex($string) {
$string = str_replace("^^00", "", $string);
$string = str_replace("^^11", "", $string);
$string = str_replace("^^22", "", $string);
$string = str_replace("^^33", "", $string);
$string = str_replace("^^44", "", $string);
$string = str_replace("^^55", "", $string);
$string = str_replace("^^66", "", $string);
$string = str_replace("^^77", "", $string);
$string = str_replace("^^88", "", $string);
$string = str_replace("^^99", "", $string);
$string = str_replace("^0", "", $string);
$string = str_replace("^1", "", $string);
$string = str_replace("^2", "", $string);
$string = str_replace("^3", "", $string);
$string = str_replace("^4", "", $string);
$string = str_replace("^5", "", $string);
$string = str_replace("^6", "", $string);
$string = str_replace("^7", "", $string);
$string = str_replace("^8", "", $string);
$string = str_replace("^9", "", $string);
return $string;
}	
function getDateString($date)
{
    $now = date('w');
    $time = date('w', $date);
    if($now == 0)
    {
        if($time == 6) $day = "вчера";
        if($time == 0) $day = "сегодня";
        if($time == 1) $day = "завтра";
    }
    else
    {  
        if($time == ($now - 1)) $day = "вчера";
        if($time == $now) $day = "сегодня";
        if($time == ($now + 1)) $day = "завтра";
    }
    if(!empty($day)) 
		return $day; 
	else
    return date("Y-m-d H:i:s",$date);
}
 
function matmat($strg) {
$strg = str_replace(array('_', '-', ',', '.', '—','*','/','#','@','%'), ' ', trim($strg));
$strg = preg_replace('/\s{2,}/', '', $strg);
$strg = preg_replace('/ {2,}/', '', $strg);
$strg = preg_replace('/\s+/', '', $strg);
$strg = preg_replace('/\s/', '', $strg);
$strg = str_replace(array("\r\n", "\n", "\r"), "", $strg);
$strg = str_replace('^', '', $strg);
return trim($strg);
} 
 
/*

      $start_work = "23:00";
      $end_work = "00:00";
      $currentTime = date("H:i");

      $currentDateTime = strtotime(date('Y-m-d')  ." ". $currentTime); 
      $previousDayEnd;
      $startDateTime;
      $endDateTime;

 $startDateTime = strtotime(date('Y-m-d')  ." ". $start_work);

 if (strtotime($start_work) <= strtotime($end_work)){
      $endDateTime = strtotime(date('Y-m-d')  ." ". $end_work);
      $previousDayEnd = strtotime(date('Y-m-d')  ." ". $end_work . "-1 days");
 }
 else{
     $endDateTime = strtotime(date('Y-m-d')  ." ". $end_work . "+1 days");
     $previousDayEnd = strtotime(date('Y-m-d')  ." ". $end_work );
 }
	
*/	

