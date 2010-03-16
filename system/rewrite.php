<?php
/*
 * @version 0.2
 * @description Threads Apache Rewrite Handler
 * @author Joeri Hermans
 * @contact joeri.her@gmail.com
 * @license GNU
 */
$Include 			= null; //Declaring the Include var.
$PageTitle 			= null;
$IncludeParamter 	= null; //Declaring the IncludeParameter var.
$Uri 				= strip_tags($_SERVER['REQUEST_URI']); //Declaring the Uri var.
$dir         		= substr( getcwd(), strlen( $_SERVER[ 'DOCUMENT_ROOT' ] ) ); // e.g. /path/to/threads/
$Uri        		= substr( $Uri, strlen( $dir ) );// e.g. /clients/ or /dashboard/
$Uri         		= explode('/',$Uri); // Split on / character

//Working on 0.3 => Dynamic and has 404 handling.

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