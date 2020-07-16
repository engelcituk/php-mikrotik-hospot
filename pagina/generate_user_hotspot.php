<?php 	$API->write("/ip/hotspot/user/profile/print");   
	    $glimit = $API->read(); 
?>
<div class="span9">
       <h3 class="page-title">Generar Usuarios Hotspot</h3>

<div class="well">

    <form id="guserhotspot" method="post" action="">
        
		<label>Longitud del nombre de usuario</label>
        <select name="puser" id="puser" class="input-large required warna">
			<option value="">-- Seleccione --</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select>	
		<i style="color:green">*) Longitud de la cadena usuario</i>
        <label>Longitud de la contraseña</label>
        <select name="ppass" id="ppass" class="input-large required warna">
			<option value="">-- Seleccione --</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select>	
		<i style="color:green">*) Longitud de la cadena contraseña</i>
        <label>Grupo de Limitación del ancho de banda</label>
        <select name="glimit" id="glimit" class="input-large required warna">
			<option value="">-- Seleccione --</option>
			<?php 
				foreach($glimit as $g){
					?>
			<option value="<?php echo $g['name'];?>"><?php echo $g['name']." (".$g['rate-limit'].")"; ?></option>
			<?php } ?>
		</select>
        <label>Límite de tiempo</label>
        <input type="text" id="lwaktu" name="lwaktu" class="input-large required" placeholder="indique el valor numerico">
		<select name="satuan" id="satuan" class="input-large required warna">
			<option value="">-- Seleccione --</option>
			<option value="menit">Minuto</option>
			<option value="jam">Hora</option>
			<option value="hari">día</option>
		</select>
		<label>Total de usuarios</label>
        <select name="juser" id="juser" class="input-large required warna">
			<option value="">-- Seleccione --</option>
			<option value="5">5 Usuarios</option>
			<option value="10">10 Usuarios</option>
			<option value="20">20 Usuarios</option>
			<option value="25">25 Usuarios</option>
			<option value="50">50 Usuarios</option>
			<option value="75">75 Usuarios</option>
			<option value="100">100 Usuarios</option>
			<option value="200">200 Usuarios</option>
			<option value="250">250 Usuarios</option>
			<option value="300">300 Usuarios</option>
			<option value="500">500 Usuarios</option>
			<option value="1000">1000 Usuarios</option>
		</select>	
		<i style="color:green">*) la cantidad de usuarios a generar</i>
		<label>Información</label>
        <textarea id="ket" rows="2" class="required" name="ket" placeholder="información adicional o un comentario"></textarea>
		
        <div style="padding-top:20px">
            <input class="btn btn-primary" id="simpan" type="submit" value="Generar Usuarios Hotspot">
			<img src="images/loading.gif" class="load" id="lproses"/>
			<button class="btn"><a href="index.php?halaman=daftar_user_hotspot" style="color:black">Volver</a></button>
		</div>
	</form>
      </div>
  </div>

  <script src="aksi/js/userhotspot/generate.js"></script>
  
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

   