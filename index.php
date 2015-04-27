<!DOCTYPE HTML>
<html>
	<head>
		<title>BamHouse</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	<body>
	<?php
		require_once('connect.php');
		$query = mysql_query("SELECT id, headline, cool, sad, enraging, funny FROM `index` ORDER BY id DESC");
	?>
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
				<h1>Das Neueste aus dem Netz</h1>		
					
						<?php
						while ($row = mysql_fetch_assoc($query)) {
							$articleid = $row['id'];
							$headline = $row['headline'];
							$cool = $row['cool'];
							$sad = $row['sad'];
							$enraging = $row['enraging'];
							$funny = $row['funny'];
							$date = $row['date'];

							echo "<div class='news'>
								<a href='news.php?id={$articleid}'>
									<h1>{$headline}</h1>
								</a>
									<p>{$date}</p>
										<p><img src='images/cool.png'/>
											<span>{$cool}</span>
											<img src='images/sad.png'/>
											<span>{$sad}</span>
											<img src='images/enraging.png'/>
											<span>{$enraging}</span>
											<img src='images/funny.png'/>
											<span>{$funny}</span>
										</p>
								</div>";
						}
						?>
					
			</div>
			
			<div id="rightside">
				<h2>Youtube Hits</h2>
				<?php
				$result = mysql_query("SELECT * FROM `hits` ORDER BY id DESC");
				while ($row = mysql_fetch_assoc($result)) {
					$hitsquelle = $row['hitsquelle'];
				echo "<iframe width='560' height='315' src='{$hitsquelle}' frameborder='0' allowfullscreen></iframe>";
				}
				?>
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
	</body>
</html>