<?php require_once('koneksi.php'); 

$API->write("/ip/hotspot/user/print");   
$uh = $API->read();

unset($uh[0]);//elimino default-trial
unset($uh[0]);// elimino admin, para que no aparezcan en el listado
$uh = array_values($uh);

$limite = count($uh);
$numero = 4;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml"> 
 <head> <meta charset="utf-8"> 
 	<title>Vouchers</title> 
 	<style> @media print {   .noprint { 
 	                                      display: none;  
 	                                    }  
 	                         .pagebreak {  page-break-after: always;  
 	                                   }
 	                      }
    </style> 
</head> 
    <body> 
    <?php
        $contador = 1;
        for ($i = 1; $i < $limite; ++$i){
            echo '
                    <table style="display: inline-block; width: 250px; border: 1px solid #121DAE; line-height: 110%; font-family: arial; font-size: 12px; margin: 1px;">     
                    <tbody>         
                        <tr>             
                            <td style="text-align: center; color: #2F38F4; font-size: 13px; border-bottom: 1px #ccc solid;"><b>ABARROTES WILMA</b></td>        
                        </tr>          
                        <tr>              
                            <td>                   
                                <table style=" text-align: center; width: 240px; background-color: #fff; line-height: 110%; font-size: 11px;">              
                                    <tbody>                
                                        <tr style="background-color: #eee;">                               
                                            <td style="background-color: #fff; width: 33%"><b>Número</b></td>                               
                                            <td style="width: 33%"><b>Paquete</b></td>                                 
                                            <td style="width: 33%">Datos</td>                            
                                        </tr>                           
                                        <tr>                              
                                            <td ><b>'.$contador.'</b></td>                              
                                            <td><b> '.$uh[$i]["profile"].'</b></td>                              
                                            <td>Ilimitados</td>                   
                                        </tr>                       
                                    </tbody>                  
                                </table>           
                            </td>             
                        </tr>             
                        <tr>       
                            <td>                  
                                    <table style=" text-align: center; width: 240px; background-color: #fff; line-height: 110%; font-size: 11px;">               
                                        <tbody>                         
                                            <tr style="background-color: #eee;">                             
                                                <td style="width: 33%">Tiempo</td>                             
                                                <td style="width: 33%"></td>                             
                                                <td style="width: 33%">Precio</td>                         
                                            </tr>                         
                                            <tr>                        
                                                <td> '.$uh[$i]["limit-uptime"].'</td>                             
                                                <td></td>                             
                                                <td>$ '.$uh[$i]["comment"].'</td>            </tr>                     
                                    </tbody>                   
                                </table>                
                            </td>              
                        </tr>              
                        <tr>                 
                            <td>                      
                                <table style=" text-align: center; width: 240px; background-color: #fff; line-height: 110%; font-size: 12px; border-top: 1px solid #ccc;">    
                                    <tbody>                             
                                        <tr style="color: #1A16B8; font-size: 11px;">                       
                                            <td style="width: 50%">Usuario</td>                          
                                            <td>Contraseña</td>                   
                                        </tr>                         
                                        <tr style="background-color: #fff;">                                
                                            <td style="color: #000000; border: 1px #ccc solid;">'.$uh[$i]["name"].'</td>                               
                                            <td style="color: #000000; border: 1px #ccc solid;">'.$uh[$i]["password"].'</td>                                
                                        </tr>                          
                                    </tbody>                      
                                </table>                 
                            </td>              
                        </tr>              
                        <tr>                   
                            <td style="text-align: center; font-size:11px;">Mas tickets en Abarrotes Wilma</td>             
                            </tr>      
                        </tbody>     
	            </table>
            ';
        }
        $contador++;
    ?>
    </body>
</html>
<p class="noprint" style="font-size: 10px">
  ................ page break ................
</p>
<p class="pagebreak">&nbsp;</p>
