<?php

    $imagentmp = $_FILES['ImagenOP']['tmp_name'];
    $nombreimagen = basename($_FILES['ImagenOP']['name']);
    $campos = array('Imagen' => curl_file_create($imagentmp, $_FILES['ImagenOP']['type'], $nombreimagen));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://web-api-ps.herokuapp.com/api/v1/oferta_promo/subirImagenOferta');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $campos);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    $respuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if($respuesta == 200){
        header("location: info_ofertas_promo.php");
    }else{
        //header("location: info_ofertas_promo.php");
    }
?>