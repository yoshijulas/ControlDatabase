# Code to create tables for the database

Create Database
```SQL
CREATE DATABASE proyecto
```

Create table for libros/biblioteca
```SQL
CREATE TABLE 'libros' (
  'idLibro' int(11) NOT NULL AUTO_INCREMENT,
  'nombre' varchar(50) DEFAULT NULL,
  'autor' varchar(50) DEFAULT NULL,
  'anno' int(11) DEFAULT NULL,
  'editorial' varchar(50) DEFAULT NULL,
  PRIMARY KEY ('idLibro')
);
```

Create table for Usuarios
```SQL
 CREATE TABLE 'usuario' (
  'correo' varchar(50) NOT NULL,
  'nombre' varchar(30) DEFAULT NULL,
  'telefono' varchar(14) DEFAULT NULL,
  'contrasena' varchar(50) DEFAULT NULL,
  PRIMARY KEY ('correo')
)
```

Create table for Admin Control
```SQL
 CREATE TABLE 'datos' (
  'matricula' int(10) NOT NULL AUTO_INCREMENT,
  'nombre' varchar(50) DEFAULT NULL,
  'telefono' varchar(15) DEFAULT NULL,
  'edad' int(3) DEFAULT NULL,
  PRIMARY KEY ('matricula')
);
```




