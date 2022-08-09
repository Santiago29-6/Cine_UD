CREATE DATABASE CINE_UD;
CREATE TABLE usuario(
    cedula int NOT NULL,
    nombre VARCHAR(25) NOT NULL,
    apellido VARCHAR(25) NOT NULL,
    correo VARCHAR(25) NOT NULL,
    contraseña VARCHAR(100) NOT NULL,
    PRIMARY KEY(cedula)
);
CREATE TABLE empleado(
    id int NOT NULL,
    nombre VARCHAR(25) NOT NULL,
    apellido VARCHAR(25) NOT NULL,
    contraseña VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE administrador(
    id int NOT NULL,
    contraseña VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE cine(
    id int NOT NULL,
    nombre VARCHAR(25) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    id_administrador INT,
    id_empleado INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_administrador) REFERENCES administrador(id),
    FOREIGN KEY (id_empleado) REFERENCES empleado(id)
);
CREATE TABLE pelicula(
    id INT NOT NULL,
    imagen longblob NOT NULL,
    titulo VARCHAR(45) NOT NULL,
    clasificacion VARCHAR(10) NOT NULL,
    duracion VARCHAR(15),
    PRIMARY KEY (id)
);
CREATE TABLE director(
    id INT NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE director_pelicula(
    id INT NOT NULL,
    id_pelicula INT,
    id_director INT,
    PRIMARY KEY(id),
    FOREIGN KEY (id_pelicula) REFERENCES pelicula (id),
    FOREIGN KEY (id_director) REFERENCES director (id)
);
CREATE TABLE genero(
    id INT NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    PRIMARY KEY (id)
);
CREATE TABLE peli_genero(
    id INT NOT NULL,
    id_pelicula INT,
    id_genero INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_pelicula) REFERENCES pelicula (id),
    FOREIGN KEY (id_genero) REFERENCES genero (id)
);
CREATE TABLE protagonista(
    id INT NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    apellido VARCHAR(20) NOT NULL,
    id_pelicula INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_pelicula) REFERENCES pelicula(id)
);
CREATE TABLE tarifa(
    id INT NOT NULL,
    dia VARCHAR(10) NOT NULL,
    precio INT,
    PRIMARY KEY (id)
);
CREATE TABLE horario(
    id INT NOT NULL,
    hora_funcion TIME NOT NULL,
    dia VARCHAR(10) NOT NULL,
    id_pelicula INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_pelicula) REFERENCES pelicula(id)
);
CREATE TABLE factura(
    id INT NOT NULL,
    n_boletas INT NOT NULL,
    id_cine INT,
    id_usuario INT,
    id_tarifa INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cine) REFERENCES cine(id),
    FOREIGN KEY (id_usuario) REFERENCES usuario(cedula),
    FOREIGN KEY (id_tarifa) REFERENCES tarifa(id)
);
CREATE TABLE cine_peli(
    id INT NOT NULL,
    id_cine INT,
    id_pelicula INT,
    FOREIGN KEY (id_cine) REFERENCES cine(id),
    FOREIGN KEY (id_pelicula) REFERENCES pelicula(id)
);
--ADMINISTRADOR
INSERT INTO administrador VALUES(1010,'santiago');
INSERT INTO administrador VALUES(1020,'juan');
INSERT INTO administrador VALUES(1030,'ivan');
--CINES
INSERT INTO cine VALUES(2010,'Titan Plaza',1234567,'Av. Boyacá #80-94',1010,500);
INSERT INTO cine VALUES(2020,'Plaza de las americas',8656898,'Cra 71D No. 6-94 Sur',1020,500);
INSERT INTO cine VALUES(2030,'Calima',9786543,'Ave Cra 30 # 19',1030,500);
INSERT INTO cine VALUES(2040,'Unicentro',3451267,'Cra. 15 #124-30',1010,500);
INSERT INTO cine VALUES(2050,'Portal 80',3562789,'Tv. 100a #80A-20',1020,500);
--PELICULAS
INSERT INTO pelicula VALUES (2,LOAD_FILE('./img/Lightyear-caratura.jpg'),'Lightyear','7+','105');
INSERT INTO pelicula VALUES (4,LOAD_FILE('./img/Maverick-caratura.jpeg'),'Top Gun Maverick','12+','131');
INSERT INTO pelicula VALUES (6,LOAD_FILE('./img/Minions-caratura.jpeg'),'Minions 2: Nace un Villano','7+','87');
INSERT INTO pelicula VALUES (8,LOAD_FILE('./img/Thor-caratula.jpeg'),'Thor: Amor y Trueno','12+','119');
INSERT INTO pelicula VALUES (10,LOAD_FILE('./img/Titanic-caratula.jpg'),'Titanic','7+','195');
INSERT INTO pelicula VALUES (12,LOAD_FILE('./img/EndGame-caratula.jpg'),'Avengers: End Game','12+','119');
INSERT INTO pelicula VALUES (14,LOAD_FILE('./img/Avatar-caratura.jpg'),'Avatar','7+','105');
INSERT INTO pelicula VALUES (16,LOAD_FILE('./img/ReyLeon-caratula.jpeg'),'El Rey Leon','12+','131');
INSERT INTO pelicula VALUES (18,LOAD_FILE('./img/HombreArana-caratula.jpg'),'El Hombre Araña','7+','87');
INSERT INTO pelicula VALUES (20,LOAD_FILE('./img/StarWars-Caratula.jpg'),'Star Wars: El despertar de la fuerza','12+','195');
--PRONTO
INSERT INTO pelicula VALUES (1,LOAD_FILE('./img/telefono-caratula.png'),'El Teléfono Negro','15+','107');
INSERT INTO pelicula VALUES (3,LOAD_FILE('./img/desastre-caratula.png'),'Desastre Inminente','No hay','105');
INSERT INTO pelicula VALUES (5,LOAD_FILE('./img/Supermascotas-caratula.jpg'),'DC Liga de Supermascotas','7+','105');
INSERT INTO pelicula VALUES (7,LOAD_FILE('./img/TrenBala-caratula.jpg'),'Tren Bala','12+','107');
INSERT INTO pelicula VALUES (9,LOAD_FILE('./img/LeyendaViva-caratula.png'),'Leyenda Viva','12+','105');
--CINE_PELICULA
INSERT INTO cine_peli VALUES(400,2010,2);
INSERT INTO cine_peli VALUES(402,2010,6);
INSERT INTO cine_peli VALUES(404,2010,10);
INSERT INTO cine_peli VALUES(406,2010,16);

INSERT INTO cine_peli VALUES(408,2020,4);
INSERT INTO cine_peli VALUES(410,2020,8);
INSERT INTO cine_peli VALUES(412,2020,16);
INSERT INTO cine_peli VALUES(414,2020,18);

INSERT INTO cine_peli VALUES(416,2030,12);
INSERT INTO cine_peli VALUES(418,2030,20);
INSERT INTO cine_peli VALUES(420,2030,18);
INSERT INTO cine_peli VALUES(422,2030,1);

INSERT INTO cine_peli VALUES(424,2040,3);
INSERT INTO cine_peli VALUES(426,2040,6);
INSERT INTO cine_peli VALUES(428,2040,16);
INSERT INTO cine_peli VALUES(430,2040,5);

INSERT INTO cine_peli VALUES(432,2050,7);
INSERT INTO cine_peli VALUES(434,2050,10);
INSERT INTO cine_peli VALUES(436,2050,12);
INSERT INTO cine_peli VALUES(438,2050,9);
--GENEROS
INSERT INTO genero VALUES (10,'Comedia');
INSERT INTO genero VALUES (20,'Accion');
INSERT INTO genero VALUES (30,'Aventura');
INSERT INTO genero VALUES (40,'Romance');
INSERT INTO genero VALUES (50,'Terror');
INSERT INTO genero VALUES (60,'Musical');
INSERT INTO genero VALUES (70,'Ciencia ficción');
INSERT INTO genero VALUES (80,'Drama');
INSERT INTO genero VALUES (90,'Suspenso');
INSERT INTO genero VALUES (100,'Documental');
INSERT INTO genero VALUES (110,'Thriller');
INSERT INTO genero VALUES (120,'Animacion');
INSERT INTO genero VALUES (130,'Infantil');
INSERT INTO genero VALUES (140,'No definido');
--PELICULA_GENERO
INSERT INTO peli_genero VALUES(700,1,50);
INSERT INTO peli_genero VALUES(701,1,90);

INSERT INTO peli_genero VALUES(702,2,20);
INSERT INTO peli_genero VALUES(703,2,30);
INSERT INTO peli_genero VALUES(704,2,70);

INSERT INTO peli_genero VALUES(705,3,110);

INSERT INTO peli_genero VALUES(706,4,20);

INSERT INTO peli_genero VALUES(707,5,120);
INSERT INTO peli_genero VALUES(708,5,30);

INSERT INTO peli_genero VALUES(709,6,10);
INSERT INTO peli_genero VALUES(710,6,20);

INSERT INTO peli_genero VALUES(711,7,20);
INSERT INTO peli_genero VALUES(712,7,110);

INSERT INTO peli_genero VALUES(713,8,20);
INSERT INTO peli_genero VALUES(714,8,30);

INSERT INTO peli_genero VALUES(715,9,100);

INSERT INTO peli_genero VALUES(716,10,80);
INSERT INTO peli_genero VALUES(717,10,40);

INSERT INTO peli_genero VALUES(718,12,20);
INSERT INTO peli_genero VALUES(719,12,70);

INSERT INTO peli_genero VALUES(720,14,20);
INSERT INTO peli_genero VALUES(721,14,70);


INSERT INTO peli_genero VALUES(722,16,60);
INSERT INTO peli_genero VALUES(723,16,130);

INSERT INTO peli_genero VALUES(724,18,20);
INSERT INTO peli_genero VALUES(725,18,70);

INSERT INTO peli_genero VALUES(726,20,30);
INSERT INTO peli_genero VALUES(727,20,70);

--DIRECTOR
INSERT INTO director VALUES (5010,'Angus MacLane');
INSERT INTO director VALUES (5020,'Joseph Kosinski');
INSERT INTO director VALUES (5030,'Kyle Balda');
INSERT INTO director VALUES (5040,'Taika Waititi');
INSERT INTO director VALUES (5050,'James Cameron');
INSERT INTO director VALUES (5060,'Joe Russo');
INSERT INTO director VALUES (5070,'Scott Derrickson');
INSERT INTO director VALUES (5080,'Rob Minkoff');
INSERT INTO director VALUES (5090,'Sam Raimi');
INSERT INTO director VALUES (6010,'J. J. Abrams');
INSERT INTO director VALUES (6020,'Phillip Noyce');
INSERT INTO director VALUES (6030,'Vanya Peirani-Vignes');
INSERT INTO director VALUES (6040,'Jared Stern');
INSERT INTO director VALUES (6050,'David Leitch');
INSERT INTO director VALUES (6060,'Martín Novoa');
INSERT INTO director VALUES (6070,'Sam Levine');
INSERT INTO director VALUES (6080,'Anthony Russo');
INSERT INTO director VALUES (6090,'Jon Favreau');

--DIRECTOR_PELICULA
INSERT INTO director_pelicula VALUES (300,5070,1);
INSERT INTO director_pelicula VALUES (301,5010,2);
INSERT INTO director_pelicula VALUES (302,6030,3);
INSERT INTO director_pelicula VALUES (303,5020,4);
INSERT INTO director_pelicula VALUES (304,6040,5);
INSERT INTO director_pelicula VALUES (304,6070,5);
INSERT INTO director_pelicula VALUES (305,5030,6);
INSERT INTO director_pelicula VALUES (306,6050,7);
INSERT INTO director_pelicula VALUES (307,5040,8);
INSERT INTO director_pelicula VALUES (308,6060,9);
INSERT INTO director_pelicula VALUES (309,5050,10);
INSERT INTO director_pelicula VALUES (310,5060,12);
INSERT INTO director_pelicula VALUES (310,6080,12);
INSERT INTO director_pelicula VALUES (311,5050,14);
INSERT INTO director_pelicula VALUES (312,6090,16);
INSERT INTO director_pelicula VALUES (313,5090,18);
INSERT INTO director_pelicula VALUES (314,6010,20);

--HORARIO
INSERT INTO  horario VALUES (1010,'9:30:00','L-M-M-J-V-S-D',2);
INSERT INTO  horario VALUES (1020,'10:15:00','L-M-M-J-V-S-D',4);
INSERT INTO  horario VALUES (1030,'11:30:00','L-M-M-J-V-S-D',6);--Top Gun
INSERT INTO  horario VALUES (1040,'12:10:00','L-M-M-J-V-S-D',8);
INSERT INTO  horario VALUES (1050,'13:15:00','L-M-M-J-V-S-D',10);
INSERT INTO  horario VALUES (1060,'14:30:00','L-M-M-J-V-S-D',12);--Titanic
INSERT INTO  horario VALUES (1070,'15:00:00','L-M-M-J-V-S-D',14);--Avengers End Game
INSERT INTO  horario VALUES (1080,'16:00:00','L-M-M-J-V-S-D',16);
INSERT INTO  horario VALUES (1090,'16:40:00','L-M-M-J-V-S-D',18);
INSERT INTO  horario VALUES (2010,'17:30:00','L-M-M-J-V-S-D',20);

--TARIFA
INSERT INTO tarifa VALUES(11111,'Lunes',9000);
INSERT INTO tarifa VALUES(22222,'Martes',4500);
INSERT INTO tarifa VALUES(33333,'Miercoles',4500);
INSERT INTO tarifa VALUES(44444,'Jueves',9000);
INSERT INTO tarifa VALUES(55555,'Viernes',9000);
INSERT INTO tarifa VALUES(66666,'Sabado',9000);
INSERT INTO tarifa VALUES(77777,'Domingo',9000);

--EMPLEADO
INSERT INTO empleado VALUES(500,'Juan','Bonito',123);