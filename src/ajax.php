<?php
/*
 * @version 0.2
 * @description Threads AJAX Handler File
 * @author Joeri Hermans
 * @date 8 March 2010
 * @contact joeri.her@gmail.com
 * @license GNU
 */

/*
 * Client Handler
 * @since 8 March 2010
 */
if( isset($_POST['ncName']) ){
	$db->query('INSERT INTO th_clients (client_name, client_lastName, client_birthDay, client_gender, client_email, client_tel, client_mob, client_web, client_street, client_zip, client_location, client_state, client_country) VALUES ("' . $_POST['ncName'] . '","' . $_POST['ncLastName'] . '","' . $_POST['ncBirthday'] . '","' . $_POST['ncGender'] . '","' . $_POST['ncEmail'] . '","' . $_POST['ncTel'] . '","' . $_POST['ncMobile'] . '","' . $_POST['ncWebsite'] . '","' . $_POST['ncStreet'] . '","' . $_POST['ncZip'] . '","' . $_POST['ncLocation'] . '","' . $_POST['ncState'] . '","' . $_POST['ncCountry'] . '")');
	//Still to add => Notifications Query
}

/*
 * ToDo Handler
 * @since 13 March 2010
 */
//Setting todo_done to 0.
if( isset($_POST['todoRemoveDoneId']) ){
	$db->query('UPDATE th_todo SET todo_done = 0 WHERE todo_id = ' . (int)$_POST['todoRemoveDoneId']);
	//Notification Query.
}
//Setting todo_done to 1.
if( isset($_POST['todoAddDoneId']) ){
	$db->query('UPDATE th_todo SET todo_done = 1 WHERE todo_id = ' . (int)$_POST['todoAddDoneId']);
	//Notification Query.
}
//Deleting a todo record.
if( isset($_POST['todoRemoveId']) ){
	$db->query('DELETE FROM th_todo WHERE todo_id = ' . (int)$_POST['todoRemoveId']);
	//Notification Query.
}
//Adding a todo record.
if( isset($_POST['ToDoAddListItem']) ){
	$db->query('INSERT INTO th_todo (todo_text, todo_userId, todo_done, todo_date) VALUES ("' . htmlspecialchars($_POST['ToDoAddListItem']) . '", "' . $_SESSION['user']['id'] . '", "0","' . $_POST['ToDoAddListItemDate'] . '")');
	//Notification Query.
}
//END ToDo Handler

/*
 * Add Content Handler
 * @since 14 March 2010
 */
//Insert New User To Database.
if( isset($_POST['addContentUserName']) ){
	$db->query('INSERT INTO `th_users` (`user_id` ,`user_name` ,`user_lastName` ,`user_username` ,`user_password` ,`user_email`) VALUES (NULL , "' . $_POST['addContentUserName'] . '","' . $_POST['addContentUserLastName'] . '","' . $_POST['addContentUn'] . '","' . md5($_POST['addContentPw']) . '", "' . $_POST['addContentUserEmail'] . '")');
	
	//Message needs to be optimized.
	$message = 'Hello there! \n' . 'Here are your account details: \n' . 'Username: ' . $_POST['addContentUn'] . ' \n Password: ' . $_POST['addContentPw'] . ' \n \n Now it is time for you to log in: ' . BASE . '/login/ \n \n \n Have fun with Threads! \n \n \n The Wizard';
	
	//Send email to the user with their data.
	mail($_POST['addContentUserEmail'],'Your Threads Account Information',$message,null,'threadsWizard@' . HOST);
	
	//Notification Query.
}
//END Content Handler