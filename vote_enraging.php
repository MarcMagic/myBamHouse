<?php
require_once('connect.php');
$newsid = $_POST['id'];
if (isset($_POST['submit'])) {
	if(isset($_COOKIE[$newsid]) && $_COOKIE[$newsid] != 'enraging') {
		if($_COOKIE[$newsid] == 'sad') {	
		$query = mysql_query("UPDATE `index` SET sad=sad-1 WHERE id = '{$newsid}'");
		}
		if($_COOKIE[$newsid] == 'funny') {	
		$query = mysql_query("UPDATE `index` SET funny=funny-1 WHERE id = '{$newsid}'");
		}
		if($_COOKIE[$newsid] == 'cool') {	
		$query = mysql_query("UPDATE `index` SET cool=cool-1 WHERE id = '{$newsid}'");
		}
	$query = mysql_query("UPDATE `index` SET enraging=enraging+1 WHERE id = '{$newsid}'");
	setcookie($newsid, "enraging", time() + (10 * 365 * 24 * 60 * 60));
	$hosts = $_SERVER['HTTP_HOST'];
	$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extras = "news.php?id={$newsid}&enraging=1#smileyarea";
	header("Location: http://$hosts$uris/$extras");
		exit;
	}
	if(!isset($_COOKIE[$newsid])) {
		$query = mysql_query("UPDATE `index` SET enraging=enraging+1 WHERE id = '{$newsid}'");
		setcookie($newsid, "enraging", time() + (10 * 365 * 24 * 60 * 60));
		$hosts = $_SERVER['HTTP_HOST'];
		$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extras = "news.php?id={$newsid}&enraging=1#smileyarea";
		header("Location: http://$hosts$uris/$extras");
			exit;
	}	
	if(isset($_COOKIE[$newsid]) && $_COOKIE[$newsid] == 'enraging') {
		$hosts= $_SERVER['HTTP_HOST'];
		$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extras = "news.php?id={$newsid}&enraging=0#smileyarea";
		header("Location: http://$hosts$uris/$extras");
			exit;
	}
}
else {
	$hosts= $_SERVER['HTTP_HOST'];
	$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extras = "news.php?id={$newsid}&enraging=0#smileyarea";
	header("Location: http://$hosts$uris/$extras");
	exit;
}
?>