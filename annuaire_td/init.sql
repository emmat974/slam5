DROP DATABASE IF EXISTS dbannuaire;

CREATE DATABASE IF NOT EXISTS dbannuaire;
use dbannuaire;

CREATE TABLE IF NOT EXISTS  employes (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	prenom VARCHAR(30) NOT NULL,
	nom VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	age INT(3),
	ville VARCHAR(50),
	date TIMESTAMP,
	droit int(3),
	motdepasse text,
	sexe varchar(30)
);