CREATE DATABASE dbvisius;

USE dbvisius;
drop database dbvisius;


CREATE TABLE area (
	codigo int NOT NULL KEY AUTO_INCREMENT,
    nombre varchar(50) NOT NULL
);

CREATE TABLE empleado (
	codigo int NOT NULL PRIMARY KEY AUTO_INCREMENT primary key,
    nombre varchar(200) NOT NULL,
    areaEmp int NOT NULL,
    edad int (2) NOT NULL,
    FOREIGN KEY (areaEmp) REFERENCES area (codigo)
);

CREATE TABLE usuario(
	usuario varchar(30) not null,
    contrasena varchar(20) not null,
    rol varchar(20) not null
);

CREATE TABLE estado(
	codigo int NOT NULL PRIMARY KEY AUTO_INCREMENT primary key,
    nombre varchar(30) not null
);

CREATE TABLE tarea (
	codigo int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombreTarea varchar(200) not null,
    descripcion varchar(500) not null,
    fechaInicio varchar(20) not null,
    fechaFinal varchar(20) not null,
    fk_estado int not null,
    fk_empleadoEncargado int not null,
    foreign key (fk_empleadoEncargado) REFERENCES empleado (codigo),
	foreign key (fk_estado) REFERENCES estado (codigo)
);

INSERT INTO area (nombre) VALUES ('Administracion'), ('Contabilidad'), ('Ventas'), ('Recursos Humanos');
INSERT INTO empleado (nombre, areaEmp, edad) VALUES ('Emerson Fuentes','1','20'), ('Riquelmi Vasquez', '1','20'), ('Hugo Aguilar','2','20'), ('Kevin Lopez','3','20');
INSERT INTO usuario (usuario, contrasena, rol) VALUES ('Emerson22','12345','administrador'), ('Hugo22','12345','supervisor'), ('Riquelmi22','12345','empleado');
INSERT INTO estado (nombre) VALUES ('CREADA'), ('ASIGNADA'), ('FINALIZADA');
INSERT INTO tarea (nombreTarea, descripcion, fechaInicio, fechaFinal, fk_estado, fk_empleadoEncargado) VALUES ('Proyecto Excel', 'Realizar Graficos, y tablas con valore de la empresa', '28-05-2022', '30-05-2022','1','1');
 
use dbvisius;
SELECT * FROM estado;
SELECT * FROM empleado;
SELECT * FROM area;
SELECT * FROM usuario;
SELECT * FROM tarea;

SELECT t.codigo, t.nombreTarea, t.descripcion, t.fechaInicio, t.fechaFinal, t.estado, e.codigo as fk_empleadoEncargado
                    FROM tarea t INNER JOIN empleado e ON e.codigo=t.fk_empleadoEncargado;
                    
SELECT t.codigo, t.nombreTarea, t.descripcion, t.fechaInicio, t.fechaFinal, s.codigo as estado , e.codigo as fk_empleadoEncargado
                    FROM tarea t INNER JOIN empleado e ON e.codigo=t.fk_empleadoEncargado 
                    INNER JOIN estado s ON s.codigo=t.estado;

                   
SELECT t.codigo, t.nombreTarea, t.descripcion, t.fechaInicio, t.fechaFinal, s.nombre as estado , e.nombre as fk_empleadoEncargado
                    FROM tarea t INNER JOIN empleado e ON e.codigo=t.fk_empleadoEncargado INNER JOIN estado s ON s.codigo=t.fk_estado;
SELECT usuario, contrasena, rol FROM usuario;
SELECT e.codigo, e.nombre, e.edad, a.nombre as areaEmp FROM empleado e INNER JOIN area a ON a.codigo=e.areaEmp;
SELECT nombre, COUNT(t.codigo) AS cantidad FROM empleado em 
            INNER JOIN tarea t
            ON em.codigo = t.fk_empleadoEncargado
            GROUP BY em.codigo;

SELECT nombre, areaEmp FROM empleado;

SELECT t.codigo, t.nombreTarea, t.descripcion, s.nombre as estado , e.nombre as fk_empleadoEncargado
			FROM tarea t INNER JOIN empleado e ON e.codigo=t.fk_empleadoEncargado INNER JOIN estado s ON s.codigo=t.fk_estado
			WHERE e.nombre = 'Riquelmi Vasquez';


	use dbvisius;
    SELECT if(rol=1,'Administrador','Supervisor') as rol, 
            count(usuario) as cantidad FROM usuario group by rol;
            
   SELECT em.areaEmp as empleado, count(em.areaEmp) as cantidad FROM empleado em INNER JOIN area a ON a.codigo=em.areaEmp GROUP BY areaEmp;