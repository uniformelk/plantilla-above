<?php
	include ('session.php');
  	$session = new Session();
	$session->endSession();
	
	header('location: /intranet/');
?>