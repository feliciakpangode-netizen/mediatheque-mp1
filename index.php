<?php
declare(strict_types=1);
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';
$pageTitre = 'Accueil | Médiathèque IPNET';
require __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <p class="surtitre">Votre espace de lecture</p>
    <h1>Bienvenue à la Médiathèque IPNET</h1>
    <p>Explorez notre sélection de livres et découvrez votre prochaine lecture.</p>
    <a class="bouton" href="catalogue.php">Parcourir le catalogue</a>
</section>
<section class="carte resume">
    <h2>La collection</h2>
    <p>Notre catalogue contient <strong><?= count($livres) ?> livres</strong>, dont <strong><?= compterLivresDisponibles($livres) ?> disponibles</strong> à l’emprunt.</p>
    <p><a href="catalogue.php">Voir tous les livres →</a></p>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>
