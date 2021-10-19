<?php
    session_start();
    // error reporting
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    //setting url
    $url = 'https://web-api-ps.herokuapp.com/api/v1/consultarpyme/cons_ByIDTodo';//Cambiar a la url correcta
    $id_empresa = $_SESSION['Id_Empresa'];
    //data
    $data = array("Id_Empresa" => $id_empresa);//Cambiar este dato a modo de que se reciba en base a lo necesario

    try {
        $ch = curl_init($url);
        $data_string = json_encode($data);
    
        if (FALSE === $ch)
            throw new Exception('failed to initialize');
            //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            $json = json_decode($data);
            $newVar = json_encode($json->msg,JSON_FORCE_OBJECT);
            echo($newVar);
            
    } catch(Exception $e) {
    
        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
    }
    
?>