<?php
class Vehiculo {
    public $tipo;
    public $valorBase;

    public function __construct($tipo) {
        $this->tipo = $tipo;
        $this->valorBase = $this->calcularValorBase();
    }

    private function calcularValorBase() {
        switch ($this->tipo) {
            case 'Moto':
                return 30000;
            case 'Auto':
                return 50000;
            case 'Bicicleta':
                return 80000;
            case 'Camion':
                return 100000;
            case 'Bus':
                return 90000;
            default:
                return 0;
        }
    }
}

class Factura {
    public $vehiculo;
    public $servicios;
    public $numeroServis;

    public function __construct($vehiculo, $servicios, $numeroServis) {
        $this->vehiculo = $vehiculo;
        $this->servicios = $servicios;
        $this->numeroServis = $numeroServis;
    }

    public function calcularTotal() {
        $costoBase = $this->vehiculo->valorBase;
        $costoServis = array_sum($this->servicios);
        $descuento = $this->calcularDescuento($costoServis);
        $subTotal = $costoBase + $costoServis - $descuento;
        $iva = $subTotal * 0.19;
        $total = $subTotal + $iva;

        return [
            'costoBase' => $costoBase,
            'costoServis' => $costoServis,
            'descuento' => $descuento,
            'subTotal' => $subTotal,
            'iva' => $iva,
            'total' => $total
        ];
    }

    private function calcularDescuento($costoServis) {
        if ($this->numeroServis >= 1 && $this->numeroServis <= 2) {
            return 0;
        } elseif ($this->numeroServis >= 3 && $this->numeroServis <= 5) {
            return $costoServis * 0.05;
        } elseif ($this->numeroServis >= 6 && $this->numeroServis <= 8) {
            return $costoServis * 0.10;
        } else {
            return $costoServis * 0.15;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $tipoVehiculo = $_POST['tipoVehiculo'];
    $numeroServis = $_POST['numeroServis'];

    $servicios = [];
    for ($i = 1; $i <= $numeroServis; $i++) {
        $servicios[] = (float)$_POST["valor$i"];
    }

    $vehiculo = new Vehiculo($tipoVehiculo);
    $factura = new Factura($vehiculo, $servicios, $numeroServis);
    $total = $factura->calcularTotal();

    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Factura</title>
    </head>
    <body>
        <h1>Factura</h1>
        <p><strong>Nombre del Cliente:</strong> $nombre</p>
        <p><strong>Tipo de Vehículo:</strong> $tipoVehiculo</p>
        <p><strong>Costo Base:</strong> $" . number_format($total['costoBase'], 2) . "</p>
        <p><strong>Costo de Servicios:</strong> $" . number_format($total['costoServis'], 2) . "</p>
        <p><strong>Descuento:</strong> $" . number_format($total['descuento'], 2) . "</p>
        <p><strong>Subtotal:</strong> $" . number_format($total['subTotal'], 2) . "</p>
        <p><strong>IVA (19%):</strong> $" . number_format($total['iva'], 2) . "</p>
        <p><strong>Total a Pagar:</strong> $" . number_format($total['total'], 2) . "</p>
    </body>
    </html>";
}
?>
