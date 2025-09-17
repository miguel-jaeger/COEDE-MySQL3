<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Producto</title>
    <style>
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background-image: url('imagenes/Whisk_duzm2q5odm.jpg'); 
            background-size: cover;   /* Ajusta la imagen a toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-attachment: fixed; /* Hace que el fondo se quede fijo */
            margin: 0;
            padding: 0;
        }
        .container { 
            max-width: 500px; 
            margin: 40px auto; 
            padding: 20px; 
            background-color: rgba(255, 255, 255, 0.9); /* Fondo semitransparente */
            box-shadow: 0 0 10px rgba(0,0,0,0.3); 
            border-radius: 8px; 
        }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type=text], input[type=number] { 
            width: 100%; padding: 10px; 
            border: 1px solid #ccc; border-radius: 4px; 
            box-sizing: border-box; 
        }
        .btn-submit { 
            width: 100%; 
            background-color: #28a745; 
            color: white; 
            padding: 12px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 16px; 
        }
        .btn-submit:hover { background-color: #218838; }
        .link-volver { 
            display: block; 
            margin-top: 15px; 
            text-align: center; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar Nuevo Producto</h2>
        <form action="index.php?accion=registrar" method="post">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock disponible:</label>
                <input type="number" id="stock" name="stock" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" name="precio" required>
            </div>
            <input type="submit" value="Registrar Producto" class="btn-submit">
        </form>
        <a href="index.php" class="link-volver">Volver a la lista</a>
    </div>
</body>
</html>
