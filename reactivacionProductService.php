<?php  
    session_start();

    $Activo = $_POST['producto_id'];
      
    $url = 'https://web-api-ps.herokuapp.com/api/v1/Productos/reactivarProductoServicio';

    $campos = array('Id_PS' => $Activo);
    //$string_campos = http_build_query($campos);
    var_dump($campos);
    
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
