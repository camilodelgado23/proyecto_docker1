<?php
    session_start();
    $us = $_SESSION["usuario"];
    if ($us == "") {
         header("Location: index.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Swiftstream</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #007bff;
            color: white;
        }
        .navbar .navbar-brand {
            font-size: 2rem;
        }
        .navbar .navbar-text a {
            color: white;
        }
        .container {
            padding: 2rem;
        }
        .table {
            background-color: white;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="usuario.php">Swiftstream</a>
            <span class="navbar-text">
                <?php echo "<a class='nav-link' href='logout.php'>Logout $us</a>"; ?>
            </span>
        </div>
    </nav>
    <div class="container">
        <form method="post" action="procesar.php">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Inventario</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $servurl = "http://microProductos:3002/productos";
                        $curl = curl_init($servurl);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($curl);

                        if ($response === false) {
                            curl_close($curl);
                            die("Error en la conexion");
                        }
                        curl_close($curl);
                        $resp = json_decode($response);
                        $long = count($resp);

                        for ($i = 0; $i < $long; $i++) {
                            $dec = $resp[$i];
                            $id = $dec->id;
                            $nombre = $dec->nombre;
                            $precio = $dec->precio;
                            $inventario = $dec->inventario;
                    ?>
                    <tr>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $precio; ?></td>
                        <td><?php echo $inventario; ?></td>
                        <td><?php echo '<input type="number" name="cantidad[' . $id . ']" value="0" min="0">'; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <input type="hidden" name="usuario" value="<?php echo $us; ?>">
            <input type="submit" class="btn btn-primary" value="Agregar a la orden">
        </form>
    </div>
<script>
    // Verifica si la variable de sesión existe
    var mensajeExito = "<?php echo isset($_SESSION['mensaje_exito']) ? $_SESSION['mensaje_exito'] : ''; ?>";
    
    // Si el mensaje de éxito existe, muestra un mensaje emergente o una notificación
    if (mensajeExito !== "") {
        alert(mensajeExito); // Muestra una alerta simple, puedes personalizar esto
        <?php unset($_SESSION['mensaje_exito']); ?>; // Esta línea de PHP no es necesaria en JavaScript
    }
</script>

</body>
</html>
