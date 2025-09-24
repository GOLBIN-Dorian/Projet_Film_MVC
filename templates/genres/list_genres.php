<?php
$title = "Liste des Genres";
ob_start();
?>

<h2>Liste des Genres</h2>

<ul>
    <?php if (!empty($genres)): ?>
        <?php foreach ($genres as $genre): ?>
            <li><?php echo htmlspecialchars($genre['nom']); ?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Aucun genre trouvé.</li>
    <?php endif; ?>
</ul>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>