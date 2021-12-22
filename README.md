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
Les articles sont visibles sur plusieurs pages :
- **Tous les articles**
- **Recherche**

La page de recherche permet une recherche textuelle par marque, nom de l'article,ou catégorie.


### Catégories
Les catégories possèdent deux pages :
- **Liste des catégories**
- **Affichage d'une catégorie**

On peut lister toutes les catégorie et cliquer sur l'une d'entre elles, ce qui nous emmène sur la page d'affichage d'une catégorie précisément, et des articles concernés. On a une photo spécifique a la catégorie ainsi qu'une description.


### Marques
Les marques possèdent deux pages :
- **Liste des marques**
- **Affichage d'une marque**

On peut lister toutes les marques et cliquer sur l'une d'entre elles, ce qui nous emmène sur la page d'affichage d'une marque précisément, et des articles concernés. On a une photo spécifique a la marque ainsi qu'une description.


### Commandes
La partie des commandes se fait sur trois pages

- **Panier**
- **Finalisation d'une commande**
- **Historique des commandes**

Le **panier** est une page accessible partout sur le site, permettant de consulter le contenu de son panier.

La **finalisation d'une commande** apparaît lorsque l'utilisateur souhaite finaliser sa commande, depuis la page du panier.

Enfin, l'**historiqe des commandes** est une page permettant à l'utilisateur de consulter son historique de commande, ainsi que d'éditer une facture en PDF.


### Administrateur
Les utilisateurs ayant le rôle utilisateur (rôle devant forcément être mis à la mainen base pour des raisons de sécurité évidentes) ont accès à un panel de pages permettant la gestion de l'application.

Les différentes pages auxquelles ils peuvent accéder sont :

- **Ajout de marque**
- **Modification de marque**
- **Ajout de catégorie**
- **Modification de catégorie**
- **Ajout d'article**
- **Modification de article**
- **Historique des commandes**

Un administrateur peut donc à la volée ajouter des entités, mais aussi les modifier.

Il peut également consulter la liste des commandes passées par les utilisateurs, et peut cliquer sur un de ces derniers pour consulter uniquement l'historique d'un utilisateur en particulier.
