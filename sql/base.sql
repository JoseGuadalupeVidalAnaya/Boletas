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
    creditos int(2),
    semestre varchar(4),
    id_carrera VARCHAR(5),
    foreign key (id_carrera) REFERENCES carrera(id_carrera)
);

create table alumno
(
    nombre_alumno varchar(50),
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

INSERT INTO materia VALUES('Taller de Etica','ACA-0907',4,'1ro','sis');
INSERT INTO materia VALUES('Fundamentos de Investigación','ACC-0906',4,'1ro','sis');
INSERT INTO materia VALUES('Cálculo Diferencial','ACF-0901',5,'1ro','sis');
INSERT INTO materia VALUES('Matemáticas Discretas','AEF-1041',5,'1ro','sis');
INSERT INTO materia VALUES('Fundamentos de Programación','SCD-1008',5,'1ro','sis');
INSERT INTO materia VALUES('Taller de Administración','SCH-1024',4,'1ro','sis');