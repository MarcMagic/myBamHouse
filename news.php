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
		<meta name="twitter:widgets:theme" content="light">
		<meta name="twitter:widgets:link-color" content="#8ab0b6">
		<meta name="twitter:widgets:border-color" content="#8ab0b6">
		
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
							<a href="index.php" target="_self"><img src="images/Bamhouse.png" alt ="BamHouse Logo" title="BamHouse"/></a>
						</div>
						
						<div id="top-right">
				
							<div id="watch">
								
								<!--Kostenlose, frei konfigurierbare Homepage-Uhr von www.schnelle-online.info/Homepage/Tools.html. Ohne Gewähr, ohne Haftung.
								Nutzungbedingung: Dieser Kommentar und der Link unten dürfen nicht entfernt oder (nofollow) modifiziert werden.
								-->
								<a style="font-family: 'PT Sans Narrow', sans-serif;text-decoration:none;border-style:none;color:#333333;" target="_blank" href="http://www.schnelle-online.info/Kalender.html" 
								id="soidate166375031865">Kalender</a><span style="font-family: 'PT Sans Narrow', sans-serif;text-decoration:none;border-style:none;color:#333333;"> - 
								</span><a style="font-family: 'PT Sans Narrow', sans-serif;text-decoration:none;border-style:none;color:#333333;" target="_blank" href="http://www.schnelle-online.info/Atomuhr-Uhrzeit.html" 
								id="soitime166375031865">Atomuhr</a>
								<script type="text/javascript">
								SOI = (typeof(SOI) != 'undefined') ? SOI : {};(SOI.ac21fs = SOI.ac21fs || []).push(function() {
								(new SOI.DateTimeService("166375031865", "DE")).setWithSeconds(false).start();});
								(function() {if (typeof(SOI.scrAc21) == "undefined") { SOI.scrAc21=document.createElement('script');SOI.scrAc21.type='text/javascript'; SOI.scrAc21.async=true;SOI.scrAc21.src=((document.location.protocol == 'https:') ? 
								'https://' : 'http://') + 'homepage-tools.schnelle-online.info/Homepage/atomicclock2_1.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(SOI.scrAc21, s);}})();
								</script> Berlin
								
							</div>
							
							<div id="social-media">
								<p>Nichts mehr verpassen</p>
								<ul>
									<li><a href="https://www.facebook.com/pages/BamHouse/1647660275446983?fref=ts" target="_blank"><img src="images/facebook.png" /></a></li>
									<li><a href="https://twitter.com/BamHouse1" target="_blank"><img src="images/twitter.png" /></a></li>
									<li><a href="ueber.html" ><img src="images/Icon2.png" /></a></li>
								</ul>
							</div>
				</div>
					</div>
					
					<div id="topnav">
						<nav>
							<ul>
								<li><a href="index.php" target="_self">STARTSEITE</a></li>
								<li><a href="cool.php" target="_self">Das ist cool</a></li>
								<li><a href="sad.php" target="_self">Das ist traurig</a></li>
								<li><a href="enraging.php" target="_self">Das regt auf</a></li>
								<li><a href="funny.php" target="_self">Das ist zum Lachen</a></li>
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
					
							<form class="smiley" action = "vote_cool.php" method = "post" target="_self">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Cool!" src="/images/cool.png" alt="Cool" class="vote_image"/>
									<span class="counter"><?php echo $cool;?></span><br>
									<span class="smileyunterschrift">Cool</span>
							</form>
						
							<form class="smiley" action = "vote_sad.php" method = "post" target ="_self">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Sad!" src="/images/sad.png" alt="Sad" class="vote_image"/>
									<span class="counter"><?php echo $sad;?></span><br>
									<span class="smileyunterschrift">Traurig</span>
							</form>

												
							<form class="smiley" action = "vote_enraging.php" method = "post" target ="_self">
								<input type="hidden" name="id" value="<?php echo $newsid;?>"/>
									<input name="submit" type="image" value="Enraging!" src="/images/enraging.png" alt="Enraging" class="vote_image"/>
									<span class="counter"><?php echo $enraging;?></span><br>
									<span class="smileyunterschrift">Ver&auml;rgernd</span>
							</form>
						
							<form class="smiley" action = "vote_funny.php" method = "post" target="_self">
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
	    				<form id= "commentform" action = "post.php" method = "post" target="_self">
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