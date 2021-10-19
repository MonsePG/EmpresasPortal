<?php  
    session_start();

    $Id_Categoria = $_POST['Id_Categoria'];
    $Id_Empresa = $_POST['Id_Empresa'];
    $Nombre = $_POST['Nombre'];
    $Marca = $_POST['Marca'];
    $Precio = $_POST['Precio'];
    $Descripcion = $_POST['Descripcion'];
    $Imagen =  new CURLFile($_FILES["Imagen"]["tmp_name"], $_FILES["Imagen"]["type"], $_FILES["Imagen"]["name"]);
    $Activo = 1;
    $TipoPS = $_POST['TipoPS'];

    if( $_FILES['Imagen']['size'] > 1000000 ) {
        echo "No se pueden subir archivos con pesos mayores a 1MB";
      } else {
      
    $campos = array('Id_Categoria' => $Id_Categoria, 'Id_Empresa' => $Id_Empresa, 'Nombre' => $Nombre, 'Marca' => $Marca, 
    'Precio' => $Precio, 'Descripcion' => $Descripcion,  'Imagen' => $Imagen, 'Activo' => $Activo, 'TipoPS' => $TipoPS);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://web-api-ps.herokuapp.com/api/v1/Productos/altaProductoServicio");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $campos);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    $RespuestaServer = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    if($RespuestaServer == 200){
      header("location: InfoProducService.php");
      }
    }
?>
