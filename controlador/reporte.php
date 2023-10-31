<?php
class Reporte{
    function prueba(){
        require_once "Librerias/FPDF/fpdf.php";
        $pdf = new FPDF("p","mm","Letter");//paso 1 crear e instanciar el objeto
        $pdf ->AddPage();//paso 2 agregar una pagina
        $pdf->SetFont('Courier','i','20');//paso 3 definir la fuente
        $pdf->Cell(40,18,'Sistemas',1,0,'c');//paso 4 agregar una celda
        $pdf->Cell(40,10,'Sistemas','BR');//paso 4 agregar una celda
        $pdf->Cell(40,10,'Sistemas','Bl');//paso 4 agregar una celda
        $pdf->Cell(40,10,'Sistemas','BR');//paso 4 agregar una celda
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(40,18,'Sistemas',1,0,'c');//paso 4 agregar una celda
        $pdf->Ln();
        $pdf->Ln();


        $pdf->Cell(40,10,'Sistemas',1,0,'C');//paso 4 agregar una celda
        $pdf->Ln();
        $pdf->Ln();

        $pdf->Cell(40,10,'Sistemas','BR');//paso 4 agregar una celda
        $pdf->Cell(40,10,'Sistemas','BR');//paso 4 agregar una celda
        $pdf->Output();//paso 5 salida del Archivo

    }
    function compra(){

        //generamos código qr en una imágen
        require_once "Librerias/phpqrcode/qrlib.php";
        $codeContents= base64_encode("Sistemas Informáticos 2023").date("Y-m-d H:i:s");
        $filePatch = "qr.png";
        $filePatch = date("Y_m_d_H_i_s"). $filePatch;
        $filePatch = "imagenes/qr/". $filePatch;
        QRcode::png($codeContents, $filePatch);


        /*
         require_once "Librerias/phpqrcode/qrlib.php";
        $codeContents= base64_encode("Sistemas Informáticos 2023").date("Y-m-d H:i:s");
        $filePatch = "imagenes/qr/qr.png";
        
        QRcode::png($codeContents, $filePatch);
        
        */ 
        //echo $codeContents;
        //echo base64_decode($codeContents);
        //exit();
        

        //Realizar la consulta a la base de datos
        require_once "modelo/CompraModelo.php";
        $compraModelo = new CompraModelo();
        $compraModelo->establecerTabla('compra c, productos p');
        $compras=$compraModelo->seleccionar('p.nombre, c.cantidad, c.fecha','
        c.estado=1 and c.id_producto=p.id_producto');


        //require_once "Librerias/FPDF/fpdf.php";
        $pdf = new PDF("p","mm","Letter");//paso 1 crear e instanciar el objeto
        $pdf->AliasNbPages();
        $pdf ->AddPage();
        
        //$pdf-> Ln();
        $pdf->SetFont('Arial','','14');

        //TABLA COMPRAS (cuerpo)
        $i=1;
        foreach($compras as $com){

            $pdf->Cell(20,10,$i,1,0,"R");
            $pdf->Cell(80,10,$com['nombre'],1,0,"L");
            $pdf->Cell(40,10,$com['cantidad'],1,0,"R");
            $pdf->Cell(60,10,$com['fecha'],1,0,"C");
            $i++;
            $pdf->Ln();
        }
        $pdf->Output();
    }


    function producto(){

        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        $productoModelo->establecerTabla('productos');
        $productos=$productoModelo->seleccionar('codigo, nombre, precio, descripcion, foto, fecha');


        require_once "Librerias/FPDF/fpdf.php";
        $pdf = new FPDF("p","mm","Letter");//paso 1 crear e instanciar el objeto
        $pdf ->AddPage();
        $pdf->SetFont('Arial','B','14');
        $pdf->Cell(200,10,'REPORTE DE PRODUCTOS',"B",0,"C");
        $pdf-> Ln();
        $pdf->SetFont('Arial','B','10');
        $pdf->Cell(200,10,'Dina Mishel Mamani Figueredo',"B",0,"C");
        $pdf-> Ln();
        //TABLADE COMPRAS (cabecera)
        $pdf->SetFont('Arial','B','12');
        $pdf->Cell(10,10,'Nro',1,0,"C");
        $pdf->Cell(18,10,'Codigo',1,0,"C");
        $pdf->Cell(35,10,'Producto',1,0,"C");
        $pdf->Cell(20,10,'Precio',1,0,"C");
        $pdf->Cell(35,10,'Descripcion',1,0,"C");
        $pdf->Cell(47,10,'Foto',1,0,"C");
        $pdf->Cell(35,10,'Fecha',1,0,"C");
        $pdf-> Ln();
        $pdf->SetFont('Arial','','10');

        //TABLA COMPRAS (cuerpo)
       $i=1;
        foreach($productos as $pro){

            $pdf->Cell(10,10,$i,1,0,"R");
            $pdf->Cell(18,10,$pro['codigo'],1,0,"L");
            $pdf->Cell(35,10,$pro['nombre'],1,0,"R");
            $pdf->Cell(20,10,$pro['precio'],1,0,"R");
            $pdf->Cell(35,10,$pro['descripcion'],1,0,"R");
            $pdf->Cell(47,10,$pro['foto'],1,0,"R");
            $pdf->Cell(35,10,$pro['fecha'],1,0,"C");
            $i++;
            $pdf->Ln();
        }
        $pdf->Output();
    }
}
require_once "Librerias/FPDF/fpdf.php";
class PDF extends FPDF{
    function Header()
    {
        
        //adicionamoso imagen al reporte
        $this->Image('imagenes/logos/sistemas.png',10,8,20,20);
        //mostramos la imagen qr en la cabezera
        $this->Image('imagenes/qr/qr.png',180,8,20,20);

        $this->SetFont('Arial','B','16');
        $this->Cell(200,10,'REPORTE DE COMPRAS',"",0,"C");
        $this-> Ln();
        $this-> Ln();
        //TABLADE COMPRAS (cabecera)
        $this->Cell(20,10,'Nro',1,0,"C");
        $this->Cell(80,10,'Producto',1,0,"C");
        $this->Cell(40,10,'Cantidad',1,0,"C");
        $this->Cell(60,10,'Fecha',1,0,"C");
        $this-> Ln();
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->Cell(180,10,'Sistesma creado por Mishel Mamani','T',0,'C');
        $this->Cell(20,10, 'Pag. '.$this->PageNo().'/{nb}','T',0,'C');
    }
}
?>