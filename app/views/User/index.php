<?php
     include('app/views/header.php');
?>
    <h1>Welcome back!</h1>

    <form action="User/logout" method="post">
        <button type="submit">Logout</button>
    </form>

    <div id="publications-container">
        <?php foreach ($data['publications'] as $publication): ?>
            <div class="publication">
                <h2><?php echo $publication['publication_title']; ?></h2>
                <p><?php echo $publication['publication_text']; ?></p>
                <p><strong>Username:</strong> <?php echo $publication['username']; ?></p>
                <p><strong>Comments:</strong></p>
                <?php foreach ($comments as $comment): ?>
                    <?php if ($comment['publication_id'] == $publication['publication_id']): ?>
                        <p><?php echo $comment['comment_text']; ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>