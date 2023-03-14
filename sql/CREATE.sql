CREATE DATABASE nknbank;

CREATE TABLE LeadBank(
    idLead INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100),
    datanascimento DATE,
    email VARCHAR(100),
    senha VARCHAR(100),
    whatsapp VARCHAR(20),
    datalog DATETIME,
    PRIMARY KEY(idLead)
);

-- Consultar tabela
SELECT * FROM LeadBank;

-- Apagar tabela
DROP TABLE LeadBank;