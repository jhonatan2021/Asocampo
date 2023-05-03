<?php
	require 'pdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../img/Asocampo.png', 20, 6, 50 );
			$this->SetFont('Arial','B',20);
			$this->Cell(40);
			$this->Cell(150,40, 'Contablidad de Productos',0,0,'C');
			$this->Ln(50);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>