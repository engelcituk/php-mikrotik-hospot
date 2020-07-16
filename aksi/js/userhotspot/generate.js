$jnoc(document).ready(function(){
	$jnoc('#guserhotspot').validate({
				rules: {
					puser: {
						required: true
					},
					glimit: {
						required: true
					},					
					ppass: {
						required: true
					},
					lwaktu: {
						required: true,
						digits:true
					},
					satuan: {
						required: true
					},
					juser: {
						required: true
					},
					ket: {
						required: true
					}
					},
				messages: {
				    puser: {
						required : "Longitud del nombre de usuario debe seleccionarse"
					},
				    glimit: {
						required : "Se debe seleccionar el grupo de ancho de banda límite"
					},				    
					ppass: {
						required : "Se debe seleccionar la longitud de la contraseña"
					},					
					lwaktu: {
						required : "Límite de tiempo debe completarse",
						digits : "Límite de tiempo debe ser un número"
					},
					satuan: {
						required : "Una unidad de tiempo debe ser seleccionada"
					},
					juser: {
						required : "El número de usuarios debe de seleccionarse"
					},
				    ket: {
						required : "La sección de información debe ser completada"
					}					
				},
				submitHandler: function(form) {
				
				$jnoc("#lproses").show();
				var ppass = $jnoc("#ppass").val();
				var puser = $jnoc("#puser").val();
				var glimit = $jnoc("#glimit").val();
				var lwaktu = $jnoc("#lwaktu").val();
				var satuan = $jnoc("#satuan").val();
				var ket = $jnoc("#ket").val();
				var juser = $jnoc("#juser").val();
				
				$jnoc.ajax({
					url: "aksi/php/userhotspot/generate.php", 
					type:"POST",
					data: { aksi:"generate",satuan:satuan,lwaktu:lwaktu,ppass:ppass,puser:puser,glimit:glimit,ket:ket,juser:juser },
					dataType:"json",
					chache: false,
					success : function(respon){
					if (respon==1){
					$jnoc("#puser").val("-- Seleccione --");
					$jnoc("#ppass").val("-- Seleccione --");
					$jnoc("#glimit").val("-- Seleccione --");
					$jnoc("#juser").val("-- Seleccione --");
					$jnoc("#satuan").val("-- Seleccione --");
					$jnoc("#ket").val("");
					$jnoc("#lwaktu").val("");
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("La generación de datos de "+juser+" usuarios Hotspot fue exitosa.");  
					$jnoc("#myModal").modal("show");
					} else if (respon==0) {
					$jnoc("#lproses").hide();
					$jnoc('.error-text').text("User Hotspot GAGAL digenerate");  
					$jnoc("#myModal").modal("show");
					
					}
					}
				});      
			}
	});	
});