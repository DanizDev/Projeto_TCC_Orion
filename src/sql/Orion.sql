CREATE DATABASE OrionDB;
USE OrionDB;

CREATE TABLE Planos(
    IdPlano INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR (255) NOT NULL,
    Valor DOUBLE NOT NULL,
    Descricao VARCHAR(255) NOT NULL,
    Periodiocidade VARCHAR(255) NOT NULL
);

CREATE TABLE Pagamento(
    IdPagamento INT AUTO_INCREMENT PRIMARY KEY,
    Forma VARCHAR(255) NOT NULL
);

CREATE TABLE Feedback(
    IdFeedback INT AUTO_INCREMENT PRIMARY KEY,
    Descricao VARCHAR(255) NOT NULL,
    Data_Post DATETIME
);

CREATE TABLE Duvida(
    IdDuvida INT AUTO_INCREMENT PRIMARY KEY,
    Descricao VARCHAR(255) NOT NULL,
    Data_Post DATETIME
);

CREATE TABLE Usuario(
    IdUsuario INT AUTO_INCREMENT PRIMARY KEY ,
    Nome VARCHAR(255) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    SenhaHash VARCHAR(255) NOT NULL,
    CPF VARCHAR(100),
    Celular VARCHAR(100) NOT NULL,
    CNPJ VARCHAR(100),
    Id_Plano INT,
    Id_Pagamento INT,
    Id_Feedback INT,
    Id_Duvida INT,
    FOREIGN KEY (Id_Plano) REFERENCES Planos(IdPlano),
	FOREIGN KEY (Id_Pagamento) REFERENCES Pagamento(IdPagamento),
	FOREIGN KEY (Id_Feedback) REFERENCES Feedback(IdFeedback),
	FOREIGN KEY (Id_Duvida) REFERENCES Duvida(IdDuvida)
);

CREATE TABLE Autenticacao_Pag(
    IdAutenticacao INT AUTO_INCREMENT PRIMARY KEY,
    Id_Usuario INT,
    Id_Pagamento INT,
    Numero_Cart VARCHAR(255) NOT NULL UNIQUE,
    Cod_Seg INT NOT NULL UNIQUE,
    Validade VARCHAR(255) NOT NULL,
    Nome_Cart VARCHAR(255) NOT NULL,
    Debito BOOLEAN,
    Credito BOOLEAN,
    FOREIGN KEY (Id_Pagamento) REFERENCES Pagamento(IdPagamento),
    FOREIGN KEY (Id_Usuario) REFERENCES Usuario(IdUsuario)
);
