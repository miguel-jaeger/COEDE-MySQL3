<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <style>
        /* Fondo con imagen difuminada */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center; /* Centrado horizontal */
            align-items: center;    /* Centrado vertical */
            position: relative;
            overflow: hidden;
        }


        /* Caja principal */
        .container {
            width: 95%;
            max-width: 900px;
            padding: 25px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
            border-radius: 10px;
        }

        h1 {
            color: #0056b3;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
        }

        .btn {
            padding: 6px 12px;
            border-radius: 4px;
            color: white;
        }

        .btn-registrar {
            display: inline-block;
            margin-bottom: 15px;
            background-color: #28a745;
            padding: 10px 15px;
        }

        .btn-editar {
            background-color: #ffc107;
        }

        .btn-eliminar {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.85;
        }
    </style>
</head>  
<body>
    <div class="container">
        <h1>Gestión de Productos</h1>
        <a href="index.php?accion=registrar" class="btn btn-registrar">Registrar Nuevo Producto</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['id']); ?></td>
                    <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($producto['stock']); ?></td>
                    <td>S/ <?php echo number_format($producto['precio'], 2); ?></td>
                    <td>
                        <a href="index.php?accion=editar&id=<?php echo $producto['id']; ?>" class="btn btn-editar">Editar</a>
                        <a href="index.php?accion=eliminar&id=<?php echo $producto['id']; ?>" class="btn btn-eliminar" onclick="return confirm('¿Está seguro de que desea eliminar este producto?');">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>    
</body>
</html>
