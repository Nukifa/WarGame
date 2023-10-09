# WarGame
Application web vulnerable permetant de réaliser des tests d'intrusions.

### Pré-requis
environement Docker fonctionel

### Installation

Dites ce qu'il faut faire...
* docker build -t docker .
* docker run --rm -it --name SiteMedical -p 8080:80 -d docker
* docker exec -it SiteMedical /bin/bash
* /usr/local/bin/init.sh


## Fonctoinnalité
Lors de l'arrivée sur le site l'utilisateur n'accés qu'a deux page l'accueil et la page de connection.
Il peut alors ce connecter afin d'avoir accés a la page d'importation d'ordonance.
Une fois connecter il peut egalement consulter c'est traitement sur la page d'accueil et pour finir il peut se deconnecter afin d'utilisé un autre compte. 


## Fabriqué avec

_exemples :_
* PHP interpreteur de code
* Postgresql système de gestion de base de données relationnelle
* Docker plateforme permettant de lancer certaines applications dans des conteneurs logiciels

## Auteurs

Listez le(s) auteur(s) du projet ici !
* **Rayot Paul** 
* **Brechet Axel**
* **Marc-Olivier Rancoeur**
