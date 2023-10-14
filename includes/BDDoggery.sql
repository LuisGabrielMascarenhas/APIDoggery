CREATE DATABASE Doggery;
Use Doggery;

CREATE TABLE Usuarios(
    usu_id INT NOT NULL AUTO_INCREMENT,
    usu_nome VARCHAR (50) NOT NULL,
    usu_email VARCHAR (70) NOT NULL,
    usu_senha VARCHAR (30) NOT NULL,
    usu_telefone VARCHAR (13) NOT null,
    PRIMARY KEY (usu_id,usu_nome,usu_email)


);