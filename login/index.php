<?php
session_start();
/*
 * @version 0.2
 * @description Threads Login File
 * @author Joeri Hermans
 * @contact joeri.her@gmail.com
 * @license GNU
 */
require_once('../system/config.php');
require_once('../system/rewrite.php');
require_once('../system/classes.php');
$db = new Connection();

if( !empty($_SESSION['user']['username']) && !empty($_SESSION['user']['password']) ) {
	
	$result = $db->query('SELECT * FROM th_users WHERE user_username = "' . $_SESSION['user']['username'] . '" AND user_password = "' . $_SESSION['user']['password'] . '"'); //Retrieving result from MySQL
	if( mysql_num_rows($result) == 1 ){ //If MySQL returns 1 row.
		
		while( $row = $db->fetch($result) ){ //You spin my head round baby round round.
			
			$_SESSION['user']['id'] 		= $row['user_id']; //Fetching User Id.
			$_SESSION['user']['name'] 		= $row['user_name']; //Fetching User Name.
			$_SESSION['user']['lastName']	= $row['user_lastName']; //Fetching User Lastname.
			$_SESSION['user']['perm']		= $row['user_permission']; //Fetching the users' permission.
			
		}
		
	}
}

if( isset( $_POST['username'] ) ){
	
	$result = $db->query('SELECT * FROM th_users WHERE user_username = "' . $_POST['username'] . '" AND user_password = "' . md5( $_POST['password']) . '"');
	
	if( mysql_num_rows($result) == 1 ){
		
		while( $row = $db->fetch($result) ){
		
			$_SESSION['user']['id'] 		= $row['user_id'];
			$_SESSION['user']['name'] 		= $row['user_name'];
			$_SESSION['user']['lastName'] 	= $row['user_lastName'];
			$_SESSION['user']['username'] 	= $row['user_username'];
			$_SESSION['user']['password'] 	= $row['user_password'];
			$_SESSION['user']['perm']		= $row['user_permission']; //Fetching the users' permission.
		
			header("location:" . BASE . "dashboard/");		
		
		}
		
	} else {
		
		echo "mislukt";
		
	}
	
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	<label>Username</label><input type="text" name="username" /><br />
	
	<label>Password</label><input type="password" name="password" /><br />
	
	<br />
	
	<input type="submit" value="post" />

</form>