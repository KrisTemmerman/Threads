<?php
/*
 * @version 0.2
 * @description Threads Classes File
 * @author Joeri Hermans
 * @contact joeri.her@gmail.com
 * @license GNU
 */

class Threads{
	
}

/*
 * Class Connection
 * @description Handles the database connection.
 * @version 0.1
 * @author Joeri Hermans
 * @date 8 March 2010
 */
class Connection extends Threads{
	
	//Declairing the private vars. Referring to the constants in config.php.
	private $host = DBHOST; //Your database host.
	private $username = DBUSER; //Your database username.
	private $password = DBPASS; //Your database password.
	private $database = DBDATABASE; //Your databasename.
	
	private $link; //Database link.
	public $result; //Database result.
	public $sql; //Database sql.
	public $row; //Database row.
	
	
	/*
	 * Creates a database connection.
	 */
	function __construct($database = ""){
		
		if( !empty($database) ) {
			$this->database = $database;
		}
		
		$this->link = mysql_connect($this->host,$this->username,$this->password) or die('An error occured while connecting to the database. MySQL Error: ' . mysql_error());
		mysql_select_db($this->database,$this->link) or die('An error occured while selecting the database. MySQL Error: ' . mysql_error()); //Selecting the database.
		return $this->link;
		
	}
	
	/*
	 * Database query.
	 */
	function query($sql){
		
		if( !empty($sql) ){
			$this->sql = $sql;
			$this->result = mysql_query($sql,$this->link) or die('An error occured while fetching results. MySQL Error: ' . mysql_error());
			return $this->result;
		} else {
			return false;
		}
		
	}
	
	/*
	 * Counts the returned rows from the result.
	 */
	function numRows($result = ""){
		
		$this->result = $result;
		return mysql_num_rows($this->result);
		
	}
	
	/*
	 * Database fetch rows from result.
	 */
	function fetch($result = ""){
		
		$this->result = $result;
		$this->row = mysql_fetch_assoc($this->result);
		return $this->row;
		
	}
	
	/*
	 * Destroys the database connection.
	 */
	function __destruct(){
		
		mysql_close($this->link);
		
	}
	
}