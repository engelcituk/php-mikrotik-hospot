<?php 
	$API->write("/user/print");   
	$u = $API->read(); 
?>
<div class="span9">
            <h3 class="page-title">Lista de usuarios de Mikrotik</h3>
<div class="btn-toolbar">
    <button class="btn btn-success"><a href="index.php?halaman=tambah_user_mikrotik" style="color:white">Agregar usuario [+]</a></button>
  <div class="btn-group">
  </div>
</div>

<div class="well">
<?php if (count($u)>=1) {?>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nombre</th>
          <th>Grupo</th>
          <th>Información</th>
          <th style="width: 26px;">Acción</th>
        </tr>
      </thead>
      <tbody>
		<?php 	
		$i=1;
		foreach($u as $tampil){ ?>	  
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $tampil['name']; ?></td>
          <td><?php echo $tampil['group']; ?></td>
          <td><?php echo $tampil['comment']; ?></td>
          <td>
              <a href="#" id="<?php echo $tampil['.id']; ?>" svn="<?php echo $tampil['name']; ?>" role="button" class="hapus" data-toggle="modal"><i class="icon-trash"></i></a>
          </td>
        </tr>
		<?php 
			$i++;
			} 
		$API->disconnect();   
		?>
	  </tbody>
    </table>
	<?php } else {echo "<b style='color:red'>Data User Mikrotik Tidak ada <a href='index.php' title='Haga clic para volver a la página principal'>Volver</a></b>";} ?>
</div>


</div>

<script src="aksi/js/usermikrotik/hapus.js"></script>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirmación</h3>
    </div>
    <div class="modal-body">
		<input type="hidden" id="idnya" name="idnya"/>
        <p class="error-text"></p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button class="btn btn-danger" id="hapus">¡Eliminar!</button>
		<img src="images/loading.gif" id="lproses" class="load"/>
    </div>
</div>
