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

  function videoAdd() {
      if (isset($_POST['newsong']))
	  {
		 db_connect();
		 $query = sprintf("INSERT INTO music (name, url, text, writer, type) VALUES ('%s', '%s', '%s', '%s', '%s')",
            mysql_real_escape_string($_POST['name']),
			mysql_real_escape_string($_POST['url']),
			mysql_real_escape_string($_POST['text']),
			mysql_real_escape_string($_POST['writer']),
			mysql_real_escape_string($_POST['category']));
		$result = mysql_query($query);
		if ($result) echo "Piosenka zosta³a dodana!";
		else echo "Piosenka nie zosta³a dodana";
		db_close();
		header( "refresh:3;url=/test/" );
	  }
	  else
	  {
	  echo '
		  <h2>Dodaj piosenkê:</h2>
		  <form method="post">                     
		  <table>
		  <tr><td>Tytu³:</td><td><input type="text" placeholder="Nazwa piosenki" id="name" name="name" /></td></tr>
		  <tr><td>Twórca:</td><td><input type="text" placeholder="Twórca" id="writer" name="writer"  /></td></tr>
		  <tr><td>Adres:</td><td><input type="text" placeholder="Adres" id="url" name="url" /> </td></tr>
		  <tr><td>Tekst:</td><td><input type="text" placeholder="Tekst" id="text" name="text" /></td></tr>
		  </table>
		  <select id="category" name="category">
			  <option value="rock">Rock</option>
			  <option value="jazz">Jazz</option>
			  <option value="blues">Blues</option>
		  </select>
		  <button type="reset">Wyczyœæ</button>
		  <button type="submit" name="newsong" value="submit">Dodaj</button>
		  </fieldset>';
	  }
  }