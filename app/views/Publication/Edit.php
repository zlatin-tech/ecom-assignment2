<?php
     include('app/views/header.php');
?>
    <h2>Edit Publication</h2>
<?php echo '<form action="/Publication/update/'.$data->publication_id.'" method="POST">' ?>
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($data->publication_title) ?>" required><br>
    <label for="text">Text:</label><br>
    <textarea id="text" name="text" required><?= htmlspecialchars($data->publication_text) ?></textarea><br>
    <label for="status">Status:</label><br>
    <select id="status" name="status" required>
        <option value="public" <?= $data->publication_status == 'public' ? 'selected' : '' ?>>Public</option>
        <option value="private" <?= $data->publication_status == 'private' ? 'selected' : '' ?>>Private</option>
    </select><br><br>
    <input type="submit" value="Update Publication">
</form>


</body>
</html>