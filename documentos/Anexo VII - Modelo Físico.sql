-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Cliente (
CPF_Cliente VARCHAR(14) PRIMARY KEY,
Email_Cliente VARCHAR(50),
Nome_Cliente VARCHAR(50),
Celular_Cliente VARCHAR(50),
Id_Endereco INTEGER
)

CREATE TABLE Logo (
Id_Logo VARCHAR(10) PRIMARY KEY,
Nome_Marca_Logo VARCHAR(50),
Descrição_Marca_Logo VARCHAR(500),
Slogan_Marca_Logo VARCHAR(50)
)

CREATE TABLE Dados_ Financeiros (
Id_Financeiro INTEGER PRIMARY KEY,
Data_Financeiro VARCHAR(10),
Valor_Financeiro VARCHAR(10),
Descricao_Financeiro VARCHAR(500),
Categoria_Financeiro VARCHAR(50),
Id_Log_Exclusao INTEGER
)

CREATE TABLE Endereço (
Id_Endereco INTEGER PRIMARY KEY,
Logradouro_Endereco VARCHAR(50),
Numero_Endereco VARCHAR(10),
Bairro_Endereco VARCHAR(50),
Cidade_Endereco VARCHAR(50),
Nome VARCHAR(500)
)

CREATE TABLE Projeto (
Id_Projeto INTEGER PRIMARY KEY,
Plano_Projeto VARCHAR(10),
Status_Projeto VARCHAR(10),
Nome_Projeto VARCHAR(50),
CPF_Cliente VARCHAR(14),
Id_Logo VARCHAR(10),
Id_Financeiro INTEGER,
FOREIGN KEY(CPF_Cliente) REFERENCES Cliente (CPF_Cliente),
FOREIGN KEY(Id_Logo) REFERENCES Logo (Id_Logo),
FOREIGN KEY(Id_Financeiro) REFERENCES Dados_ Financeiros (Id_Financeiro)
)

CREATE TABLE Log_Exclusao (
Id_Log_Exclusao INTEGER PRIMARY KEY,
Motivo_Exclusao VARCHAR(10)
)

ALTER TABLE Cliente ADD FOREIGN KEY(Id_Endereco) REFERENCES Endereço (Id_Endereco)
ALTER TABLE Dados_ Financeiros ADD FOREIGN KEY(Id_Log_Exclusao) REFERENCES Log_Exclusao (Id_Log_Exclusao)
