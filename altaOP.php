<?php  
    session_start();

    $Id_Empresa = $_POST['Id_Empresa'];
    $Id_Categoria = $_POST['Id_Categoria'];
    $Id_Subcategoria = $_POST['Id_Subcategoria'];
    $Id_PS = $_POST['Id_PS'];
    $TipoOP = $_POST['TipoOP'];
    $Nombre = $_POST['Nombre'];
    $Objetivo = $_POST['Objetivo'];
    $Ciudad = $_POST['Ciudad'];
    $FechaInicio = $_POST['FechaInicio'];
    $Hora_inicio = $_POST['Hora_inicio'];
    $FechaFin = $_POST['FechaFin'];
    $Hora_fin = $_POST['Hora_fin'];
    $EdadInicio = $_POST['EdadInicio'];
    $EdadFin = $_POST['EdadFin'];
    $SEXO = $_POST['SEXO'];
    $Activo = 1;
    $Imagen =  new CURLFile($_FILES["Imagen"]["tmp_name"], $_FILES["Imagen"]["type"], $_FILES["Imagen"]["name"]);


    if( $_FILES['Imagen']['size'] > 1000000 ) {
        echo "No se pueden subir archivos con pesos mayores a 1MB";
      } else {
      
    $campos = array('Id_Empresa' => $Id_Empresa,'Id_Categoria' => $Id_Categoria, 'Id_Subcategoria' => $Id_Subcategoria, 'Id_PS' => $Id_PS, 'TipoOP' => $TipoOP, 
    'Nombre' => $Nombre, 'Objetivo' => $Objetivo, 'Ciudad' => $Ciudad, 'FechaInicio' => $FechaInicio, 'Hora_inicio' => $Hora_inicio, 'FechaFin' => $FechaFin, 
    'Hora_fin' =>  $Hora_fin, 'EdadInicio' =>  $EdadInicio, 'EdadFin' =>  $EdadFin, 'SEXO' =>  $SEXO, 'Activo' =>  $Activo, 'Imagen' => $Imagen);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://web-api-ps.herokuapp.com/api/v1/oferta_promo/altaPromoOferta");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $campos);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    $RespuestaServer = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    if($RespuestaServer == 200){
      header("location: info_ofertas_promo.php");
      }
    }
?>
