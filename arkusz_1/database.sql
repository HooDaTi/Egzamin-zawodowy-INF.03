-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               8.0.30 - MySQL Community Server - GPL
-- Serwer OS:                    Win64
-- HeidiSQL Wersja:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Zrzut struktury tabela quotes.daily
CREATE TABLE IF NOT EXISTS `daily` (
  `id` int NOT NULL AUTO_INCREMENT,
  `day` int NOT NULL,
  `quote` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- Zrzucanie danych dla tabeli quotes.daily: ~6 rows (około)
INSERT INTO `daily` (`id`, `day`, `quote`, `author`) VALUES
	(1, 1, 'Sometimes the best way to solve your own problems is to help someone else', 'uncle Iroh'),
	(2, 2, 'Failure is only the opportunity to begin again. Only this time, more wisely', 'uncle Iroh'),
	(3, 3, 'Good times become good memories, but bad times become good lessons', 'uncle Iroh'),
	(4, 4, 'To err is human... to really foul up requires the root password', 'autor nieznany'),
	(5, 5, 'A computer lets you make more mistakes faster than any other invention with the possible exceptions of handguns and Tequila', 'Mitch Ratcliffe'),
	(6, 6, 'Man is a slow, sloppy, and brolliant thinker; computers are fast, accurate, and stupid', 'John Pfeiffer');

-- Zrzut struktury tabela quotes.popular
CREATE TABLE IF NOT EXISTS `popular` (
  `id` int NOT NULL AUTO_INCREMENT,
  `daily_id` int NOT NULL DEFAULT '0',
  `upvotes` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `daily` (`daily_id`),
  CONSTRAINT `daily` FOREIGN KEY (`daily_id`) REFERENCES `daily` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- Zrzucanie danych dla tabeli quotes.popular: ~3 rows (około)
INSERT INTO `popular` (`id`, `daily_id`, `upvotes`) VALUES
	(1, 1, 20),
	(2, 5, 14),
	(3, 6, 23);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
