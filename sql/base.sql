create database boletas;
use boletas;

create table materia
(
    nombre_mat varchar(50),
    clave_mat varchar(8) not null primary key,
    creditos int(2),
    semestre varchar(4)
);

create table alumno
(
    nombre_al varchar(50),
    no_control bigint(13) not null primary key,
    pass varchar(20)
);

create table boletas
(
    opcion int(1),
    clave_mat varchar(8),
    no_control bigint(13),
    cal int(3),
    foreign key (clave_mat) references materia(clave_mat),
    foreign key (no_control) references alumno(no_control)
);

INSERT INTO materia VALUES('Taller de Etica','ACA-0907',4,'1ro');
INSERT INTO materia VALUES('Fundamentos de Investigación','ACC-0906',4,'1ro');
INSERT INTO materia VALUES('Cálculo Diferencial','ACF-0901',5,'1ro');
INSERT INTO materia VALUES('Matemáticas Discretas','AEF-1041',5,'1ro');
INSERT INTO materia VALUES('Fundamentos de Programación','SCD-1008',5,'1ro');
INSERT INTO materia VALUES('Taller de Administración','SCH-1024',4,'1ro');