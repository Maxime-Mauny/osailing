                                           # SPE WordPress !



       ## E01: Installation rapide d'un site WordPress avec quelques options

Pour installer WordPress, nous avons besoin de:
    -PHP
    -MySQL
    -Apache (linux) ou IIS (Windows)
Télecharger WOrdPress sur https://fr.wordpress.org/download/

Une fois DL et dezippé, à l'emplacement du WP dans le terminal, taper ces 3 commandes pour gérer les droits et permissions:
    sudo chown -R mint:www-data .
    sudo find . -type f -exec chmod 664 {} +
    sudo find . -type d -exec chmod 775 {} +

Dans le VSC, dans le fichier wp-config.php:
    - Définir les mises a jours automatique --       define('FS_METHOD', 'direct');
    - Supprimer l'éditeur de code du tableau de bord --      define('DISALLOW_FILE_EDIT', 'true');

Dans le tableau de bord, sur le navigateur, dans réglages/permaliens, cocher 'Titre de la Publication'
Cela va créer le fichier .htaccess

Pour avoir les droit de modifications sur le .htaccess, rejouer les 3 commandes précedentes et rajouter la nouvelle ci dessous

    sudo chown -R mint:www-data .
    sudo find . -type f -exec chmod 664 {} +
    sudo find . -type d -exec chmod 775 {} +
    sudo chmod 644 .htaccess

Maintenant que nous avons le droit de modification sur le fichier .htaccess, nous allons le modifier de la sorte.

    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . index.php [L]

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



       ## E02: Création d'une Base solide, pour créer un site WordPress avec 'composer', puis découverte de NPM.

COMPOSER

Voici la liste des fichiers dont nous avons besoin pour cette manip:
Fichiers personnalisés, dans lesquels plusieurs options ont etaient écrites.

    - Un dossier 'content' qui contient un fichier 'index.php'
    - Un fichier 'composer.json'
    - Un fichier 'composer.lock'
    - Un fichier 'index.php'
    - Un fichier 'wp-config-sample.php'
    - Un fichier '.gitignore'
    - Un fichier '.htaccess'

Une fois tous ces fichier ok, il nous suffit de taper la cmd suivante dans le terminal:

    - composer install


NPM

NPM va nous permettre d'installer via de simples commandes, des dépendances de développement (packages)

    - npm install bootstrap  =>  permet d'installer BOOTSTRAP
    - npm install jquery  =>  permet d'installer JQUERY
    - npm font-awesone  =>  permet d'installer FONT-AWESOME

Nous avons aussi installé 'BROWSER-SYNC', ce qui permet au navigateur web de se refresh a chaque ctrl+s d'un fichier, permettant un refresh automatique et de voir directement les changements, le F5 c'est terminé !!!

    browser-sync start --server --files *


        ## E03 Webpack

# Modèle de configuration de Webpack pour WordPress

## Réutilisation

1. Cloner le repo `git clone git@github.com:O-clock-Quantum/WP-Pattern-Webpack-christopheOclock.git`
2. Renommer le dossier cloné `mv WP-Pattern-Webpack-christopheOclock <nomduprojet>`
3. Se rendre dans le dossier `cd <nomduprojet>`
4. Supprimer le dossier `.git` afin de repartir d'un repo tout neuf `sudo rm -R .git`
5. Initialisation d'un git tout beau tout neuf `git init`
6. Premier versionning de notre repo:
    - `git add .`
    - `git commit -m "First Commit"`
    - `git remote add origin git@github.com:<votre_orga>/<votre_repo>.git`
    - `git push -u origin master`

## Installation

1. Exécuter dans le répertoire la commande `npm install` qui va installer toute les dépendances Node.js nécessaire au bon fonctionnement de l'application.
2. Exécuter une des commandes ci-dessous.

## Commandes disponibles

- `npm run start` : Démarre le serveur de développement en utilisant [Browsersync](https://www.browsersync.io/)
- `npm run build:dev` : Génère les ressources front sans compression en vue d'une utilisation dans un environnement de développemnt
- `npm run build:prod` : Génère les ressources front avec compression (minify, uglify) en vue d'une utilisation dans un environnement de production
- `npm run clean` : Supprime les fichiers générés par Webpack
- `npm run clean:all` : Supprime les fichiers générés par Webpack ainsi que le répertoire des dépendances installées avec NPM (`node_modules`)

Extension à installer sur WP via terminal "SImply Show Hooks"
    composer require --dev wpackagist-plugin/simply-show-hooks

