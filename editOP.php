<?php  
    //session_start();
    // error reporting
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    //setting url
    $url = 'https://web-api-ps.herokuapp.com/api/v1/oferta_promo/modificaPromoOferta';

    $Id_Empresa = $_POST['Id_Empresa'];
    $Id_Categoria = $_POST['Id_Categoria'];
    $Id_Subcategoria = $_POST['Id_Subcategoria'];
    $Id_PS = $_POST['Id_PS'];
    $TipoOP = $_POST['TipoOP'];
    $Nombre = $_POST['OferPromo'];
    $Objetivo = $_POST['Objetivo'];
    $Ciudad = $_POST['Cd'];
    $FechaInicio = $_POST['FechaInicio'];
    $Hora_inicio = $_POST['Hora_inicio'];
    $FechaFin = $_POST['FechaFin'];
    $Hora_fin = $_POST['Hora_fin'];
    $EdadInicio = $_POST['EdadInicio'];
    $EdadFin = $_POST['EdadFin'];
    $SEXO = $_POST['SEXO'];
    $Activo = $_POST['Activo'];
    $Id_Oferta = $_POST['IdOFerta'];
    //los que están dentro del corchete es el nombre que ke debo pasar a los inputs en el edit_ofertapromo

    $campos = array(
    'Id_Empresa' => $Id_Empresa,
    'Id_Categoria' => $Id_Categoria, 
    'Id_Subcategoria' => $Id_Subcategoria, 
    'Id_PS' => $Id_PS, 
    'TipoOP' => $TipoOP, 
    'Nombre' => $Nombre, 
    'Objetivo' => $Objetivo, 
    'Ciudad' => $Ciudad, 
    'FechaInicio' => $FechaInicio, 
    'Hora_inicio' => $Hora_inicio, 
    'FechaFin' => $FechaFin, 
    'Hora_fin' => $Hora_fin, 
    'EdadInicio' => $EdadInicio, 
    'EdadFin' => $EdadFin, 
    'SEXO' => $SEXO, 
    'Activo' => $Activo, 
    'id' => $Id_Oferta, 
    //los primeros se jalan de la api
    //los segundos son los mismos del apartado de arriba
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
                header("location: info_ofertas_promo.php");
                }
    } catch(Exception $e) {
    
        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
            
    }
?>