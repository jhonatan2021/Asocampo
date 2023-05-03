<?php
	include 'print.php';
	require '../php/conexion.php';
	$records = $conn->prepare('SELECT p.foto,p.codigo,p.nombre,tp.nombre as Tipo,p.precio,p.oferta FROM tblproducto as p inner join tbltipo_producto as tp on p.tipo_producto= tp.codigo');
    $records->execute();
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(57,215,104);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(30,10,'Codigo',1,0,'C',1);
	$pdf->Cell(40,10,'Nombre',1,0,'C',1);
	$pdf->Cell(50,10,'Tipo de producto',1,0,'C',1);
	$pdf->Cell(40,10,'Precio',1,0,'C',1);
	$pdf->Cell(30,10,'Oferta',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	foreach($records as $row)
	{
		$pdf->Cell(30,6,utf8_decode($row['codigo']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['nombre']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['Tipo']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode('$'.number_format($row['precio'])),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['oferta'].'%'),1,1,'C');
	}
	$pdf->Output();
?>