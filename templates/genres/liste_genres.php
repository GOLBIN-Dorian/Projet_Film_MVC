<?php
$title = "Liste des Genres";
ob_start();
?>


<div class="card">
    <h2>Liste des Genres</h2>

    <!-- Formulaire de recherche -->
    <form method="GET" class="search-form">
        <input type="hidden" name="action" value="search">
        <input type="text" name="search" placeholder="Rechercher par genre..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit" class="btn">Rechercher</button>
        <a href="index.php?action=index" class="btn btn-warning">Effacer</a>
    </form>

    <!-- Bouton d'ajout -->
    <div style="margin-bottom: 1rem;">
        <a href="index.php?action=create" class="btn btn-success">Ajouter un Genre</a>
    </div>

    <?php if (empty($genres)): ?>
        <p>Aucun genre trouvé.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Genre</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($genres as $genre): ?>
                    <tr>
                        <td><?= htmlspecialchars($genre['nom']) ?></td>
                        <td><?= htmlspecialchars($genre['description']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>
