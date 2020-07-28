
	<?php 
		 include("routeros_api.php");
		 $API = new routeros_api();
		 if (!$API->connect("192.168.1.102","admin","proyecto2013")){
			 unset($_SESSION["user"]);
			 header("location:login.php");
		 }
	?>