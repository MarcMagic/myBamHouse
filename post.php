<?php
require_once('connect.php');

if (isset($_POST['submit'])) {

		$name = $_POST['name'];
		$newsid = $_POST['id'];
		$comment = nl2br($_POST['comment']);

		if ($name != "" && $comment != "") {
			$name = htmlspecialchars($name);
			$name = htmlentities($name);
			$comment = htmlspecialchars($comment);
			$comment = htmlentities($comment);

			$query = mysql_query("INSERT INTO `comment` VALUES('', '{$newsnid}', '{$name}', '{$comment}')");
				$hosts = $_SERVER['HTTP_HOST'];
				$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extras = "news.php?id={$newsid}&com=1";
				header("Location: http://$hosts$uris/$extras");
				exit;
		}

		else {
			$hosts= $_SERVER['HTTP_HOST'];
			$uris = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extras = "news.php?id={$newsid}&com=0#commentform";
			header("Location: http://$hosts$uris/$extras");
			exit;
		}
}
?>