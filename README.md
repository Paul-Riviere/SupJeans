# SupJeans
Proposition de correction du projet de 2PHPD 2021-2022



## Présentation
Cette application web sert de e-commerce pour une société de vente de jeans, nommée JeanStore.
Un utilisateur peut parcourir une liste de jeans en vente, consulter les détails, faire diverses recherches.
Il peut aussi créer un compte et s'identifier pour passer une commande et consulter son historique de commandes.

## Installation

### Base de données
**ATTENTION :** La base de données est en **MySQL** comme le précisait le sujet.

Une fois la base vierge créée (ici ***'supjeans'*** mais ce nom peut être changé, il faut juste adapter le script) il faut lancer le script ***DB.sql*** sous le répertoire ***/database*** qui créera les tables selon le schéma ci-dessous :

![Image manquante ?](https://github.com/Paul-Riviere/SupJeans/blob/main/database/DB.png?raw=true)

Dans un soucis de praticité, et puisque ceci est un projet de cours, les items n'ont pas d'id propre. Un item possède un id, mais pas de numéro de lot ni de numéro permettant différencier le même article sur deux commandes différentes. Sur le reçu de la commande, seul le nom de l'article sera affiché (avec sa marque et sa catégorie) mais sans aucun numéro unique.

Toujours dans un soucis de praticité, les mots de passe des utilisateurs seront stockés en clair sans chiffrement, une sécurisation peut se mettre en place assez facilement.

Une fois la base prête, les tables seront peuplées d'articles (et catégories/marques) et un utilisateur administrateur sera créé les informations suivantes pour se connecter :
- Mail : admin@admin.com
- Mot de passe : root

Un utilisateur de test avec les informations suivantes sera aussi créé :
- Mail : user@test.com
- Mot de passe : user

Cet utilisateur a un historique de commandes déjà rempli afin de pouvoir parcourir le site et que tout soit alimenté.

### Configuration
Une fois la base de donnée importée, il faut changer le fichier ***conf.php*** sous le répertoire ***/include*** pour correspondre à la base de données de l'environnement sur lequel on déploie l'application :
```php
$SOURCE = 'localhost' // Ou 123.456.789.123
$PORT = '3306' // 3306 est le port par défaut de mySQL
$NOM_DB = 'supjeans' // Ou le nom donné lors de l'import si différent
$MDP_DB = 'root' // A changer (ou non) en fonction du mot de passe utilisé
```

Une fois la configuration terminée l'application est prête à être utilisée.

## Utilisation
### Compte
Les pages liées au compte sont les suivantes :
- **Inscription**
- **Connexion**
- **Profil**

Le nom de ses pages est assez parlant et ne nécessite pas plus d'explications, on peut les retrouver dans le menu (une fois connecté, le bouton **Connexion** sera remplacé par **Déconnexion**)

### Articles
#### Utilisateur
#### Administrateur
### Catégories
#### Utilisateur
#### Administrateur
### Marques
#### Utilisateur
#### Administrateur
### Commandes
