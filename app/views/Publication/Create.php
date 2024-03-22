<?php
     include('app/views/header.php');
?>
   <h2>Create Publication</h2>
<form action="/Publication/store" method="POST">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" required><br>
    <label for="text">Text:</label><br>
    <textarea id="text" name="text" required></textarea><br>
    <label for="status">Status:</label><br>
    <select id="status" name="status" required>
        <option value="public">Public</option>
        <option value="private">Private</option>
    </select><br><br>
    <input type="submit" value="Create Publication">
</form>

</body>
</html>