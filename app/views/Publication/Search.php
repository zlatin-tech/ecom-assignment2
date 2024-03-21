<?php
     include('app/views/header.php');
?>
<h2>Searched Publications</h2>


<?php if (isset($results)) : ?>
    <h3>Results</h3>
    <?php foreach ($results as $publication) : ?>
        <div>
            <h4><?= htmlspecialchars($publication->publication_title) ?></h4>
            <p><?= nl2br(htmlspecialchars($publication->publication_text)) ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>