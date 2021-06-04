-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Set-2019 às 15:42
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE sistemaast;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Database: `sistemaast`
--
-- --------------------------------------------------------
 
--
-- Estrutura da tabela `curso`
--
CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `duracao` varchar(100) NOT NULL,
  `turno` varchar(100) NOT NULL,
  `qtdInstrumento` int(11) NOT NULL,
  `instrumento` char(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Extraindo dados da tabela `curso`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `matricula`
--
CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diaVencimento` int(11) NOT NULL,
  `idpessoa` int(11) NOT NULL,
  `idturma` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Extraindo dados da tabela `matricula`
--
--
-- Estrutura da tabela `mensalidade`
--
CREATE TABLE `mensalidade` (
  `id` int(11) NOT NULL,
  `valor` double NOT NULL,
  `mesReferencia` int(11) NOT NULL,
  `dataRecebimento` date NOT NULL,
  `desconto` double(10,2) NOT NULL DEFAULT '0.00',
  `juros` double(10,2) NOT NULL DEFAULT '0.00',
  `formaRecebimento` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `idmatricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Estrutura da tabela `pessoa`
--
CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `genero` char(9) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `cpf` char(14) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` char(2) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `cep` char(9) DEFAULT NULL,
  `senha` varchar(95) NOT NULL,
  `tipoPessoa` enum('AL','FN') NOT NULL,
  `dataAdmissao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dataDemissao` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Extraindo dados da tabela `pessoa`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `sala`
--
CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `numeroSala` int(100) NOT NULL,
  `qtdAluno` int(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Extraindo dados da tabela `sala`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `turma`
--
CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `diaSemana` char(100) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `qtdAluno` int(100) NOT NULL,
  `idsala` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Extraindo dados da tabela `turma`
--
--
-- Indexes for dumped tables
--
--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pessoa_matricula` (`idpessoa`),
  ADD KEY `fk_turma_matricula` (`idturma`);
--
-- Indexes for table `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matricula_mensalidade` (`idmatricula`);
--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sala_turma` (`idsala`),
  ADD KEY `fk_curso_turma` (`idcurso`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mensalidade`
--
ALTER TABLE `mensalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--
--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_pessoa_matricula` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `fk_turma_matricula` FOREIGN KEY (`idturma`) REFERENCES `turma` (`id`);
--
-- Limitadores para a tabela `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD CONSTRAINT `fk_matricula_mensalidade` FOREIGN KEY (`idmatricula`) REFERENCES `matricula` (`id`);
--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_curso_turma` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `fk_sala_turma` FOREIGN KEY (`idsala`) REFERENCES `sala` (`id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
