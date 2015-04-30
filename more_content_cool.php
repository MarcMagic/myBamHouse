<?php
include "connect.php";
mysql_query("SET NAMES 'utf8'");
if(isSet($_POST['getLastContentId'])) {
	$getLastContentId=$_POST['getLastContentId'];
	$result=mysql_query("SELECT * FROM `index` WHERE cool <'$getLastContentId' ORDER BY cool DESC LIMIT 10");
	$count=mysql_num_rows($result);
	if($count>0){
		while($row=mysql_fetch_array($result)) {
			$id=$row['id'];
			$headline = $row['headline'];
			$text = $row['text'];
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
			<div id = preview>".substr($text,0,230).
									"<a href='news.php?id={$id}'><b> ...weiterlesen</b></a></div>
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
 
		<a href="#"><div id="load_more_<?php echo $cool; ?>" class="more_tab">
		<div cool="<?php echo $cool; ?>" class="more_button">Mehr Neuigkeiten laden</div></a>
		</div>
 
	<?php
	}
	else{
		echo "<div class='all_loaded'>Es gibt keine Neuigkeiten mehr</div>";
	}
}
?>