-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jun-2024 às 14:22
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `responsavel` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `secretaria` varchar(255) NOT NULL,
  `departamento` varchar(30) NOT NULL,
  `item` varchar(20) NOT NULL,
  `saida` varchar(20) NOT NULL,
  `devolucao` varchar(20) NOT NULL,
  `recebido` varchar(255) NOT NULL,
  `situacao` varchar(50) NOT NULL,
  `situacao2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `responsavel`, `telefone`, `secretaria`, `departamento`, `item`, `saida`, `devolucao`, `recebido`, `situacao`, `situacao2`) VALUES
(7, 'Luis II', '(11) 11111-1112', '', 'CPD', 'Mouse II', '2023-02-12', '08-05-2024', 'Bruno', 'bi bi-circle-fill ', 'text-success text-center'),
(13, 'Nilton', '(11) 11111-1111', '', 'cpd', 'Projetor', '2024-05-06', '2024-05-07', '', '', ''),
(14, 'Pedro I', '(11) 11111-1111', '', 'CPD', 'Monitor', '2024-05-06', '2024-05-08', '', 'Entregue', ''),
(15, 'Pedro II', '(11) 11111-1111', '', 'CPD', 'Projetor', '2024-05-06', '2024-05-08', '', 'entregue', ''),
(23, 'Pedro', '(11) 11111-1111', '', 'cpd', 'Projetor', '2024-05-06', '2024-05-07', '', 'bi bi-circle-fill ', 'text-success text-center'),
(24, 'Pedro', '(11) 11111-1111', '', 'cpd', 'Projetor', '2024-05-07', '2024-05-07', '', 'bi bi-circle-fill ', 'text-success text-center'),
(27, 'Pedro 3', '(11) 11111-1111', '', 'cpd', 'Projetor', '2024-05-06', '30-04-2024', '', 'bi bi-circle-fill ', 'text-success text-center'),
(28, 'Pedro2', '(11) 11111-1111', '', 'cpd', 'Projetor2', '2024-05-06', '0000-00-00', '', 'bi bi-circle-fill ', 'text-success text-center'),
(29, 'Nilton2', '(11) 11111-1111', '', 'cpd', 'Projetor', '2024-05-07', '2024-05-08', '', 'bi bi-circle-fill ', 'text-success text-center'),
(30, 'Pedro2', '(11) 11111-1111', '', 'cpd', 'Projetor2', '2024-04-30', '2024-05-08', '', 'bi bi-circle-fill ', 'text-success text-center'),
(31, 'Pedro12', '(11) 11111-1111', '', 'cpd', 'Projetor1', '2024-05-08', '08-05-2024', '', 'bi bi-circle-fill ', 'text-success text-center'),
(35, 'Pedro12', '(11) 11111-1111', 'GP', 'CPD', 'Projetor22', '07-05-2024', '09-05-2024', '', 'bi bi-circle-fill ', 'text-success text-center'),
(38, 'Pedro', '(11) 11111-1111', 'SGP', 'Treinamento', 'Projetor', '08-05-2024', '07-05-2024', 'Nilton', 'bi bi-circle-fill ', 'text-success text-center'),
(39, 'Pedro', '(11) 11111-1111', 'SAS', 'cpd', 'Projetor', '02-05-2024', '07-05-2024', 'Pedro', 'bi bi-circle-fill ', 'text-success text-center');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(129) NOT NULL,
  `funcao` varchar(20) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `funcao`, `nivel`) VALUES
(9, 'Administrador', 'Administrador@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'teste', 'Administrador'),
(17, 'Lucas2024', 'lucas2024@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'testando', 'Administrador'),
(26, 'adm1012', 'lucas@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'testando', 'Administrador'),
(29, 'Lucas12', 'lucas200@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'testando', 'Administrador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
