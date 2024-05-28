CREATE DATABASE banque;
DROP TABLE comptes;
DROP TABLE clients;
use banque;
CREATE TABLE clients (
  client_id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  prenom VARCHAR(255) NOT NULL,
  date_naissance DATE NOT NULL,
  email VARCHAR(255) DEFAULT NULL,
  telephone VARCHAR(25) NOT NULL,
  password VARCHAR(255) NOT NULL,
  etat varchar(255) NOT NULL,
  UNIQUE (email)
);

CREATE TABLE comptes (
  compte_id INT PRIMARY KEY AUTO_INCREMENT,
  client_id INT NOT NULL,
  numero_compte VARCHAR(25) NOT NULL UNIQUE,
  type_compte ENUM('courant', 'epargne') NOT NULL,
  solde DECIMAL(10,2) NOT NULL,
  etat varchar(255) NOT NULL,
  FOREIGN KEY (client_id) REFERENCES clients(client_id)
);

CREATE TABLE transactions (
  transaction_id INT PRIMARY KEY AUTO_INCREMENT,
  compte_id INT NOT NULL,
  date_transaction DATETIME NOT NULL,
  type_transaction ENUM('depot', 'retrait', 'virement') NOT NULL,
  montant DECIMAL(10,2) NOT NULL,
  description TEXT,
  date_transaction DATE NOT NULL,
  etat varchar(255) NOT NULL,
  FOREIGN KEY (compte_id) REFERENCES comptes(compte_id),
  FOREIGN KEY (compte_id) REFERENCES comptes(compte_id)
);

CREATE TABLE utilisateurs (
  utilisateur_id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  prenom VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  mot_de_passe VARCHAR(255) NOT NULL,
  role ENUM('admin', 'employe') NOT NULL,
  etat varchar(255) NOT NULL
);


