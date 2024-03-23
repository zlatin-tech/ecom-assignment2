<?php include('app/views/header.php'); ?>

<h2><?= htmlspecialchars($publication->publication_title) ?></h2>
<p><?= nl2br(htmlspecialchars($publication->publication_text)) ?></p>
<p>Status: <?= htmlspecialchars($publication->publication_status) ?></p>

<button onclick="location.href='/Publication/edit/<?= $publication->publication_id ?>'" type="button">Edit Publication</button>

<form action="/Publication/delete" method="POST">
     <input type="hidden" name="publication_id" value="<?= htmlspecialchars($publication->publication_id) ?>">
     <input type="submit" name="action" value="Delete Publication">
</form>

<section id="comments">
    <h3>Comments</h3>
    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <!-- Check if the session's user ID matches the comment's profile ID Breaks MVC but it makes it prettier and could be removed since it's checked in the controller as well -->
            <?php if (isset($_SESSION['user_id'])&&(new \app\models\Profile())->getForUser($_SESSION['user_id'])->profile_id == $comment->profile_id): ?>

                <form action="/Comment/update/<?= $comment->publication_comment_id ?>" method="POST">
                    <textarea name="text" required><?= htmlspecialchars($comment->comment_text) ?></textarea>
                    <br>
                    <button type="submit">Update</button>
                </form>
                <form action="/Comment/delete/<?= $comment->publication_comment_id ?>" method="POST" style="display: inline;">
                    <button type="submit">Delete</button>
                </form>
            <?php else: ?>
                <!-- Non-editable Text Display for Users who did not write the comment -->
                <p><?= htmlspecialchars($comment->comment_text) ?></p>
            <?php endif; ?>
            <small>Posted on: <?= htmlspecialchars($comment->timestamp) ?></small>
            <br>
            <hr width="100%" size="2" color="blue" noshade>

        </div>
    <?php endforeach; ?>
</section>



<section id="add-comment">
    <h3>Add a Comment</h3>
    <form action="/Comment/add/<?= $publication->publication_id ?>" method="POST">
        <textarea name="text" required></textarea>
        <input type="submit" value="Post Comment">
    </form>
</section>

</body>
</html>
