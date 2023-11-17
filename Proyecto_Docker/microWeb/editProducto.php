<?php
session_start(); // Inicia la sesión al principio del código

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si se recibieron los datos necesarios
    if (isset($_POST["productId"]) && isset($_POST["newStock"])) {
        // Obtener el ID del producto y el nuevo inventario desde el formulario
        $productId = $_POST["productId"];
        $newStock = $_POST["newStock"];

        // Construir el JSON con el nuevo inventario
        $data = json_encode(array("inventario" => $newStock));

        // URL de la API para actualizar el producto
        $url = "http://microProductos:3002/productos/" . $productId;

        // Inicializar cURL para enviar la solicitud PUT
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Content-Length: " . strlen($data)
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Realizar la solicitud PUT
        $response = curl_exec($ch);

        // Cerrar la conexión cURL
        curl_close($ch);

        if ($response === false) {
            echo "Error en la conexión: " . curl_error($ch);
            exit; // Salir sin redirección en caso de error
        } else {
            // La solicitud fue exitosa, puedes procesar la respuesta si es necesario
            $_SESSION["mensaje_exito"] = "Inventario actualizado exitosamente. ✅ ";
            header("Location: admin-prod.php");
            exit;
        }
    } else {
        echo "Faltan datos necesarios para la actualización.";
    }
} else {
    echo "Método de solicitud incorrecto. Debe ser una solicitud POST.";
}
?>

