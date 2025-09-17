<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; color: #333; }
        .container { max-width: 900px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        a { text-decoration: none; }
        .btn { padding: 5px 10px; border-radius: 4px; color: white; }
        .btn-registrar { display: inline-block; margin-bottom: 20px; background-color: #28a745; padding: 10px 15px; }
        .btn-editar { background-color: #ffc107; }
        .btn-eliminar { background-color: #dc3545; }
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