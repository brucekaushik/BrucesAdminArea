<?php

$c = mysql_connect('localhost', 'DatabaseUser', 'DatabasePassword') or die("Could not connect to the database");

mysql_select_db("DatabaseName") or die("<br>Hmm.. Something fishy! Did you select the right database??");

?>
