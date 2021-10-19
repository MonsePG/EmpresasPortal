<?php  
    //session_start();
    // error reporting
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    //setting url
    $url = 'https://web-api-ps.herokuapp.com/api/v1/Productos/modificaProductosServicios';

    $Id_Categoria = $_POST['IdCategoria'];
    $Id_Empresa = $_POST['IdEmpresa'];
    $Nombre = $_POST['ProducService'];
    $Marca = $_POST['Marca'];
    $Precio = $_POST['Precio'];
    $Descripcion = $_POST['Descripcion'];
    $Activo = $_POST['Activo'];
    $TipoPS = $_POST['TipoPS'];
    $Id_PS = $_POST['IdPS'];

    $campos = array(
    'Id_Categoria' => $Id_Categoria, 
    'Id_Empresa' => $Id_Empresa, 
    'Nombre' => $Nombre, 
    'Marca' => $Marca, 
    'Precio' => $Precio, 
    'Descripcion' => $Descripcion, 
    'Activo' => $Activo, 
    'TipoPS' => $TipoPS, 
    'id' => $Id_PS, 
    );
    
        try {
        $ch = curl_init($url);
        $data_string = json_encode($campos);
        
        if (FALSE === $ch)
            throw new Exception('failed to initialize');
    
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);
            $RespuestaServer = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            $json = json_decode($data);
            $newVar = json_encode($json->msg,JSON_FORCE_OBJECT);
            echo($newVar);
            if($RespuestaServer == 200){
                header("location: InfoProducService.php");
                }
    } catch(Exception $e) {
    
        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
            
    }
?>