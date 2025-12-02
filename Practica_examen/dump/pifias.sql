SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pifias`
--

-- --------------------------------------------------------

--
-- Table structure for table `juegos`
--

CREATE TABLE `juegos` (
  `id` int NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `num_jugadores` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `juegos`
--

INSERT INTO `juegos` (`id`, `titulo`, `descripcion`, `imagen`, `num_jugadores`) VALUES
(1, 'Pathfinder', 'Un sistema detallado para aventuras increíbles.', 'fotos/pathfinder.jpg', 6),
(2, 'Dungeons & Dragons', 'Explora mazmorras y vive épicas aventuras.', 'fotos/dungeons-dragons.png', 6),
(3, 'La llamada de Cthulhu', 'Investiga los misterios de los Mitos de Cthulhu.', 'fotos/chtulhu.jpg', 5),
(4, 'Shadowrun', 'Ciberpunk y magia en un futuro distópico.', 'fotos/shadowrun.jpg', 6),
(5, 'Star Wars RPG', 'Vive aventuras en una galaxia muy, muy lejana.', 'fotos/star-wars.jpeg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `partidas`
--

CREATE TABLE `partidas` (
  `id` int NOT NULL,
  `juego_id` int NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `master_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `partidas`
--

INSERT INTO `partidas` (`id`, `juego_id`, `fecha`, `hora`, `master_id`) VALUES
(1, 1, '2024-11-20', '18:00:00', 1),
(2, 1, '2024-11-22', '19:30:00', 2),
(3, 1, '2024-11-25', '17:00:00', 3),
(4, 2, '2024-11-21', '20:00:00', 2),
(5, 2, '2024-11-23', '16:00:00', 4),
(6, 3, '2024-11-24', '18:30:00', 3),
(7, 3, '2024-11-26', '19:00:00', 1),
(8, 3, '2024-11-28', '20:00:00', 4),
(9, 3, '2024-11-30', '17:00:00', 2),
(10, 4, '2024-11-20', '18:00:00', 3),
(11, 4, '2024-11-22', '20:00:00', 1),
(12, 4, '2024-11-24', '19:30:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `socios`
--

CREATE TABLE `socios` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `elegible_master` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `socios`
--

INSERT INTO `socios` (`id`, `username`, `nombre`, `apellidos`, `elegible_master`) VALUES
(1, 'jlopez', 'Juan', 'López Suárez', 0),
(2, 'mmartinez', 'María', 'Martínez Rodríguez', 0),
(3, 'clopez', 'Carlos', 'López Fernández', 1),
(4, 'afernandez', 'Ana', 'Fernández Martínez', 0),
(5, 'drueda', 'David', 'Rueda Rodríguez', 1),
(6, 'lruiz', 'Laura', 'Ruiz Gómez', 0);

-- --------------------------------------------------------

--
-- Table structure for table `socios_partida`
--

CREATE TABLE `socios_partida` (
  `id` int NOT NULL,
  `partida_id` int NOT NULL,
  `socio_id` int NOT NULL,
  `puntuacion` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `socios_partida`
--

INSERT INTO `socios_partida` (`id`, `partida_id`, `socio_id`, `puntuacion`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL),
(3, 1, 3, NULL),
(4, 2, 2, NULL),
(5, 2, 4, NULL),
(6, 3, 1, NULL),
(7, 3, 3, NULL),
(8, 3, 5, NULL),
(9, 3, 6, NULL),
(10, 4, 3, NULL),
(11, 4, 4, NULL),
(12, 5, 1, NULL),
(13, 6, 2, NULL),
(14, 6, 4, NULL),
(15, 6, 5, NULL),
(16, 7, 3, NULL),
(17, 8, 1, NULL),
(18, 8, 4, NULL),
(19, 9, 5, NULL),
(20, 9, 6, NULL),
(21, 10, 2, NULL),
(22, 10, 3, NULL),
(23, 10, 4, NULL),
(24, 11, 1, NULL),
(25, 11, 6, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `juego_id` (`juego_id`),
  ADD KEY `master_id` (`master_id`);

--
-- Indexes for table `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socios_partida`
--
ALTER TABLE `socios_partida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partida_id` (`partida_id`),
  ADD KEY `socio_id` (`socio_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partidas`
--
ALTER TABLE `partidas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `socios_partida`
--
ALTER TABLE `socios_partida`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `partidas_ibfk_1` FOREIGN KEY (`juego_id`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `partidas_ibfk_2` FOREIGN KEY (`master_id`) REFERENCES `socios` (`id`);

--
-- Constraints for table `socios_partida`
--
ALTER TABLE `socios_partida`
  ADD CONSTRAINT `socios_partida_ibfk_1` FOREIGN KEY (`partida_id`) REFERENCES `partidas` (`id`),
  ADD CONSTRAINT `socios_partida_ibfk_2` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
