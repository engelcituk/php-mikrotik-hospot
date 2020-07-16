$jnoc(document).ready(function(){
	$jnoc('#loginform').validate({
				rules: {
					ip: {
						required: true
					},
					user: {
						required: true
					}
					},
				messages: {
				    ip: {
						required : "La dirección ip es requeridad"
					},
					user: {
						required : "El nombre de usuario es requerida!"
					}    
				},
				submitHandler: function(form) {
				
				$jnoc("#lproses").show();
				var ip = $jnoc("#ip").val();
				var user = $jnoc("#user").val();
				var pass = $jnoc("#pass").val();
				
				$jnoc.ajax({
					url: "aksi/php/login/aksi_login.php", 
					type:"POST",
					data: { aksi:"login",ip:ip,pass:pass,user:user },
					dataType:"json",
					chache: false,
					success : function(respon){
					if (respon==1){
					$jnoc("#lproses").hide();
					window.location.href="index.php";
					} else if (respon==0) {
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("¡La conexión al Mikrotik FALLÓ! Verifique la conexión con el enrutador o el nombre de usuario/contraseña ¡Quizás no sean correctos!");  
					$jnoc("#myModal").modal("show");
					
					}
					}
				});      
				}
	});		
});