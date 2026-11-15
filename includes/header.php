<?php
$pageTitre = $pageTitre ?? 'Médiathèque IPNET';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitre, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="site-header">
    <div class="conteneur entete"><a class="marque" href="index.php">Médiathèque <span>IPNET</span></a>
        <nav aria-label="Navigation principale"><a href="index.php">Accueil</a><a href="catalogue.php">Catalogue</a><a href="apropos.php">À propos</a></nav>
    </div>
</header>
<main class="conteneur">
