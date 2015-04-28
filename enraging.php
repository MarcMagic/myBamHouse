<!DOCTYPE HTML>
<html>
	<head>
		<title>BamHouse</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>
	<?php
		require_once('connect.php');
		$query = mysql_query("SELECT * FROM `index` ORDER BY enraging DESC LIMIT 10");
	?>
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
						<li><a href="cool.php">Cool</a></li>
						<li><a href="sad.php">Traurig</a></li>
						<li><a href="enraging.php">Ver&auml;rgend</a></li>
						<li><a href="funny.php">Lustig</a></li>
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
									<div id='indexdate'>{$date}</div>
									<a href='news.php?id={$articleid}'>
										<h2>{$headline}</h2>
									</a>
											<div id='indexsmileyarea'><img class='preview_image' src='images/cool.png'/>
												<span>{$cool}</span>
												<img class='preview_image' src='images/sad.png'/>
												<span>{$sad}</span>
												<img class='preview_image' src='images/enraging.png'/>
												<span>{$enraging}</span>
												<img class='preview_image' src='images/funny.png'/>
												<span>{$funny}</span>
											</div>
								</div>";
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