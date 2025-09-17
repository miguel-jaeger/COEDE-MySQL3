<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
     <title>Editar Producto</title>
     <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f4f4; }
        .container { max-width: 500px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type=text], input[type=number] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-submit { width: 100%; background-color: #007bff; color: white; padding: 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .btn-submit:hover { background-color: #0056b3; }
        .link-volver { display: block; margin-top: 15px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Producto</h2>
        <form action="index.php?accion=editar" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['id']); ?>">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock disponible:</label>
                <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($producto['stock']); ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
            </div>
            <input type="submit" value="Actualizar Producto" class="btn-submit">
        </form>
        <a href="index.php" class="link-volver">Volver a la lista</a>
    </div>
</body>
</html>