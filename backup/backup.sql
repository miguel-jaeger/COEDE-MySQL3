BACKUP

-- Crear la base de datos
CREATE DATABASE gestion_productos;

-- Usar la base de datos recién creada
USE gestion_productos;

-- Crear la tabla de productos
CREATE TABLE productos (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    stock INT(11) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);