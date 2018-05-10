create database boletas;
use boletas;

CREATE TABLE carrera
(
    nombre_carrera VARCHAR(50),
    id_carrera VARCHAR(5) NOT NULL PRIMARY KEY
);

create table materia
(
    nombre_materia varchar(50),
    clave_materia varchar(8) not null primary key,
    creditos int(2)
);

create table materia_carrera
(
    clave_materia varchar(8),
    semestre varchar(4),
    id_carrera VARCHAR(5),
    foreign key (id_carrera) REFERENCES carrera(id_carrera),
    foreign key (clave_materia) references materia(clave_materia)
);

create table alumno
(
    nombre_alumno varchar(30),
    apellido_alumno VARCHAR(30),
    no_control bigint(13) not null primary key,
    pass varchar(20),
    id_carrera VARCHAR(5),
    foreign key (id_carrera) REFERENCES carrera(id_carrera)
);

create table boletas
(
    opcion int(1),
    clave_materia varchar(8),
    no_control bigint(13),
    cal int(3),
    foreign key (clave_materia) references materia(clave_materia),
    foreign key (no_control) references alumno(no_control)
);

INSERT INTO carrera VALUES('Ingeniería en Sistemas Computacionales','sis');

INSERT INTO materia VALUES('Taller de Etica','ACA-0907',4);
INSERT INTO materia VALUES('Fundamentos de Investigación','ACC-0906',4);
INSERT INTO materia VALUES('Cálculo Diferencial','ACF-0901',5);
INSERT INTO materia VALUES('Matemáticas Discretas','AEF-1041',5);
INSERT INTO materia VALUES('Fundamentos de Programación','SCD-1008',5);
INSERT INTO materia VALUES('Taller de Administración','SCH-1024',4);

INSERT INTO materia VALUES('Cálculo Integral','ACF-0902',5);
INSERT INTO materia VALUES('Álgebra Lineal','ACF-0903',5);
INSERT INTO materia VALUES('Contabilidad Financiera','AEC-1008',4);
INSERT INTO materia VALUES('Química','AEC-1058',4);
INSERT INTO materia VALUES('Probabilidad y Estadística','AEF-1052',5);
INSERT INTO materia VALUES('Programación Orientada a Objetos','SCD-1020',5);

INSERT INTO materia VALUES('Cálculo Vectorial','ACF-0904',5);
INSERT INTO materia VALUES('Sistemas Operativos','AEC-1061',4);
INSERT INTO materia VALUES('Estructura de Datos','AED-1026',5);
INSERT INTO materia VALUES('Cultura Empresarial','SCC-1005',4);
INSERT INTO materia VALUES('Investigación de Operaciones','SCC-1013',4);
INSERT INTO materia VALUES('Física General','SCF-1006',5);

INSERT INTO materia_carrera VALUES('ACA-0907','1ro','sis');
INSERT INTO materia_carrera VALUES('ACC-0906','1ro','sis');
INSERT INTO materia_carrera VALUES('ACF-0901','1ro','sis');
INSERT INTO materia_carrera VALUES('AEF-1041','1ro','sis');
INSERT INTO materia_carrera VALUES('SCD-1008','1ro','sis');
INSERT INTO materia_carrera VALUES('SCH-1024','1ro','sis');

INSERT INTO materia_carrera VALUES('ACF-0902','2do','sis');
INSERT INTO materia_carrera VALUES('ACF-0903','2do','sis');
INSERT INTO materia_carrera VALUES('AEC-1008','2do','sis');
INSERT INTO materia_carrera VALUES('AEC-1058','2do','sis');
INSERT INTO materia_carrera VALUES('AEF-1052','2do','sis');
INSERT INTO materia_carrera VALUES('SCD-1020','2do','sis');

INSERT INTO materia_carrera VALUES('ACF-0904','3ro','sis');
INSERT INTO materia_carrera VALUES('AEC-1061','3ro','sis');
INSERT INTO materia_carrera VALUES('AED-1026','3ro','sis');
INSERT INTO materia_carrera VALUES('SCC-1005','3ro','sis');
INSERT INTO materia_carrera VALUES('SCC-1013','3ro','sis');
INSERT INTO materia_carrera VALUES('SCF-1006','3ro','sis');

INSERT INTO boletas VALUES ('1','ACA-0907','2013150480778','86');
INSERT INTO boletas VALUES ('2','ACC-0906','2013150480778','92');
INSERT INTO boletas VALUES ('2','ACF-0901','2013150480778','77');
INSERT INTO boletas VALUES ('2','AEF-1041','2013150480778','75');
INSERT INTO boletas VALUES ('2','SCD-1008','2013150480778','94');
INSERT INTO boletas VALUES ('1','SCH-1024','2013150480778','98');

INSERT INTO boletas VALUES ('2','ACF-0902','2013150480778','82');




//Conslutas

SELECT materia.nombre_materia, materia.clave_materia, materia.creditos, boletas.cal, boletas.opcion
FROM materia, boletas
WHERE materia.clave_materia=boletas.clave_materia and boletas.no_control='2013150480778';

SELECT nombre_materia, clave_materia
FROM materia
WHERE clave_materia
IN(SELECT clave_materia
  FROM boletas
  WHERE clave_materia
  IN(SELECT clave_materia
    FROM materia_carrera
    WHERE materia_carrera.semestre='1ro'));


SELECT m.nombre_materia, m.clave_materia, m.creditos,mc.semestre, mc.id_carrera, a.nombre_alumno, b.cal FROM materia m
INNER JOIN materia_carrera mc ON mc.clave_materia=m.clave_materia
INNER JOIN alumno a ON a.id_carrera = mc.id_carrera
INNER JOIN boletas b ON b.clave_materia=m.clave_materia
WHERE b.no_control='2013150480778'
GROUP BY mc.semestre;


SELECT m.nombre_materia, m.clave_materia FROM materia m
INNER JOIN materia_carrera mc ON mc.clave_materia=m.clave_materia
INNER JOIN alumno a ON a.id_carrera = mc.id_carrera
INNER JOIN boletas b ON b.clave_materia=m.clave_materia
WHERE b.no_control='2013150480778' and mc.semestre='1ro';