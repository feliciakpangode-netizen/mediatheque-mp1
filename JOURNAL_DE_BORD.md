# Journal de bord — TP1 PHP

**Projet :** Catalogue dynamique « Médiathèque IPNET »  
**UE :** IT 231 — Développement Web I

## Travail réalisé
J’ai organisé le projet en pages distinctes et placé les livres dans un tableau associatif PHP. J’ai créé des fonctions réutilisables pour afficher une ligne, filtrer une catégorie, retrouver un ouvrage à partir de son identifiant et compter les livres disponibles. Les pages partagent un en-tête et un pied de page avec `require`.

J’ai ensuite réalisé l’accueil, le catalogue filtrable, la fiche détail et la page « À propos ». Les paramètres reçus dans l’URL sont vérifiés : une catégorie inconnue, un identifiant absent ou un identifiant invalide entraîne un message compréhensible. Les valeurs textuelles injectées dans le HTML sont échappées avec `htmlspecialchars()` afin de limiter les risques d’injection HTML/JavaScript.

## Difficultés et solutions
La difficulté principale est de faire circuler les mêmes données entre plusieurs pages sans base de données. La solution retenue est de charger `data/livres.php` avec `require_once` dans les pages qui en ont besoin. Une autre difficulté est de traiter correctement les valeurs de `$_GET` : elles peuvent être absentes ou mal formées, donc elles sont vérifiées avant la recherche. Enfin, l’échappement HTML doit être appliqué au moment de l’affichage, pas confondu avec la validation des paramètres.

## Ce que j’ai appris
Un tableau PHP peut jouer le rôle d’une petite source de données. Les fonctions évitent de répéter la logique, les includes permettent de réutiliser des parties de page, et PHP peut générer le HTML à partir des données. J’ai aussi compris qu’une URL comme `?id=3` transmet une valeur au serveur, mais que cette valeur doit toujours être contrôlée.

## Vérifications à effectuer sur l’ordinateur de l’étudiant
Lancer le serveur local et tester l’accueil, une catégorie existante (`roman`), une catégorie inconnue, un ID existant (`3`), un ID inexistant (`999`) et l’absence d’ID. Ajouter les fichiers au dépôt Git personnel et adapter ce journal avec les difficultés effectivement rencontrées lors de ces tests.
