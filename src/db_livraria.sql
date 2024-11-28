-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/11/2024 às 02:56
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_livraria`
--
CREATE DATABASE IF NOT EXISTS `db_livraria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_livraria`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `cod_autor` int(11) NOT NULL,
  `nome_autor` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `biografia_autor` varchar(2000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `data_nascimento_autor` date NOT NULL,
  `data_falecimento_autor` date DEFAULT NULL,
  `nacionalidade_autor` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`cod_autor`, `nome_autor`, `biografia_autor`, `data_nascimento_autor`, `data_falecimento_autor`, `nacionalidade_autor`) VALUES
(1, 'Ray Bradbury', 'Ray Douglas Bradbury foi um escritor e roteirista norte-americano. É um dos mais celebrados escritores dos séculos XX e XXI, tendo escrito em uma variada gama de gêneros como ficção-científica, horror e fantasia.', '1920-08-22', '2012-06-05', 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autorlivro`
--

CREATE TABLE `autorlivro` (
  `cod_autor` int(11) DEFAULT NULL,
  `cod_livro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autorlivro`
--

INSERT INTO `autorlivro` (`cod_autor`, `cod_livro`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(60) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `cpf_cliente` varchar(15) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `data_nascimento_cliente` date NOT NULL,
  `senha_cliente` varchar(35) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `nome_cliente`, `cpf_cliente`, `data_nascimento_cliente`, `senha_cliente`) VALUES
(1, 'Cliente 1', '111.111.111-11', '2024-11-01', 'senha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compra`
--

CREATE TABLE `compra` (
  `cod_compra` int(11) NOT NULL,
  `prazo_entrega` date NOT NULL,
  `metodo_pagamento` varchar(20) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `cod_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `editora`
--

CREATE TABLE `editora` (
  `cod_editora` int(11) NOT NULL,
  `nome_editora` varchar(50) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `endereco_editora` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `editora`
--

INSERT INTO `editora` (`cod_editora`, `nome_editora`, `endereco_editora`) VALUES
(1, 'Globo Livros', 'Rua Marquês de Pombal, 25 – 2º andar – Centro\r\n20230-240 – Rio de Janeiro – RJ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emailcliente`
--

CREATE TABLE `emailcliente` (
  `cod_cliente` int(11) DEFAULT NULL,
  `email_cliente` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `emailcliente`
--

INSERT INTO `emailcliente` (`cod_cliente`, `email_cliente`) VALUES
(1, 'cliente@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecocliente`
--

CREATE TABLE `enderecocliente` (
  `cod_cliente` int(11) DEFAULT NULL,
  `endereco_cliente` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enderecocliente`
--

INSERT INTO `enderecocliente` (`cod_cliente`, `endereco_cliente`) VALUES
(1, 'Rua do Cliente, S?o Paulo - SP - Brasil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `cod_genero` int(11) NOT NULL,
  `nome_genero` varchar(30) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `descricao_genero` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `genero`
--

INSERT INTO `genero` (`cod_genero`, `nome_genero`, `descricao_genero`) VALUES
(1, 'Distopia', 'Histórias sobre futuros alternativos com governos autoritários');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lista`
--

CREATE TABLE `lista` (
  `cod_lista` int(11) NOT NULL,
  `data_criacao_lista` date NOT NULL,
  `cod_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `cod_livro` int(11) NOT NULL,
  `nome_livro` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isbn_livro` varchar(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `data_lancamento` date NOT NULL,
  `preco_livro` float NOT NULL,
  `descricao_livro` varchar(2000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cod_genero` int(11) DEFAULT NULL,
  `cod_editora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`cod_livro`, `nome_livro`, `isbn_livro`, `data_lancamento`, `preco_livro`, `descricao_livro`, `cod_genero`, `cod_editora`) VALUES
(1, 'Fahrenheit 451', '978-85-25052-24-7', '1953-10-19', 44.99, 'Fahrenheit 451 é um romance distópico de ficção científica soft, escrito por Ray Bradbury e publicado pela primeira vez em 1953. O conceito inicial do livro começou em 1947 com o conto \"Bright Phoenix\"', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livroscomprados`
--

CREATE TABLE `livroscomprados` (
  `cod_livro` int(11) DEFAULT NULL,
  `cod_compra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `livrossalvos`
--

CREATE TABLE `livrossalvos` (
  `cod_livro` int(11) DEFAULT NULL,
  `cod_lista` int(11) DEFAULT NULL,
  `data_salvamento_livro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefonecliente`
--

CREATE TABLE `telefonecliente` (
  `cod_cliente` int(11) DEFAULT NULL,
  `telefone_cliente` varchar(20) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `telefonecliente`
--

INSERT INTO `telefonecliente` (`cod_cliente`, `telefone_cliente`) VALUES
(1, '(11)22222-2222');

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefoneeditora`
--

CREATE TABLE `telefoneeditora` (
  `cod_editora` int(11) DEFAULT NULL,
  `telefone_editora` varchar(20) CHARACTER SET latin1 COLLATE latin1_danish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `telefoneeditora`
--

INSERT INTO `telefoneeditora` (`cod_editora`, `telefone_editora`) VALUES
(1, '(21) 2534-5000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `senha_usuario` varchar(30) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome_usuario`, `senha_usuario`) VALUES
(1, 'Lucas', '1234'),
(2, 'Matheus', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`cod_autor`);

--
-- Índices de tabela `autorlivro`
--
ALTER TABLE `autorlivro`
  ADD KEY `cod_autor` (`cod_autor`),
  ADD KEY `cod_livro` (`cod_livro`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD UNIQUE KEY `cpf_cliente` (`cpf_cliente`);

--
-- Índices de tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`cod_compra`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Índices de tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`cod_editora`);

--
-- Índices de tabela `emailcliente`
--
ALTER TABLE `emailcliente`
  ADD UNIQUE KEY `email_cliente` (`email_cliente`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Índices de tabela `enderecocliente`
--
ALTER TABLE `enderecocliente`
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`cod_genero`);

--
-- Índices de tabela `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`cod_lista`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`cod_livro`),
  ADD KEY `cod_genero` (`cod_genero`),
  ADD KEY `cod_editora` (`cod_editora`);

--
-- Índices de tabela `livroscomprados`
--
ALTER TABLE `livroscomprados`
  ADD KEY `cod_livro` (`cod_livro`),
  ADD KEY `cod_compra` (`cod_compra`);

--
-- Índices de tabela `livrossalvos`
--
ALTER TABLE `livrossalvos`
  ADD KEY `cod_livro` (`cod_livro`),
  ADD KEY `cod_lista` (`cod_lista`);

--
-- Índices de tabela `telefonecliente`
--
ALTER TABLE `telefonecliente`
  ADD UNIQUE KEY `telefone_cliente` (`telefone_cliente`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Índices de tabela `telefoneeditora`
--
ALTER TABLE `telefoneeditora`
  ADD KEY `cod_editora` (`cod_editora`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `cod_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `cod_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `cod_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `cod_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `lista`
--
ALTER TABLE `lista`
  MODIFY `cod_lista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `cod_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `autorlivro`
--
ALTER TABLE `autorlivro`
  ADD CONSTRAINT `autorlivro_ibfk_1` FOREIGN KEY (`cod_autor`) REFERENCES `autor` (`cod_autor`),
  ADD CONSTRAINT `autorlivro_ibfk_2` FOREIGN KEY (`cod_livro`) REFERENCES `livro` (`cod_livro`);

--
-- Restrições para tabelas `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`);

--
-- Restrições para tabelas `emailcliente`
--
ALTER TABLE `emailcliente`
  ADD CONSTRAINT `emailcliente_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`);

--
-- Restrições para tabelas `enderecocliente`
--
ALTER TABLE `enderecocliente`
  ADD CONSTRAINT `enderecocliente_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`);

--
-- Restrições para tabelas `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`);

--
-- Restrições para tabelas `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`cod_genero`) REFERENCES `genero` (`cod_genero`),
  ADD CONSTRAINT `livro_ibfk_2` FOREIGN KEY (`cod_editora`) REFERENCES `editora` (`cod_editora`);

--
-- Restrições para tabelas `livroscomprados`
--
ALTER TABLE `livroscomprados`
  ADD CONSTRAINT `livroscomprados_ibfk_1` FOREIGN KEY (`cod_livro`) REFERENCES `livro` (`cod_livro`),
  ADD CONSTRAINT `livroscomprados_ibfk_2` FOREIGN KEY (`cod_compra`) REFERENCES `compra` (`cod_compra`);

--
-- Restrições para tabelas `livrossalvos`
--
ALTER TABLE `livrossalvos`
  ADD CONSTRAINT `livrossalvos_ibfk_1` FOREIGN KEY (`cod_livro`) REFERENCES `livro` (`cod_livro`),
  ADD CONSTRAINT `livrossalvos_ibfk_2` FOREIGN KEY (`cod_lista`) REFERENCES `lista` (`cod_lista`);

--
-- Restrições para tabelas `telefonecliente`
--
ALTER TABLE `telefonecliente`
  ADD CONSTRAINT `telefonecliente_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`);

--
-- Restrições para tabelas `telefoneeditora`
--
ALTER TABLE `telefoneeditora`
  ADD CONSTRAINT `telefoneeditora_ibfk_1` FOREIGN KEY (`cod_editora`) REFERENCES `editora` (`cod_editora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
