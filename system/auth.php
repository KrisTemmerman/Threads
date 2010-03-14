<?php
/*
 * @version 0.2
 * @description Threads Authorisation File
 * @author Joeri Hermans
 * @contact joeri.her@gmail.com
 * @license GNU
 */

if( empty($_SESSION['user']['username']) || empty($_SESSION['user']['password']) ){ //Checking if there is a session.
	session_unset(); //Clearing all session vars.
	header("location:" . BASE . 'login/'); //Rederecting to the login page.
} elseif ( !empty($_SESSION['user']['username']) && !empty($_SESSION['user']['password']) ) {
	$result = $db->query('SELECT * FROM th_users WHERE user_username = "' . $_SESSION['user']['username'] . '" AND user_password = "' . $_SESSION['user']['password'] . '"'); //Retrieving result from MySQL
	if( $db->numRows($result) == 1 ){ //If MySQL returns 1 row.
		while( $row = $db->fetch($result) ){ //You spin my head round baby round round.
			$_SESSION['user']['id'] 		= $row['user_id']; //Fetching User Id.
			$_SESSION['user']['name'] 		= $row['user_name']; //Fetching User Name.
			$_SESSION['user']['lastName']	= $row['user_lastName']; //Fetching User Lastname.
			$_SESSION['user']['perm']		= $row['user_permission']; //Fetching the users' permission.
		}
	} else { //When MySQL returns less or more then 1 row.
		session_unset(); //Clearing all session vars.
		header("location:" . BASE . 'login/'); //Rederecting to the login page.
	}
}