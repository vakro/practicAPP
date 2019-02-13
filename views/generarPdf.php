<?php
	
	$idEst = $_GET['idEst'];

	require_once('../model/pdfModel.php');
	require_once('../model/generarPdfModel.php');
	$data = new generarPdf();
	


	//CREACION
	$pdf = new PDF();
	//Establecemos los márgenes izquierda, arriba y derecha:
	$pdf->SetMargins(20, 28 , 10); 
	$pdf->AliasNbPages();
	$pdf->AddPage();
	//$logoFile = "../img/fondohv.png";
	//$pdf->Image( $logoFile, 0, 0, 210 );
	
	
   //////////////////////////// SECCION INFORMACION PERSONAL////////////////////////////////////////// 	
	if (COUNT($data->consultarImagen($idEst)) !=0){
		foreach ($data->consultarImagen($idEst) as $row){
		  $pdf->Image($row['ruta'], 22,22,47);	
		}
	}else{

	}
  // $pdf->Image("../files/Captura3.jpg", 22,22,50,47);
	                      
    $pdf->SetFont('Arial','B',25);
    $pdf->SetXY(68,40);

	//imprimo datos

	if (COUNT($data->consultarHojaDeVida($idEst))!=0) {
	    foreach ($data->consultarHojaDeVida($idEst) as $row){
		$pdf->MultiCell(120,10, utf8_decode($row['nombre_estudiante'].' '.$row['apellidos_estudiante']),0,'R',0);	
		}
		$pdf->SetFont('Arial','B',12);
		$pdf->SetXY(68,70);
		foreach ($data->consultarHojaDeVida($idEst) as $row){
		$pdf->MultiCell(120,10, utf8_decode($row['desc_programa']),0,'R',0);	
		}
	    
	    //linea horizontal
	    $pdf->SetFillColor(191,191,191);
		$pdf->Cell(180,0.2,'',0,1,'C',1);
		$pdf->Ln(5);
	    
	    $pdf->SetFont('Arial','B',15);
		$pdf->Cell(180,8,'DATOS PERSONALES',0,0,'L',0);

		//tipo de letra para descripcion
		$pdf->SetFont('Arial','',12);
	    $pdf->Ln(10);
		//imprimo datos personales
	    foreach ($data->consultarHojaDeVida($idEst) as $row){
		$pdf->Cell(180,6,('N° Documento: '.number_format($row['numero_documento'])),0,1,'L');
		$pdf->Cell(180,6,('Fecha de nacimiento: '.$row['fecha_nacimiento']),0,1,'L');
		$pdf->Cell(180,6,('Teléfono: '.$row['telefono']),0,1,'L');
		$pdf->Cell(180,6,('Celular: '.$row['celular']),0,1,'L');
		$pdf->Cell(180,6,utf8_decode('Dirección: '.$row['direccion']),0,1,'L');
		$pdf->Cell(180,6,utf8_decode('E-mail: '.$row['correo']),0,1,'L');	
		}
	   
	   //////////////////////////// SECCION PERFIL PROFESIONAL ///////////////////////////////////////////  
	    //salto de linea
	   	$pdf->Ln(8);
	    //linea horizontal
	    $pdf->SetFillColor(191,191,191);
		$pdf->Cell(180,0.2,'',0,1,'C',1);		
	   
	    //titulo perfil profesional
	    $pdf->SetFillColor(66,123,198);
	    $pdf->SetTextColor(255,255,255);
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(180,8,'PERFIL PROFESIONAL',0,0,'C',1);
	    $pdf->Ln(8);
	    
	    //linea horizontal
	    $pdf->SetFillColor(191,191,191);
		$pdf->Cell(180,0.2,'',0,1,'C',1);
		$pdf->Ln(5);

	    //tipo de letra para descripcion del perfil
	    $pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial','',12);

		//imprimo el perfil
	    foreach ($data->consultarHojaDeVida($idEst) as $row){
		$pdf->MultiCell(180,6, utf8_decode($row['perfil_profesional']),0,'L',0);	
		}
	}else{

	}

//////////////////////////// SECCION FORMACION ACADEMICA /////////////////////////////////////////// 
    //salto de linea
    $pdf->Ln(5);

     //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);
	
    //titulo formacion academica
    $pdf->SetFillColor(66,123,198);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(180,8,utf8_decode('FORMACIÓN ACADÉMICA'),0,0,'C',1);
    $pdf->Ln(8);
    
    //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);
	$pdf->Ln(5);
   
     //Listar datos formación academica
    $pdf->SetTextColor(0,0,0);  
    $pdf->SetFont('Arial','',12);

   	if (COUNT($data->consultarformacion_academica($idEst))!=0) {

		foreach ($data->consultarformacion_academica($idEst) as $row){
			$pdf->MultiCell(180,6,utf8_decode($row['titulo']),0,'L',0);
			$pdf->MultiCell(180,6,utf8_decode($row['institucion']),0,'L',0);
			$pdf->Cell(40,6,utf8_decode($row['fecha_formacion']),0,1,'L');
			$pdf->Ln(2);
		}

	}else{

	}

//////////////////////////// SECCION OTROS ESTUDIOS ////////////////////////////////////////////////    
    //Salto de linea
    $pdf->Ln(3);
    //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);

    //titulo otros estudios
    $pdf->SetFillColor(66,123,198);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(180,8,utf8_decode('OTROS ESTUDIOS'),0,0,'C',1);
    $pdf->Ln(8);
    
    //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);
	$pdf->Ln(5);
   
     //Listar datos otros estudios 
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);
    if (COUNT($data->consultarotros_estudios($idEst))!=0) {
	
		foreach ($data->consultarotros_estudios($idEst) as $row){
			$pdf->MultiCell(180,6,utf8_decode($row['titulo']),0,'L',0);
			$pdf->MultiCell(180,6,utf8_decode($row['institucion']),0,'L',0);
			$pdf->Cell(40,6,utf8_decode($row['fecha_estudios']),0,1,'L');
			$pdf->Ln(2);
		}
	}

////////////////////////////SECCION IDIOMAS//////////////////////////////////////////////////////	
	//Salto de linea
    $pdf->Ln(3);
    //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);

    //TITULO IDIOMAS
    $pdf->SetFillColor(66,123,198);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(180,8,utf8_decode('IDIOMAS'),0,0,'C',1);
    $pdf->Ln(8);
    
    //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);
	$pdf->Ln(5);
   
     //Listar idiomas 
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);

     if (COUNT($data->consultarIdiomas($idEst))!=0) {
		foreach ($data->consultarIdiomas($idEst) as $row){
			$pdf->Cell(60,6,utf8_decode($row['nombre_idioma'].' - '.$row['desc_nivel']),0,1,'L');
			$pdf->Ln(3);
		}
	}else{

	}

//////////////////////////// SECCION EXPERIENCIA LABORAL /////////////////////////////////////////////
    //Salto de linea
    $pdf->Ln(3);
    //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);
    //titulo experiencia
    $pdf->SetFillColor(66,123,198);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(180,8,utf8_decode('EXPERIENCIA LABORAL'),0,0,'C',1);
    $pdf->Ln(8);
    
    //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);
	$pdf->Ln(5);
   
     //Listar experiencia
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);

    if (COUNT($data->consultarExperienciaLaboral($idEst))!=0) {
		foreach ($data->consultarExperienciaLaboral($idEst) as $row){
			$pdf->MultiCell(180,6,utf8_decode($row['cargo'].', '.$row['nombre_empresa']),0,'L',0);
			$pdf->MultiCell(180,6,utf8_decode($row['desc_actividades']),0,'L',0);
			$pdf->MultiCell(180,6,utf8_decode($row['nombre_ciudad'].', '.$row['fecha_inicio_exp'].' - '.$row['fecha_fin_exp']),0,'L',0);
		    $pdf->Ln(2);
		}
	}else{

	}
	
//////////////////////////// SECCION REFERENCIAS /////////////////////////////////////////////
    //Salto de linea
    $pdf->Ln(3);
    //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);

    //titulo referencias
    $pdf->SetFillColor(66,123,198);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(180,8,utf8_decode('REFERENCIAS'),0,0,'C',1);
    $pdf->Ln(8);
    
    //linea horizontal
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(180,0.2,'',0,1,'C',1);
	$pdf->Ln(5);
   
     //Listar referencia
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);

    if (COUNT($data->consultarReferencias($idEst))!=0) {
		foreach ($data->consultarReferencias($idEst) as $row){
			$pdf->MultiCell(180,6,utf8_decode($row['nombre_completo']),0,'L',0);
			$pdf->SetFont('Arial','',12);
			$pdf->MultiCell(180,6,utf8_decode('Cargo: '.$row['cargo']),0,'L',0);
			$pdf->Cell(180,6,utf8_decode('Telefono: '.$row['numero_contacto']),0,1,'L');
			$pdf->Cell(180,6,utf8_decode($row['empresa'].' / '.$row['nombre_ciudad']),0,1,'L');
			$pdf->Ln(3);
		}
	}else{

	}

//////////////////////////// SECCION FIRMA /////////////////////////////////////////////
    //Salto de linea
    $pdf->Ln(15);
    //linea horizontal
    $pdf->SetX(68);
    $pdf->SetFillColor(191,191,191);
	$pdf->Cell(80,0.2,'',0,1,'C',1);

	$pdf->SetFont('Arial','B',12);
	if (COUNT($data->consultarHojaDeVida($idEst))!=0) {
	    foreach ($data->consultarHojaDeVida($idEst) as $row){
		$pdf->Cell(180,6, utf8_decode($row['nombre_estudiante'].' '.$row['apellidos_estudiante']),0,1,'C');
			
		}
		$pdf->SetFont('Arial','I',10);
		//$pdf->SetXY(68,70);
		foreach ($data->consultarHojaDeVida($idEst) as $row){
		$pdf->Cell(180,6, utf8_decode($row['desc_programa']),0,0,'C');	
		}
	}else{

	}	

	$pdf->Output();
?>