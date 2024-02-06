## Installation

Première étape

```bash

git checkout v2

Modifier le fichier .env avec vos données

php artisan migrate

php artisan db:seed
```

## Usage

```python
Identifiant Coach:
- Email : tamatoa@example.com
- Mdp : 123456

Identifiant Rameur:
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

-   Si la séance est plein, change le statut de la séance en complet

## Contributeurs

Heremoana
Richard
Hiomai
Tevahinemoeatere

## License

[MIT](https://choosealicense.com/licenses/mit/)
