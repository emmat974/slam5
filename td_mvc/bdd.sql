CREATE DATABASE dbannuaire;


CREATE TABLE categories(
	id integer AUTO_INCREMENT NOT NULL,
	name varchar(30) NOT NULL,
	description text,
	PRIMARY KEY (id));

CREATE TABLE employes(
	id integer AUTO_INCREMENT NOT NULL,
	prenom varchar(50) NOT NULL,
	nom varchar(50) NOT NULL,
	email varchar(50),
	age int(3),
	ville varchar(50),
	motdepasse text NOT NULL,
	sexe varchar(10),
	droit int(3) NOT NULL,
	idcat integer NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (idcat) REFERENCES categories(id));

INSERT INTO categories(id,name,description) VALUES(
	1,"Cadre","Un rôle qui paie bien et c'est franchement très sympa"),
	(2,"Non-Cadre","Un rôle qui paie moins bien mais c'est toujours franchement très sympa");

INSERT INTO `employes` (`id`, `prenom`, `nom`, `email`, `age`, `ville`, `motdepasse`, `sexe`, `droit`, `idcat`) VALUES
(1, 'Tony', 'EMMA', 'emma.tony.georges@gmail.com', 23, 'Etang-SalÃ©', '$2y$10$dlTjuyDK6M78eRugXaWGEOikKnGGvSyu./Ce7PZdHBfXRyKltxup.', 'Homme', 2, 1),
(2, 'test', 'test', 'test@test.com', 21, 'test', '$2y$10$5Lnu/2stseUHVNcHd6Fyguopa4SAdLu.g5rpCGbinyPRyWDymwQH2', 'Homme', 0, 2);