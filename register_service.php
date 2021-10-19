<?php
session_start();

$Nombre = $_POST['Nombre'];
$Correo = $_POST['Correo'];
$Password = $_POST['Password'];
$PasswordConfirm = $_POST['PasswordConfirm'];
$rol = 2;

$campos = array(
    'Nombre' => $Nombre, 
    'Correo' => $Correo, 
    'Contrasena' => $Password,
    'Id_Rol' => $rol
  );

  try {
    $campos_string = http_build_query($campos);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://web-api-ps.herokuapp.com/api/v1/sesion/altaUsuario");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $campos_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    $respuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $usuario = json_decode($data);
    curl_close($ch);

    if($respuesta == 201){
        //$Id = $usuario->msg->Id_Usuario;
        //$Rol_resp = $usuario->msg->Id_Rol;
        //$Correo_resp = $usuario->msg->Correo;
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <script>
    window.onload = function() {
        document.forms['iniciarSesion'].submit();
    }
    </script>
</head>

<body>
    <form action="login_validar.php" name="iniciarSesion" method="post">
        <input type="hidden" name="Correo" value="<?php echo $Correo; ?>">
        <input type="hidden" name="Password" value="<?php echo $Password; ?>">
    </form>
</body>

</html>


<?php
    }else {
        echo "Error". $usuario;
        $_SESSION['error'] = $usuario->msg;
        header("location: register.php?status=400");
    }
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
  }

?>