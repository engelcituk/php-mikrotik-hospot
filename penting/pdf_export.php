<?php
ini_set( "display_errors", 0);
require_once('../fpdf/fpdf.php');
require_once('koneksi.php');


class PDF extends FPDF{

	function cariprofile($API,$namaprof){
		
		$API->write("/ip/hotspot/user/profile/print",false);   
		$API->write("?name=".$namaprof,true);   
		$p = $API->read(); 
	
		foreach($p as $tam){
		$nama = $tam['name'];
		$lm = $tam['rate-limit'];
		}
		
		$limitbw = $nama." (".$lm.")";	
		
		return $limitbw;
	}
	
 function LoadData($gue){
  $data = array();
  if (is_array($gue)) {
  foreach($gue as $coba)
   $data[] = explode('|',$coba);
  }
  return $data;
 }
 
function Kepala(){
	
    $this->SetFont('Arial','B',8);
	$this->Cell(45);
	$this->Ln(5);
    $this->SetFont('Arial','B',15);
    $this->Cell(45);
	$this->Cell(100,0,'DATA USER HOTSPOT',0,0,'C');
	$this->Ln(5);
	$this->SetFont('Arial','',12);
} 

 function FancyTable($header, $data){
  $this->SetFillColor(50,50,50);
  $this->SetTextColor(255);
  $this->SetDrawColor(0,0,0);
  $this->SetFont('Arial','',12);
  $w = array(20, 45, 45, 50);
  for($i=0;$i<count($header);$i++)
  $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
  $this->Ln();
  $this->SetFillColor(200,200,200);
  $this->SetTextColor(0);
  $this->SetFont('Arial','',12);

  $fill = false;
  foreach($data as $row){

   $this->Cell($w[0],6,$row[0],'LR',0,'C',$fill); 
   $this->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
   $this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
   $this->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
   $this->Ln();
   $fill = !$fill;
  }
   $this->Cell(array_sum($w),0,'','T');
 }
 }

 $pdf = new PDF();
 $header = array('No', 'Nombre de usuario', 'pass', 'Limite tiempo');
 $no=1;
 $API->write("/ip/hotspot/user/print");   
 $uh = $API->read();
 foreach($uh as $tampil){
     if($tampil['name'] != 'admin' && $tampil['name'] != 'default-trial'){
         //$limitbw = $pdf->cariprofile($API,$tampil['profile']);
        @$gue[] .= $no."|".$tampil['name']."|".$tampil['password']."|".$tampil['limit-uptime'];
        $no++;
     }
 }

 $data = $pdf->LoadData($gue);
 $pdf->SetFont('Arial','',12);
 $pdf->AddPage();
 $pdf->Kepala();
 $pdf->FancyTable($header,$data);
 $pdf->Output("data_user_hotspot.pdf","D");

?>
