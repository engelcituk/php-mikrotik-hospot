<?php 

	function cariprofile($API,$namaprof){
		
		$API->write("/ip/hotspot/user/profile/print",false);   
		$API->write("?name=".$namaprof,true);   
		$p = $API->read(); 
	
		foreach($p as $tam){
		$nama = $tam['name'];
		$lm = $tam['rate-limit'];
		}
		
		$limitbw = $nama." (".$lm.")";	
		
		echo $limitbw;
	}
	
	$API->write("/ip/hotspot/user/print");   
	$uh = $API->read(); 
?>
<div class="span9">
            <h3 class="page-title">Lista de Usuarios Hotspot Mikrotik (<?php echo count($uh)." Elementos"; ?>)</h3>
<?php if (count($uh)>=1) {?>
<div class="btn-toolbar">
    <button class="btn btn-primary export"> Exportar Usuarios (*.xls)</button>
    <button class="btn cetak">Impresión de Usuarios (*.pdf)</button>
    <button class="btn btn-danger resetc">Limpiar contador</button>
    <button class="btn btn-warning hapussuser">Eliminar todos los usuarios</button>
	<img src="images/loading.gif" id="lprosesc" class="load" style="padding-left:10px">
  <div class="btn-group">
  </div>
</div>

<script src="aksi/js/userhotspot/hapus.js"></script>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirmación</h3>
    </div>
    <div class="modal-body">
		<input type="hidden" id="idnya" name="idnya"/>
		<input type="hidden" id="idc" name="idc"/>
        <p class="error-text"></p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button class="btn btn-danger" id="hapus">Eliminar!</button>
        <button class="btn btn-danger" id="cc">Eliminar Contador!</button>
        <button class="btn btn-danger" id="hapuss">Sí, Eliminar todos!</button>
        <button class="btn btn-danger" id="resetc">Sí, Reiniciar contador!</button>
		<img src="images/loading.gif" id="lprosesh" class="load"/>
    </div>
</div>
<?php } ?>

<div class="well">
<?php if (count($uh)>=1) {?>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nombre de Usuario</th>
          <th>Contraseña</th>
          <th>Tiempo limite</th>
          <th>Ancho de banda de límite de grupo</th>
          <th>Información</th>
          <th>Tiempo de actividad</th>
          <th style="width: 26px;">Acciones</th>
        </tr>
      </thead>
      <tbody>
      <?php 
			$banyakData = count($uh);  
			
  		    $page = isset($_GET['datos-a']) ? $_GET['datos-a'] : 0;
			
			$no = 1;
			$limit = 10;  
			$stop = $page * $limit; 
			$lanjut = $stop + $limit;
			
			$API->write("/ip/hotspot/user/print");   
			$cetakuser = $API->read(); 
			
			foreach($cetakuser as $tampil){
				
				if ( $page == 0 ){ ?>
				<tr <?php if ($tampil['limit-uptime']==$tampil['uptime']){ echo "style='background-color:red'"; }?>> 
    				<td><?php echo $no; ?></td> 
					<td><?php echo $tampil['name']; ?></td>
					<td><?php echo $tampil['password']; ?></td>
					<td><?php echo @$tampil['limit-uptime']; ?></td>
					<td><?php echo cariprofile($API,$tampil['profile']); ?></td>
					<td><?php echo $tampil['comment']; ?></td>
					<td><?php echo $tampil['uptime']; ?></td>
					<td>
						<a href="index.php?halaman=edit_user_hotspot&id=<?php echo $tampil['.id']; ?>" title="Edit User"><i class="icon-pencil"></i></a>
						<a href="#" id="<?php echo $tampil['.id']; ?>" svn="<?php echo $tampil['name']; ?>" class="hapus" role="button" data-toggle="modal" title="Hapus User"><i class="icon-trash"></i></a>
						<a href="#" id="<?php echo $tampil['.id']; ?>" svn="<?php echo $tampil['name']; ?>" class="ccounter" role="button" data-toggle="modal" title="Clear Counter"><i class="icon-remove"></i></a>
					</td>
    			</tr> 	
					
				<?php 
					if ($no == 10){ break; }
				} else if ( empty ( $page ) ){ ?>
				<tr <?php if ($tampil['limit-uptime']==$tampil['uptime']){ echo "style='background-color:red'"; }?>> 
    				<td><?php echo $no; ?></td> 
					<td><?php echo $tampil['name']; ?></td>
					<td><?php echo $tampil['password']; ?></td>
					<td><?php echo @$tampil['limit-uptime']; ?></td>
					<td><?php echo cariprofile($API,$tampil['profile']); ?></td>
					<td><?php echo $tampil['comment']; ?></td>
					<td><?php echo $tampil['uptime']; ?></td>
					<td>
						<a href="index.php?pagina=edit_user_hotspot&id=<?php echo $tampil['.id']; ?>" title="Edit User"><i class="icon-pencil"></i></a>
						<a href="#" id="<?php echo $tampil['.id']; ?>" svn="<?php echo $tampil['name']; ?>" class="hapus" role="button" data-toggle="modal" title="Hapus User"><i class="icon-trash"></i></a>
						<a href="#" id="<?php echo $tampil['.id']; ?>" svn="<?php echo $tampil['name']; ?>" class="ccounter" role="button" data-toggle="modal" title="Clear Counter"><i class="icon-remove"></i></a>
					</td>
    			</tr> 
				<?php
				if ($no == $stop){ break; }
				} else { 
				if ($no > $stop){
				?>
				<tr <?php if ($tampil['limit-uptime']==$tampil['uptime']){ echo "style='background-color:red'"; }?>> 
    				<td><?php echo $no; ?></td> 
					<td><?php echo $tampil['name']; ?></td>
					<td><?php echo $tampil['password']; ?></td>
					<td><?php echo @$tampil['limit-uptime']; ?></td>
					<td><?php echo cariprofile($API,$tampil['profile']); ?></td>
					<td><?php echo $tampil['comment']; ?></td>
					<td><?php echo $tampil['uptime']; ?></td>
					<td>
					  <a href="index.php?pagina=editar-usuario-hotspot&id=<?php echo $tampil['.id']; ?>"><i class="icon-pencil" title="Edit User"></i></a>
					  <a href="#" id="<?php echo $tampil['.id']; ?>" svn="<?php echo $tampil['name']; ?>" class="hapus" role="button" data-toggle="modal" title="Hapus User"><i class="icon-trash"></i></a>
					  <a href="#" id="<?php echo $tampil['.id']; ?>" svn="<?php echo $tampil['name']; ?>" class="ccounter" role="button" data-toggle="modal" title="Clear Counter"><i class="icon-remove"></i></a>
					</td>					
    			</tr> 
				<?php
				if ($no == $lanjut){ break; }
				}
				}
				$no++;
			}
			$API->disconnect();
			?>
      </tbody>
    </table>
	
		<?php } else { echo "<b style='color:red'>Data User Hotspot Tidak ada <a href='index.php' title='Klik Untuk Kembali ke Halaman Utama'>Kembali</a></b>";} ?>
</div>
 
			<?php 
				if (count($uh)>10) {
				
				$banyakHalaman = ceil($banyakData / $limit);  
				$banyak = $banyakHalaman - 1;
				echo "<div class='pagination'><center>";  
					for($i = 0; $i <= $banyak; $i++){  

						if ($page != $i){  
						
							echo "<a class='page";
							if ($page == $i){ echo "active"; }
							echo "$aktif' href='index.php?pagina=lista-usuarios-hotspot&datos-a=".$i."'>".$i."</a>";
						
						} else {   
						
							echo "<a class='page";
							if ($page == $i){ echo " active"; }
							echo "$aktif' href='index.php?pagina=lista-usuarios-hotspot&datos-a=".$i."'>".$i."</a>";

						}  
				}	
				echo "</center></div>"; 
				}
			?>

</div>


