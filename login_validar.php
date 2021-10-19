<?php
session_start();
$Correo = $_POST['Correo'];
$Password = $_POST['Password'];

$campos = array(
    'Correo' => $Correo, 
    'Contrasena' => $Password,
  );

  try {
    $campos_string = http_build_query($campos);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://web-api-ps.herokuapp.com/api/v1/sesion/loginUsuario");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $campos_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    $decodificada = json_decode($data);
    $ok = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    //$ok = $resp->ok;

    if($ok == 200){
      $_SESSION['AutenticarUsuario'] = true;
      $_SESSION['Correo'] = $decodificada->msg->Correo;     
      $_SESSION['Id_Usuario'] = $decodificada->msg->Id_Usuario;  

      
      header("location: info_gral.php");
    }else {
        $_SESSION['error'] = $resp->msg;
        header("location: login.php?status=400");
    }
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
  }
