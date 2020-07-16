$jnoc(document).ready(function(){
	$jnoc('#gpass').validate({
				rules: {
					passb: {
						required: true
					}
					},
				messages: {
				    passb: {
						required : "La nueva contraseña debe ser completada"
					}    
				},
				submitHandler: function(form) {
				
				$jnoc("#lproses").show();
				var passb = $jnoc("#passb").val();
				var passl = $jnoc("#passl").val();
				
				$jnoc.ajax({
					url: "aksi/php/editpass/editpass.php", 
					type:"POST",
					data: { aksi:"editpass",passl:passl,passb:passb },
					dataType:"json",
					chache: false,
					success : function(respon){
					if (respon==1){
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("La contraseña del Mikrotik cambió de manera exitosa");  
					$jnoc("#myModal").modal("show");
					} else if (respon==0) {
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("El cambio de contraseña del Mikrotik falló");  
					$jnoc("#myModal").modal("show");
					
					}
					}
				});      
				}
	});		
});