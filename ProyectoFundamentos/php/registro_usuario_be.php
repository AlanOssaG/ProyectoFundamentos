<?php

   include 'conexion_be.php';

   $nombre_completo = $_POST['nombre_completo'];
   $correo = $_POST['correo'];
   $usuario = $_POST['usuario'];
   $contrasena = $_POST['contrasena'];

   $query = "INSERT INTO usuarios(nombre_completo,  correo, usuario, contrasena) 
             VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";
    

 //Verificar que el correo no se repita en caso de existir en la base de datos
  
 $verificar_correo = mysqli_query($conexion, "SELECT * FROM  usuarios WHERE correo = '$correo' ");

 if(mysqli_num_rows($verificar_correo)>0){

     echo ' 
     <script>
             alert("Este correo ya se encuentra registrado, verifica que lo hayas ingresado correctamente o intenta con otro diferente");
             window.location = "../index.html";
     </script>
 
     ';
    exit();
 
}   

//Verificar que el nombre del usuario no se repite en caso de existir en la base de datos

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM  usuarios WHERE usuario = '$usuario' ");

if(mysqli_num_rows($verificar_usuario) > 0){

    echo ' 
    <script>
            alert("Este usuario ya se encuentra registrado, intenta con otro diferente");
            window.location = "../index.html";
    </script>

    ';
    exit();
}   


      

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
           <script>
               alert("Usuario almacenado exitosamente");
               window.location = "../index.html";
           </script>
        ';
    }else{
        echo '
        <script>
            alert("Error, Intentalo de nuevo");
            window.location = "../index.html";
        </script>
     ';
    }

    mysqli_close($conexion);   
?>

