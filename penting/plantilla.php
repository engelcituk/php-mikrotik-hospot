<?php require_once('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min-2.css" >
</head>
<body>
<style>
div.col-xs-2 {
  border-style: solid;
}
p {
    border-bottom-style: solid;
}
</style>
<div class="container">
    <!-- <div class="row">
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola:&nbsp; &nbsp; </strong>kfkdfkf</p> 
            <p><strong>mundo:  &nbsp; &nbsp; </strong>sdfsfs</p>
            
        </div>
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola: &nbsp; &nbsp;</strong>sgsdgs</p> 
            <p><strong>mundo: &nbsp; &nbsp;</strong>sgsdg</p>
        </div>
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola: &nbsp; &nbsp;</strong>sgdsdg</p> 
            <p><strong>mundo: &nbsp; &nbsp;</strong>sgsgds</p>
        </div> 
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola: &nbsp; &nbsp;</strong>sgdsdg</p> 
            <p><strong>mundo: &nbsp; &nbsp;</strong>sgsgds</p>
        </div>     
        <br><br>    
        <br><br>    
        <br><br>    
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola:&nbsp; &nbsp; </strong>kfkdfkf</p> 
            <p><strong>mundo:  &nbsp; &nbsp; </strong>sdfsfs</p>
            
        </div>
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola: &nbsp; &nbsp;</strong>sgsdgs</p> 
            <p><strong>mundo: &nbsp; &nbsp;</strong>sgsdg</p>
        </div>
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola: &nbsp; &nbsp;</strong>sgdsdg</p> 
            <p><strong>mundo: &nbsp; &nbsp;</strong>sgsgds</p>
        </div> 
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola: &nbsp; &nbsp;</strong>sgdsdg</p> 
            <p><strong>mundo: &nbsp; &nbsp;</strong>sgsgds</p>
        </div>    
        <br><br>    
        <br><br>    
        <br><br>    
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola:&nbsp; &nbsp; </strong>kfkdfkf</p> 
            <p><strong>mundo:  &nbsp; &nbsp; </strong>sdfsfs</p>
            
        </div>
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola: &nbsp; &nbsp;</strong>sgdsdg</p> 
            <p><strong>mundo: &nbsp; &nbsp;</strong>sgsgds</p>
        </div> 
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola: &nbsp; &nbsp;</strong>sgsdgs</p> 
            <p><strong>mundo: &nbsp; &nbsp;</strong>sgsdg</p>
        </div>
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola: &nbsp; &nbsp;</strong>sgdsdg</p> 
            <p><strong>mundo: &nbsp; &nbsp;</strong>sgsgds</p>
        </div>    
    </div> -->
    
</div>


<?php

$API->write("/ip/hotspot/user/print");   
$uh = $API->read();
$no=4;
$contador=1;

/*
foreach($uh as $tampil){
     if($tampil['name'] != 'admin' && $tampil['name'] != 'default-trial'){
         //$limitbw = $pdf->cariprofile($API,$tampil['profile']);
        echo $no."|".$tampil['name']."|".$tampil['password']."|".$tampil['limit-uptime']."<br>";
        echo ($contador%$no==0) ? "hola cuatro veces" : "";
        $no++;
        $contador++;
     }
 }*/

 /*
 $limite=20;
$numero=4;
for($i=0;$i<$limite;$i++){
	if($i%$numero==0){
	echo $i." es múltiplo de ".$numero;
	}
}
 */
unset($uh[0]);//elimino default-trial
unset($uh[0]);// elimino admin, para que no aparezcan en el listado
$uh = array_values($uh);

$limite = count($uh);
$numero = 4;
    for ($i = 1; $i < $limite; ++$i){
        echo ($i%$numero==0 ) ? '<div class="row">' : ""; //si es multiplo de 4 imprimo saltos
        echo '
        <div class="col-xs-2">
            <h5>titulo</h5>
            <p><strong>hola:&nbsp; &nbsp; </strong>kfkdfkf</p> 
            <p><strong>mundo:  &nbsp; &nbsp; </strong>sdfsfs</p>
        </div>
        ';
        echo ($i%$numero==0 ) ? '</div>' : ""; //si es multiplo de 4 imprimo saltos
    }
   

?>
</div>

</body>
</html>

<!--  ini_set( "display_errors", 0);

require_once '../dompdf/autoload.php';

include_once "./vendor/autoload.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
$html=file_get_contents( 'http://localhost:8888/mikrotik/penting/plantilla.php' );

//$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();  -->