-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 10:48 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda_covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `idUsuario` int(11) NOT NULL,
  `fechaV1` varchar(50) DEFAULT NULL,
  `fechaV2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grupo`
--

CREATE TABLE `grupo` (
  `idGrupo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupo`
--

INSERT INTO `grupo` (`idGrupo`, `nombre`, `activo`) VALUES
(1, 'Personal CTI', 1),
(2, 'Hisopadores', 1),
(3, 'Personal Salud General', 1),
(4, 'Personal Educacion', 1),
(5, 'Bomberos', 1),
(6, 'Policia', 1),
(7, 'Personal Residencia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `fechaNacimiento`, `telefono`, `idGrupo`, `activo`) VALUES
(12345678, 'ANTONIO', 'GARCIA', '1972-08-05', '', 1, 1),
(12345679, 'JOSE', 'MARTINEZ', '1969-05-24', '', 2, 1),
(12345680, 'FRANCISCO', 'LOPEZ', '1978-09-17', '', 3, 1),
(12345681, 'JUAN', 'SANCHEZ', '1979-01-02', '', 2, 1),
(12345682, 'MANUEL', 'GONZALEZ', '1983-11-28', '', 7, 1),
(12345683, 'PEDRO', 'GOMEZ', '1991-03-23', '', 1, 1),
(12345684, 'JESUS', 'FERNANDEZ', '1998-05-12', '', 2, 1),
(12345685, 'ANGEL', 'MORENO', '1963-06-12', '', 6, 1),
(12345686, 'MIGUEL', 'JIMENEZ', '1967-10-12', '', 3, 1),
(12345687, 'JAVIER', 'PEREZ', '1978-09-06', '', 4, 1),
(12345688, 'JOSE ANTONIO', 'RODRIGUEZ', '1961-05-10', '', 7, 1),
(12345689, 'DAVID', 'NAVARRO', '1982-10-22', '', 3, 1),
(12345690, 'CARLOS', 'RUIZ', '1989-08-15', '', 5, 1),
(12345691, 'JOSE LUIS', 'DIAZ', '1977-05-24', '', 5, 1),
(12345692, 'ALEJANDRO', 'SERRANO', '1984-09-28', '', 4, 1),
(12345693, 'MIGUEL ANGEL', 'HERNANDEZ', '1965-10-04', '', 1, 1),
(12345694, 'FRANCISCO JAVIER', 'MUÑOZ', '1960-09-16', '', 2, 1),
(12345695, 'RAFAEL', 'SAEZ', '1981-08-05', '', 2, 1),
(12345696, 'DANIEL', 'ROMERO', '1977-05-20', '', 1, 1),
(12345697, 'JUAN JOSE', 'RUBIO', '1996-10-16', '', 1, 1),
(12345698, 'LUIS', 'ALFARO', '1985-07-22', '', 2, 1),
(12345699, 'PABLO', 'MOLINA', '1963-06-15', '', 2, 1),
(12345700, 'JUAN ANTONIO', 'LOZANO', '1985-08-04', '', 3, 1),
(12345701, 'JOAQUIN', 'CASTILLO', '1967-07-09', '', 5, 1),
(12345702, 'SERGIO', 'PICAZO', '1987-08-01', '', 3, 1),
(12345703, 'FERNANDO', 'ORTEGA', '1983-04-07', '', 7, 1),
(12345704, 'JUAN CARLOS', 'MORCILLO', '1960-08-04', '', 4, 1),
(12345705, 'ANDRES', 'CANO', '1978-04-17', '', 5, 1),
(12345706, 'JOSE MANUEL', 'MARIN', '1987-02-22', '', 4, 1),
(12345707, 'JOSE MARIA', 'CUENCA', '1995-09-02', '', 3, 1),
(12345708, 'RAMON', 'GARRIDO', '1998-09-18', '', 3, 1),
(12345709, 'RAUL', 'TORRES', '1997-07-14', '', 7, 1),
(12345710, 'ALBERTO', 'CORCOLES', '1980-04-03', '', 2, 1),
(12345711, 'ENRIQUE', 'GIL', '2002-05-24', '', 4, 1),
(12345712, 'ALVARO', 'ORTIZ', '1985-12-27', '', 7, 1),
(12345713, 'VICENTE', 'CALERO', '1983-09-01', '', 5, 1),
(12345714, 'EMILIO', 'VALERO', '1969-12-18', '', 1, 1),
(12345715, 'FRANCISCO JOSE', 'CEBRIAN', '1963-03-14', '', 6, 1),
(12345716, 'DIEGO', 'RODENAS', '1986-03-20', '', 6, 1),
(12345717, 'JULIAN', 'ALARCON', '1989-02-27', '', 3, 1),
(12345718, 'JORGE', 'BLAZQUEZ', '1985-08-04', '', 3, 1),
(12345719, 'ALFONSO', 'NUÑEZ', '1992-08-12', '', 2, 1),
(12345720, 'ADRIAN', 'PARDO', '1982-03-19', '', 2, 1),
(12345721, 'RUBEN', 'MOYA', '1961-09-07', '', 1, 1),
(12345722, 'SANTIAGO', 'TEBAR', '1966-07-08', '', 2, 1),
(12345723, 'IVAN', 'REQUENA', '1996-07-08', '', 2, 1),
(12345724, 'JUAN MANUEL', 'ARENAS', '1992-01-09', '', 3, 1),
(12345725, 'PASCUAL', 'BALLESTEROS', '1968-12-25', '', 1, 1),
(12345726, 'JOSE MIGUEL', 'COLLADO', '1983-12-15', '', 4, 1),
(12345727, 'MARIO', 'RAMIREZ', '1972-10-16', '', 6, 1),
(12345728, 'MARIA', 'GARCIA', '1997-01-09', '', 2, 1),
(12345729, 'MARIA CARMEN', 'MARTINEZ', '1977-12-11', '', 6, 1),
(12345730, 'JOSEFA', 'LOPEZ', '1994-12-05', '', 6, 1),
(12345731, 'ISABEL', 'SANCHEZ', '1962-07-15', '', 2, 1),
(12345732, 'MARIA DOLORES', 'GONZALEZ', '1964-08-26', '', 6, 1),
(12345733, 'CARMEN', 'GOMEZ', '1963-05-08', '', 2, 1),
(12345734, 'FRANCISCA', 'FERNANDEZ', '1994-11-12', '', 6, 1),
(12345735, 'MARIA PILAR', 'MORENO', '1997-09-13', '', 1, 1),
(12345736, 'DOLORES', 'JIMENEZ', '1994-01-15', '', 6, 1),
(12345737, 'MARIA JOSE', 'PEREZ', '1990-05-20', '', 2, 1),
(12345738, 'ANTONIA', 'RODRIGUEZ', '1972-06-04', '', 2, 1),
(12345739, 'ANA', 'NAVARRO', '1961-01-05', '', 2, 1),
(12345740, 'MARIA ISABEL', 'RUIZ', '1985-01-19', '', 1, 1),
(12345741, 'MARIA ANGELES', 'DIAZ', '1979-08-05', '', 6, 1),
(12345742, 'PILAR', 'SERRANO', '1993-06-14', '', 7, 1),
(12345743, 'ANA MARIA', 'HERNANDEZ', '1992-12-20', '', 6, 1),
(12345744, 'LUCIA', 'MUÑOZ', '1999-06-18', '', 6, 1),
(12345745, 'CRISTINA', 'SAEZ', '1978-05-21', '', 2, 1),
(12345746, 'LAURA', 'ROMERO', '1963-07-03', '', 1, 1),
(12345747, 'ENCARNACION', 'RUBIO', '1965-08-17', '', 3, 1),
(12345748, 'JUANA', 'ALFARO', '1970-01-20', '', 5, 1),
(12345749, 'MARIA TERESA', 'MOLINA', '2001-12-13', '', 3, 1),
(12345750, 'ROSARIO', 'LOZANO', '1965-02-26', '', 7, 1),
(12345751, 'ELENA', 'CASTILLO', '1975-12-09', '', 6, 1),
(12345752, 'MARTA', 'PICAZO', '1992-10-10', '', 6, 1),
(12345753, 'MANUELA', 'ORTEGA', '1978-03-22', '', 6, 1),
(12345754, 'ROSA MARIA', 'MORCILLO', '1969-02-28', '', 6, 1),
(12345755, 'MARIA LLANOS', 'CANO', '1971-02-28', '', 1, 1),
(12345756, 'MARIA JOSEFA', 'MARIN', '2002-02-12', '', 3, 1),
(12345757, 'RAQUEL', 'CUENCA', '1983-12-21', '', 1, 1),
(12345758, 'ANGELES', 'GARRIDO', '2000-02-18', '', 4, 1),
(12345759, 'CONCEPCION', 'TORRES', '1967-09-16', '', 1, 1),
(12345760, 'MERCEDES', 'CORCOLES', '1984-01-25', '', 6, 1),
(12345761, 'IRENE', 'GIL', '1983-02-04', '', 7, 1),
(12345762, 'TERESA', 'ORTIZ', '1961-05-18', '', 3, 1),
(12345763, 'BEATRIZ', 'CALERO', '1975-11-08', '', 6, 1),
(12345764, 'PAULA', 'VALERO', '1981-01-21', '', 3, 1),
(12345765, 'ANGELA', 'CEBRIAN', '1986-01-22', '', 3, 1),
(12345766, 'JULIA', 'RODENAS', '1960-02-16', '', 3, 1),
(12345767, 'ANA BELEN', 'ALARCON', '1975-07-26', '', 5, 1),
(12345768, 'ROCIO', 'BLAZQUEZ', '1988-10-05', '', 4, 1),
(12345769, 'AMPARO', 'NUÑEZ', '2000-02-24', '', 1, 1),
(12345770, 'ALICIA', 'PARDO', '1999-02-16', '', 7, 1),
(12345771, 'CONSUELO', 'MOYA', '1965-02-18', '', 5, 1),
(12345772, 'ROSA', 'TEBAR', '1991-03-17', '', 3, 1),
(12345773, 'ASCENSION', 'REQUENA', '1973-07-21', '', 2, 1),
(12345774, 'ANDREA', 'ARENAS', '1968-08-04', '', 6, 1),
(12345775, 'MARIA ROSARIO', 'BALLESTEROS', '1989-10-07', '', 4, 1),
(12345776, 'MARIA JESUS', 'COLLADO', '1965-10-25', '', 4, 1),
(12345777, 'MARIA LUISA', 'RAMIREZ', '1965-11-08', '', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idGrupo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idGrupo` (`idGrupo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
