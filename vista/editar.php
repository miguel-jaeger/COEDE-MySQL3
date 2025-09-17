<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('imagenes/Whisk_duzm2q5odm.jpg');
            background-size: cover;
            background-position: center;
        }

        .container {
            width: 95%;
            max-width: 500px;
            padding: 25px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 20px;
        }

        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 6px; font-weight: bold; }

        input[type=text], input[type=number] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .btn-submit {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn-submit:hover { background-color: #0056b3; }

        .link-volver {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .link-volver:hover { text-decoration: underline; }
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
        <a href="index.php" class="link-volver">⬅ Volver a la lista</a>
    </div>
</body>
</html>
