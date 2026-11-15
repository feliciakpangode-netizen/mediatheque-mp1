<?php
declare(strict_types=1);
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';
$pageTitre = 'Détail du livre | Médiathèque IPNET';
$idBrut = $_GET['id'] ?? null;
$id = is_string($idBrut) && ctype_digit($idBrut) ? (int) $idBrut : (is_int($idBrut) ? $idBrut : 0);
$livre = $id > 0 ? trouverLivreParId($livres, $id) : null;
require __DIR__ . '/includes/header.php';
?>
<section class="page-intro"><p class="surtitre">La collection</p><h1>Détail du livre</h1></section>
<?php if ($livre === null): ?>
    <div class="alerte"><h2>Livre introuvable</h2><p>L’identifiant est absent ou invalide. Retournez au <a href="catalogue.php">catalogue</a> pour choisir un livre.</p></div>
<?php else: ?>
    <article class="carte fiche"><h2><?= e($livre['titre']) ?></h2><dl>
        <dt>Auteur</dt><dd><?= e($livre['auteur']) ?></dd><dt>Année de publication</dt><dd><?= e($livre['annee']) ?></dd>
        <dt>Catégorie</dt><dd><?= e(ucfirst($livre['categorie'])) ?></dd><dt>Prix indicatif</dt><dd><?= number_format((float) $livre['prix'], 2, ',', ' ') ?> €</dd>
        <dt>Disponibilité</dt><dd><?= $livre['disponible'] ? 'Disponible à l’emprunt' : 'Actuellement emprunté' ?></dd>
    </dl></article>
<?php endif; ?>
<p><a href="catalogue.php">← Retour au catalogue</a></p>
<?php require __DIR__ . '/includes/footer.php'; ?>
