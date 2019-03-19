<?php
 if(!empty($key))
 { 
 if (!empty($search))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_guid like "'.$search.'"  ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);
else if (!empty($searchplayername))
$reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_player like "'.$searchplayername.'"  ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	







else
  $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_kills ORDER BY (s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);
 
 
 
 
 
 
 
 
 
 }else{	 
 if (!empty($search))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_guid like "'.$search.'"  ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);
else if (!empty($searchplayername))
$reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_player like "'.$searchplayername.'"  ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	


else if ((!empty($search_kills))&&(!empty($server)))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where servermd5="'.$server.'" and  s_kills ORDER BY (s_kills+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	
else if (!empty($server))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where servermd5="'.$server.'" ORDER BY (s_kills+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 

else if (!empty($search_kills))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_kills ORDER BY (s_kills+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 

else if (!empty($search_deaths))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_deaths ORDER BY (s_deaths+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($search_ratiokd))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_ratio ORDER BY (s_ratio+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($search_heads))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_heads ORDER BY (s_heads+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($search_skill))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_skill ORDER BY (s_skill+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($search_grenades))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_grenade ORDER BY (s_grenade+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($search_knife))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_melle ORDER BY (s_melle+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($search_suecides))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_suicids ORDER BY (s_suicids+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($search_geo))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_geo="'.$search_geo.'" ORDER BY (s_kills+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($search_cfour))
 $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_c4 ORDER BY (s_c4+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	

 

else
  $reponse = $bdd->query('SELECT * FROM x_db_play_stats where s_kills ORDER BY (s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
 }	 
