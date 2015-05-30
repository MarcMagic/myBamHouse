<?php
include "connect.php";
mysql_query("SET NAMES 'utf8'");
if(isSet($_POST['getLastContentId'])) {
	$getLastContentId=$_POST['getLastContentId'];
	$result=mysql_query("SELECT * FROM `hits` WHERE id <'$getLastContentId' ORDER BY id DESC LIMIT 9");
	$count=mysql_num_rows($result);
	if($count>0){
		while ($row = mysql_fetch_assoc($result)) {
			$hitsquelle = $row['hitsquelle'];
			echo "<iframe width='280' height='157' src='{$hitsquelle}' frameborder='0' allowfullscreen></iframe>";
				}
				?>
 
		<a href="#"><div id="load_more_<?php echo $id; ?>" class="more_tab">
		<div id="<?php echo $id; ?>" class="more_button">Mehr Neuigkeiten laden</div></a>
		</div>
 
	<?php
	}
	else{
		echo "<div class='all_loaded'>Es gibt keine Neuigkeiten mehr</div>";
	}
}
?>