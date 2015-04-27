<?php
$verbindung = mysql_connect ("rdbms.strato.de","U2117902","Wuerzburg912")
or die ("keine Verbindung möglich.
 Benutzername oder Passwort sind falsch");

mysql_select_db("DB2117902")
or die ("Die Datenbank existiert nicht.");
?>