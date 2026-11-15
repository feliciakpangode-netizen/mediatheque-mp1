<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/fonctions.php';
function dateDuJour(): string
{
    return (new DateTimeImmutable('now', new DateTimeZone('Africa/Lome')))->format('d/m/Y');
}
$pageTitre = 'À propos | Médiathèque IPNET';
require __DIR__ . '/includes/header.php';
?>
<section class="page-intro"><p class="surtitre">Notre médiathèque</p><h1>À propos</h1></section>
<article class="carte"><h2>Un lieu pour apprendre et s’évader</h2><p>La Médiathèque IPNET met à disposition des étudiants et des lecteurs un catalogue d’ouvrages variés : romans, jeunesse, sciences, histoire et informatique.</p><p>Ce site est un mini-projet pédagogique réalisé en PHP. Les livres sont stockés dans un tableau PHP, sans base de données.</p><p>Page consultée le <strong><?= e(dateDuJour()) ?></strong>.</p></article>
<?php require __DIR__ . '/includes/footer.php'; ?>
