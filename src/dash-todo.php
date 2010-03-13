<?php
/*
 * @author Joeri Hermans
 * @date 9 March 2010
 * @description Dashboard ToDo's
 */

session_start();
require_once('../system/config.php'); //Requiring the configurations file.
require_once('../system/classes.php'); //Requiring the classes file.
require_once('../system/functions.php'); //Requiring the functions file.
$db = new Connection(); //Creating a new database connection.

$date = date('Y-m-j');
if( $_POST['todoDate']) {
	$date = $_POST['todoDate'];
}
if( $_POST['ToDoDateRefer'] ){
	$date = $_POST['ToDoDateRefer'];
}
//Retrieving result from the database.
$result = $db->query('SELECT * FROM th_todo WHERE todo_userId = ' . $_SESSION['user']['id'] . ' AND todo_date = "' . $date . '"');
?>
<input type="hidden" id="todoDateRefer" value="<?php echo $date; ?>" />
<h3>To Do's</h3>

<div class="todo_container">
	
	<div class="buttons">
		
	</div><!-- End ToDo Buttons -->
	
	<ul class="body">
	
	<?php 	
	$sameDate = array(); //Declaring $sameDate as an array.
	if( $db->numRows($result) < 1 ){ //Checking if the result is smaller then 1.
		
		echo '<li class="day">';
		echo "<h4>" . getFullDate($date) . "<a href=\"#\" onClick=\"nextDate('$date')\" class=\"todoNav\">Next</a><a href=\"#\" onClick=\"previousDate('$date')\" class=\"todoNav\">Previous </a> </h4>"; //Returns the date as a String.
		echo '<fieldset>';
			echo '<input class="ToDoInsert" type="text" value="Insert your ToDo here and hit the enter-key." name="ToDoInsert" />';
		echo '</fieldset>';
		echo '<ul>';
		echo '</ul>';
		echo '</li>'; //End Of This Day.
		
	}else{
		
		//Displaying the result.
		while($row = $db->fetch($result)){
			
			if( !in_array($row['todo_date'],$sameDate) ){
				
				echo '<li class="day">';
				echo "<h4>" . getFullDate($date) . "<a href=\"#\" onClick=\"nextDate('$date')\" class=\"todoNav\">Next</a><a href=\"#\" onClick=\"previousDate('$date')\" class=\"todoNav\">Previous </a> </h4>"; //Returns the date as a String.
				echo '<fieldset>';
					echo '<input class="ToDoInsert" type="text" value="Insert your ToDo here and hit the enter-key." name="ToDoInsert" />';
				echo '</fieldset>';
				echo '<ul>';
				$resultList = $db->query('SELECT * FROM th_todo WHERE todo_userId = ' . $_SESSION['user']['id'] . ' AND `todo_date` =  "' . $row['todo_date'] . '"');
				
				while( $rowWhile = $db->fetch($resultList)){
					
					echo '<li>';
					//Resetting the $done var.
					$done = '';
					
					if($rowWhile['todo_done'] == 1){
						
						$done = 'done';
						
					}
					
					echo '<a id="todoid-' . $rowWhile['todo_id'] . '"href="#" class="item ' . $done . '">' . $rowWhile['todo_text'] . '</a>';
					echo '<a id="tododelete-' . $rowWhile['todo_id'] . '" class="delete" href="#">X</a></h5><!-- Delete Button -->';
					echo '</li>';
					
				}
				
				echo '</ul>';
				echo '</li>'; //End of ToDo Day.
				$sameDate[] = $row['todo_date'];
				
			}	
				
		}
		
	}
	?>
	</ul><!-- End ToDo Body -->
	
</div>
<script type="text/javascript" src="<?php echo THEMEBASE; ?>js/todo.js"></script>