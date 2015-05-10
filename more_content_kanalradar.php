<?php
include "connect.php";
mysql_query("SET NAMES 'utf8'");
if(isSet($_POST['getLastContentId'])) {
	$getLastContentId=$_POST['getLastContentId'];
	$result=mysql_query("SELECT * FROM `kanalradar` WHERE id <'$getLastContentId' ORDER BY id DESC LIMIT 10");
	$count=mysql_num_rows($result);
	if($count>0){
		while ($row = mysql_fetch_assoc($query)) {
							$id = $row['id'];
							$kanallink = $row['kanallink'];
							$kanalname = $row['kanalname'];
							$beschreibung = $row['beschreibung'];
			?>				
			<div class="kanalprofil">
				
				<div class="kanalpic">
					<?php echo "<img src=images/'{$kanalname}.jpg' alt='{$kanalname}' title='{$kanalname}'";?>
				</div>
				
				<div class="kanaltext">
					<?php echo "<h1><a href ='{$kanallink}'>{$kanalname}"; ?></a></h1>
					<p><?php echo "{$beschreibung}";?></p>
				</div>		
				
			</div>;
		}
		?>
 
		<a href="#"><div id="load_more_<?php echo $id; ?>" class="more_tab">
		<div id="<?php echo $id; ?>" class="more_button">Mehr Kanäle laden</div></a>
		</div>
 
	<?php
	}
	else{
		echo "<div class='all_loaded'>Es gibt keine Kanäle mehr</div>";
	}
}
?>