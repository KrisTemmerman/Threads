<?php
/*
 * @author Joeri Hermans
 * @date 14 March 2010
 * @description Inserts a new user into the DB
 */

require_once('../system/config.php'); //Including configuration file.
require_once('../system/classes.php'); //Including Classes file.
$db = new Connection();

if( isset($_POST['addContentUserName']) ){
	$db->query('INSERT INTO `th_users` (user_id ,user_name ,user_lastName ,user_username ,user_password , user_email, user_permission) VALUES (NULL , "' . $_POST['addContentUserName'] . '","' . $_POST['addContentUserLastName'] . '","' . $_POST['addContentUn'] . '","' . md5($_POST['addContentPw']) . '", "' . $_POST['addContentUserEmail'] . '","' . $_POST['addContentUserPermission'] . '")');
	
	//Message needs to be optimized.
	$message = 'Hello there! \n' . 'Here are your account details: \n' . 'Username: ' . $_POST['addContentUn'] . ' \n Password: ' . $_POST['addContentPw'] . ' \n \n Now it is time for you to log in: ' . BASE . '/login/ \n \n \n Have fun with Threads! \n \n \n The Wizard';
	
	//Send email to the user with their data.
	mail($_POST['addContentUserEmail'],'Your Threads Account Information',$message,null,'threadsWizard@' . HOST);
	
	//Notification Query.
}