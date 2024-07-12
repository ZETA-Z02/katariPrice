<?php
class Actions extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function dni()
    {
        // Datos
        $token = 'apis-token-8574.bPsef4wHOYjVwA7bFoDMZqLLrNrAMKiY';
        $dni = $_POST["dni"];

        // Iniciar llamada a API
        $curl = curl_init();

        // Buscar dni
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 2,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Referer: https://apis.net.pe/consulta-dni-api',
                    'Authorization: Bearer ' . $token
                ),
            )
        );

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            echo 'error del scraper: ' . curl_error($curl);
            exit;
        }

        curl_close($curl);
        // Datos listos para usar
        echo $response;


    }
    public function ruc()
    {
        $ruc = $_POST["ruc"];
        $consulta = file_get_contents('https://api.apis.net.pe/v1/ruc?numero=' . $ruc . '');
        echo $consulta;
    }
    public function caducidad(){
        $feCaducidad = $this->model->Caducidad();
        while ($row = mysqli_fetch_assoc($feCaducidad)) {
            //echo 'caducidad->'. $row['feLimite'] .'->Estado->'. $row['estado'].'->ID'. $row['idcotizacion'].'<br>';            
            try{
                $this->model->UpdateCotizacion($row['idcotizacion']);
                //echo $row['idcotizacion'];
            }catch(Exception $e){
                echo 'error->'. $e;    
            }
        }
    }
}