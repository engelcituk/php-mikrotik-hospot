$jnoc(document).ready(function(){
	$jnoc('#user').validate({
				rules: {
					nama: {
						required: true
					},
					group: {
						required: true
					},					
					pass: {
						required: true
					},
					ket: {
						required: true
					}
					},
				messages: {
				    nama: {
						required : "Nombre debe ser llenado"
					},
				    group: {
						required : "Un grupo debe ser seleccionado"
					},				    
					pass: {
						required : "La contraseña es requerida"
					},
				    ket: {
						required : "La información es necesaria"
					}					
				},
				submitHandler: function(form) {
				
				$jnoc("#lproses").show();
				var pass = $jnoc("#pass").val();
				var nama = $jnoc("#nama").val();
				var group = $jnoc("#group").val();
				var ket = $jnoc("#ket").val();
				
				$jnoc.ajax({
					url: "aksi/php/usermikrotik/save.php", 
					type:"POST",
					data: { aksi:"save",pass:pass,nama:nama,group:group,ket:ket },
					dataType:"json",
					chache: false,
					success : function(respon){
					if (respon==1){
					$jnoc("#pass").val("");
					$jnoc("#nama").val("");
					$jnoc("#group").val("-- Pilih --");
					$jnoc("#ket").val("");
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("Datos de usuario guardados correctamente");  
					$jnoc("#myModal").modal("show");
					} else if (respon==0) {
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("Fallo en el guardado del usuario");  
					$jnoc("#myModal").modal("show");
					
					}
					}
				});      
				}
	});	
});