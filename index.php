<?php
/*
 * @version 0.2
 * @description Threads Engine & CPMS index file.
 * @author Joeri Hermans
 * @contact joeri.her@gmail.com
 * @license GNU
 */

//Starting Session.
session_start();
//Including All Needed Files.
require_once('system/config.php'); //Requiring the configuration file.
require_once('system/classes.php'); //Requiring basic classes.
$db = new Connection();
require_once('system/rewrite.php'); //Requiring the Apache Rewrite handler.
require_once('system/functions.php'); //Requiring basic functions.
require_once('system/auth.php'); //Requiring the user authorisation script.
require('src/index.php'); //Requiring the theme.