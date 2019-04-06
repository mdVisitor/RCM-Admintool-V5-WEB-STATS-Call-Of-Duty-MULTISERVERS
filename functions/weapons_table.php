<?php





if (!empty($search))
{
	//$search = trim($search);
  if(((23>(strlen($search))) && (18<(strlen($search)))) && (ctype_digit($search)))
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





 if (!empty($search)){  
 
 

foreach ($guidxportarr as $tysef){
	
	
$reponset = $bdd->query('SELECT s_pg, w_guid, w_port, ac130_,airstrike_,at4_mp,aw50_,binoculars,cobra_,defaultweapon_mp,destructible_car,
destructible_bar,hind_ffar,helicopter_,radar_ FROM db_stats_5 where w_guid = '.$search.' and s_pg = '.$tysef.' LIMIT 1'); 
 
 
 while ($row = $reponset->fetch())	
{	

//var_dump($row);

                 $ac130   = $row['ac130_']; 
                 $airstrike         = $row['airstrike_']; 
                 $at4_mp    = $row['at4_mp'];
                 $aw50      = $row['aw50_'];
                 $m21   = $row['binoculars'];
                 $cobra      = $row['cobra_'];
                 $defaultweapon_mp      = $row['defaultweapon_mp'];
                 $destructible_car     = $row['destructible_car'];
                 $destructible_bar      = $row['destructible_bar'];
                 $hind_ffar      = $row['hind_ffar'];
                 $helicopter      = $row['helicopter_'];
                 $radar      = $row['radar_'];
}











$reponseg = $bdd->query('SELECT * FROM db_stats_3 where w_guid = '.$search.' and s_pg = '.$tysef.' LIMIT 1'); 
 
 while ($row = $reponseg->fetch())	
{	

//var_dump($row);

                 $claymore   = $row['claymore']; 
                 $c4         = $row['c4']; 
                 $grenade    = $row['grenade'];
                 $artillery  = $row['artillery'];
                
}








$reponseg = $bdd->query('SELECT * FROM db_stats_4 where w_guid = '.$search.' and s_pg = '.$tysef.' LIMIT 1'); 
 
 while ($row = $reponseg->fetch())	
{	


//var_dump($row);
 
                 $ak47      = $row['ak47_'];
                 $ak74u     = $row['ak74u_'];
                 $deserteagle      = $row['deserteagle'];
                 $m40a3      = $row['m40a3_'];
                 $m4      = $row['m4_'];
                 $m1014      = $row['m1014_'];
                 $uzi     = $row['uzi_'];
                 $g3      = $row['g3_'];
                 $g36c      = $row['g36c_'];
                 $remington700      = $row['remington700_'];
                 $mp5      = $row['mp5_'];
                 $winchester1200      = $row['winchester1200_'];
                 $m16      = $row['m16_'];
                 $m14      = $row['m14_'];
                 $rpd     = $row['rpd_'];
                 $m60e4     = $row['m60e4_'];
                 $rpg      = $row['rpg_'];				 
                 $saw     = $row['saw_'];  
                 $p90     = $row['p90_']; 
                 $barrett      = $row['barrett_'];
                 $colt45	= $row['colt45_'];
                 $dragunov   =   $row['dragunov_'];
                 $usp		  =   $row['usp_'];	
                  $skorpion       =   $row['skorpion_'];	
                  $beretta = $row['beretta_'];	
}



}

 
 
 
 
 echo '<table border="1"  id="container">';   
 			  
 
 echo "<tr>";

if(!empty($grenade)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/frag_grenade_mp.png\" title=\"grenade\" width=\"86px\"></center><center>Grenade&emsp;
</center></td>";

if(!empty($c4)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/c4_mp.png\" title=\"C4\" width=\"86px\"></center><center>C4&emsp;
</center></td>";

if(!empty($claymore)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/claymore_mp.png\" title=\"claymore\" width=\"86px\"></center><center>Claymore&emsp;
</center></td>";

if(!empty($artillery)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/artillery_mp.png\" title=\"artillery\" width=\"86px\"></center><center>Artillery&emsp;
</center></td>";

if(!empty($cobra)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
 <img src=\"".$ssylka_na_ikonki."img/weapons/cobra_20mm_mp.png\" title=\"cobra\" width=\"86px\"></center><center>&emsp;Cobra&emsp;</center></td>";


if(!empty($melle)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/mod_melee.png\" title=\"KNIFE\" width=\"86px\"></center><center>KNIFE&emsp;
</center></td>";
 
if(!empty($p90)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/p90_mp.png\" title=\"P90\" width=\"86px\"></center><center>&emsp;P90&emsp;</center></td>";


if(!empty($skorpion)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/skorpion_mp.png\" title=\"Scorpion\" width=\"86px\"></center><center>&emsp;Scorpion&emsp;</center></td>";

echo "</tr>";
 
 
 
 
 
echo "<tr>"; 


				if(empty($grenade))
				 $procent =	'0%';
                else
				 $procent = get_percentage($grenade, $kills); 

if(!empty($grenade)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';} 
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$grenade." </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>"; 


				if(empty($c4))
				 $procent =	'0%';
                else
				 $procent = get_percentage($c4, $kills); 

if(!empty($c4)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$c4." </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>"; 


				if(empty($claymore))
				 $procent =	'0%';
                else
				 $procent = get_percentage($claymore, $kills); 

if(!empty($claymore)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$claymore." </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($artillery))
				 $procent =	'0%';
                else
				 $procent = get_percentage($artillery, $kills);


if(!empty($artillery)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$artillery." </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($cobra))
				 $procent =	'0%';
                else
				 $procent = get_percentage($cobra, $kills);


if(!empty($cobra)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$cobra."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";


				if(empty($melle))
				 $procent =	'0%';
                else
				 $procent = get_percentage($melle, $kills);

if(!empty($melle)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>". $melle."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";
 
				if(empty($p90))
				 $procent =	'0%';
                else
				 $procent = get_percentage($p90, $kills); 
 

if(!empty($p90)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$p90."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($skorpion))
				 $procent =	'0%';
                else
				 $procent = get_percentage($skorpion, $kills); 

if(!empty($skorpion)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$skorpion."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";
echo "</tr>";









echo "<tr>"; 

if(!empty($mp5)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/mp5_mp.png\" title=\"MP5\" width=\"86px\"></center><center>&emsp;MP5&emsp;</center></td>";


if(!empty($ak47)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';} 
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/ak47_mp.png\" title=\"ak-47\" width=\"86px\"></center><center>&emsp;AK-47&emsp;</center></td>";

if(!empty($ak74u)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/ak74u_mp.png\" title=\"ak-74u\" width=\"86px\"></center><center>&emsp;AK-74u&emsp;</center></td>";

if(!empty($rpg)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/rpg_mp.png\" title=\"RPG\" width=\"86px\"></center><center>&emsp;RPG&emsp;</center></td>";

if(!empty($m40a3)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/m40a3_mp.png\" title=\"m40a3\" width=\"86px\"></center><center>&emsp;m40a3&emsp;</center></td>";

if(!empty($dragunov)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
  <img src=\"".$ssylka_na_ikonki."img/weapons/dragunov_mp.png\" title=\"dragunov\" width=\"86px\"></center><center>&emsp;Dragunov&emsp;</center></td>";

if(!empty($m21)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
  <img src=\"".$ssylka_na_ikonki."img/weapons/m21_mp.png\" title=\"m21\" width=\"86px\"></center><center>&emsp;M21&emsp;</center></td>";
  
  
if(!empty($m4)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/m4_mp.png\" title=\"M4\" width=\"86px\"></center><center>&emsp;M4&emsp;</center></td>";
 
 echo "</tr>";
echo "<tr>"; 







				if(empty($mp5))
				 $procent =	'0%';
                else
				 $procent = get_percentage($mp5, $kills); 


if(!empty($mp5)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$mp5." </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($ak47))
				 $procent =	'0%';
                else
				 $procent = get_percentage($ak47, $kills); 


if(!empty($ak47)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';} 
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$ak47."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>"; 

				if(empty($ak74u))
				 $procent =	'0%';
                else
				 $procent = get_percentage($ak74u, $kills); 

if(!empty($ak74u)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';} 
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$ak74u."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>"; 

				if(empty($rpg))
				 $procent =	'0%';
                else
				 $procent = get_percentage($rpg, $kills);

if(!empty($rpg)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$rpg."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($m40a3))
				 $procent =	'0%';
                else
				 $procent = get_percentage($m40a3, $kills);

if(!empty($m40a3)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$m40a3."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($dragunov))
				 $procent =	'0%';
                else
				 $procent = get_percentage($dragunov, $kills);

if(!empty($dragunov)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$dragunov."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 3px #000, 0 0 5px #000, 0 0 9px #000, 0 0 17px #000, 0 0 9px #000, 0 0 22px #000, 0 0 22px #000, 0 0 43px #000;\"> ".$procent."</b></center></td>";

				if(empty($m21))
				 $procent =	'0%';
                else
				 $procent = get_percentage($m21, $kills);

if(!empty($m21)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$m21."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($m4))
				 $procent =	'0%';
                else
				 $procent = get_percentage($m4, $kills);

if(!empty($m4)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$m4."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

echo "</tr>";






echo "<tr>";



if(!empty($m1014)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/m1014_mp.png\" title=\"m1014\" width=\"86px\"></center><center>&emsp;m1014&emsp;</center></td>";

if(!empty($uzi)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/uzi_mp.png\" title=\"uzi\" width=\"86px\"></center><center>&emsp;uzi&emsp;</center></td>";

if(!empty($g3)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/g3_mp.png\" title=\"G3\" width=\"86px\"></center><center>&emsp;G3&emsp;</center></td>";

if(!empty($g36c)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/g36c_mp.png\" title=\"G36c\" width=\"86px\"></center><center>&emsp;G36c&emsp;</center></td>";

if(!empty($remington700)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/remington700_mp.png\" title=\"remington700\" width=\"86px\"></center><center>&emsp;remington700&emsp;</center></td>";


if(!empty($barrett)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/barrett_mp.png\" title=\"barrett\" width=\"86px\"></center><center>&emsp;Barrett&emsp;</center></td>";

  if(!empty($colt45)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';} 
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
  <img src=\"".$ssylka_na_ikonki."img/weapons/colt45_mp.png\" title=\"destructible_bar\" width=\"86px\"></center><center>&emsp;Colt 45&emsp;</center></td>";
 
  if(!empty($beretta)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';} 
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
  <img src=\"".$ssylka_na_ikonki."img/weapons/beretta_mp.png\" title=\"destructible_bar\" width=\"86px\"></center><center>&emsp;Beretta&emsp;</center></td>"; 
 
 echo "</tr>";
echo "<tr>"; 


				if(empty($m1014))
				 $procent =	'0%';
                else
				 $procent = get_percentage($m1014, $kills);

if(!empty($m1014)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$m1014."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($uzi))
				 $procent =	'0%';
                else
				 $procent = get_percentage($uzi, $kills);

if(!empty($uzi)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$uzi."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($g3))
				 $procent =	'0%';
                else
				 $procent = get_percentage($g3, $kills);

if(!empty($g3)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$g3."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($g36c))
				 $procent =	'0%';
                else
				 $procent = get_percentage($g36c, $kills);

if(!empty($g36c)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$g36c."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($remington700))
				 $procent =	'0%';
                else
				 $procent = get_percentage($remington700, $kills);

if(!empty($remington700)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$remington700."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($barrett))
				 $procent =	'0%';
                else
				 $procent = get_percentage($barrett, $kills);


if(!empty($barrett)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$barrett."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($colt45))
				 $procent =	'0%';
                else
				 $procent = get_percentage($colt45, $kills);


if(!empty($colt45)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';} 
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\">
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px #1b9900, 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px ".$color_kills.";\">
<center>".$colt45."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>"; 

				if(empty($beretta))
				 $procent =	'0%';
                else
				 $procent = get_percentage($beretta, $kills);

if(!empty($beretta)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';} 
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\">
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px #1b9900, 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px ".$color_kills.";\">
<center>".$beretta."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>"; 
echo "</tr>";










echo "<tr>";

if(!empty($winchester1200)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/winchester1200_mp.png\" title=\"winchester-1200\" width=\"86px\"></center><center>&emsp;winchester-1200&emsp;</center></td>";

if(!empty($m16)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/m16_mp.png\" title=\"M16\" width=\"86px\"></center><center>&emsp;M16&emsp;</center></td>";

if(!empty($m14)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/m14_mp.png\" title=\"M14\" width=\"86px\"></center><center>&emsp;M14&emsp;</center></td>";

if(!empty($rpd)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/rpd_mp.png\" title=\"RPD\" width=\"86px\"></center><center>&emsp;RPD&emsp;</center></td>";

if(!empty($saw)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/saw_mp.png\" title=\"SAW\" width=\"86px\"></center><center>&emsp;SAW&emsp;</center></td>";


if(!empty($m60e4)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/m60e4_mp.png\" title=\"m60e4\" width=\"86px\"></center><center>&emsp;m60e4&emsp;</center></td>";

if(!empty($usp)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/usp_mp.png\" title=\"usp\" width=\"86px\"></center><center>&emsp;usp&emsp;</center></td>";

if(!empty($deserteagle)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
<img src=\"".$ssylka_na_ikonki."img/weapons/deserteagle_mp.png\" title=\"desert eagle\" width=\"86px\"></center><center>&emsp;Desert Eagle&emsp;</center></td>";

 echo "</tr>";
echo "<tr>"; 

















				if(empty($winchester1200))
				 $procent =	'0%';
                else
				 $procent = get_percentage($winchester1200, $kills);


if(!empty($winchester1200)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$winchester1200."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

				if(empty($m16))
				 $procent =	'0%';
                else
				 $procent = get_percentage($m16, $kills);

if(!empty($m16)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$m16."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";


				if(empty($m14))
				 $procent =	'0%';
                else
				 $procent = get_percentage($m14, $kills);


if(!empty($m14)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$m14."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";


				if(empty($rpd))
				 $procent =	'0%';
                else
				 $procent = get_percentage($rpd, $kills);


if(!empty($rpd)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$rpd."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";



				if(empty($saw))
				 $procent =	'0%';
                else
				 $procent = get_percentage($saw, $kills);


if(!empty($saw)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$saw."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";


				if(empty($m60e4))
				 $procent =	'0%';
                else
				 $procent = get_percentage($m60e4, $kills);



if(!empty($m60e4)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$m60e4."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";
 

				if(empty($usp))
				 $procent =	'0%';
                else
				 $procent = get_percentage($usp, $kills);


if(!empty($usp)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$usp."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";


				if(empty($deserteagle))
				 $procent =	'0%';
                else
				 $procent = get_percentage($deserteagle, $kills);


if(!empty($deserteagle)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$deserteagle."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

echo "</tr>";



if(!empty($destructible_car)){

echo "<tr>";

 if(!empty($destructible_car)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}

 echo "<td style=\"background:".$prozrachn." ; ".$prozr."font-family: Ariel;text-align:left;  font-size: 14px; color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px ".$prozrachntext.", 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\"> <center>&emsp;
 <img src=\"".$ssylka_na_ikonki."img/weapons/destructible_car.png\" title=\"destructible_car\" width=\"86px\"></center><center>&emsp;Destructible Car&emsp;</center></td>";

 echo "</tr>";

 echo "<tr>"; 
 
				if(empty($destructible_car))
				 $procent =	'0%';
                else
				 $procent = get_percentage($destructible_car, $kills); 
 
if(!empty($destructible_car)) {$prozrachn = '#2e3535'; $prozrachntext = '#1b9900'; $prozr = 'opacity: 1;';}else{  $prozrachn = '#000'; $prozrachntext = '#000'; $prozr = 'opacity: 0.7;';}
echo "<td style=\"background:" . ($i % 2 ? '#111' : '#222') . ";".$prozr."; font-family: Titillium Web; color: Silver;font-size: 18px;font-size:".$auto_font.";\"> 
<b style=\"color:".$prozrachntext.";text-shadow: 0 0 1px #000, 0 0 2px #000, 0 0 3px #000, 0 0 2px ".$prozrachntext.", 0 0 2px #1b9900, 0 0 1px #1b9900, 0 0 2px #1b9900, 0 0 3px #1b9900;\">
<center>".$destructible_car."  </b> <b style=\"color: #338c7d; font-family: Ariel; font-size: 13px; text-shadow: 0 0 1px #000, 0 0 3px #000, 0 0 5px #000, 0 0 7px #000, 0 0 9px #000, 0 0 12px #000, 0 0 22px #000, 0 0 33px #000;\"> ".$procent."</b></center></td>";

echo "</tr>";
}




//}


echo '</table></br></br>';  
 


 
  
} 

