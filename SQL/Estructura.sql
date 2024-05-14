-- SQLBook: Code
Create database Proyecto_ASIX1;
use Proyecto_ASIX1;
-- Crear tabla Profesores
CREATE TABLE Profesores (
    Id_profesor INT(3) AUTO_INCREMENT PRIMARY KEY,
    Nom_profesor VARCHAR(50),
    Cognoms_profesor VARCHAR(50),
    Telefon_profesor INT(9),
    DNI_profesor VARCHAR(9),
    Correu_profesor VARCHAR(100),
    Sexe_profesor ENUM('Masculino', 'Femenino', 'Otro')
);

-- Crear tabla Cursos
CREATE TABLE Cursos (
    Id_curs INT(3) AUTO_INCREMENT PRIMARY KEY,
    Nom_Curs VARCHAR(100),
    Descripcio_Curs VARCHAR(300),
    Hores_Curs INT(4),
    Inici_Curs DATE,
    Final_Curs DATE
);

-- Crear tabla Modulos
CREATE TABLE Modulos (
    Id_Modul INT(3) AUTO_INCREMENT PRIMARY KEY,
    Nom_Modul VARCHAR(50),
    Descripcio_Modul VARCHAR(200),
    HoresSemanals_Modul INT(2)
);

-- Crear tabla Alumnos
CREATE TABLE Alumnos (
    Id_Alumne INT(3) AUTO_INCREMENT PRIMARY KEY,
    Nom_Alumne VARCHAR(50),
    Cognoms_alumne VARCHAR(100),
    DNI_Alumne VARCHAR(9),
    Sexe_Alumne ENUM('Masculino', 'Femenino', 'Otro'),
    DataInscripcio_Alumne DATE
);

-- Crear tabla CURSO-ALUMNOS (Relación muchos a muchos)
CREATE TABLE Curso_Alumnos (
    ID_Inscripcion INT(3) AUTO_INCREMENT PRIMARY KEY,
    ID_Curso INT(3),
    ID_Alumnos INT(3),
    FOREIGN KEY (ID_Curso) REFERENCES Cursos(Id_curs),
    FOREIGN KEY (ID_Alumnos) REFERENCES Alumnos(Id_Alumne)
);

-- Crear tabla PROFESSORES-MODULO (Relación muchos a muchos)
CREATE TABLE Profesores_Modulos (
    ID_Profesor_Modulo INT(3) AUTO_INCREMENT PRIMARY KEY,
    ID_Modulo INT(3),
    ID_Profesor INT(3),
    FOREIGN KEY (ID_Modulo) REFERENCES Modulos(Id_Modul),
    FOREIGN KEY (ID_Profesor) REFERENCES Profesores(Id_profesor)
);

-- Tabla de Curso-Alumnos
ALTER TABLE Curso_Alumnos
ADD CONSTRAINT fk_curso_alumnos_curso
FOREIGN KEY (ID_Curso)
REFERENCES Cursos(ID_Curs);

ALTER TABLE Curso_Alumnos
ADD CONSTRAINT fk_curso_alumnos_alumnos
FOREIGN KEY (ID_Alumnos)
REFERENCES Alumnos(ID_Alumne);

-- Tabla de Profesores-Modulo
ALTER TABLE Profesores_Modulos
ADD CONSTRAINT fk_profesores_modulo
FOREIGN KEY (ID_Modulo)
REFERENCES Modulos(ID_Modul);

ALTER TABLE Profesores_Modulos
ADD CONSTRAINT fk_profesores_modulo2
FOREIGN KEY (ID_Profesor)
REFERENCES Profesores(ID_profesor);
