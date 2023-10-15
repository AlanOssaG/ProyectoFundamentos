<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

if(isset($_POST['correo']) && isset($_POST['contrasena'])){
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $result = mysqli_query($conexion, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        ?>

        <!DOCTYPE html>
        <html>
        

        <head>

            <title>Mostrar datos</title>
            

          </head>
        <body>
            <h2>Tabla de usuarios registrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                </tr>
                <?php
                $sql = "SELECT * FROM usuarios";
                $result = mysqli_query($conexion, $sql);

                if (!$result) {
                    die("Error en la consulta: " . mysqli_error($conexion));
                }

                while ($mostrar = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $mostrar['ID'] ?></td>
                        <td><?php echo $mostrar['nombre_completo'] ?></td>
                        <td><?php echo $mostrar['usuario'] ?></td>
                        <td><?php echo $mostrar['contrasena'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </body>
        </html>
    <?php
    } else {
        header("Location: index.html");
    }
}
?>
