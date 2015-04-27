<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>BamHouse</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
	</head>
	<body>
	<div>Ueberschrift</div>
	<?php
		require_once('connect.php');
		$query = mysql_query ("SELECT * FROM `index`")
		or die ("MySQL-Error: " . mysql_error());;

		while($row = mysql_fetch_assoc($query)) {
			$articleid = $row['id'];
			$headline = $row['headline'];
			$text = $row['text'];

			echo "<h2>{$headline}</h2>
			<p>$text}</p>";
			echo 'MYSQL-Fehler: '.mysql_error();
		}
	?>
	</body>
</html>