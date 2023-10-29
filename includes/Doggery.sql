CREATE DATABASE Doggery;
Use Doggery;


CREATE TABLE Tutor (
    idTutor INTEGER PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(55),
    Rua VARCHAR(255),
    Numero VARCHAR(10),
    Cep VARCHAR(10),
    Cidade VARCHAR(255),
    CPF VARCHAR(14),
    Email VARCHAR(255),
    Senha VARCHAR(40), -- Armazenar a senha como texto (não criptografada)
    Celular VARCHAR(20),
    DadosBancarios TEXT
);

CREATE TABLE Pet (
    idPet INTEGER PRIMARY KEY AUTO_INCREMENT,
    idTutor INTEGER, -- Chave estrangeira para associar o pet a um tutor
    Nome VARCHAR(255),
    Peso DECIMAL(5, 2),
    Restricao TEXT,
    FOREIGN KEY (idTutor) REFERENCES Tutor(idTutor)
);

CREATE TABLE Walker (
    idWalker INTEGER PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(255),
    Rua VARCHAR(255),
    Numero VARCHAR(10),
    Cep VARCHAR(10),
    Cidade VARCHAR(255),
    CPF VARCHAR(14), -- Use VARCHAR para armazenar CPF como texto
    Email VARCHAR(255),
    Senha VARCHAR(40), -- Armazenar a senha como texto (não criptografada)
    Celular VARCHAR(20),
    DadosBancarios TEXT
);
