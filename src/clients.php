<div id="headerDescription">

	<div class="headerWrapper">
	
		<h2 id="pageDescription">Your Clients</h2><!-- Page Title -->
		
		<ul id="extraNavRight" class="extraNav">
			
			<li><a id="clientSearch" class="selected" href="#" name="client-search.php">Search for a client.</a></li>
			
			<li><a id="clientNew" href="#" name="client-new.php">Add a new client.</a></li>
			
			<li><a id="clientEdit" href="#" name="client-edit.php">Edit a client.</a></li>
		
		</ul><!-- End Extra Navigation -->
	
	</div><!-- End HeaderWrapper -->

</div><!-- End Header Description -->

<div id="container">

	<div id="clientFirst" class="module left moduleLeft">
	
		<?php require('client-list.php'); //Requiring the client-list. Because Threads views the clients 'solid' ?>
	
	</div><!-- End Left Module -->
	
	<div id="clientSec" class="module right moduleRight">
	
	</div><!-- End Right Module -->

</div><!-- End Container -->