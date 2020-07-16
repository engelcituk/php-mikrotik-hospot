$jnoc(document).ready(function(){
    // Hapus
	$jnoc("#hapus").click(function(){
		$jnoc("#lprosesh").show();
		var id = $jnoc("#idnya").val();
			$jnoc.ajax({
				url: "aksi/php/userhotspot/hapus.php",
				type:"POST",						
				data: {aksi:"hapus",idh:id},
				dataType:"json",
				chache: false,
				success : function(respon){
				if (respon==1){
					location.reload();
				} else {
					$jnoc("#lprosesh").hide();
					$jnoc('.error-text').text("ada kesalahan saat proses hapus. cobalah beberapa saat lagi!"); 
					exit();	
				}
				}
			});
	});
	
	$jnoc(".hapus").click(function(){
		$jnoc("#lprosesh").hide();
		$jnoc("#hapuss").hide();
		$jnoc("#resetc").hide();
		$jnoc("#cc").hide();
		var isi = $jnoc(this);
		var id = isi.attr("id");
		var nama = isi.attr("svn");
		$jnoc('.error-text').text("anda yakin akan menghapus user '"+nama+"' ini?"); 
		$jnoc("#hapus").show(); 
		$jnoc("#idnya").val(id);  			
		$jnoc("#myModal").modal("show");	
	});
	
	$jnoc(".hapussuser").click(function(){
		$jnoc("#lprosesh").hide();
		$jnoc("#hapus").hide();
		$jnoc("#resetc").hide();
		$jnoc("#cc").hide();
		$jnoc('.error-text').text("¿Está seguro de que desea eliminar todos los datos del punto de acceso del usuario? si los datos son más de 500 elementos se realizarán por etapas."); 
		$jnoc("#hapuss").show(); 		
		$jnoc("#myModal").modal("show");	
	});
	
	    // Hapus
	$jnoc("#hapuss").click(function(){
		$jnoc("#lprosesh").show();
			$jnoc.ajax({
				url: "aksi/php/userhotspot/hapus.php",
				type:"POST",						
				data: {aksi:"hapussuser"},
				dataType:"json",
				chache: false,
				success : function(respon){
				if (respon==1){
					location.reload();
				} else {
					$jnoc("#lprosesh").hide();
					$jnoc('.error-text').text("Hubo un error durante el proceso de eliminación. ¡Inténtalo de nuevo más tarde!"); 
					exit();	
				}
				}
			});
	});
	
	// Clear Counter
	$jnoc(".resetc").click(function(){
		$jnoc("#lprosesh").hide();
		$jnoc("#hapus").hide();
		$jnoc("#hapuss").hide();
		$jnoc("#cc").hide();
		$jnoc('.error-text').text("¿Está seguro de que desea eliminar el contador de usuarios de puntos de acceso? Si elimina el contador, los usuarios que hayan alcanzado el límite de tiempo pueden iniciar sesión nuevamente"); 
		$jnoc("#resetc").show(); 		
		$jnoc("#myModal").modal("show");	
	});
	
	$jnoc("#resetc").click(function(){
		$jnoc("#lprosesh").show();
			$jnoc.ajax({
				url: "aksi/php/userhotspot/hapus.php",
				type:"POST",						
				data: {aksi:"resetc"},
				dataType:"json",
				chache: false,
				success : function(respon){
				if (respon==1){
					location.reload();
				} else {
					$jnoc("#lprosesh").hide();
					$jnoc('.error-text').text("Se produjo un error durante el proceso de reinicio del contador. ¡Inténtalo de nuevo más tarde!"); 
					exit();	
				}
				}
			});
	});
	// Cetak PDF 
	$jnoc(".cetak").click(function(){
		$jnoc("#lprosese").show();
			$jnoc.ajax({
				url: "aksi/php/userhotspot/cek_data.php",
				type:"POST",						
				data: {aksi:"export"},
				dataType:"json",
				chache: false,
				success : function(respon){
				if (respon==1){
					var win = window.open('penting/pdf_export.php', '_blank');
					if(win){
					win.focus();
					}else{
					document.getElementById("popup").click();
					}
				} else {
					$jnoc("#lprosese").hide();
					$jnoc("#lprosesh").hide();
					$jnoc("#hapus").hide();
					$jnoc("#hapuss").hide();
					$jnoc("#resetc").hide();
					$jnoc("#cc").hide();
					$jnoc('.error-text').text("Hubo un error durante el proceso de exportación. ¡Inténtalo de nuevo más tarde!");  		
					$jnoc("#myModal").modal("show");
				}
				}
			});
	});
	// Export Excel
	$jnoc(".export").click(function(){
		$jnoc("#lprosese").show();
			$jnoc.ajax({
				url: "aksi/php/userhotspot/cek_data.php",
				type:"POST",						
				data: {aksi:"export"},
				dataType:"json",
				chache: false,
				success : function(respon){
				if (respon==1){
					var win = window.open('penting/excel_export.php', '_blank');
					if(win){
					win.focus();
					}else{
					document.getElementById("popup").click();
					}
				} else {
					$jnoc("#lprosese").hide();
					$jnoc("#lprosesh").hide();
					$jnoc("#hapus").hide();
					$jnoc("#hapuss").hide();
					$jnoc("#resetc").hide();
					$jnoc("#cc").hide();
					$jnoc('.error-text').text("Hubo un error durante el proceso de exportación. ¡Inténtalo de nuevo más tarde!");  		
					$jnoc("#myModal").modal("show");
				}
				}
			});
	});
	// Clear Counter
	$jnoc(".ccounter").click(function(){
		$jnoc("#lprosesh").hide();
		$jnoc("#hapus").hide();
		$jnoc("#resetc").hide();
		$jnoc("#hapuss").hide();
		var isi = $jnoc(this);
		var id = isi.attr("id");
		var nama = isi.attr("svn");
		$jnoc('.error-text').text("Estás seguro de restablecer el contador del usuario'"+nama+"' Si elimina el contador, el usuario puede iniciar sesión nuevamente si el límite de tiempo se ha agotado."); 
		$jnoc("#cc").show(); 
		$jnoc("#idc").val(id);  
		$jnoc("#myModal").modal("show");
	});
	
	$jnoc("#cc").click(function(){
		$jnoc("#lprosesh").show();
		    var idh = $jnoc("#idc").val();
			$jnoc.ajax({
				url: "aksi/php/userhotspot/hapus.php",
				type:"POST",						
				data: {aksi:"cc",idh:idh},
				dataType:"json",
				chache: false,
				success : function(respon){
				if (respon==1){
					location.reload();
				} else {
					$jnoc("#lprosesh").hide();
					$jnoc('.error-text').text("Se produjo un error durante el proceso de reinicio del contador. ¡sInténtalo de nuevo más tarde!"); 
					exit();	
				}
				}
			});
	});
});