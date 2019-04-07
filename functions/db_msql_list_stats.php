<?php
/*	
 if(!empty($key))
 { 
 if (!empty($search))
 $reponse = $bdd->query('SELECT * FROM db_stats_0 where s_guid like "'.$search.'"  ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);
else if (!empty($searchplayername))
$reponse = $bdd->query('SELECT * FROM db_stats_0 where s_player like "'.$searchplayername.'"  ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);	







else
  $reponse = $bdd->query('SELECT * FROM db_stats_1 where s_kills ORDER BY (s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);
 
 
 
 
 
 
 
 
 
 }else{	 
 
 */
 
 
 
 
 
 
 
 
 
 
 
 if (!empty($search))
	 /*
  $reponse = $bdd->query('SELECT t1.*, t2.* 
from db_stats_1 t1 
join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg 
      where s_guid like "'.$search.'"
 ORDER BY (s_kills+0) DESC LIMIT 10');
 */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t0.s_guid like "'.$search.'"
 ORDER BY (t1.s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total); 
 
 
 
 
 
 
  


else if (!empty($searchplayername))
	 /*	
$reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_guid like "'.$searchplayername.'"
 ORDER BY (s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);
 */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t0.s_player like "'.$searchplayername.'"
 ORDER BY (t1.s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total); 
 
 
 
 
 
 
 
 
 
 
 
 


else if ((!empty($server))&&(!empty($search_heads)))
	 /*	
   $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_port="'.$server.'"
 ORDER BY (s_heads+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);  

 */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t0.s_port="'.$server.'"
 ORDER BY (t1.s_heads+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total); 
 
 
 









 
 
else if ((!empty($server))&&(!empty($search_skill)))
	 /*	
   $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_port="'.$server.'"
 ORDER BY (w_skill+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);  

 */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t0.s_port="'.$server.'"
 ORDER BY (t1.w_skill+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total); 



 
 
else if ((!empty($server))&&(!empty($search_ratiokd)))
	 /*	
   $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_port="'.$server.'"
 ORDER BY (w_ratio+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);  
 */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t0.s_port="'.$server.'"
 ORDER BY (t1.w_ratio+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);  
 
 
 
else if ((!empty($server))&&(!empty($search_deaths)))
  	 /*
 $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_port="'.$server.'"
 ORDER BY (s_deaths+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total); 
  */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t0.s_port="'.$server.'"
 ORDER BY (t1.s_deaths+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);  
 
 

else if ((!empty($server))&&(!empty($search_kills)))
   	 /*
 $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_port="'.$server.'"
 ORDER BY (s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);
   */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t0.s_port="'.$server.'"
 ORDER BY (t1.s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total); 
 
 
else if ((!empty($server))&&(!empty($search_knife)))
     	 /* 
$reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_port="'.$server.'"
 ORDER BY (s_melle+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);
    */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t0.s_port="'.$server.'"
 ORDER BY (t1.s_melle+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total); 
 
else if (!empty($server))
      	 /*
	 $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_port="'.$server.'" and t1.s_kills
 ORDER BY (s_kills+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total.''); 
    */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t0.s_port="'.$server.'" and t1.s_kills
 ORDER BY (t1.s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);  



else if (!empty($search_kills))
     	 /*
	 $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_kills
 ORDER BY (s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);
    */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg where t1.s_kills
 ORDER BY (t1.s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total); 



else if (!empty($search_deaths))
$reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where s_deaths
 ORDER BY (s_deaths+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);

	 
else if (!empty($search_ratiokd))
$reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg 
 ORDER BY (w_ratio+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);


else if (!empty($search_heads))
$reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg
 ORDER BY (s_heads+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);
	 
else if (!empty($search_skill))
 $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg
 ORDER BY (w_skill+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);

 
else if (!empty($search_grenades))
 $reponse = $bdd->query('SELECT * FROM db_stats_1 where s_grenade ORDER BY (s_grenade+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);	 


else if (!empty($search_knife))
$reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg
 ORDER BY (s_melle+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);



else if (!empty($search_suecides))
 $reponse = $bdd->query('SELECT * FROM db_stats_1 where s_suicids ORDER BY (s_suicids+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);	 
else if (!empty($search_geo))
 $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2) 
 t2 ON t1.s_pg = t2.s_pg where w_geo="'.$search_geo.'"
 ORDER BY (s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);	 
else if (!empty($search_cfour))
 $reponse = $bdd->query('SELECT * FROM db_stats_1 where s_c4 ORDER BY (s_c4+0) DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);	

else if ((!empty($server)) && (!empty($paages)))
   $reponse = $bdd->query('SELECT t1.*, t2.* from db_stats_1 t1 join 
 (select * from db_stats_2 where w_port="'.$server.'" LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total.') 
 t2 ON t1.s_pg = t2.s_pg where s_port="'.$server.'"
 ORDER BY (s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total); 
 

else
  //$reponse = $bdd->query('SELECT * FROM db_stats_1 where s_kills ORDER BY (s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);	 



 /* 
 
 $reponse = $bdd->query('SELECT u.s_player, u.s_guid, u.servername, u.s_kills, 
d.w_geo, d.w_place, d.w_skill, d.w_ratio, d.w_prestige, d.w_fps, d.w_ping,
u.s_deaths, u.s_deaths, u.s_heads, u.s_suicids, u.s_melle, u.s_port, u.s_time, u.s_lasttime, 
d.w_port  AS s_fall
       FROM db_stats_1 u
LEFT OUTER JOIN db_stats_2 d ON u.s_guid = d.w_guid where u.s_kills ORDER BY (u.s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);	 
 

 
 
 
  */
 
 
   $reponse = $bdd->query('SELECT t0.*, t1.*, t2.* 
   from db_stats_0 t0 
   join 
 (select * from db_stats_1) 
 t1 ON 
 t0.s_pg = t1.s_pg
 
    join 
 (select * from db_stats_2) 
 t2 ON 
 t1.s_pg = t2.s_pg
 
 ORDER BY (t1.s_kills+0)  DESC LIMIT ' . $premierMessageAafficher . ', ' . $top_main_total);
 	 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 /////////}