-- Créer la base de données
CREATE DATABASE medical_site;

-- Sélectionner la base de données
\c medical_site;

-- Créer la table userssite
CREATE TABLE users (
  login VARCHAR(255) NOT NULL PRIMARY KEY,
  password VARCHAR(255) NOT NULL,
  mail VARCHAR(255) UNIQUE NOT NULL,
  admin BOOLEAN NOT NULL
);

-- Créer la table ordonnance
CREATE TABLE ordonnance (
  id SERIAL PRiMARY KEY,
  login VARCHAR(255) NOT NULL,
  nom VARCHAR(255) NOT NULL,
  medicament VARCHAR(255) NOT NULL,
  frequence VARCHAR(255) NOT NULL,
  date DATE NOT NULL,
  nom_medecin VARCHAR(255) NOT NULL,
  CONSTRAINT users_ordonance_fk FOREIGN KEY(login) REFERENCES users(login)
);

-- Ajouter quelques données à la table users
INSERT INTO users (login, password, mail, admin)
VALUES
('johndoe', '123456', 'johndoe@example.com', TRUE),
('janedoe', '654321', 'janedoe@example.com', FALSE);

-- Ajouter quelques données à la table ordonnance
INSERT INTO ordonnance (login, nom, medicament, frequence, date, nom_medecin)
VALUES
('johndoe', 'Ordonnance 1', 'doliprane', '2x par jour midi et soir', '2023-07-20', 'Dr. Dupont'),
('johndoe', 'Ordonnance 2', 'smecta', 'tous les soirs pendant 3 jours', '2023-08-03', 'Dr. Martin');
