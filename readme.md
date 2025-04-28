# 🐾 PetVeto

Bienvenue sur **PetVeto** — une application moderne de gestion vétérinaire, conçue pour simplifier la prise en charge des animaux, la gestion des soins et le suivi des utilisateurs dans un environnement sécurisé.

## Sommaire
- [🐾 PetVeto](#-petveto)
  - [Sommaire](#sommaire)
  - [Présentation du projet](#présentation-du-projet)
    - [Les outils](#les-outils)
    - [Installation :](#installation-)
  - [Installer les bundles nécessaires](#installer-les-bundles-nécessaires)
  - [Démarrage](#démarrage)

---

## Présentation du projet

**PetVeto** est une plateforme web qui permet :
- La création et la gestion de **comptes utilisateurs** (propriétaires d'animaux)
- La création et la gestion de **comptes vétérinaires** (vétos)
- La gestion des **animaux** associés aux utilisateurs
- L'enregistrement et le suivi des **soins vétérinaires**
- La sécurisation des accès via **authentification par mot de passe hashé**

---
### Les outils
- PHP Version 8.3.11
- MySQL sous docker ou installation local
- Symfony version 7.2.5 avec CLI, [Installer Symfony](https://symfony.com/doc/current/setup.html)

- Composer
- npm install
  

### Installation :
Après avoir cloné le projet avec  "git clone https://github.com/ton-compte/petveto.git"
Exécutez la commande *cd petveto* pour vous rendre dans le dossier depuis le terminal.

1) composer install afin d'installer toutes les dépendances composer du projet.

2) npm install afin d'installer toutes les dépendances npm du projet.

4) Paramétrer la création de votre base de donnée, dans le fichier .env du projet, et modifier la variable d'environnement :

**DATABASE_URL="mysql://appdb:password@127.0.0.1:3307/app?serverVersion=8.0&charset=utf8mb4**

Puis exécuter la création de la base de donnée avec la commande : php bin/console doctrine:database:create

5) vérifie que ta base de données correspond bien à tes entités : php bin/console doctrine:schema:validate

6) crée une 1ere migration : php bin/console make:migration

7) Exécuter la migration en base de donnée : php bin/console doctrine:migration:migrate

8) Exécuter les dataFixtures avec la commande : php bin/console doctrine:fixtures:load
Ceci créera :

   - Plusieurs utilisateurs (propriétaires d'animaux)

   - Plusieurs vétérinaires

   - Des animaux liés à des utilisateurs

   - Des soins associés aux animaux

1) puis lancer la BDD via : docker compose up -d (ou installer MySQL en local)

2)  connectez-vous au serveur : symfony server:start

## Installer les bundles nécessaires

```bash
composer require symfony/security-bundle
composer require symfony/orm-pack
composer require zenstruck/foundry --dev
composer require fakerphp/faker --dev
composer require doctrine/doctrine-fixtures-bundle --dev
```

## Démarrage

Une fois sur l'application, il vous pouvez vous créer un compte "véto" et un compte "user" et visiter l'application (Les pages sont protégés.).  
 Pour tester les fixtures le mot de passe est hashé dans la BDD, mais il est identique pour tous les user et veto : mdp123456


