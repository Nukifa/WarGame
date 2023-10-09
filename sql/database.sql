-- Créer la base de données
CREATE DATABASE medical_site;

-- Sélectionner la base de données
\c medical_site;

-- Créer la table userssite
CREATE TABLE user (
  login VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,site
  mail VARCHAR(255) NOT NULL,
  admin BOOLEAN NOT NULL,
  PRIMARY KEY (login)
);

-- Créer la table ordonnance
CREATE TABLE ordonnance (
  id INT NOT NULL AUTO_INCREMENT,
  user VARCHAR(255) NOT NULL,
  nom VARCHAR(255) NOT NULL,
  medicament VARCHAR(255) NOT NULL,
  frequence VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  nom_medecin VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT user_ordonance_fk FOREIGN KEY(user) REFERENCES user(login)
);

-- Ajouter quelques données à la table users
INSERT INTO users (login, password, mail, admin)
VALUES
('johndoe', '123456', 'johndoe@example.com', FALSE),
('janedoe', '654321', 'janedoe@example.com', TRUE);

-- Ajouter quelques données à la table ordonnance
INSERT INTO ordonnance (nom, date, nom_medecin)
VALUES
('johndoe', 'Ordonnance 1', 'doliprane', '2x par jour midi et soir', '2023-07-20', 'Dr. Dupont'),
('johndoe', 'Ordonnance 2', 'smecta', 'tous les soirs pendant 3 jours', '2023-08-03', 'Dr. Martin');
