<?php 
    if ($_SERVER["REQUES_METHOD"] == "POST"){
        $nombre = $_POST['nombre'];
        $tipoVehiculo  = $_POST['tipoVehiculo'];
        $numeroServis = $_POST['numeroServis'];

    }

    echo "<h1> Registro de Servicios</h1>";
    echo "<form> action='procesarFactura.php'method='post'>";
    echo "<input type='hidden name='nombre' value='$nombre'>" ;
    echo "<input type='hidden' name='tipoVehiculo' value='$tipoVehiculo'>" ;
    echo "<input type='hidden' name='numeroServis' value='$numeroServis'>" ;


    echo "<p?><strong>Nombre del Cliente :</strong> $nombre</p>" ;
    echo "<p?><strong>Tipo del Vehiculo :</strong> $nombre</p>" ;
    echo "<p?><strong>Nombre del Cliente :</strong> $nombre</p>" ;
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?form>"
?>