<?php

function db_connect() {
		$db = "andrzejlesniak_cba_pl";
		$server ="mysql.cba.pl";
		$user = "andles";
		$password = "27284312";
	
		$connection = mysql_connect($server, $user, $password);
		if (!$connection) {
			die('Could not connect: ' . mysql_error());
		}

		mysql_select_db ($db, $connection);
		if (!$connection) {
			die('Could not connect to db: ' . mysql_error());
		}
	}

  function db_close() {
      mysql_close($connection);
  }

  function fArray($result) {
	  $array_user = array();
	  while($data = mysql_fetch_assoc($result)){
		 $array_user[] = $data;
	  }
	  echo json_encode($array_user);
  }

  function show() {
	  if (!isset($_POST['value'])) {    
		$query = "SELECT * FROM music";
		$result = mysql_query($query);
		fArray($result);
	  } 
	  else
	  {
		$esc = mysql_real_escape_string($_POST['value']);
		$sql = "SELECT * FROM music where type='".$esc."'";
		$result = mysql_query($sql);
		fArray($result);
	  }
  }

