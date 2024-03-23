<?php
     include('app/views/header.php');
?>

<h2><?= htmlspecialchars($publication->publication_title) ?></h2>
<p><?= nl2br(htmlspecialchars($publication->publication_text)) ?></p>
<p>Status: <?= htmlspecialchars($publication->publication_status) ?></p>

<button onclick="location.href='/Publication/edit/<?= $publication->publication_id ?>'" type="button">Edit</button>

<form action="/Publication/delete" method="POST">
     <input type="hidden" name="publication_id" value="<?= htmlspecialchars($publication->publication_id) ?>">
     <input type="submit" name="action" value="Delete">
</form>


</body>
</html>