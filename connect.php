<?php
# Zugangsdaten
$db_server = 'rdbms.strato.de';
$db_benutzer = 'U2117902';
$db_passwort = 'Wuerzburg912';
$db_name = 'DB2117902';
# Verbindungsaufbau
if(mysql_connect($db_server, $db_benutzer, $db_passwort)) {
echo 'Server-Verbindung erfolgreich, wähle Datenbank aus...
';
if(mysql_select_db($db_name)) {
echo 'Datenbank erfolgreich ausgewält, alle Tests abgeschlossen.';
}
else {
echo 'Die angegebene Datenbank konnte nicht ausgewählt werden, bitte die Eingabe prüfen!';
}
}
else {
echo 'Verbindung nicht möglich, bitte Daten prüfen!
';
echo 'MYSQL-Fehler: '.mysql_error();
}
?>