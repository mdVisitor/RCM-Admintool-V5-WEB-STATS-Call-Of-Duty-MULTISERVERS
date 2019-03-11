<?php
 if(!empty($key))
 { 
 if (!empty($search))
 $reponse = $bdd->query('SELECT * FROM chat where guid like "'.$search.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);
else if (!empty($searchplayername))
$reponse = $bdd->query('SELECT * FROM chat where nickname like "'.$searchplayername.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	
else if (!empty($search_ip))
$reponse = $bdd->query('SELECT * FROM chat where ip like "'.$search_ip.'" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);
else if (!empty($server))
 $reponse = $bdd->query('SELECT * FROM chat where servermd5="'.$server.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($statusx1))
 $reponse = $bdd->query('SELECT * FROM chat where st1="'.$statusx1.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($statusx2))
 $reponse = $bdd->query('SELECT * FROM chat where dt2="'.$statusx2.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($timesearch))
 $reponse = $bdd->query('SELECT * FROM chat where timeh="'.$timesearch.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	
else if (!empty($geosearch))
 $reponse = $bdd->query('SELECT * FROM chat where geo="'.$geosearch.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);
else if ((!empty($server)) && (!empty($paages)))
 $reponse = $bdd->query('SELECT * FROM chat where servermd5="'.$server.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	
else
  $reponse = $bdd->query('SELECT * FROM chat where t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);
 
 }
 else
 {
	 
 if (!empty($search))
 $reponse = $bdd->query('SELECT * FROM chat where guid like "'.$search.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);
else if (!empty($searchplayername))
$reponse = $bdd->query('SELECT * FROM chat where nickname like "'.$searchplayername.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	
else if (!empty($server))
 $reponse = $bdd->query('SELECT * FROM chat where servermd5="'.$server.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($statusx1))
 $reponse = $bdd->query('SELECT * FROM chat where st1="'.$statusx1.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($statusx2))
 $reponse = $bdd->query('SELECT * FROM chat where dt2="'.$statusx2.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
else if (!empty($timesearch))
 $reponse = $bdd->query('SELECT * FROM chat where timeh="'.$timesearch.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page); 	
else if (!empty($geosearch))
 $reponse = $bdd->query('SELECT * FROM chat where geo="'.$geosearch.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);
else if ((!empty($server)) && (!empty($paages)))
 $reponse = $bdd->query('SELECT * FROM chat where servermd5="'.$server.'" and t ="xl" ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	
else
  $reponse = $bdd->query('SELECT * FROM chat where t ="xl" ORDER BY id  DESC LIMIT ' . $premierMessageAafficher . ', ' . $soob_na_page);	 
 }	 
