<?php
/*
 * @version 0.2
 * @description Threads Functions File
 * @author Joeri Hermans
 * @contact joeri.her@gmail.com
 * @license GNU
 */

//Function Selected Page
function page_selected($Include,$String){
	
	switch($Include){
		
		case ($Include == 'dashboard.php' && $String == 'dashboard'):
			echo 'selected';
			break;
			
		case ($Include == 'clients.php' && $String == 'clients'):
			echo 'selected';
			break;
			
		case ($Include == 'products.php' && $String == 'products'):
			echo 'selected';
			break;
			
		case ($Include == 'invoices.php' && $String == 'invoices'):
			echo 'selected';
			break;
			
		case ($Include == 'files.php' && $String == 'files'):
			echo 'selected';
			break;
			
		case ($Include == 'projects.php' && $String == 'projects'):
			echo 'selected';
			break;

	}
	
	return false;
	
}

//Function return data as readable text.
function getFullDate($String){
		
	$year 			= 0; //Year.
	$month 			= 0; //Month.
	$dayOfTheWeek 	= 0; //Day of the week.
	$day 			= 0; //Day (Integer).
	
	$String = explode('-',$String); //Removing the '-' tags
	
	$day 	= $String[2]; //Giving $year the date(year) value.
	$month 	= $String[1]; //Giving $day the date(day) value.
	$year 	= $String[0]; //Giving $month the date(month) value.
	$dayOfTheWeek 	= date("l", mktime(6, 0, 0, $month, $day, $year)); //Getting the day of the week.
	$month 			= date("F", mktime(6, 0, 0, $month, $day, $year)); //Getting the month in a String.
	
	$date = $dayOfTheWeek . ', <span class="dayDate">' . $day . '</span> <span class="month">' . $month . '</span> <span class="year">' . $year . '</span> ';
	
	return $date; //Returns the string above.
	
}

//The function checks for URLs in the text and parses them to an href.
function checkForUri($String){
	
	preg_match('/(http:\/\/[^\s]+)/', $String, $text); //Looks for a URI in the text and gives it to $text[].
	$href = "<a href=\"$text[0]\" class=\"link\" \">" . $text[0] . "</a>"; //A default Threads URI.
	return preg_replace('/(http:\/\/[^\s]+)/', $href, $String); //Returns the edited string.
	
}