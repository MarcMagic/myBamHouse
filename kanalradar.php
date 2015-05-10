<!DOCTYPE HTML>
<html>
	<head>
		<title>Youtube Kanalradar</title>
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
							url: "more_content_kanalradar.php",
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

	
	</head>
	<body>
		<?php
			require_once('connect.php');
			mysql_query("SET NAMES 'utf8'");
			$query = mysql_query("SELECT * FROM `kanalradar` ORDER BY id DESC LIMIT 10");
		?>
	
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
			

			<?php
				while ($row = mysql_fetch_assoc($query)) {
							$id = $row['id'];
							$kanallink = $row['kanallink'];
							$kanalname = $row['kanalname'];
							$beschreibung = $row['beschreibung'];
			?>				
			<div class="kanalprofil">
				
				<div class="kanalpic">
					<?php echo "<img src='images/{$kanalname}.jpg' alt='{$kanalname}' title='{$kanalname}'";?>
				</div>
				
				<div class="kanaltext">
					<?php echo "<h1><a href ='{$kanallink}'>{$kanalname}</a></h1>"; ?>
					<p><?php echo "{$beschreibung}";?></p>
				</div>
				
				
			</div>
			<?php
			}
			?>

			<div class="more_div">
				<a href="#"><div id="load_more_<?php echo $id; ?>" class="more_tab">
					<div class="more_button" id="<?php echo $id; ?>">Mehr Kanäle laden</div>
				</a></div>
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
	
	</body>
</html>