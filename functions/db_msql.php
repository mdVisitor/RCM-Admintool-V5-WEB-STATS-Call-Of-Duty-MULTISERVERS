<?php
if(!empty($key))
 {   
if (!empty($search))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where guid like '".$search."' and t = 'xl'");	 //guid='$search'   guid like "%'.$search.'%"
else if (!empty($search_ip))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where ip like '".$search_ip."' and t = 'xl'");
else if (!empty($searchplayername))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where nickname like '".$searchplayername."' and t = 'xl'");	 //guid='$search'   guid like "%'.$search.'%"
else if (!empty($server))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where s_port='$server'  and t = 'xl'"); 
else if (!empty($timesearch))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where timeh='$timesearch' and t = 'xl'"); 
else if (!empty($geosearch))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where geo='$geosearch'  and t = 'xl'"); 
else if ((!empty($server)) && (!empty($paages)))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where s_port ='$server'  and t = 'xl'");
else if (!empty($statusx1))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where st1='$statusx1' and t = 'xl'"); 
else if (!empty($statusx2))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where st2='$statusx2' and t = 'xl'");
else
  $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where t = 'xl'");
 }
else
{
if (!empty($search))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where guid like '".$search."' and t = 'xl'");	 //guid='$search'   guid like "%'.$search.'%"
else if (!empty($searchplayername))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where nickname like '".$searchplayername."' and t = 'xl'");	 //guid='$search'   guid like "%'.$search.'%"
else if (!empty($server))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where s_port='$server' and t = 'xl'"); 
else if (!empty($timesearch))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where timeh='$timesearch' and t = 'xl'"); 
else if (!empty($geosearch))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where geo='$geosearch' and t = 'xl'"); 
else if ((!empty($server)) && (!empty($paages)))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where s_port ='$server' and t = 'xl'");
else if (!empty($statusx1))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where st1='$statusx1' and t = 'xl'"); 
else if (!empty($statusx2))
 $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where st2='$statusx2' and t = 'xl'");
else
  $reponse=$bdd ->query("SELECT COUNT(*) AS id FROM chat where t = 'xl'");	
}
