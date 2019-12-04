CREATE DATABASE almacen;
USE almacen;
CREATE TABLE productos(
    ID int AUTO_INCREMENT NOT NULL,
    Nombre varchar(25) NOT NULL,
    Precio decimal(8,2) NOT NULL,
    Categoria varchar(25) NOT NULL,
    Marca varchar(25) NOT NULL,
    PRIMARY KEY(ID)
);
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES('Cacahuates',10,'Semillas','Golden Nuts');
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES ('Nuez',300,'Semillas','Frit');
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES ('Toreadas Habanero',14.5,'Frituras','Barcel');
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES ('Carlos V',6,'Dulces','Nestle');
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES ('Yakult',6,'Bebidas','Yakult');
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES ('Coca Cola',10,'Bebidas','Coca Cola');
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES ('Powarade',15,'Bebidas','Coca Cola');
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES ('Ciel',10,'Bebidas','Coca Cola');
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES ('Mantecadas',15.5,'Pan','Bimbo');
INSERT INTO productos(Nombre,Precio,Categoria,Marca) VALUES ('Torciditos',10,'Frituras','Cheetos');
