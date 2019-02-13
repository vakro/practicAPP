<?php
	require '../libraries/fpdf/fpdf.php';
	
	
	class PDF extends FPDF
	{ 
		
		function Header()
		{
			/*$this->Image('images/logo.png', 5, 5, 30 );
			$this->SetFont('Arial','B', 12);*/
			$this->Cell(30);
			/*$this->Cell(120,10, 'HOJA DE VIDA',0,0,'C');*/
			$this->Ln(20);
			$this->Image( '../img/fondohv.png', 0, 0, 210 );
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>