<!DOCTYPE HTML>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>PLATZHALTER FÜR ARTIKELNAME</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	<body>
	<?php
		require_once('connect.php');
		$newsid = $_GET['id'];
		$chk = mysql_query("SELECT * FROM  `index` WHERE id = '{$newsid}'");
		$nr = mysql_num_rows($chk);
		echo 'MYSQL-Fehler: '.mysql_error();

		if ($nr != 0){

			$query = mysql_query("SELECT * FROM  `index` ORDER BY id DESC");
			echo 'MYSQL-Fehler: '.mysql_error();
	?>
			<div id="wrapper">
				<div id="top">	
					<div id="logo">
						<img src="images/logos2.jpg" />
					</div>
				</div>
				
				<div id="topnav">
					<nav>
						<ul>
							<li><a href="index.html">STARTSEITE</a></li>
							<li><a href="index.html">SEITE 2</a></li>
							<li><a href="index.html">SEITE 3</a></li>
							<li><a href="index.html">SEITE 4</a></li>
							<li><a href="index.html">SEITE 5</a></li>
						</ul>
					</nav>
				</div>
				
				<div id="textarea">
				<?php
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

					$comchk = mysql_query("SELECT * from `comment` WHERE newsid = '{$articleid}'");
					$nrcom = mysql_num_rows($comchk);

				echo ="<h1>{$headline}</h1>
				<p>$date</p>
				<p>$text</p>
				<p>$link</p>
				";
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



				//KOMMENTARE
				<div>
	    			<h4>Kommentare</h4></br>
	    				<?php
	    				$comchk = mysql_query("SELECT * FROM `comment` WHERE newsid = '{$articleid}'");
	    				while ($comment = mysql_fetch_assoc($comchk)) {
	    					
							$name = $comment['name'];
							$comment = nl2br($comment['comment']);
							//$posted = $comment['posted'];

							echo "<span><b>{$name}</b> schrieb:</span></br>
							<p>{$comment}</p>
							";
						}
	    				?>
	    				<form action = "post.php" method = "post">
							<table>
								<tr>
									<td>Name: </td><td><input type="text" name="name" class="css_input_name"/>
									<input type="hidden" name="id" value="<?php echo {$newsid};?>"/>
									</td>
	    						</tr>
	    						<tr>
	    							<td>Kommentar: </td><td><textarea cols= "35" rows = "10" name="comment"></textarea></td>
	    						</tr>
	    					</table>
	    					<input name="submit" type="submit" value="Posten"/>
	    				</form></br>
	    				<?php
	        				if (isset($_GET['com'])) {
								if($_GET['com'] == 1){
								}
								elseif($_GET['com']==0){
								echo "<span class='css_warnung'>Bitte alle Felder ausf&uuml;llen.</span>";
								}
							}
							?>
	    			</div>		
			</div>
			<?php
			}
		}
			echo 'MYSQL-Fehler: '.mysql_error();

			else{
			?>

			<h1>Artikel nicht gefunden!</h1>

			<?php
			}
			?>
			
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
	
	</body>
</html>