<?php
// La ruta __DIR__ . '/../modelo/Modelo.php' sube un nivel desde /controlador para encontrar /modelo.
require_once __DIR__ . '/../modelo/Modelo.php';

class ProductoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Producto();
    }

    // Acción por defecto: muestra la lista de productos
    public function index() {
        $productos = $this->modelo->listar();
        // Carga la vista de listar y le pasa los datos
        require_once __DIR__ . '/../vista/listar.php';
    }

    // Muestra el formulario de registro o procesa el registro
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validaciones básicas (pueden ser más complejas)
            $nombre = trim($_POST['nombre']);
            $stock = filter_var($_POST['stock'], FILTER_VALIDATE_INT);
            $precio = filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT);

            if ($nombre && $stock !== false && $precio !== false) {
                $this->modelo->registrar($nombre, $stock, $precio);
                header('Location: index.php');
                exit;
            }
        }
        // Si no es POST, muestra el formulario
        require_once __DIR__ . '/../vista/registrar.php';
    }

    // Muestra el formulario de edición o procesa la actualización
    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = trim($_POST['nombre']);
            $stock = filter_var($_POST['stock'], FILTER_VALIDATE_INT);
            $precio = filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT);

            if ($id && $nombre && $stock !== false && $precio !== false) {
                $this->modelo->editar($id, $nombre, $stock, $precio);
                header('Location: index.php');
                exit;
            }
        } else {
            // Obtiene el ID del producto de la URL y busca sus datos
            $id = $_GET['id'];
            $producto = $this->modelo->obtenerPorId($id);
            // Carga la vista de edición con los datos del producto
            require_once __DIR__ . '/../vista/editar.php';
        }
    }

    // Procesa la eliminación de un producto
    public function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->modelo->eliminar($id);
        }
        header('Location: index.php');
        exit;
    }
}
?>