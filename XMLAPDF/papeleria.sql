CREATE DATABASE papeleria;
USE papeleria;
CREATE TABLE clientes(
    idCliente int AUTO_INCREMENT NOT NULL,
    nombreCliente varchar(30),
    apellidoPaternoCliente varchar(30),
    apellidoMaternoCliente varchar(30),
    direccionCliente varchar(50),
    telefonoCliente varchar(10),
    correoCliente varchar(30),
    nifCliente varchar(15),
    PRIMARY KEY(idCliente)
);
CREATE TABLE productos(
    idProducto int AUTO_INCREMENT NOT NULL,
    nombreProducto varchar(30),
    precioProducto numeric(6,3),
    PRIMARY KEY(idProducto)
);
CREATE TABLE empleados(
    idEmpleado int AUTO_INCREMENT NOT NULL,
    nombreEmpleado varchar(30),
    apellidoPaternoEmpleado varchar(30),
    apellidoMaternoEmpleado varchar(30),
    PRIMARY KEY(idEmpleado)
);

CREATE TABLE detalle_venta(
    idVenta int PRIMARY KEY AUTO_INCREMENT,
    idProducto int,
    cantidad int,
    FOREIGN KEY(idProducto) REFERENCES productos(idProducto)

);
CREATE TABLE ventas(
    idVenta int PRIMARY KEY AUTO_INCREMENT,
    idEmpleado int,
    idCliente int,
    fecha DATETIME NOT NULL,
    total decimal(8,3),
    FOREIGN KEY foreign_Empleado(idEmpleado) REFERENCES empleados(idEmpleado),
    FOREIGN KEY foreign_cliente(idCliente) REFERENCES clientes(idCliente),
    FOREIGN KEY foreign_venta(idVenta) REFERENCES detalle_venta(idVenta)
);

CREATE TABLE factura(
    idFactura int AUTO_INCREMENT PRIMARY KEY,
    idVenta int NOT NULL,
    idCliente int NOT NULL,
    FOREIGN KEY (idVenta) REFERENCES ventas(idVenta),
    FOREIGN KEY (idCliente) REFERENCES clientes(idCliente)
);
/*Productos
ALTER TABLE tablename AUTO_INCREMENT = 1
*/
INSERT INTO productos(nombreProducto,precioProducto) VALUES('Borrador pizarron',10);
INSERT INTO productos(nombreProducto,precioProducto) VALUES ('Pizarron',300);
INSERT INTO productos(nombreProducto,precioProducto) VALUES ('Marcador de color',14.5);
INSERT INTO productos(nombreProducto,precioProducto) VALUES ('Cartulina',6);
INSERT INTO productos(nombreProducto,precioProducto) VALUES ('Lapizero',6);
INSERT INTO productos(nombreProducto,precioProducto) VALUES ('Corrector',10);
INSERT INTO productos(nombreProducto,precioProducto) VALUES ('Lapizera',15);
INSERT INTO productos(nombreProducto,precioProducto) VALUES ('Colores',80);
INSERT INTO productos(nombreProducto,precioProducto) VALUES ('Lapiz',5.5);
INSERT INTO productos(nombreProducto,precioProducto) VALUES ('Goma',3);
/*
Empleados
 idEmpleado int AUTO_INCREMENT NOT NULL,
    nombreEmpleado varchar(30),
    apellidoPaternoEmpleado varchar(30),
    apellidoMaternoEmpleado varchar(30),
    PRIMARY KEY(idEmpleado)
*/

INSERT INTO empleados(nombreEmpleado,apellidoPaternoEmpleado,apellidoMaternoEmpleado) VALUES ('David','Montiel','Rosas');
/*
Clientes
CREATE TABLE clientes(
    idCliente int AUTO_INCREMENT NOT NULL,
    nombreCliente varchar(30),
    apellidoPaternoCliente varchar(30),
    apellidoMaternoCliente varchar(30),
    direccionCliente varchar(50),
    telefonoCliente varchar(10),
    correoCliente varchar(30),
    nifCliente varchar(15),
    PRIMARY KEY(idCliente)
*/
INSERT INTO clientes(nombreCliente,apellidoPaternoCliente,apellidoMaternoCliente,direccionCliente,telefonoCliente,correoCliente,nifCliente) VALUES ('Omar','Zamora','Ramon','Privada Macadamia Fraccionamiento Santa Teresa','5596325674','zaro98@hotmail.com','ZARO981201TT9');















