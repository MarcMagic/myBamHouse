<!DOCTYPE HTML>

<html>
<?php
		require_once('connect.php');
		$newsid = $_GET['id'];
		$chk = mysql_query("SELECT * FROM  `index` WHERE id = '{$newsid}'");
		$nr = mysql_num_rows($chk);

		if ($nr != 0){

			$query = mysql_query("SELECT * FROM  `index` ORDER BY id DESC");
			mysql_query("SET NAMES 'utf8'");
			while ($row = mysql_fetch_assoc($chk)) {
					$articleid = $row['id'];
					$headline = $row['headline'];
					$text = nl2br ($row['text']);
					$date = $row['date'];
					$cool = $row['cool'];
					$sad = $row['sad'];
					$enraging = $row['enraging'];
					$funny = $row['funny']
	?>
	<head>
		<title><?php echo "{$headline}";?></title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>
	
				<div id="wrapper">
					<div id="top">	
						<div id="logo">
							<img src="images/BH_Logo.png" id="logo_image" />
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
					
				<div id="article">
					<h1><?php echo "{$headline}";?></h1>
					
					<div id="date"><?php echo "{$date}";?></div>
					
					<div id="textcontent"><?php echo "{$text}";?></div>
				
				</div>	
				
				<div id="frage">Wie findest du das?</div>
				<div id="smileyarea">
					
							<form class="smiley" action = "vote_cool.php" method = "post">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Cool!" src="/images/cool.png" alt="Cool" class="vote_image"/>
									<span>Cool <?php echo $cool;?></span>
							</form>
						
							<form class="smiley" action = "vote_sad.php" method = "post">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Sad!" src="/images/sad.png" alt="Sad" class="vote_image"/>
									<span>Traurig <?php echo $sad;?></span>
							</form>

												
							<form class="smiley" action = "vote_enraging.php" method = "post">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Enraging!" src="/images/enraging.png" alt="Enraging" class="vote_image"/>
									<span>Ver&auml;rgernd <?php echo $enraging;?></span>
							</form>
						
							<form class="smiley" action = "vote_funny.php" method = "post">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Funny!" src="/images/funny.png" alt="Funny" class="vote_image"/>
									<span>Lustig <?php echo $funny;?></span>
							</form>
				</div>
					<br><br>	

					<hr>

					<div id="commentarea">
		    			<h2>Kommentare</h2></br>
		    			<?php
	    				$comchk = mysql_query("SELECT * FROM `comment` WHERE newsid = '{$articleid}' ORDER BY id DESC");
	    				while ($comment = mysql_fetch_assoc($comchk)) {
							$name = $comment['name'];
							$comment = nl2br($comment['comment']);

							echo "<div class = 'comment'><span><b>{$name}</b>:</span></br>
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