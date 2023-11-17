create database proyecto;
use proyecto; 

CREATE TABLE usuarios (
    nombre VARCHAR(255),
    email VARCHAR(255),
    usuario VARCHAR(255),
    password VARCHAR(255),
    rol VARCHAR(255)
);

CREATE TABLE productos (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    inventario INT NOT NULL
);

CREATE TABLE ventas (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombreCliente VARCHAR(255) NOT NULL,
    emailCliente VARCHAR(255) NOT NULL,
    totalCuenta DECIMAL(10,2) NOT NULL,
    fecha DATE
);

INSERT INTO usuarios 
  (nombre, email, usuario, password, rol)
VALUES
  ('Juanc', 'juanc@gmail', 'admin', '1234', 'vendedor');
  ('Juan', 'j@gmail', 'User1', '1234', 'cliente');
  ('Jose', 'jo@gmail', 'User2', '1234', 'cliente');
