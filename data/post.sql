SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `rank` int(11),
  `pontos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `post` (`nome`, `rank`, `pontos`) VALUES
('Maria', 2, 100),
('Bruno', 4, 50),
('Maria', 3, 80),
('Ayla', 1, 200),
('Vera', 11, 47),
('Deby', 8, 70);
