<?php
// Usamos __DIR__ para una ruta más segura y confiable.
require_once __DIR__ . '/controlador/controlador.php';

// Creamos una instancia del controlador principal
$controlador = new ProductoController();

// Obtenemos la 'accion' de la URL (ej: index.php?accion=registrar)
// Si no existe, la acción por defecto será 'index'.
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'index';

// Verificamos si el método (la acción) existe en la clase del controlador
if (method_exists($controlador, $accion)) {
    // Si existe, llamamos a ese método
    $controlador->$accion();
} else {
    // Si no existe una acción con ese nombre, mostramos la página principal.
    // Podrías también mostrar una página de error 404.
    $controlador->index();
}
?>