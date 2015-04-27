<?php
require_once('connect.php');
if (isset($_POST['submit'])) {
	$newsid = $_POST['id'];
	$query = mysql_query("UPDATE `index` SET funny=funny+1 WHERE id = {$newsid}");
	$hosts = $_SERVER['HTTP_HOST'];
				$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extras = "news.php?id={$newsid}&funny=1";
				header("Location: http://$hosts$uris/$extras");
				exit;
}
	else {
			$hosts= $_SERVER['HTTP_HOST'];
			$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extras = "news.php?id={$newsid}&funny=0";
			header("Location: http://$hosts$uris/$extras");
			exit;
		}
?>