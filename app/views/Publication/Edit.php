<?php
     include('app/views/header.php');
?>
    <h2>Edit Publication</h2>
<form action="/Publication/update/<?= $publication->publication_id ?>" method="post">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($publication->publication_title) ?>" required><br>
    <label for="text">Text:</label><br>
    <textarea id="text" name="text" required><?= htmlspecialchars($publication->publication_text) ?></textarea><br>
    <label for="status">Status:</label><br>
    <select id="status" name="status" required>
        <option value="draft" <?= $publication->publication_status == 'draft' ? 'selected' : '' ?>>Draft</option>
        <option value="published" <?= $publication->publication_status == 'published' ? 'selected' : '' ?>>Published</option>
    </select><br><br>
    <input type="submit" value="Update Publication">
</form>

</body>
</html>