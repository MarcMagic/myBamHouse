<!DOCTYPE HTML>

<html>
<?php
		require_once('connect.php');
		mysql_query("SET NAMES 'utf8'");
		$newsid = $_GET['id'];
		$chk = mysql_query("SELECT * FROM  `index` WHERE id = '{$newsid}'");
		$nr = mysql_num_rows($chk);

		if ($nr != 0){

			$query = mysql_query("SELECT * FROM  `index` ORDER BY id DESC");
			while ($row = mysql_fetch_assoc($chk)) {
					$articleid = $row['id'];
					$description =$row['kurzbeschreibung'];
					$keywords = $row['keywords'];
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
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content=<?php echo "{$description}"; ?>>
		<meta name="keywords" content= <?php echo "{$keywords}"?>>
		<link rel="icon" href="http://www.bamhouse.de/images/favicon.ico" type="image/x-icon" />
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
		<base target="_blank">
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-62480070-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>
	<body>
	
				<div id="wrapper">
					<div id="top">	
						<div id="logo">
					<a href="index.php"><img src="images/Bamhouse.png" alt ="BamHouse Logo" title="BamHouse"/></a>
						</div>
					</div>
					
					<div id="topnav">
						<nav>
							<ul>
								<li><a href="index.php">STARTSEITE</a></li>
								<li><a href="cool.php">Das ist cool</a></li>
								<li><a href="sad.php">Das ist traurig</a></li>
								<li><a href="enraging.php">Das regt auf</a></li>
								<li><a href="funny.php">Das ist zum Lachen</a></li>
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
									<span class="counter"><?php echo $cool;?></span><br>
									<span class="smileyunterschrift">Cool</span>
							</form>
						
							<form class="smiley" action = "vote_sad.php" method = "post">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Sad!" src="/images/sad.png" alt="Sad" class="vote_image"/>
									<span class="counter"><?php echo $sad;?></span><br>
									<span class="smileyunterschrift">Traurig</span>
							</form>

												
							<form class="smiley" action = "vote_enraging.php" method = "post">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Enraging!" src="/images/enraging.png" alt="Enraging" class="vote_image"/>
									<span class="counter"><?php echo $enraging;?></span><br>
									<span class="smileyunterschrift">Ver&auml;rgernd</span>
							</form>
						
							<form class="smiley" action = "vote_funny.php" method = "post">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Funny!" src="/images/funny.png" alt="Funny" class="vote_image"/>
									<span class="counter"><?php echo $funny;?></span><br>
									<span class="smileyunterschrift">Lustig</span>
							</form>
				</div>

					<hr>

					<div id="commentarea">
		    			<h2>Kommentare</h2>
		    			<?php
	    				$comchk = mysql_query("SELECT * FROM `comment` WHERE newsid = '{$articleid}' ORDER BY id DESC");
	    				while ($comment = mysql_fetch_assoc($comchk)) {
							$name = $comment['name'];
							$comment = nl2br($comment['comment']);

							echo "<div class = 'comment'><span><b>{$name}</b>:</span></br>
							<p id='commenttext'>{$comment}</p></div>
							";
						}
	    				?>
	    				<form id= "commentform" action = "post.php" method = "post">
							<table>
								<tr>
									<td>Name: </td><td><input type="text" name="name" size="50" style="width: 200px;"/>
									<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									</td>
	    						</tr>
	    						<tr>
	    							<td>Kommentar: </td><td><textarea cols= "50" rows = "8" name="comment"></textarea></td>
	    						</tr>
	    					</table>
	    					<input class="button" name="submit" type="submit" value="Kommentieren"/>
	    				</form></br>
	    			</div>
		    	
				
				<div id="footer">
					<nav>
						<ul>
							<li><a href="impressum.html">Impressum</a></li>
							<li><a href="ueber.html">Über Bamhouse</a></li>
							<li><a href="datenschutz.html">Datenschutz</a></li>
							<li><a href="kontakt.html">Kontakt</a></li>
						</ul>
					</nav>
					
					<p>&copy 2015 Copyright Bamhouse</p>

				</div>
				
			</div>
		<?php
		}
		}
		?>
	</body>
</html>