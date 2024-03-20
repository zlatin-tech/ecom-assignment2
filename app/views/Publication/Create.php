<?php
     include('app/views/header.php');
?>
    <h1>Create Publication</h1>
    <form action='/Publication/create' method='POST'>
        <label for="title">Title: </label>
        <input type="text" name="title" required id="title">
        <label for="text"></label>
        <input type="text" name="text" id="text">
        <input type="submit" name="submit" value="Post" />
    </form>
</body>
</html>