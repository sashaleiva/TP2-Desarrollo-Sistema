<?php
require_once realpath($_SERVER["DOCUMENT_ROOT"]) . '/TP2-Desarrollo-Sistema/modelo/Autor.php';

if (isset($_POST["nombre"]) && $_POST["nombre"] != '') {
    $a = new Autor();
    $a->setDireccion($_POST["direccion"]);
    $a->setNombre($_POST["nombre"]);
    $a->Agregar();
    header('Location: ../../vistas/autores.php?m=Autor Agregado Con Exito');
} else {

    header('Location: ../../vistas/autores.php?e=Ingrese los datos necesarios');
}
