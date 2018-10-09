<?php

$folder="/"; //Production folder
$folder="/MicGit/"; //My folder
$protocol = 'http://';
$server=$_SERVER['SERVER_NAME'];
$myroute=$protocol .  $_SERVER['SERVER_NAME'].$folder;


define('ROUTE', $myroute);
define('ASSETS', $myroute."assets/");
define('ASSETS_GLOBAL', $myroute."global_assets/");
define('POLICY_FILE', $myroute.'pdf/polizas/');

define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'micagent_user');
define( 'DB_PASSWORD', 'rNQTWEKsSJeHu24d');
define( 'DB_NAME', 'mic');

?>