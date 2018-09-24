CREATE DATABASE dbannuaire;

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
	PRIMARY KEY (id));