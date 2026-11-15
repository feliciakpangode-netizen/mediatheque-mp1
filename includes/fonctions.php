<?php
declare(strict_types=1);

/** Protège une valeur avant son insertion dans le HTML. */
function e(string|int|float $valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Produit le HTML d'une ligne du catalogue pour un livre. */
function afficherLivre(array $livre): string
{
    $disponibilite = $livre['disponible'] ? 'Disponible' : 'Emprunté';
    return '<tr><td>' . e($livre['titre']) . '</td><td>' . e($livre['auteur']) . '</td><td>' . e($livre['annee']) . '</td><td><a href="catalogue.php?categorie=' . rawurlencode((string) $livre['categorie']) . '">' . e($livre['categorie']) . '</a></td><td>' . number_format((float) $livre['prix'], 2, ',', ' ') . ' €</td><td>' . $disponibilite . '</td><td><a href="detail.php?id=' . (int) $livre['id'] . '">Détails</a></td></tr>';
}

/** Retourne les livres appartenant à la catégorie demandée. */
function filtrerParCategorie(array $livres, string $categorie): array
{
    return array_values(array_filter($livres, static fn(array $livre): bool => $livre['categorie'] === $categorie));
}

/** Recherche un livre par identifiant, ou null s'il n'existe pas. */
function trouverLivreParId(array $livres, int $id): ?array
{
    foreach ($livres as $livre) {
        if ((int) $livre['id'] === $id) {
            return $livre;
        }
    }
    return null;
}

/** Compte les livres disponibles à l'emprunt. */
function compterLivresDisponibles(array $livres): int
{
    return count(array_filter($livres, static fn(array $livre): bool => $livre['disponible'] === true));
}
