CREATE TABLE `pies` (
`Id` int(11) NOT NULL,
`Idwlasciciela` int(11) DEFAULT NULL,
`Imie` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
`Rasa` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
`DataUrodzenia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `szkolenie` (
`Id` int(11) NOT NULL,
`IdPsa` int(11) DEFAULT NULL,
`DataSzkolenia` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `wlasciciel` (
`Id` int(11) NOT NULL,
`Imie` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
`Nazwisko` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL,
`AdresMail` varchar(30) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

ALTER TABLE `pies` ADD PRIMARY KEY (`Id`), ADD KEY `Idwlasciciela` (`Idwlasciciela`);

ALTER TABLE `szkolenie` ADD PRIMARY KEY (`Id`), ADD KEY `IdPsa` (`IdPsa`);

ALTER TABLE `wlasciciel` ADD PRIMARY KEY (`Id`);

ALTER TABLE `pies` MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `szkolenie` MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `wlasciciel` MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pies` ADD CONSTRAINT `pies_ibfk_1` FOREIGN KEY (`Idwlasciciela`) REFERENCES `wlasciciel` (`Id`);

ALTER TABLE `szkolenie` ADD CONSTRAINT `szkolenie_ibfk_1` FOREIGN KEY (`IdPsa`) REFERENCES `pies` (`Id`);
