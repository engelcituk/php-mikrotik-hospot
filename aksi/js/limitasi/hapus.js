$jnoc(document).ready(function(){
    // Hapus
	$jnoc("#hapus").click(function(){
		$jnoc("#lproses").show();
		var id = $jnoc("#idnya").val();
			$jnoc.ajax({
				url: "aksi/php/limitasi/hapus.php",
				type:"POST",						
				data: {aksi:"hapus",idh:id},
				dataType:"json",
				chache: false,
				success : function(respon){
				if (respon==1){
					location.reload();
				} else {
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("Hubo un error durante el proceso de eliminación. ¡Inténtalo de nuevo más tarde!"); 
					exit();	
				}
				}
			});
	});
	
	$jnoc(".hapus").click(function(){
		$jnoc("#lproses").hide();
		var isi = $jnoc(this);
		var id = isi.attr("id");
		var nama = isi.attr("svn");
		if (id=="*0"){ 
		$jnoc('.error-text').text("Lo sentimos, el grupo de restricción de "+nama+"' no se puede eliminar"); 
		$jnoc("#hapus").hide(); 
		} else { 
		$jnoc('.error-text').text("¿Estás seguro de que deseas eliminar este grupo de limitación de '"+nama+"'?"); 
		$jnoc("#hapus").show(); 
		}
		$jnoc("#idnya").val(id);  			
		$jnoc("#myModal").modal("show");	
	});
	
});