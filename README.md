# Mini Application Bibliothèque - Symfony 7

## Présentation

Ce projet est une mini-application web développée avec le Framework Symfony 7.  
Il s'agit d'un système de gestion d'une bibliothèque permettant aux utilisateurs de consulter des livres, de s'inscrire, se connecter et d'emprunter des ouvrages.  
L'application respecte une architecture MVC propre, avec un design moderne, fluide et responsive.

---

## Fonctionnalités implémentées

| Fonctionnalité                                           | Points | Statut          |
|---------------------------------------------------------|--------|-----------------|
| Système d’authentification complet (inscription, connexion, désabonnement) avec rôles `ROLE_ADMIN` et `ROLE_USER` | 2      | ✅ Terminé       |
| CRUD complet de l'entité principale (Livre) accessible uniquement par `ROLE_ADMIN` | 1      | ✅ Terminé       |
| Relation entre entités (Livre - Auteur, Emprunt - Livre, Emprunt - User) | 1      | ✅ Terminé       |
| Affichage conditionnel (affichage du statut `disponible` d’un livre) | 1      | ✅ Terminé       |
| Mise à jour métier (rendre un livre, confirmer un emprunt) | 1      | ✅ Terminé       |
| Affichage des éléments liés à l’utilisateur connecté (liste des emprunts) | 2      | ✅ Terminé       |
| Bonne pratique de programmation (code propre, commentaires, utilisation de services et DI) | 1      | ✅ Terminé       |

**Total Points obtenus : 9 / 10**

---

## Structure du projet

- `src/Entity/` : Contient les entités Doctrine (`User`, `Livre`, `Auteur`, `Emprunt`)  
- `src/Controller/` : Contrôleurs Symfony gérant les routes, authentification, gestion des livres, emprunts  
- `templates/` : Vues Twig avec un design responsive basé sur Bootstrap 5  
- `config/` : Configuration Symfony, sécurité, base de données  
- `public/` : Ressources publiques (CSS, JS, images)  

---

## Installation & Lancement

### Prérequis

- PHP >= 8.1  
- Composer  
- Serveur web (ex: Apache via WAMP)  
- Base de données MySQL  

### Étapes

1. Cloner le dépôt :  
   ```bash
   git clone https://github.com/Boubacar2412/bibliotheque-symfony
   cd ton-projet
Installer les dépendances :

bash

composer install
Configurer la base de données dans .env (exemple) :

ini

DATABASE_URL="mysql://root:@127.0.0.1:3306/bibliotheque?serverVersion=8.0"
Créer la base et exécuter les migrations :

bash

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
Lancer le serveur local Symfony :

bash

symfony server:start
Accéder à l'application via : http://localhost:8000

Choix techniques
Framework : Symfony 7

ORM : Doctrine

Sécurité : système d’authentification avec rôles ROLE_ADMIN et ROLE_USER

Design : Bootstrap 5 pour un rendu responsive et moderne

Validation : Utilisation des contraintes Symfony pour la validation des formulaires

Gestion des emails : Confirmation d’inscription avec email (optionnel selon configuration)

Auteur
Nom : Boubacar Diallo

Email : boubacar3030diallo@gmail.com

Projet réalisé dans le cadre d’un exercice pédagogique en Juin 2025

Licence
Ce projet est distribué sous licence MIT.