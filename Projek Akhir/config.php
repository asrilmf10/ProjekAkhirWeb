<?php

$server = "sql203.epizy.com";
$username = "epiz_32997095";
$password = "iCcIwTmcrZT";
$db_name = "epiz_32997095_resep_masakan";

$db = new mysqli($server, $username, $password, $db_name);
if(!$db) {
    die("INVALID !!!");
}