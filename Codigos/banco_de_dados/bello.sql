-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Out-2019 às 20:22
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bello`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bcv_cliente`
--

CREATE TABLE `bcv_cliente` (
  `id_cliente` int(11) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `celular_cliente` varchar(50) NOT NULL,
  `id_endereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bcv_endereco`
--

CREATE TABLE `bcv_endereco` (
  `id_endereco` int(11) NOT NULL,
  `logradouro_endereco` varchar(50) NOT NULL,
  `numero_endereco` varchar(50) NOT NULL,
  `bairro_endereco` varchar(50) NOT NULL,
  `cidade_endereco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bcv_financeiro`
--

CREATE TABLE `bcv_financeiro` (
  `id_financeiro` int(11) NOT NULL,
  `data_financeiro` varchar(10) NOT NULL,
  `valor_financeiro` varchar(50) NOT NULL,
  `descricao_financeiro` varchar(5000) NOT NULL,
  `categoria_financeiro` varchar(50) NOT NULL,
  `tipo_financeiro` int(11) NOT NULL DEFAULT '2',
  `armazenamento_financeiro` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bcv_login`
--

CREATE TABLE `bcv_login` (
  `id_login` int(11) NOT NULL,
  `email_login` varchar(50) NOT NULL,
  `senha_login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bcv_logo`
--

CREATE TABLE `bcv_logo` (
  `id_logo` int(11) NOT NULL,
  `nome_marca_logo` varchar(50) NOT NULL,
  `slogan_marca_logo` varchar(50) DEFAULT NULL,
  `descricao_marca_logo` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bcv_projetos`
--

CREATE TABLE `bcv_projetos` (
  `id_projeto` int(11) NOT NULL,
  `plano_projeto` int(11) NOT NULL,
  `status_projeto` int(1) NOT NULL DEFAULT '1',
  `nome_projeto` int(11) NOT NULL,
  `id_logo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bcv_cliente`
--
ALTER TABLE `bcv_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `bcv_cliente_ibfk_1` (`id_endereco`);

--
-- Indexes for table `bcv_endereco`
--
ALTER TABLE `bcv_endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `bcv_financeiro`
--
ALTER TABLE `bcv_financeiro`
  ADD PRIMARY KEY (`id_financeiro`);

--
-- Indexes for table `bcv_login`
--
ALTER TABLE `bcv_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `bcv_logo`
--
ALTER TABLE `bcv_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `bcv_projetos`
--
ALTER TABLE `bcv_projetos`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `bcv_projetos_ibfk_1` (`id_logo`),
  ADD KEY `bcv_projetos_ibfk_2` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bcv_cliente`
--
ALTER TABLE `bcv_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bcv_endereco`
--
ALTER TABLE `bcv_endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bcv_financeiro`
--
ALTER TABLE `bcv_financeiro`
  MODIFY `id_financeiro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bcv_logo`
--
ALTER TABLE `bcv_logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bcv_projetos`
--
ALTER TABLE `bcv_projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bcv_cliente`
--
ALTER TABLE `bcv_cliente`
  ADD CONSTRAINT `bcv_cliente_ibfk_1` FOREIGN KEY (`id_endereco`) REFERENCES `bcv_endereco` (`id_endereco`);

--
-- Limitadores para a tabela `bcv_projetos`
--
ALTER TABLE `bcv_projetos`
  ADD CONSTRAINT `bcv_projetos_ibfk_1` FOREIGN KEY (`id_logo`) REFERENCES `bcv_logo` (`id_logo`),
  ADD CONSTRAINT `bcv_projetos_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `bcv_cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
