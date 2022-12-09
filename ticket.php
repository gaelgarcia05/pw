<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Times','B',16);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Cell(60,10,'MercaTec',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(100, 10, 'Producto', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Cantidad', 1, 0, 'C', 0);
    $this->Cell(40, 10, 'Subtotal', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require('conexion.php');
$sql = "SELECT * FROM pedido where Usuario = '$usuario'";
$resultado = $conexion->query($sql);
$conexion->close();

$pdf = new PDF();
$pdf-> AliasNbPages ();
$pdf->AddPage();
$pdf->SetFont('Times','',14);
$Total = 0;
if($resultado->num_rows > 0)
{
    while($row=$resultado->fetch_assoc())
    {
        $id_Producto = $row["ID_producto"];
        $Total += $row["Total"];
        $Nombre = $row['Nombre'];
        $pdf->Cell(100,10, utf8_decode($Nombre),'B' , 0, 'C', 0);
        $pdf->Cell(30,10, $row["Cantidad"],'B' , 0, 'C', 0);
        $pdf->Cell(40,10,'$'.number_format($row["Total"], 0, '.', ','),'B' , 1, 'C', 0);
    }   
}
else
{
    $pdf->cell(100,0,'Carrito Vacío',1,0,'C',0);
}
$pdf->Ln(30);
$pdf->Cell(190,10, 'Total: '.'$'.number_format($Total, 0, '.', ','),0 , 0, 'R', 0);

$pdf->Output();
?>