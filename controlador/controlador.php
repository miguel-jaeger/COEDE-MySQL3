<?php

//Controlador: Este archivo, que recibe la petición, valida datos, llama al modelo y carga la vista adecuada.
//Este controlador gestiona las operaciones básicas de un CRUD (Crear, Leer, Actualizar, Eliminar) para productos usando un patrón MVC:

// La ruta __DIR__ . '/../modelo/Modelo.php' sube un nivel desde /controlador para encontrar /modelo.
require_once __DIR__ . '/../modelo/Modelo.php'; //importa el archivo del modelo, que contiene la clase Producto

class ProductoController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Producto(); //crea un objeto de la clase Producto
    }

    // Acción por defecto: muestra la lista de productos
    public function index()
    {
        $productos = $this->modelo->listar(); //Llama al modelo para obtener todos los productos
        // Carga la vista de listar y le pasa los datos
        require_once __DIR__ . '/../vista/listar.php'; // carga la vista listar.php pasando los datos $productos.
    }

    // Muestra el formulario de registro o procesa el registro
    public function registrar()
    { //Recoge datos del formulario
        // Validaciones básicas (pueden ser más complejas)
        if (isset($_POST['nombre'], $_POST['stock'], $_POST['precio'])) {
            $nombre = $_POST['nombre'];
            $stock = $_POST['stock'];
            $precio = $_POST['precio'];
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
    public function editar()
    {
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
    public function eliminar()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->modelo->eliminar($id);
        }
        header('Location: index.php');
        exit;
    }
}
