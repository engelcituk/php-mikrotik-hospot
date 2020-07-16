<div class="span9">
       <h3 class="page-title">Editar contraseña del Mikrotik</h3>
<div class="well">

    <form id="gpass" action="" method="post">
	    <label>Contraseña anterior</label>
        <input type="password" id="passl" name="passl" class="input-xlarge">
        <label>Nueva contraseña</label>
        <input type="password" id="passb" name="passb" class="input-xlarge required">
        <div>
		 <input class="btn btn-primary" type="submit" name="submit" value="Cambiar la contraseña">
			<img src="images/loading.gif" id="lproses" class="load"/>
			<button class="btn"><a href="index.php" style="color:black">Volver</a></button>
        </div>
    </form>


</div>

<script src="aksi/js/editpass/editpass.js"></script>

</div>

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
   