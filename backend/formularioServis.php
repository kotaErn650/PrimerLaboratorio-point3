<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $tipoVehiculo = $_POST['tipoVehiculo'];
    $numeroServis = $_POST['numeroServis'];

    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Registro de Servicios</title>
    </head>
    <body>
        <h1>Registro de Servicios</h1>
        <form action='procesarFactura.php' method='post'>
            <input type='hidden' name='nombre' value='$nombre'>
            <input type='hidden' name='tipoVehiculo' value='$tipoVehiculo'>
            <input type='hidden' name='numeroServis' value='$numeroServis'>";

    echo "<p><strong>Nombre del Cliente:</strong> $nombre</p>";
    echo "<p><strong>Tipo de Vehículo:</strong> $tipoVehiculo</p>";
    echo "<p><strong>Número de Servicios:</strong> $numeroServis</p>";

    for ($i = 1; $i <= $numeroServis; $i++) {
        echo "<h3>Servicio $i</h3>";
        echo "<label for='servicio$i'>Nombre del Servicio:</label>";
        echo "<input type='text' id='servicio$i' name='servicio$i' required><br><br>";

        echo "<label for='valor$i'>Costo del Servicio:</label>";
        echo "<input type='number' id='valor$i' name='valor$i' step='0.01' required><br><br>";
    }

    echo "<input type='submit' value='Generar Factura'>
        </form>
    </body>
    </html>";
}
?>