$jnoc(document).ready(function(){
	$jnoc('#glimitasi').validate({
				rules: {
					nama: {
						required: true
					},
					share: {
						required: true,
						digits:true
					},					
					limit: {
						required: true,
						digits:true
					},
					satuan: {
						required: true
					}
					},
				messages: {
				    nama: {
						required : "Nombre debe ser llenado"
					},
				    share: {
						required : "El usuario compartido debe completarse",
						digits : "Los usuarios compartidos deben ser números"
					},				    
					limit: {
						required : "Límite de ancho de banda debe llenarse",
						digits : "Límite de ancho de banda debe ser un número, por ejemplo: 128/256/512"
					},
				    satuan: {
						required : "Una unidad de la lista debe ser seleccionada"
					}					
				},
				submitHandler: function(form) {
				
				$jnoc("#lproses").show();
				var share = $jnoc("#share").val();
				var nama = $jnoc("#nama").val();
				var limit = $jnoc("#limit").val();
				var satuan = $jnoc("#satuan").val();
				var aksi = $jnoc("#aksi").val();
				var id = $jnoc("#idnya").val();
				$jnoc.ajax({
					url: "aksi/php/limitasi/save.php", 
					type:"POST",
					data: { aksi:aksi,share:share,nama:nama,limit:limit,satuan:satuan,id:id },
					dataType:"json",
					chache: false,
					success : function(respon){
					if (respon==1){
					$jnoc("#share").val("");
					$jnoc("#nama").val("");
					$jnoc("#satuan").val("-- Pilih --");
					$jnoc("#limit").val("");
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("Grupo de límite de ancho de banda Hotspot guardado exitosamente");  
					$jnoc("#myModal").modal("show");
					} else if (respon==0) {
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("Guardado FALLIDO del Grupo de limitación.");  
					$jnoc("#myModal").modal("show");
					
					}
					}
				});      
				}
	});	
});