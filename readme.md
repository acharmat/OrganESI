!<p align="center">[alt OrganESI](https://img4.hostingpics.net/thumbs/mini_517635logo.jpg)</p>

## Présentation du projet 

Ce travail s’inscrit dans le cadre des projets pluridisciplinaires réalisés lors de la 1ème année Cycle Supérieure à  l'école supérieure d'informatique de Sidi Bel Abbes.
 L’objectif de notre travail est de réaliser une application web «Conception et réalisation d’un système de gestion du personnel d’enseignant».
 
Notre application que nous avons nommé « OrganESI» a pour but de mettre sur pieds une solution d’optimisation de la gestion du personnel d’enseignants, le souhait d’utilisateur de cette application est :
- Avoir un suivi permanant du personnel 
- L'organisation et l’informatisation de la gestion du personnel
- Automatiser les tâches administratives et de réduire ainsi les risques d’erreurs lors du calcul des charges
- Simplifier et optimiser la gestion du personnel en permettant aux personnes en charge de cette fonction de gagner du temps tout en leur apportant une vision globale et stratégique des ressources humaines de l’Ecole
- Assurer que le travail est effectué correctement et dans les délais
- Permettent de fournir des informations fiables


## Requirements

- php >= 5.4 
- Laravel 5
- MySQL
- Composer

## Installation

Modifier les données dans le fichier .env :

``` bash
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Utiliser la commande suivante pour créer les tables de la bases de données :

``` bash
php artisan migrate
```

Utiliser la commande suivante pour créer un administrateur pour votre systeme :

``` bash
php artisan db:seed --class=AdministrateurTableSeeder
```
- E-mail : administrateur@esi-sba.dz 
- Mot de passe : 123456   

## Manuel d’utilisation

Télecharger le [Manuel d’utilisation](#).

