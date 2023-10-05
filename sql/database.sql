-- Créer la base de données
CREATE DATABASE medical_site;

-- Sélectionner la base de données
USE medical_site;

-- Créer la table userssite
CREATE TABLE user (
  id INT NOT NULL AUTO_INCREMENT,
  login VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,site
  mail VARCHAR(255) NOT NULL,
  admin BOOLEAN NOT NULL,
  PRIMARY KEY (id)
);

-- Créer la table ordonnance
CREATE TABLE ordonnance (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  nom_medecin VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

-- Ajouter quelques données à la table users
INSERT INTO users (login, password, mail, admin)
VALUES
('johndoe', '123456', 'johndoe@example.com', FALSE),
('janedoe', '654321', 'janedoe@example.com', TRUE);

-- Ajouter quelques données à la table ordonnance
INSERT INTO ordonnance (nom, date, nom_medecin)
VALUES
('Ordonnance 1', '2023-07-20', 'Dr. Dupont'),
('Ordonnance 2', '2023-08-03', 'Dr. Martin');
