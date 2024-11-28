-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2024 às 22:27
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
(1, 'Ray Bradbury', 'Ray Douglas Bradbury foi um escritor e roteirista norte-americano. É um dos mais celebrados escritores dos séculos XX e XXI, tendo escrito em uma variada gama de gêneros como ficção-científica, horror e fantasia.', '1920-08-22', '2012-06-05', 'Estados Unidos'),
(2, 'George Orwell', 'George Orwell é o pseudônimo do escritor inglês Eric Arthur Blair. Ele nasceu em 25 de junho de 1903, na Índia. Seus pais eram britânicos e voltaram para o Reino Unido quando o autor era ainda criança. Orwell estudou em boas escolas na Inglaterra, mas não ingressou na universidade. Trabalhou na Polícia Imperial Indiana, a qual abandonou para se dedicar totalmente à escrita.', '1903-06-25', '1950-01-21', 'Índia Britânica'),
(3, 'H P Lovecraft', 'Howard Phillips Lovecraft foi um escritor americano dos gêneros de weird fiction, ficção científica, fantasia e terror. Ele é mais conhecido por sua criação dos Cthulhu Mythos. Nascido em Providence, Rhode Island, Lovecraft passou a maior parte de sua vida na Nova Inglaterra.', '1890-08-20', '1937-03-15', 'Estados Unidos'),
(4, 'Machado de Assis', 'Joaquim Maria Machado de Assis foi um escritor brasileiro, amplamente reconhecido por críticos, estudiosos, escritores e leitores como o maior expoente da literatura brasileira. Sua produção literária abrangeu praticamente todos os gêneros, incluindo poesia, romance, crônica, dramaturgia, conto, folhetim, jornalismo e crítica literária.', '1839-06-21', '1908-09-29', 'Brasil'),
(5, 'José de Alencar', 'José Martiniano de Alencar foi um jornalista, advogado, político e escritor romântico brasileiro. Descendia de uma família prestigiada e participativa no contexto revolucionário pernambucano, de 1817. Tornou-se notável como jurista, parlamentar imperial, escritor e polemista ativo nos periódicos do Império Brasileiro.', '1829-05-01', '1877-12-12', 'Brasil'),
(6, 'Clarice Lispector', 'Clarice Lispector, nascida Chaya Pinkhasivna Lispector, foi uma escritora e jornalista brasileira nascida na Ucrânia. Autora de romances, contos e ensaios, é considerada uma das escritoras brasileiras mais importantes do século XX.', '1920-12-10', '1977-12-09', 'Brasil'),
(7, 'Miguel de Cervantes', 'Miguel de Cervantes Saavedra foi um romancista, dramaturgo e poeta castelhano. A sua obra-prima, Dom Quixote, muitas vezes considerada o primeiro romance moderno, é um clássico da literatura ocidental e é regularmente considerada um dos melhores romances já escritos', '1547-09-29', '1616-04-22', 'Espanha');

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
(1, 1),
(6, 2),
(7, 3),
(4, 4),
(5, 5),
(2, 6),
(2, 7),
(3, 8);

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
(1, 'Cliente 1', '111.111.111-11', '2024-11-01', 'senha'),
(2, 'Lucas', '473.819.748-57', '2007-04-03', '1234');

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
(1, 'Globo Livros', 'Rua Marquês de Pombal, 25 – 2º andar – Centro\r\n20230-240 – Rio de Janeiro – RJ'),
(2, 'Rocco', 'Rua do Passeio, 38 – 11º andar, Centro Passeio Corporate – Torre 1 20021-290 – Rio de Janeiro – RJ'),
(3, 'Editora Moderna', 'R. Padre Adelino, 758 - Quarta Parada, São Paulo - SP, 03303-000'),
(4, 'Principis', 'R. José Albino Pereira, 54 - Jardim Alvorada, Jandira - SP, 06612-001'),
(5, 'Companhia das Letras', 'Rua Bandeira Paulista, 702 – Cj. 32 – Itaim Bibi – São Paulo - SP, 04532-002');

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
(1, 'cliente@email.com'),
(2, 'lucas@email.com');

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
(1, 'Rua do Cliente, S?o Paulo - SP - Brasil'),
(2, 'rrgvrbgtbthb');

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
(1, 'Distopia', 'Histórias sobre futuros alternativos com governos autoritários'),
(2, 'Romance', 'Narrativas longas escritas em prosa'),
(3, 'Terror', 'Histórias com acontecimentos assustadores'),
(4, 'Sátira', 'Histórias que usam o humor para fazer uma crítica');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lista`
--

CREATE TABLE `lista` (
  `cod_lista` int(11) NOT NULL,
  `data_criacao_lista` date NOT NULL,
  `cod_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lista`
--

INSERT INTO `lista` (`cod_lista`, `data_criacao_lista`, `cod_cliente`) VALUES
(1, '2024-11-28', 2);

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
(1, 'Fahrenheit 451', '978-85-25052-24-7', '1953-10-19', 44.99, 'Fahrenheit 451 é um romance distópico de ficção científica soft, escrito por Ray Bradbury e publicado pela primeira vez em 1953. O conceito inicial do livro começou em 1947 com o conto \"Bright Phoenix\"', 1, 1),
(2, 'A Hora da Estrela', '978-65-55320-35-0', '1977-10-26', 29.99, 'A nordestina Macabéa é uma mulher miserável, que mal tem consciência de existir. Depois de perder seu único elo com o mundo, uma velha tia, ela viaja para o Rio, onde aluga um quarto, se emprega como datilógrafa e gasta suas horas ouvindo a Rádio Relógio. Apaixona-se, então, por Olímpico de Jesus, um metalúrgico nordestino, que logo a trai com uma colega de trabalho. Desesperada, Macabéa consulta uma cartomante, que lhe prevê um futuro luminoso, bem diferente do que a espera.\r\n\r\n', 2, 2),
(3, 'Dom Quixote', '978-85-16079-44-4', '1605-01-16', 59.99, 'Apaixonado por histórias de cavalaria, Alonso Quijano passa a acreditar que é um cavaleiro andante. Em seu delírio, muda o nome para Dom Quixote de la Mancha, veste-se com uma armadura improvisada, faz de Dulcineia sua amada, a quem quer dedicar suas glórias e seus feitos. O vizinho Sancho Pança torna-se seu fiel escudeiro. Nenhum cavaleiro andante teve a ousadia de Dom Quixote. Tampouco viveu suas aventuras e desventuras, que aqui são contadas de forma divertida e emocionante.', 4, 3),
(4, 'O Alienista', '978-65-50970-37-6', '1882-03-15', 9.99, 'Machado de Assis, neste livro, propõe a seguinte pergunta: quem é louco? Conheça a história do médico Simão Bacamarte, dedicado e estudioso da mente humana, que decide construir um hospício para tratar os doentes mentais na pequena cidade de Itaguaí a casa verde. Quem entra e quem fica de fora? Surpreenda-se com o final.', 4, 4),
(5, 'Senhora', '978-65-55520-76-7', '1875-12-01', 15.99, 'Obra da fase urbana de José de Alencar, considerado o mestre do romantismo o brasileiro, Senhora revela as convenções da sociedade burguesa carioca do século XIX. Pelos desencontros amorosos de Aurélia Camargo, Fernanda Seixas e Adelaide Amaral, o autor traça um painel da vida da corte e critica os costumes da época, como casamento por interesse e arrivismo social.', 2, 4),
(6, '1984', '978-85-35914-84-9', '1949-06-08', 34.99, 'Winston Smith trabalha para o Ministério da Verdade em Londres, capital da Faixa Aérea Um. Lá, o Grande Irmão, líder do Partido, mantém a vigilância sobre toda a população, enquanto a Polícia do Pensamento revela cada ato de traição. Entediado com sua vida monótona e mortal, Winston começa a se revoltar intimamente contra o sistema. Quando se apaixona por uma colega de trabalho, ele desperta para novas possibilidades e acaba sendo atraído para a conspiração. No entanto, o Grande Irmão não vai tolerar dissensões — mesmo que ocorram apenas em pensamento.', 1, 5),
(7, 'A Revolução dos Bichos', '978-85-35909-55-5', '1945-08-17', 24.99, 'Verdadeiro clássico moderno, concebido por um dos mais influentes escritores do século XX, A revolução dos bichos é uma fábula sobre o poder. Narra a insurreição dos animais de uma granja contra seus donos. Progressivamente, porém, a revolução degenera numa tirania ainda mais opressiva que a dos humanos.', 4, 5),
(8, 'O Chamado de Cthulhu', '978-65-50970-26-0', '1928-02-02', 29.99, 'O Chamado de Cthulhu é um conto do norte-americano H.P. Lovecraft que logo se tornou um clássico do terror. Foi escrito em 1926 e publicado pela primeira vez na revista estadunidense Weird Tales em fevereiro de 1928. Cthulhu é um deus que nas primeiras páginas do conto aparece como um ídolo de argila quase indescritível, possuindo um culto multimilenar dedicado a trazê-lo de volta, o seu retorno desencadearia o fim da humanidade. Neste livro, encontramos esse clássico e mais sete contos consagrados do autor na literatura de terror.', 3, 4);

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
(1, '(11)22222-2222'),
(2, '(54) 33333-3333');

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
(1, '(21) 2534-5000'),
(2, '(21) 3525-2000'),
(3, '(11) 2790-1300'),
(4, '(11) 3761-9500'),
(5, '(11) 3707-3501');

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
  MODIFY `cod_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `cod_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `cod_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `cod_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `lista`
--
ALTER TABLE `lista`
  MODIFY `cod_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `cod_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
