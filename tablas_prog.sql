CREATE TABLE Medicos
(
DNI VARCHAR(9) PRIMARY KEY, 
NOMBRE VARCHAR(20)
);
CREATE TABLE Personas
(
DNI VARCHAR(9) PRIMARY KEY,
NOMBRE VARCHAR(20),
EDAD int(3),
POSITIVO tinyint(1) DEFAULT NULL,
DNI_MED VARCHAR(9),
CONSTRAINT FK_CODM FOREIGN KEY (COD_M) REFER1ENCES
Medicos(DNI)
);
CREATE TABLE Hospital
(
CAMAS_LIBRES int(3),
NOMBRE_HOSPITAL VARCHAR(20),
PCR int(5),
ID_HOSPITAL int(5) AUTO_INCREMENT
);
CREATE TABLE Citas
(
ID_CITAS int(5),
Medico VARCHAR(20),
PCR int(5),
ID_HOSPITAL int(5) AUTO_INCREMENT
);

INSERT INTO Personas VALUES (12345678A, 'Calle valladolid');
INSERT INTO Personas VALUES (12345678B, 'Julia', 'Calle gandía');
INSERT INTO Personas VALUES (12345678C, 'Pedro', 'Avenida palencia');
INSERT INTO Personas VALUES (12345678D, 'Pepe', 'Calle avenida nº2');
INSERT INTO Personas VALUES (12345678E, 'Sara', 'Calle romeria');


INSERT INTO persona VALUES ('1A', 'Julio', 'Calle olmedo');
INSERT INTO persona VALUES ('2A', 'Sara', 'Calle pinta');
INSERT INTO persona VALUES ('3A', 'Pedro', 'Calle avenida');
INSERT INTO persona VALUES ('4A', 'Lara', 'Avenida palencia');
INSERT INTO persona VALUES ('5A', 'Pepe', 'Calle España');

INSERT INTO pedido VALUES (1, 'Julio', 'Calle olmedo', '1A');
INSERT INTO pedido VALUES (2, 'Sara', 'Calle pinta', '2A');
INSERT INTO pedido VALUES (3, 'Pedro', 'Calle avenida', '3A');
INSERT INTO pedido VALUES (4, 'Lara', 'Avenida palencia', '4A');
INSERT INTO pedido VALUES (5, 'Pepe', 'Calle España', '5A');


INSERT INTO envio VALUES (1, 'Julio', 'Calle olmedo', 1);
INSERT INTO envio VALUES (2, 'Sara', 'Calle pinta', 2);
INSERT INTO envio VALUES (3, 'Pedro', 'Calle avenida', 3);
INSERT INTO envio VALUES (4, 'Lara', 'Avenida palencia', 4);
INSERT INTO envio VALUES (5, 'Pepe', 'Calle españa', 5);


INSERT INTO tienda  VALUES (1, 'Calle comercial', 'Tienda1', 123);
INSERT INTO tienda  VALUES (2, 'Barrio comercial', 'Tienda2', 124);
INSERT INTO tienda  VALUES (3, 'Avenida comercial', 'Tienda3', 125);
INSERT INTO tienda  VALUES (4, 'Centro comercial', 'Tienda4', 126);
INSERT INTO tienda  VALUES (5, 'Calle centro', 'Tienda5', 127);

INSERT INTO users values ('1',guille,md5("123456"),'admin');