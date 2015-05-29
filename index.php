<!DOCTYPE HTML>
<html>
	<head>
		<title>BamHouse - virale Trends</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="Informationen rund um die deutsche Internetcommunity, sowie Virales in YouTube, Twitter, Instagram, Facebook, Vine und co.">
 		<meta name="keywords" content="Internet, YouTube, Twitter, Facebook, Hashtag, viral, trends, online, instagram, news, blogger, bamhouse">
		<link rel="icon" href="http://www.bamhouse.de/images/favicon.ico" type="image/x-icon" />
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$('.more_button').live("click",function() {
					var getId = $(this).attr("id");
					if (getId) {
						$("#load_more_"+getId).html('<img src="images/load_img.gif alt="Ladebalken" title="Ladebalken" style="padding: 10px 0 0 100px"/>');
						$.ajax({
							type: "POST",
							url: "more_content.php",
							data: "getLastContentId="+ getId, 
							cache: false,
							success: function(html){
								$("div#newsdiv").append(html);
								$("#load_more_"+getId).remove();
							}
						});
					}
					else {
						$(".more_tab").html('The End');
					}
				return false;
				});
			});
		</script>
		
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
	<script src="/cookiechoices.js"></script>
	<script>
	  document.addEventListener('DOMContentLoaded', function(event) {
	    cookieChoices.showCookieConsentBar('Um eine Mehrfach-Bewertung der einzelnen Artikel zu verhindern speichern wir Cookies. Indem Sie fortfahren, stimmen Sie der Verwendung zu.',
	      'Hinweis schließen');
	  });
	</script>
	<?php
		require_once('connect.php');
		mysql_query("SET NAMES 'utf8'");
		$query = mysql_query("SELECT * FROM `index` ORDER BY id DESC LIMIT 10");
	?>
		<div id="wrapper">
			<div id="top">
				<div id="logo">
					<a href="index.php"><img src="images/Bamhouse.png" alt ="BamHouse" title="BamHouse" /></a>
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
						<li><a href="index.php">STARTSEITE</a></li>
						<li><a href="cool.php">Das ist cool</a></li>
						<li><a href="sad.php">Das ist traurig</a></li>
						<li><a href="enraging.php">Das regt auf</a></li>
						<li><a href="funny.php">Das ist zum Lachen</a></li>
					</ul>
				</nav>
			</div>
			<div id="content">	
				<h1>Das Neueste aus dem Netz</h1>
							
						<div id = 'newsdiv'>
						<?php
						while ($row = mysql_fetch_assoc($query)) {
							$id = $row['id'];
							$headline = $row['headline'];
							$text = $row['text'];
							$cool = $row['cool'];
							$sad = $row['sad'];
							$enraging = $row['enraging'];
							$funny = $row['funny'];
							$date = $row['date'];

							echo "
							<div class='news'>
							<div id='indexdate'>{$date}</div>
									<a href='news.php?id={$id}'>
										<h2>{$headline}</h2>
									</a>
									<div id = preview>".substr($text,0,230).
									"<a href='news.php?id={$id}'><b> ...weiterlesen</b></a></div>
											<div id='indexsmileyarea'><img class='preview_image' src='images/cool.png' alt='smiley cool' title='cool'/>
												<span>{$cool}</span>
												<img class='preview_image' src='images/sad.png' alt ='smiley traurig' title='traurig'/>
												<span>{$sad}</span>
												<img class='preview_image' src='images/enraging.png' alt ='smiley verärgenrd' title='verärgernd'/>
												<span>{$enraging}</span>
												<img class='preview_image' src='images/funny.png' alt ='smiley lustig' title='lustig'/>
												<span>{$funny}</span>
											</div>
							</div>";
							}?>				
						</div>

							<div class="more_div">
								<a href="#"><div id="load_more_<?php echo $id; ?>" class="more_tab">
									<div class="more_button" id="<?php echo $id; ?>">Mehr Neuigkeiten laden</div>
								</a></div>
							</div>
			</div>
			
			<div id="rightside">
				<h2>Youtube Hits</h2>
				<?php
				$result = mysql_query("SELECT * FROM `hits` ORDER BY id DESC LIMIT 7");
				while ($row = mysql_fetch_assoc($result)) {
					$hitsquelle = $row['hitsquelle'];
				echo "<iframe width='560' height='315' src='{$hitsquelle}' frameborder='0' allowfullscreen></iframe>";
				}
				?>
				<iframe src="http://rcm-eu.amazon-adsystem.com/e/cm?t=bamh-21&o=3&p=14&l=ur1&category=de_piv&banner=1CFDRBX431RE87XYZSG2&f=ifr" width='160 !important;'  height='600 !important;' scrolling='no' border='0' marginwidth='0' style='border:none;' frameborder='0'></iframe>

			</div>
			
			<div id="footer">
				<nav>
					<ul>
						<li><a href="impressum.html">Impressum</a></li>
						<li><a href="ueber.html">Über Bamhouse</a></li>
						<li><a href="datenschutz.html">Datenschutz</a></li>
						<li><a href="kontakt.html">Kontakt</a></li>
						<li><a href="radarwie.html">FAQ Kanalradar</a></li>
					</ul>
				</nav>
				
				<p>&copy 2015 Copyright Bamhouse</p>
			</div>
		</div>
	</body>
</html>