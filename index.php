<?php 
	ini_set( "display_errors", 0); 
	session_start();
	// Cek Login
	if (isset($_SESSION['user'])){  
		require_once("penting/koneksi.php"); 
	?>	
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sistema generador de usuarios Hotspot Mikrotik</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
    <script src="lib/jquery-1.8.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="lib/jquery.validate.min.js"></script>
    <link rel="shortcut icon" href="images/logo_mikrotik.png">
 </head>

  <body> 
	<script>var $jnoc = jQuery.noConflict();</script>
    
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">
                    
                    <li id="fat-menu" class="dropdown">
						<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $_SESSION['user']; ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="index.php?pagina=perfil">Perfil de usuario</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="logout.php">Salir</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.php"><span class="first">Sistema generador de usuarios Hotspot</span> <span class="second">Mikrotik</span></a>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span3">
                <div class="sidebar-nav">
                  <div class="nav-header" data-toggle="collapse" data-target="#dashboard-menu"><i class="icon-user"></i>Generar usuario Hotspot</div>
                    <ul id="dashboard-menu" class="nav nav-list collapse in">
                        <li><a href="index.php?pagina=lista-usuarios-hotspot">Lista de usuarios Hotspot</a></li>
                        <li ><a href="index.php?pagina=lista-usuarios-activos">Lista de usuarios actualmente activos</a></li>
                        <li ><a href="index.php?pagina=generar-usuarios-hotspot">Generar usuarios Hotspot</a></li>
						<li ><a href="index.php?pagina=agregar-usuario-hotspot">Agregar Usuario Hotspot</a></li>
                    </ul>

                <div class="nav-header" data-toggle="collapse" data-target="#settings-menu"><i class="icon-dashboard"></i>Grupo límite de ancho de banda Hotspot</div>
                <ul id="settings-menu" class="nav nav-list collapse in">
                  <li ><a href="index.php?pagina=agregar-grupo-limite-ancho-banda-hotspot">Agregar grupo de límite de ancho de banda</a></li>
                  <li ><a href="index.php?pagina=lista-grupo-limite-ancho-banda-hotspot">Lista de grupos de limite de ancho de banda</a></li>
                </ul>
				
				<div class="nav-header" data-toggle="collapse" data-target="#accounts-menu"><i class="icon-wrench"></i>Menú extra</div>
                <ul id="accounts-menu" class="nav nav-list collapse in">
                  <li ><a href="index.php?pagina=lista-usuarios-mikrotik">Lista de usuarios Mikrotik</a></li>
                  <li ><a href="index.php?pagina=editar-password-mikrotik">Editar contraseña Mikrotik</a></li>
                  <li ><a href="index.php?pagina=editar-identidad-mikrotik">Editar identidad Mikrotik</a></li>
                  <li ><a href="#ModalReboot" role="button" data-toggle="modal">Reiniciar Mikrotik</a></li>
                </ul>

                
            </div>
        </div>
      
	  <?php 

			@$hal=$_GET['pagina'];
			if(!$hal){ include "pagina/utama.php"; }
			else {
			switch($hal){
			case "lista-usuarios-hotspot" : include "pagina/data_user_hotspot.php"; break;
			case "lista-usuarios-mikrotik" : include "pagina/data_user_mikrotik.php"; break;
			case "lista-grupo-limite-ancho-banda-hotspot" : include "pagina/data_limitasi.php"; break;
			case "lista-usuarios-activos" : include "pagina/data_user_aktif.php"; break;
			case "agregar-usuario-hotspot" : include "pagina/tambah_user_hotspot.php"; break;
			case "editar-usuario-hotspot" : include "pagina/tambah_user_hotspot.php"; break;
			case "agregar-usuario-mikrotik" : include "pagina/tambah_user_mikrotik.php"; break;
			case "generar-usuarios-hotspot" : include "pagina/generate_user_hotspot.php"; break;
			case "agregar-grupo-limite-ancho-banda-hotspot" : include "pagina/tambah_group_limitasi.php"; break;
			case "editar-grupo-limite-ancho-banda-hotspot" : include "pagina/tambah_group_limitasi.php"; break;
			case "editar-password-mikrotik" : include "pagina/edit_password_mikrotik.php"; break;
			case "editar-identidad-mikrotik" : include "pagina/edit_identity_mikrotik.php"; break;
			case "reboot_mikrotik" : include "pagina/reboot_mikrotik.php"; break;
			case "perfil" : include "pagina/profile.php"; break;
			default : include "pagina/utama.php"; break;
			}
			}
		?>

    </div>  
    
    <footer>
        <hr>
        <p class="pull-right">Sistema generador de usuarios Hotspot Mikrotik</p>
        <p>Traducido por <a href="#">eCituk</a></p>
    </footer>

    <script src="lib/bootstrap/js/bootstrap.js"></script>

 <div class="modal small hide fade" id="ModalReboot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Reiniciar Mikrotik</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>¿Estás seguro de reiniciar el Mikrotik?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger" id="reboot" data-dismiss="modal">¡Reiniciar!</button>
  </div>
</div>
  <script src="aksi/js/reboot/reboot.js"></script>
  </body>
</html>

<?php } else {
		header("location:login.php");
	}
	?>


