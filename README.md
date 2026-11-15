# Médiathèque IPNET — TP1 PHP

Mini-site de catalogue réalisé en PHP 8+, sans framework et sans base de données. Les livres sont définis dans `data/livres.php` sous forme de tableau associatif.

## Prérequis
- PHP 8.0 ou supérieur (extension standard DateTime).
- Au choix : PHP en ligne de commande, XAMPP, WAMP ou MAMP.

## Installation et lancement
1. Décompresser le dossier `mediatheque-mp1` dans le répertoire web local de votre environnement (par exemple `htdocs` pour XAMPP).
2. Depuis un terminal, se placer dans ce dossier et démarrer le serveur PHP :
   ```bash
   php -S localhost:8000
   ```
3. Ouvrir `http://localhost:8000` dans le navigateur. Arrêter le serveur avec `Ctrl+C`.

Avec XAMPP/WAMP/MAMP, démarrer Apache puis ouvrir l’adresse locale correspondant au dossier placé dans `htdocs`/`www`.

## Fonctionnalités
- Accueil : bienvenue, total des livres et nombre de livres disponibles.
- Catalogue : affichage des 8 ouvrages et filtre par catégorie (`catalogue.php?categorie=roman`). Catégories inconnues et résultats vides traités proprement.
- Fiche d’un livre : `detail.php?id=3`; ID absent, mal formé ou inconnu traité sans erreur fatale.
- À propos : présentation et date du jour (fuseau Africa/Lomé).
- Protection des valeurs affichées avec `htmlspecialchars()` via la fonction `e()`.

## Organisation
- `index.php`, `catalogue.php`, `detail.php`, `apropos.php` : pages du site.
- `data/livres.php` : données (8 livres).
- `includes/fonctions.php` : `afficherLivre`, `filtrerParCategorie`, `trouverLivreParId`, `compterLivresDisponibles` et fonction d’échappement `e`.
- `includes/header.php`, `includes/footer.php` : éléments partagés.
- `css/style.css` : styles.

## Vérifications rapides
- `http://localhost:8000/catalogue.php?categorie=roman` : filtre valide.
- `http://localhost:8000/catalogue.php?categorie=inconnue` : message de catégorie invalide.
- `http://localhost:8000/detail.php?id=3` : détail du Petit Prince.
- `http://localhost:8000/detail.php?id=999` ou `detail.php` : message propre d’erreur.

## Git
Pour initialiser le dépôt local :
```bash
git init
git add .
git commit -m "Créer le catalogue PHP de la médiathèque"
```
Après création d’un dépôt distant personnel, ajouter son URL avec `git remote add origin URL_DU_DEPOT`, puis pousser avec `git push -u origin main`.
