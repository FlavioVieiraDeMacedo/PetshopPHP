-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jun-2016 às 23:02
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pet_shop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `ID_petshop` int(11) NOT NULL,
  `ID_pet` int(11) NOT NULL,
  `ID_con` int(11) NOT NULL AUTO_INCREMENT,
  `Data_con` date NOT NULL,
  `HIni_con` time NOT NULL,
  `HFim_con` time NOT NULL,
  `Preco_con` float NOT NULL,
  `Tipo_con` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_con`),
  KEY `ID_petshop` (`ID_petshop`,`ID_pet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`ID_petshop`, `ID_pet`, `ID_con`, `Data_con`, `HIni_con`, `HFim_con`, `Preco_con`, `Tipo_con`) VALUES
(0, 1, 2, '1997-06-12', '12:12:00', '13:13:00', 1000, 'Banho'),
(0, 0, 3, '0000-00-00', '00:00:00', '00:00:00', 1000, 'Banho'),
(0, 0, 4, '0000-00-00', '00:00:00', '00:00:00', 1000, 'Consulta'),
(0, 0, 5, '2016-02-02', '00:00:00', '23:59:00', 1000, 'Banho/Tosa'),
(0, 0, 6, '2017-02-02', '01:01:00', '04:04:00', 1000, 'Consulta'),
(0, 0, 7, '0000-00-00', '00:00:00', '00:00:00', 1000, 'Consulta'),
(0, 0, 8, '0000-00-00', '00:00:00', '00:00:00', 1000, 'Consulta'),
(0, 0, 9, '0000-00-00', '00:00:00', '00:00:00', 1000, 'Banho/Tosa'),
(0, 5, 10, '2016-01-31', '20:00:00', '10:00:00', 1000, 'Consulta'),
(0, 1, 11, '1997-06-12', '12:12:00', '13:13:00', 1000, 'Banho'),
(0, 2, 12, '2017-02-02', '03:03:00', '02:02:00', 1000, 'Tosa Higienica'),
(0, 0, 14, '2017-02-02', '03:03:00', '02:02:00', 1000, 'Consulta'),
(0, 0, 15, '2017-02-02', '03:03:00', '02:02:00', 1000, 'Consulta'),
(0, 0, 16, '0000-00-00', '00:00:00', '00:00:00', 1000, 'Consulta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `animais`
--

CREATE TABLE IF NOT EXISTS `animais` (
  `ID_petshop` int(11) NOT NULL,
  `ID_cli` int(11) NOT NULL,
  `ID_pet` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_pet` varchar(255) NOT NULL,
  `Sexo_pet` varchar(30) NOT NULL,
  `Raca_pet` varchar(255) NOT NULL,
  `Cor_pet` varchar(255) NOT NULL,
  `Tipo_pet` varchar(255) NOT NULL,
  `Partic_pet` varchar(5000) NOT NULL,
  PRIMARY KEY (`ID_pet`),
  KEY `ID_petshop` (`ID_petshop`),
  KEY `ID_cli` (`ID_cli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `animais`
--

INSERT INTO `animais` (`ID_petshop`, `ID_cli`, `ID_pet`, `Nome_pet`, `Sexo_pet`, `Raca_pet`, `Cor_pet`, `Tipo_pet`, `Partic_pet`) VALUES
(0, 1, 1, 'marlon', 'Macho', 'lhasa apso', 'dourado', 'cachorro', 'alergia a perfume'),
(0, 2, 2, 'Natali', 'Femea', 'Vira Lata', 'preto', 'cachorro', '0'),
(0, 2, 3, 'ice', 'Macho', 'puddle', 'branco', 'cachorro', '0'),
(0, 3, 4, 'luvinha', 'Macho', 'ciames', 'manchado', 'gato', 'dorme'),
(0, 3, 5, 'kripto', 'Femea', 'vira lata', 'brnaco', 'gato', 'voa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `ID_petshop` int(11) NOT NULL,
  `ID_cli` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_cli` varchar(255) NOT NULL,
  `Tel_cli` varchar(255) NOT NULL,
  `Cel_cli` varchar(255) NOT NULL,
  `Cidade_cli` varchar(255) NOT NULL,
  `Rua_cli` varchar(255) NOT NULL,
  `Comp_cli` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_cli`),
  KEY `ID_petshop` (`ID_petshop`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`ID_petshop`, `ID_cli`, `Nome_cli`, `Tel_cli`, `Cel_cli`, `Cidade_cli`, `Rua_cli`, `Comp_cli`) VALUES
(0, 1, 'flavio', '4220-4957', '95456-7623', 'sao caetano do sul', 'alameda', 'AP 181'),
(0, 2, 'meire', '8888-8888', '98888-8888', 'santos', 'C', '0'),
(0, 3, 'karina', '8989-8989', '97854-7854', 'sao paulo', 'paulista', 'numero 1778');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE IF NOT EXISTS `funcionarios` (
  `ID_petshop` int(11) NOT NULL,
  `ID_func` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_func` varchar(255) NOT NULL,
  `Tel_func` varchar(30) NOT NULL,
  `Cel_func` varchar(30) NOT NULL,
  `Cidade_func` varchar(255) NOT NULL,
  `Rua_func` varchar(255) NOT NULL,
  `Comp_func` varchar(255) NOT NULL,
  `Salario_func` float NOT NULL,
  `DtPag_func` date NOT NULL,
  `DtAdmissao_func` date NOT NULL,
  `CPF_func` varchar(255) NOT NULL,
  `Setor_func` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_func`),
  UNIQUE KEY `CPF_func` (`CPF_func`),
  KEY `ID_petshop` (`ID_petshop`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`ID_petshop`, `ID_func`, `Nome_func`, `Tel_func`, `Cel_func`, `Cidade_func`, `Rua_func`, `Comp_func`, `Salario_func`, `DtPag_func`, `DtAdmissao_func`, `CPF_func`, `Setor_func`) VALUES
(0, 1, '1', '2', '3', '4', '5', '6', 9, '0000-00-00', '0000-00-00', '8', '7'),
(0, 2, 'a', 'b', 'c', 'd', 'e', 'f', 1, '0000-00-00', '0000-00-00', 'h', 'g'),
(0, 4, 'a', 'b', 'c', 'd', 'e', 'f', 1, '0000-00-00', '1212-12-12', 'a', 'g'),
(0, 6, 'a', 'b', 'c', 'd', 'e', 'f', 1, '2020-05-20', '1212-12-12', 's', 'g');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE IF NOT EXISTS `medicos` (
  `ID_petshop` int(11) NOT NULL,
  `ID_med` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_med` varchar(255) NOT NULL,
  `Tel_med` varchar(255) NOT NULL,
  `Cel_med` varchar(255) NOT NULL,
  `Cidade_med` varchar(255) NOT NULL,
  `Rua_med` varchar(255) NOT NULL,
  `Comp_med` varchar(255) NOT NULL,
  `Salario_med` float NOT NULL,
  `DtPag_med` date NOT NULL,
  `DtAdmissao_med` date NOT NULL,
  `CPF_med` varchar(255) NOT NULL,
  `Especial_med` varchar(255) NOT NULL,
  `CRMV_med` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_med`),
  KEY `ID_petshop` (`ID_petshop`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `medicos`
--

INSERT INTO `medicos` (`ID_petshop`, `ID_med`, `Nome_med`, `Tel_med`, `Cel_med`, `Cidade_med`, `Rua_med`, `Comp_med`, `Salario_med`, `DtPag_med`, `DtAdmissao_med`, `CPF_med`, `Especial_med`, `CRMV_med`) VALUES
(0, 1, '1', '1', '1', '', '', '', 1, '1221-12-12', '2014-10-01', '0754841', 'adsasdasdasd', '1234568789'),
(0, 2, 'flavio', '4220-4957', '95104-3609', 'scs', 'alameda', '1738', 10000, '1997-06-12', '2016-05-12', '15143', 'super', '788795');

-- --------------------------------------------------------

--
-- Estrutura da tabela `petshop`
--

CREATE TABLE IF NOT EXISTS `petshop` (
  `ID_petshop` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_petshop` varchar(255) NOT NULL,
  `Email_petshop` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_petshop`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_petshop` int(11) NOT NULL,
  `ID_usu` int(11) NOT NULL AUTO_INCREMENT,
  `Loguin_usu` varchar(255) NOT NULL,
  `Senha_usu` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_usu`),
  KEY `ID_petshop` (`ID_petshop`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
