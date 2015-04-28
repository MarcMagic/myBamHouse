<!DOCTYPE HTML>
<html>
	<head>
		<title>BamHouse</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
		<script type="text/javascript">
			$(function() {
				$('.more_button').live("click",function() {
					var getId = $(this).attr("cool");
					if (getId) {
						$("#load_more_"+getId).html('<img src="images/load_img.gif" style="padding: 10px 0 0 100px"/>');
						$.ajax({
							type: "POST",
							url: "more_content_cool.php",
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
		$query = mysql_query("SELECT * FROM `index` ORDER BY cool DESC LIMIT 10");
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
						<div id = 'newsdiv'>
						<?php
						while ($row = mysql_fetch_assoc($query)) {
							$id = $row['id'];
							$headline = $row['headline'];
							$cool = $row['cool'];
							$sad = $row['sad'];
							$enraging = $row['enraging'];
							$funny = $row['funny'];
							$date = $row['date'];

							echo "<div class='news'>
									<div id='indexdate'>{$date}</div>
									<a href='news.php?id={$id}'>
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
							}?>				
						</div>
							<div class="more_div">
								<a href="#"><div id="load_more_<?php echo $cool; ?>" class="more_tab">
									<div class="more_button" cool="<?php echo $cool; ?>">Mehr Neuigkeiten laden</div>
								</a></div>
							</div>
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