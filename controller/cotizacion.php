<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar Composer's autoloader
//require '../vendor/autoload.php';
require dirname(__DIR__) . '/vendor/autoload.php';
class Cotizacion extends Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function render()
	{
		$this->view->Render('cotizacion/index');
	}
	// INSERTAR PERSONA NATURAL
	public function natural()
	{
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$dni = $_POST['dni'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$sexo = $_POST['sexo'];
		$direccion = $_POST['direccion'];
		$ciudad = $_POST['ciudad'];

		if ($this->model->Natural($nombre,$apellidos,$dni,$sexo,$ciudad,$telefono,$email,$direccion)) {
			echo "REGISTRO EXITOSO";
		} else {
			echo "REGISTRO FALLIDO";
		}

	}
	// INSERTAR PERSONA JURIDICA
	public function juridica()
	{
		$razonsocial = $_POST['razonsocial'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$web = $_POST['web'];
		$ruc = $_POST['ruc'];
		$rubro = $_POST['rubro'];
		$direccion = $_POST['direccion'];

		if ($this->model->Juridica($razonsocial,$telefono,$email,$web,$ruc,$rubro,$direccion)) {
			echo "REGISTRO EXITOSO";
		} else {
			echo "REGISTRO FALLIDO";
		}

	}
	// OBTENER PERSONA NATURAL
	public function getNatural()
	{
		$data = $this->model->GetNatural();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idnatural" => $row['idnatural'],
				"nombres" => $row['nombres'],
				"dni" => $row['dni'],
				"telefono" => $row['telefono'],
				"email" => $row['email'],
				"direccion" => $row['direccion'],
				"ciudad" => $row['ciudad'],
			);
		}
		echo json_encode($json);
	}
	// OBTENER PERSONA JURIDICA
	public function getJuridica()
	{
		$data = $this->model->GetJuridica();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idjuridica" => $row['idjuridica'],
				"razonsocial" => $row['razonsocial'],
				"ruc" => $row['ruc'],
				"telefono" => $row['telefono'],
				"email" => $row['email'],
				"rubro" => $row['rubro'],
				"web" => $row['web'],
			);
		}
		echo json_encode($json);
	}
	// BUSCADORES
	public function searchNatural()
	{
		$nombres = $_POST['nombres'];
		$dni = $_POST['dni'];
		$data = $this->model->SearchNatural($nombres, $dni);
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idnatural" => $row['idnatural'],
				"nombres" => $row['nombres'],
				"dni" => $row['dni'],
				"telefono" => $row['telefono'],
				"email" => $row['email'],
				"direccion" => $row['direccion'],
				"ciudad" => $row['ciudad'],
			);
		}
		echo json_encode($json);
	}
	public function searchJuridica()
	{
		$razonsocial = $_POST['razonsocial'];
		$ruc = $_POST['ruc'];
		$data = $this->model->SearchJuridica($razonsocial, $ruc);
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idjuridica" => $row['idjuridica'],
				"razonsocial" => $row['razonsocial'],
				"ruc" => $row['ruc'],
				"telefono" => $row['telefono'],
				"email" => $row['email'],
				"rubro" => $row['rubro'],
				"web" => $row['web'],
			);
		}
		echo json_encode($json);
	}
	public function getCostosEstadistica()
	{
		$data = $this->model->GetCostosEstadistica();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idcosto" => $row['idcosto'],
				"idservicio" => $row['idservicio'],
				"descripcion" => $row['descripcion'],
				"precio" => $row['precio'],
			);
		}
		echo json_encode($json);
	}
	// OBTENER REDES
	public function getRedes()
	{
		$data = $this->model->GetRedes();
		$json = array();
		while ($row = mysqli_fetch_assoc($data)) {
			$json[] = array(
				"idcosto" => $row['idcosto'],
				"idservicio" => $row['idservicio'],
				"descripcion" => $row['descripcion'],
				"precio" => $row['precio'],
			);
		}
		echo json_encode($json);
	}
	// POST ESTADISTICA
	public function postEstadistica()
	{
		$id = $_POST['id'];
		$tipoCliente = $_POST['tipoCliente'];
		$idservicio = $_POST['servicio'];
		$idcosto = $_POST['costo'];
		$idpersonal = $_POST['idpersonal'];
		$dias = $_POST['dias'];
		$cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];
		$fecha = $_POST['fecha'];
		$descripcion = $_POST['descripcion'];
		$estado = "espera";

		if ($tipoCliente == 'natural') {
			if ($this->model->PostEstadisticaNatural($id, $idservicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $fecha)) {
				// echo "insercion natural con exito-modal de exito";
				$idcotizacion = $this->model->conn->conn->insert_id;
				$this->proforma([$idcotizacion],true);
				$data = $this->model->Proforma($idcotizacion);
				$this->email($data['email'],$idcotizacion);
				echo "insercion natural con exito-modal de exito";
			} else {
				echo "ERROR EN LA INSERCION";
			}
		} else if ($tipoCliente == 'juridica') {
			if ($this->model->PostEstadisticaJuridica($id, $idservicio, $idcosto, $idpersonal, $dias, $precio, $cantidad, $descripcion, $estado, $fecha)) {
				// echo "insercion juridica con exito-modal de exito";
				$idcotizacion = $this->model->conn->conn->insert_id;
				$this->proforma([$idcotizacion],true);
				$data = $this->model->Proforma($idcotizacion);
				$this->email($data['email'],$idcotizacion);	
			} else {
				echo "ERROR EN LA INSERCION";
			}
		}

	}
	// INSERTAR CALCULADOR DE SOFTWARE 
	public function calcSoftware()
	{
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$iddificultad = $_POST['iddificultad'];
		$idlenguaje = $_POST['idlenguaje'];
		$idaplicacion = $_POST['idaplicacion'];
		$costoservicio = $_POST['costoservicio'];
		$duracion = $_POST['duracionsemanas'];
		$costomantenimiento = $_POST['costomantenimiento'];
		$tiempomantenimiento = $_POST['tiempomantenimiento'];
		$opciones = $_POST['opciones'];
		$subtotal = $_POST['subtotal'];
		$igv = $_POST['igv'];
		$total = $_POST['total'];
		$idpersonal = $_POST['idpersonal'];
		if ($this->model->CalcSoftware($nombre, $descripcion, $iddificultad, $idlenguaje, $idaplicacion, $costoservicio, $duracion, $costomantenimiento, $tiempomantenimiento, $opciones, $subtotal, $igv, $total, $idpersonal)) {
			//echo var_dump($this->model->conn);
			echo $this->model->conn->conn->insert_id;
		} else {
			echo "ERROR CTM!!!!";
		}
	}
	// POST SOFTWARE 
	public function postSoftware()
	{
		$id = $_POST['id'];
      	$servicio = $_POST['servicio'];
      	$idcosto = $_POST['idcosto'];
      	$idpersonal = $_POST['idpersonal'];
      	$dias = $_POST['dias'];
      	$precio = $_POST['precio'];
      	$cantidad = $_POST['cantidad'];
      	$fecha = $_POST['fecha'];
      	$descripcion = $_POST['descripcion'];
      	$idcalcSoftware = $_POST['idcalcSoftware'];
		$tipoCliente = $_POST['tipoCliente'];
		$estado = "espera";
		if ($tipoCliente == 'natural') {
			if ($this->model->PostSoftwareNatural($id,$servicio,$idcosto,$idpersonal,$dias,$precio,$cantidad,$descripcion,$estado,$fecha,$idcalcSoftware)) {
				// echo "insercion natural con exito-modal de exito";
				$idcotizacion = $this->model->conn->conn->insert_id;
				$this->proforma([$idcotizacion],true);
				$data = $this->model->Proforma($idcotizacion);
				$this->email($data['email'],$idcotizacion);
			} else {
				echo "ERROR EN LA INSERCION";
			}
		} else if ($tipoCliente == 'juridica') {
			if ($this->model->PostSoftwareJuridica($id,$servicio,$idcosto,$idpersonal,$dias,$precio,$cantidad,$descripcion,$estado,$fecha,$idcalcSoftware)) {
				// echo "insercion juridica con exito-modal de exito";
				$idcotizacion = $this->model->conn->conn->insert_id;
				$this->proforma([$idcotizacion],true);
				$data = $this->model->Proforma($idcotizacion);
				$this->email($data['email'],$idcotizacion);
			} else {
				echo "ERROR EN LA INSERCION";
			}
		}
	}
	// POST REDES
	public function postRedes()
	{
		$nombre = $_POST['nombre'];
		$id = $_POST['id'];
		$servicio = $_POST['servicio'];
		$idcosto = $_POST['costo'];
		$idpersonal = $_POST['idpersonal'];
		$dias = $_POST['dias'];
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];
		$fecha = $_POST['fecha'];
		$descripcion = $_POST['descripcion'];
		$estado = "espera";
		$tipoCliente = $_POST['tipoCliente'];
		$res = $this->File($_FILES['excel'], $nombre, $id);
		if($res==false) {
			$res = "Sin Archivo(Excel) Disponible";
		}
		if ($tipoCliente == 'natural') {
			if ($this->model->PostRedesNatural($id,$servicio,$idcosto,$idpersonal,$dias,$precio,$cantidad,$descripcion,$estado,$fecha,$res)) {
				// echo "insercion redes natural con exito->modal de exito";
				$idcotizacion = $this->model->conn->conn->insert_id;
				$this->proforma([$idcotizacion],true);
				$data = $this->model->Proforma($idcotizacion);
				$this->email($data['email'],$idcotizacion);
			} else {
				echo "ERROR EN LA INSERCION REDES";
			}
		} else if ($tipoCliente == 'juridica') {
			if ($this->model->PostRedesJuridica($id,$servicio,$idcosto,$idpersonal,$dias,$precio,$cantidad,$descripcion,$estado,$fecha,$res)) {
				// echo "insercion redes juridica con exito->modal de exito";
				$idcotizacion = $this->model->conn->conn->insert_id;
				$this->proforma([$idcotizacion],true);
				$data = $this->model->Proforma($idcotizacion);
				$this->email($data['email'],$idcotizacion);
			} else {
				echo "ERROR EN LA INSERCION REDES";
			}
		}
	}
	public function email($email,$id=null)
    {
        // Instancia de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';           // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'jersson.z032@gmail.com';
            // Tu correo de Gmail ===>>>  fxws idjg pqjo hmjd
            $mail->Password = 'fxws idjg pqjo hmjd';   // Tu contraseña de Gmail o contraseña de aplicación
            $mail->SMTPSecure = 'tls';                   // Encriptación TLS
            $mail->Port = 587;                           // Puerto TCP

            // Remitente y destinatario
            $mail->setFrom('jersson.z032@gmail.com', 'jersson');
            $mail->addAddress($email, 'dota2'); // Añadir destinatario

            // Adjuntar archivos
            if($id!=null){
                $mail->addAttachment('/var/www/html/katariPrice/dumps/pdf/proforma:'.$id.'.pdf');
            }
            // Contenido del correo
            $mail->isHTML(true);                         // Configurar el correo en formato HTML
            $mail->Subject = 'Asunto del correo';
            $mail->Body = 'Cotizacion Solicitada';
            // $mail->AltBody = 'Este es el cuerpo del correo en texto plano para clientes de correo que no soportan HTML';

            $mail->send();
            echo 'El mensaje ha sido enviado';
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function proforma($nparam=null,$save=null)
    {

        $id = $nparam[0];
        $data = $this->model->Proforma($id);
        $fecha = date('d/m/Y H:i');
        $identificador = strlen($data['identificador']) == 8 ? 'DNI: ' . $data['identificador'] : 'RUC: ' . $data['identificador'];
        $igvPorcentaje = 0.18; // 18% IGV
        // Calcular el IGV
        $subtotal = $data['precio'] * $igvPorcentaje;

        # Incluyendo librerias necesarias #
        require __DIR__ . "/pdf.php";
        $pdf = new PDF_Code128('P', 'mm', 'Letter');
        $pdf->SetMargins(17, 17, 17);
        $pdf->AddPage();

        # Logo de la empresa formato png #
        $pdf->Image(constant('URL') . 'controller/img/icon.png', 165, 12, 35, 35, 'PNG');

        # Encabezado y datos de la empresa #
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("COTIZACION")), 0, 0, 'C');
        $pdf->Ln(9);
        $pdf->SetTextColor(32, 100, 210);
        $pdf->Cell(150, 15, iconv("UTF-8", "ISO-8859-1", strtoupper("KATARI")), 0, 0, 'L');

        $pdf->Ln(9);

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "RUC: 20606248092"), 0, 0, 'L');

        $pdf->Ln(5);

        $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Direccion: Barrio Porteño"), 0, 0, 'L');

        $pdf->Ln(5);

        $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Teléfono: 935 017 466"), 0, 0, 'L');

        $pdf->Ln(5);

        $pdf->Cell(150, 9, iconv("UTF-8", "ISO-8859-1", "Email: edagar@katari.com"), 0, 0, 'L');

        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 7, iconv("UTF-8", "ISO-8859-1", "Fecha de emisión:"), 0, 0);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(116, 7, iconv("UTF-8", "ISO-8859-1", $fecha), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper("Boleta Nro.")), 0, 0, 'C');

        $pdf->Ln(7);

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(12, 7, iconv("UTF-8", "ISO-8859-1", "Cajero:"), 0, 0, 'L');
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(134, 7, iconv("UTF-8", "ISO-8859-1", $_SESSION['username']), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", strtoupper($data['idcotizacion'])), 0, 0, 'C');

        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", "Cliente:"), 0, 0);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", $data['nombres']), 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(8, 7, iconv("UTF-8", "ISO-8859-1", $identificador), 0, 0, 'L');
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(60, 7, iconv("UTF-8", "ISO-8859-1", "            "), 0, 0, 'L');
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(7, 7, iconv("UTF-8", "ISO-8859-1", "Tel:" . $data['telefono']), 0, 0, 'L');
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", ""), 0, 0);
        $pdf->SetTextColor(39, 39, 51);


        $pdf->Ln(9);

        # Tabla de productos #
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetFillColor(23, 83, 201);
        $pdf->SetDrawColor(23, 83, 201);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(90, 8, iconv("UTF-8", "ISO-8859-1", "Descripción"), 1, 0, 'C', true);
        $pdf->Cell(15, 8, iconv("UTF-8", "ISO-8859-1", "Cant."), 1, 0, 'C', true);
        $pdf->Cell(15, 8, iconv("UTF-8", "ISO-8859-1", "Servicio"), 1, 0, 'C', true);
        $pdf->Cell(25, 8, iconv("UTF-8", "ISO-8859-1", "Precio"), 1, 0, 'C', true);
        $pdf->Cell(19, 8, iconv("UTF-8", "ISO-8859-1", "Desc."), 1, 0, 'C', true);
        $pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "Subtotal"), 1, 0, 'C', true);

        $pdf->Ln(8);


        $pdf->SetTextColor(39, 39, 51);
        /*----------  Detalles de la tabla  ----------*/
        $pdf->Cell(90, 7, iconv("UTF-8", "ISO-8859-1", wordwrap($data['descripcion'])), 'L', 0, 'C');
        $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", $data['cantidad']), 'L', 0, 'C');
        $pdf->Cell(25, 7, iconv("UTF-8", "ISO-8859-1", $data['tiposervicio']), 'L', 0, 'C');
        $pdf->Cell(19, 7, iconv("UTF-8", "ISO-8859-1", $data['precio']), 'L', 0, 'C');
        $pdf->Cell(19, 7, iconv("UTF-8", "ISO-8859-1", '00 S/.'), 'L', 0, 'C');
        $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", $subtotal), 'LR', 0, 'C');

        $pdf->Ln(7);
        /*----------  Fin Detalles de la tabla  ----------*/

        // Línea de cierre
        $pdf->Cell(90, 0, '', 'T'); // Línea de cierre para Descripción
        $pdf->Cell(15, 0, '', 'T'); // Línea de cierre para Cantidad
        $pdf->Cell(25, 0, '', 'T'); // Línea de cierre para Servicio
        $pdf->Cell(19, 0, '', 'T'); // Línea de cierre para Precio
        $pdf->Cell(19, 0, '', 'T'); // Línea de cierre para Desc.
        $pdf->Cell(32, 0, '', 'T'); // Línea de cierre para Subtotal

        $pdf->Ln(9);

        $pdf->SetFont('Arial', 'B', 9);

        // # Impuestos & totales #
        // $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
        // $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
        // $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "SUBTOTAL"), 'T', 0, 'C');
        // $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+00 S/"), 'T', 0, 'C');

        // $pdf->Ln(7);

        // $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
        // $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
        // $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "IVA (18%)"), '', 0, 'C');
        // $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "+ 00 S/"), '', 0, 'C');

        // $pdf->Ln(7);

        // $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
        // $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');


        // $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL A PAGAR"), 'T', 0, 'C');
        // $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "00 S/"), 'T', 0, 'C');

        // $pdf->Ln(7);

        // $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
        // $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
        // $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL PAGADO"), '', 0, 'C');
        // $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "00 S/"), '', 0, 'C');

        // $pdf->Ln(7);

        // $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
        // $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
        // $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "CAMBIO"), '', 0, 'C');
        // $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "00 S/"), '', 0, 'C');

        // $pdf->Ln(7);

        // $pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
        // $pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
        // $pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "USTED AHORRA"), '', 0, 'C');
        // $pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", "00 S/"), '', 0, 'C');

        // $pdf->Ln(12);

        // $pdf->SetFont('Arial', '', 9);

        // $pdf->SetTextColor(39, 39, 51);
        // $pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "    "), 0, 'C', false);

        // $pdf->Ln(9);

        # Nombre del archivo PDF #
        if($save){
            $pdf->Output('F', '/var/www/html/katariPrice/dumps/pdf/proforma:'.$id.'.pdf');
        }else{
            $pdf->Output("I", "reporte.pdf", true);
        }
        
    }
		
}