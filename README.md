## Pré-requis
*Il est essentiel avant tout d'avoir d'installé au préalable :*
- une base de donnée **_MYSQL_**
- un server **_Apache_**
- **_PHP 8.1.X_** minimum

## Installation

Première étape

```bash
git clone https://github.com/hraffaelli/Laravel-NFE114.git 
```
```bash
cd Laravel-NFE114
```
```bash
git checkout v2
```

**Renommer le *_.env.exemple_* en *_.env_* dans le projet.**\
**Modifier le fichier *_.env_* pour nommer votre et se connecter à votre base de donnée**

**Si vous n'avez pas de vendor déjà d'installé il faut faire :**
```bash
composer install
```
**Avec le CLI de Laravel, il vous faut ses commandes pour créer la base de donnée avec le nom mis dans le *_.env_* et intéger des données afin de pouvoir se connecter au profil *_Tamatoa_* :**
```bash
php artisan migrate
```
```bash
php artisan db:seed
```

**Pour démarrer le service back**
```bash
php artisan serve
```

**Pour démarrer le service front**
```bash
npm run dev
```
*Si cela ne démarre pas avec npm, il vous faut installer nodejs LTS :*
```bash
https://nodejs.org/en
```

## Pour se connecter

*Pour vous connecter il vous faut cliquer sur **login** mettre ces credentials :*

```python
Identifiant en tant que Coach:
- Email : tamatoa@example.com
- Mdp : 123456

Identifiant en tant que Rameur:
- Email : teva@example.com
- Mdp : 123456
```

## Fonctionnalités

Le Coach:

-   Créer, modifier, voir et supprimer une Séance
-   Créer modifier, voir et supprimer un Rameur

Le Rameur:

-   Voir, modifier et supprimer son profile
-   Participer ou annuler une/ou plusieurs séance(s) et de choisir son poste

En plus:

-   Si la séance est pleine, cela change le statut de la séance en *complet*

## Contributeurs

- Heremoana
- Richard
- Hiomai
- Tevahinemoeatere

## License

[MIT](https://choosealicense.com/licenses/mit/)
