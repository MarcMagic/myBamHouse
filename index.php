<!DOCTYPE html>
<html>
	<head>
		<title>BamHouse</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
	</head>
	<body>
	<?php
		require_once('connect.php');

		$query = mysql_query("SELECT * FROM index ORDER BY id DESC");
	?>

		<div id="wrapper">
			<div id="top">
				<div id="logo">
					<img src="images/funny.jpg" />
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

			<?php
				while ($row = mysql_fetch_assoc($query)) {
					$articleid = $row['id'];
					$headline = $row['headline'];
					$cool = $row['cool'];
					$sad = $row['sad'];
					$enraging = $row['enraging'];
					$funny = $row['funny'];
					$hitsquelle = $row['hitsquelle'];
					$comchk = mysql_query("SELECT * from comment WHERE newsid = '{$articleid}'");
					$nrcom = mysql_num_rows($comchk);
			?>
			<div id="content">	
				<h1>Das Neueste aus dem Netz</h1>		
				<?php
					echo "<div class='news'>
						<a href='news.php?id={$articleid}'>
							<div>$headline</div>
						</a>
							<p><img src='images/cool.png'/>
								<span>$cool</span>
								<img src='images/sad.png'/>
								<span>$sad</span>
								<img src='images/enraging.png'/>
								<span>$enraging</span>
								<img src='images/funny.png'/>
								<span>$funny</span>
							</p>
						</div>";
				?>
			</div>

			<?php
			}
			?>
			
			<div id="rightside">
				<h2>Youtube Hits</h2>
				<?php
				echo "<iframe width='560' height='315' src='$hitsquelle' frameborder='0' allowfullscreen></iframe>";
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