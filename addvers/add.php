<?php
 require_once('core.php');
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
		if ($result) echo "Piosenka zosta�a dodana!";
		else echo "Piosenka nie zosta�a dodana";
		db_close();
		header( "refresh:3;url=/test/" );
	  }
	  else
	  {
	  echo '
		  <h2>Dodaj piosenk�:</h2>
		  <form method="post">                     
		  <table>
		  <tr><td>Tytu�:</td><td><input type="text" placeholder="Nazwa piosenki" id="name" name="name" /></td></tr>
		  <tr><td>Tw�rca:</td><td><input type="text" placeholder="Tw�rca" id="writer" name="writer"  /></td></tr>
		  <tr><td>Adres:</td><td><input type="text" placeholder="Adres" id="url" name="url" /> </td></tr>
		  <tr><td>Tekst:</td><td><input type="text" placeholder="Tekst" id="text" name="text" /></td></tr>
		  </table>
		  <select id="category" name="category">
			  <option value="rock">Rock</option>
			  <option value="jazz">Jazz</option>
			  <option value="blues">Blues</option>
		  </select>
		  <button type="reset">Wyczy��</button>
		  <button type="submit" name="newsong" value="submit">Dodaj</button>
		  </fieldset>';
	  }