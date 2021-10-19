<?php
    $ch = curl_init();
    //Configuramos mediante CURLOPT_URL la URL de nuestra API en este caso de categorías
    curl_setopt($ch, CURLOPT_URL, 'https://web-api-ps.herokuapp.com/api/v1/categorias/consultaCategorias');
    //Abrimos conexión cURL y la almacenamos en la variable $ch.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // 0 o 1, indicamos que no queremos al Header en nuestra respuesta
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //Ejecuta la petición HTTP y almacena la respuesta en la variable $data.
    $data = curl_exec($ch);
    //Cerramos la conexión cURL
    curl_close($ch);
    //Se decodifica la variable data para poder acceder a todo el arreglo de datos
    $json = json_decode($data);
    //Por cada json (que es un objeto {}) en el apartado msg que es el que contiene el array ([]) con los datos
    //se tendrá cada elemento
    $newVar = json_encode($json->msg,JSON_FORCE_OBJECT);
    echo($newVar);
?>