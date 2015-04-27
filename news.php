<!DOCTYPE HTML>

<html>
<?php
		require_once('connect.php');
		$newsid = $_GET['id'];
		$chk = mysql_query("SELECT * FROM  `index` WHERE id = '{$newsid}'");
		$nr = mysql_num_rows($chk);

		if ($nr != 0){

			$query = mysql_query("SELECT * FROM  `index` ORDER BY id DESC");
			while ($row = mysql_fetch_assoc($chk)) {
					$articleid = $row['id'];
					$headline = $row['headline'];
					$text = nl2br ($row['text']);
					$bild = $row['bild'];
					$link = $row['link'];
					$date = $row['date'];
					$cool = $row['cool'];
					$sad = $row['sad'];
					$enraging = $row['enraging'];
					$funny = $row['funny']
	?>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title><?php echo "{$headline}";?></title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	<body>
	
				<div id="wrapper">
					<div id="top">	
						<div id="logo">
							<img src="images/Logos2.jpg" />
						</div>
					</div>
					
					<div id="topnav">
						<nav>
							<ul>
								<li><a href="index.php">STARTSEITE</a></li>
								<li><a href="index.php">SEITE 2</a></li>
								<li><a href="index.php">SEITE 3</a></li>
								<li><a href="index.php">SEITE 4</a></li>
								<li><a href="index.php">SEITE 5</a></li>
							</ul>
						</nav>
					</div>
					
				<div id="content">
					<?php echo "<h1>{$headline}</h1>
						<p>{$date}</p></br>
						<image src='images/{$bild}'/>
						<div>{$text}
							{$link}
						</div>";
					?>
				<form action = "vote_cool.php" method = "post">
				    <input type="hidden" name="id" value="<?php echo $newsid;?>"/>
				        <input name="submit" type="image" value="Cool!" src="/images/cool.png" alt="Cool"/>
				        <span><?php echo $cool;?></span>
				</form>
				<form action = "vote_sad.php" method = "post">
				    <input type="hidden" name="id" value="<?php echo $newsid;?>"/>
				        <input name="submit" type="image" value="Sad!" src="/images/sad.png" alt="Sad"/>
				        <span><?php echo $sad;?></span>
				</form>
				<form action = "vote_enraging.php" method = "post">
				    <input type="hidden" name="id" value="<?php echo $newsid;?>"/>
				        <input name="submit" type="image" value="Enraging!" src="/images/enraging.png" alt="Enraging"/>
				        <span><?php echo $enraging;?></span>
				</form>
				<form action = "vote_funny.php" method = "post">
				    <input type="hidden" name="id" value="<?php echo $newsid;?>"/>
				        <input name="submit" type="image" value="Funny!" src="/images/funny.png" alt="Funny"/>
				        <span><?php echo $enraging;?></span>
				</form>

					<hr>

					<div>
		    			<h2>Kommentare</h2></br>
		    			<?php
	    				$comchk = mysql_query("SELECT * FROM `comment` WHERE newsid = '{$articleid}'");
	    				while ($comment = mysql_fetch_assoc($comchk)) {
							$name = $comment['name'];
							$comment = nl2br($comment['comment']);

							echo "<div class = 'news'><span><b>{$name}</b> schrieb:</span></br>
							<p>{$comment}</p></div>
							";
						}
	    				?>
	    				<form action = "post.php" method = "post">
							<table>
								<tr>
									<td>Name: </td><td><input type="text" name="name"/>
									<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									</td>
	    						</tr>
	    						<tr>
	    							<td>Kommentar: </td><td><textarea cols= "35" rows = "10" name="comment"></textarea></td>
	    						</tr>
	    					</table>
	    					<input name="submit" type="submit" value="Post"/>
	    				</form></br>
		    	</div>
				
				<div id="footer">
					<nav>
						<ul>
							<li><a href="impressum.html">Impressum</a></li>
							<li><a href="agb.html">AGB</a></li>
							<li><a href="datenschutz.html">Datenschutz</a></li>
							<li><a href="kontakt.html">Kontakt</a></li>
						</ul>
					</nav>
				</div>
				
			</div>
		<?php
		}
		}
		?>
	</body>
</html>