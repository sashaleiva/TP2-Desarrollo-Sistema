<?php
require_once realpath($_SERVER["DOCUMENT_ROOT"]) . '/TP2-Desarrollo-Sistema/modelo/Autor.php';
require_once realpath($_SERVER["DOCUMENT_ROOT"]) . '/TP2-Desarrollo-Sistema/modelo/Libro.php';

if (isset($_POST["titulo"]) && $_POST["titulo"] != '') {
    $l = new Libro();
    $l->setTitulo($_POST["titulo"]);
    $l->setIdAutor($_POST["autor"]);
    $l->Agregar();
    header('Location: ../../vistas/libros.php?m=Libro Agregado Con Exito');
} else {
    header('Location: ../../vistas/libros.php?e=Ingrese los datos necesarios');
}
