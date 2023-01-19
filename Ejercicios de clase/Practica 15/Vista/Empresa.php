<?php
require_once 'Controlador/Cliente.php';
require_once 'Controlador/Empleado.php';

use Controlador\Cliente as ControladorCliente;
use Controlador\Empleado as ControladorEmpleado;

class Empresa
{
    public function visualizar()
    {
        $cliente = new ControladorCliente(123456, "Juan Perez", 25, 500.50);
        $empleado = new ControladorEmpleado(789012, "Maria Rodriguez", 30, "Gerente");

        $cliente->setMensaje("Bienvenido ");
        $empleado->setMensaje("Hola ");
        echo '<div class="container" style="width: 80%; margin: 0 auto;">
        <h2>Datos del cliente</h2>
        <div class="card" style="background-color: #f1f1f1; padding: 20px;">
            <p><strong>Datos personales:</strong> ' . $cliente->getDatosPersonales() . '</p>
            <p><strong>Crédito:</strong> ' . $cliente->getCredito() . '</p>
            <p><strong>Mensaje:</strong> ' . $cliente->getMensaje() . '</p>
        </div>
        <h2>Datos del empleado</h2>
        <div class="card" style="background-color: #f1f1f1; padding: 20px;">
            <p><strong>Datos personales:</strong> ' . $empleado->getDatosPersonales() . '</p>
            <p><strong>Puesto:</strong> ' . $empleado->getPuesto() . '</p>
            <p><strong>Mensaje:</strong> ' . $empleado->getMensaje() . '</p>
        </div>
    </div>';
    }
}
