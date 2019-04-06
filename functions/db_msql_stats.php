<?php
if(!empty($key))
 {   
if (!empty($search))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_guid like '".$search."'");	 //s_guid='$search'   s_guid like "%'.$search.'%"
else if (!empty($searchplayername))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_player like '".$searchplayername."'");	 //s_guid='$search'   s_guid like "%'.$search.'%"
else if (!empty($server))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_port='$server' "); 












else
  $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_kills ORDER BY (s_kills+0)");
 }
else
{
	
	
if (!empty($search))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_guid like '".$search."'");	 //s_guid='$search'   s_guid like "%'.$search.'%"












else if (!empty($searchplayername))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_player like '".$searchplayername."'");	 //s_guid='$search'   s_guid like "%'.$search.'%"

else if ((!empty($search_kills))&&(!empty($server)))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_kills and s_port='$server' ORDER BY (s_kills+0)");

else if (!empty($server))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_port='$server'"); 

else if (!empty($search_kills))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_kills ORDER BY (s_kills+0)");

else if (!empty($search_deaths))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_deaths ORDER BY (s_deaths+0)");
else if (!empty($search_ratiokd))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_2 where w_ratio ORDER BY (w_ratio+0)");
else if (!empty($search_heads))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_heads ORDER BY (s_heads+0)");
else if (!empty($search_skill))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_2 where w_skill ORDER BY (w_skill+0)");
else if (!empty($search_grenades))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_grenade ORDER BY (s_grenade+0)");
else if (!empty($search_knife))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_melle ORDER BY (s_melle+0)");
else if (!empty($search_suecides))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_suicids ORDER BY (s_suicids+0)");
else if (!empty($search_geo))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_2 where w_geo='".$search_geo."'");
else if (!empty($search_cfour))
$reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_c4 ORDER BY (s_c4+0)");



 

else
  $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM db_stats_1 where s_kills ORDER BY (s_kills+0)");	
}
