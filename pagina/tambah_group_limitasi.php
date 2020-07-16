<?php 
	if(!empty($_GET['id'])){
		$judul = "Editar";
		$id = $_GET['id'];
		$aksi = "update";
		$button = "Actualizar";
	    $API->write("/ip/hotspot/user/profile/print",false);   
	    $API->write("?.id=".$id,true);   
	    $p = $API->read(); 
	    foreach($p as $tam){
			$nama = $tam['name'];
			$share = $tam['shared-users'];
			$limit = $tam['rate-limit'];
	    }
		$pecah = explode("/",$limit);
		if (count($pecah)>1){
			$limitnya = $pecah[0];
			$satuan = $pecah[1];
		} else {
			$limitnya = $pecah[0];
			$satuan = "";
		}
	} else {
		$id = "";
		$aksi = "save";
		$judul = "Agregar";
		$button = "Guardar";
		$limitnya = "";
		$satuan = "";
		$nama = "";
		$share = "";
	}
?>
<div class="span9">
       <h3 class="page-title"><?php echo $judul; ?> grupo límite de ancho de banda Hotspot</h3>

<div class="well">

    <form id="glimitasi" method="post" action="">
        <label>Nombre del grupo</label>
        <input type="hidden" id="idnya" name="idnya" value="<?php echo $id; ?>">
        <input type="hidden" id="aksi" name="aksi" value="<?php echo $aksi; ?>">
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" class="input-xlarge required">
        <label>Número de usuarios (Usuario compartido)</label>
        <input type="text" id="share" name="share" value="<?php echo $share; ?>" class="input-xlarge required">
        <label>Limite de ancho de banda (valores númericos)</label>
        <input type="text" id="limit" value="<?php echo $limitnya; ?>" name="limit" class="input-large required" placeholder="por ejemplo: 128/256/512">
		<select name="satuan" id="satuan" class="input-large warna required">
			<option value="">-- Seleccionar --</option>
			<option value="k" <?php if ($satuan=="k"){ echo "selected"; }?>>Kilobyte</option>
			<option value="m" <?php if ($satuan=="m"){ echo "selected"; }?>>Megabyte</option>
		</select>
		
        <div style="padding-top:20px">
            <input class="btn btn-primary" id="simpan" type="submit" value="<?php echo $button; ?> Grupo">
            <img src="images/loading.gif" id="lproses" class="load"/>
			<button class="btn"><a href="index.php?halaman=daftar_group_limitasi" style="color:black">Volver</a></button>
        </div>
	</form>
      </div>
  </div>

 <script src="aksi/js/limitasi/save.js"></script>
  
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Atención</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
  </div>
</div>

   