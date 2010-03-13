<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo THEMEBASE; ?>style.css" />
<script type="text/javascript" src="<?php echo THEMEBASE; ?>js/jquery.js"></script>
<title><?php echo TITLE . ' ' . $PageTitle; ?></title>
</head>
<body>

<div class="dialog_overlay">

	<!-- Begin Dialog -->

	<div class="dialog_container">

		<div class="dialog_content">

			<div class="dialog_body">
	
				<p>Lorem ipsum dolor sit amet.</p>
	
			</div><!-- End Dialog Body -->
	
			<div class="dialog_buttons">
			
				<h5 class="ok">Ok</h5>
			
				<h5 class="close" onclick="hideDialog()">Close</h5>
			
			</div><!-- End Dialog Buttons -->

		</div><!-- End Dialog Content -->

	</div><!-- End Dialog Container -->

	<!-- End Dialog -->

</div>

<div id="headerBar">

	<div class="headerWrapper">
	
		<span class="ajax"></span>
	
		<h1 id="threadsTitle">Threads Project</h1>
		
		<ul id="navigation">
		
			<li><a class="<?php page_selected($Include,'dashboard'); ?>" href="<?php echo BASE;?>dashboard/">Dashboard</a></li>
			
			<li><a class="<?php page_selected($Include,'clients'); ?>" href="<?php echo BASE;?>clients/">Clients</a></li>
			
			<li><a class="<?php page_selected($Include,'products'); ?>" href="<?php echo BASE;?>products/">Products</a></li>
			
			<li><a class="<?php page_selected($Include,'invoices'); ?>" href="<?php echo BASE;?>invoices/">Invoices</a></li>
			
			<li><a class="<?php page_selected($Include,'files'); ?>" href="<?php echo BASE;?>files/">Files</a></li>
			
			<li><a class="<?php page_selected($Include,'projects'); ?>" href="<?php echo BASE;?>projects/">Projects</a></li>
			
			<li class="navAddContent"><a href="#">Add Content</a></li>
			
			<li><a class="navLogout" href="<?php echo BASE; ?>system/logout.php">Logout</a></li>
		
		</ul><!-- End Navigation -->
	
	</div><!-- End HeaderWrapper -->

</div><!-- End Header Top -->