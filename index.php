<?php
//error_reporting(0);
$errores= '';
include('conexion.php');


//INSERTAR
if(isset($_POST['agregar'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){ 
    $nombre=$_POST['txtnombre'];
    $tipo=$_POST['txttipo'];
    $ubicacion=$_POST['txtubicacion'];
    $inicio=$_POST['txtfi'];
    $final=$_POST['txtff'];
    $descripcion=$_POST['txtdescripcion'];
    $area=$_POST['txtarea'];
    $rendimientoi=$_POST['txtreni'];

    if($nombre == '' || $tipo == '' || $ubicacion == '' || $inicio == '' || $final == '' || $descripcion == '' || $rendimientoi == ''){
        $errores .="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        Rellene todos los datos correctamente.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }else{
    
    $sql="INSERT INTO c_datos (nombre,tipo_id,ubicacion,inicio,final,descripcion,area,rendimiento) VALUES ('$nombre','$tipo','$ubicacion','$inicio','$final','$descripcion','$area','$rendimientoi')";
    if (mysqli_query($conexion,$sql))
    {
       $errores .="<div class='alert alert-primary alert-dismissible fade show' role='alert'>
        Se agrego a la base de datos.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }else{
        //Añadir una excepción
        $errores .="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Falló.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
}
  }
}


//ACTUALIZAR
if(isset($_POST['actualizar'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){ 
    $id=$_POST['id'];
    $nombre=$_POST['txtnombre'];
    $tipo=$_POST['txttipo'];
    $ubicacion=$_POST['txtubicacion'];
    $inicio=$_POST['txtfi'];
    $final=$_POST['txtff'];
    $descripcion=$_POST['txtdescripcion'];
    $area=$_POST['txtarea'];
    $rendimientoi=$_POST['txtreni'];

    if($id == '' || $nombre == '' || $tipo == '' || $ubicacion == '' || $inicio == '' || $final == '' || $descripcion == '' || $rendimientoi == ''){
        $errores .="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        Ingrese todos los datos correctamente.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }else{
    
    $sql="UPDATE c_datos SET nombre='$nombre',tipo_id='$tipo',ubicacion='$ubicacion',inicio='$inicio',final='$final',descripcion='$descripcion',area='$area',rendimiento='$rendimientoi' WHERE id = '$id'";
    if (mysqli_query($conexion,$sql))
    {
       $errores .="<div class='alert alert-primary alert-dismissible fade show' role='alert'>
        Se realizó la modificación correctamente.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>"; 

    }else{
        //Añadir una excepción
        $errores .="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Falló.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
}
  }
}

//ELIMINAR
if(isset($_POST['eliminar'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){ 
    $id=$_POST['id'];
    if($id == ''){
        $errores .="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        Rellene los datos correctamente.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }else{
    $sqldel="DELETE FROM c_planificar WHERE cultivo_id='$id'";
    if (mysqli_query($conexion,$sqldel))
    {
      $sql="DELETE FROM c_datos WHERE id='$id'";
      if (mysqli_query($conexion,$sql))
      {
        $errores .="<div class='alert alert-success alert-dismissible fade show' role='alert'>
        Se eliminó satisfactoriamente.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>"; 

    }else{
        //Añadir una excepción
        $errores .="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Falló.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
  }
}
  }
}

//COMPLETADO
if(isset($_POST['completado'])){
  if($_SERVER['REQUEST_METHOD']=='POST'){ 
  $id=$_POST['id_plan'];
  if($id == ''){
      $errores .="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      Rellene los datos correctamente.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }else{
    $sql="UPDATE c_planificar SET completado=1 WHERE id_plan='$id'";
    if (mysqli_query($conexion,$sql))
    {
      $errores .="<div class='alert alert-success alert-dismissible fade show' role='alert'>
      Se marca cómo acompletada la tarea.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>"; 

  }else{
      //Añadir una excepción
      $errores .="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      Falló.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
}
}
}

require('vistas/index.php');
?>