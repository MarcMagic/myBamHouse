<?php
require_once('connect.php');
mysql_query("SET NAMES 'utf8'");
if (isset($_POST['submit'])) {
		$newsid = $_POST['id'];
		$name = $_POST['name'];
		$comment = nl2br($_POST['comment']);

		if ($name != "" && $comment != "") {
			//$name = htmlspecialchars($name);
			//$name = htmlentities($name);
			//$comment = htmlspecialchars($comment);
			//$comment = htmlentities($comment);

			$query = mysql_query("INSERT INTO `comment` VALUES ('', '{$newsid}', '{$name}', '{$comment}', '')");
				$hosts = $_SERVER['HTTP_HOST'];
				$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extras = "news.php?id={$newsid}&com=1#commentarea";
				header("Location: http://$hosts$uris/$extras");
				exit;
		}

		else {
			$hosts= $_SERVER['HTTP_HOST'];
			$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extras = "news.php?id={$newsid}&com=0#commentarea";
			header("Location: http://$hosts$uris/$extras");
			exit;
		}
}
?>