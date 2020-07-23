
	<?php 
		 include("routeros_api.php");
		 $API = new routeros_api();
		 if (!$API->connect("192.168.1.129","admin","")){
			 unset($_SESSION["user"]);
			 header("location:login.php");
		 }
	?>