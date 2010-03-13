<?php
/*
 * @version 0.2
 * @description Threads Apache Rewrite Handler
 * @author Joeri Hermans
 * @contact joeri.her@gmail.com
 * @license GNU
 */
$Include 	= null; //Declaring the Include var.
$PageTitle 	= null;
$IncludeParamter = null; //Declaring the IncludeParameter var.
$Uri 		= strip_tags($_SERVER['REQUEST_URI']); //Declaring the Uri var.
$Uri 		= explode('/',$Uri); //Removing the / from the String.
array_shift($Uri); //Putting the String into an array. Note: The first one is empty. Index:0.

switch($Uri[1]){
	
	case '':
		$Include = 'dashboard.php';
		$PageTitle = '/ Dashboard';
		break;
		
	case 'dashboard':
		$Include = 'dashboard.php';
		$PageTitle = '/ Dashboard';
		break;
		
	case 'clients':
		$Include = 'clients.php';
		$PageTitle = '/ Clients';
		break;
		
	case 'products':
		$Include = 'products.php';
		$PageTitle = '/ Products';
		break;
		
	case 'invoices':
		$Include = 'invoices.php';
		$PageTitle = '/ Invoices';
		break;
		
	case 'files':
		$Include = 'files.php';
		$PageTitle = '/ Files';
		break;
		
	case 'projects':
		$Include = 'projects.php';
		$PageTitle = '/ Projects';
		break;
	
}