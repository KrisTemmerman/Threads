<?php
/*
 * @author Joeri Hermans
 * @date 9 March 2010
 * @description Checks if this user exists.
 */

require_once('../system/config.php'); //Including configuration file.
require_once('../system/classes.php'); //Including Classes file.
$db = new Connection();

if( isset($_POST['addContentUn']) ){
	
	$result = $db->query('SELECT * FROM th_users WHERE user_username = "' . $_POST['addContentUn'] . '" OR user_email = "' . $_POST['addContentUserEmail'] . '"');
	if( $db->numRows($result) == 1 ){
		
		echo 'yes';
		
	}
	
}