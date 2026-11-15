<?php
declare(strict_types=1);
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';
$pageTitre = 'Catalogue | Médiathèque IPNET';
$categories = array_values(array_unique(array_column($livres, 'categorie')));
sort($categories);
$filtrePresent = array_key_exists('categorie', $_GET);
$categorie = $filtrePresent && is_string($_GET['categorie']) ? trim($_GET['categorie']) : '';
$categorieValide = !$filtrePresent || in_array($categorie, $categories, true);
$livresAffiches = $filtrePresent && $categorieValide ? filtrerParCategorie($livres, $categorie) : ($filtrePresent ? [] : $livres);
require __DIR__ . '/includes/header.php';
?>
<section class="page-intro"><p class="surtitre">À découvrir</p><h1>Le catalogue</h1><p><?= count($livresAffiches) ?> livre(s) affiché(s).</p></section>
<form class="filtre" method="get" action="catalogue.php">
    <label for="categorie">Filtrer par catégorie</label>
    <select name="categorie" id="categorie"><option value="">Toutes les catégories</option>
        <?php foreach ($categories as $option): ?><option value="<?= e($option) ?>" <?= $categorie === $option ? 'selected' : '' ?>><?= e(ucfirst($option)) ?></option><?php endforeach; ?>
    </select><button class="bouton bouton-petit" type="submit">Filtrer</button>
    <a href="catalogue.php">Tout afficher</a>
</form>
<?php if (!$categorieValide): ?><p class="alerte">Cette catégorie n’existe pas. Choisissez une catégorie proposée ou <a href="catalogue.php">affichez tout le catalogue</a>.</p>
<?php elseif ($filtrePresent && $livresAffiches === []): ?><p class="alerte">Aucun livre dans cette catégorie.</p><?php endif; ?>
<div class="table-wrapper"><table><thead><tr><th>Titre</th><th>Auteur</th><th>Année</th><th>Catégorie</th><th>Prix</th><th>Disponibilité</th><th>Fiche</th></tr></thead><tbody>
<?php foreach ($livresAffiches as $livre): ?><?= afficherLivre($livre) ?><?php endforeach; ?>
</tbody></table></div>
<?php require __DIR__ . '/includes/footer.php'; ?>
