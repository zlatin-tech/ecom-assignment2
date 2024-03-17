<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Page</title>
</head>
<body>
    <h1>Hello, anonymous user!</h1>
    <h2>Consider <a href="">registering</a> or logging in to have access to the following features</h2>
    <ul>
        <li>Make publications</li>
        <li>Correct publications</li>
        <li>Delete publications</li>
        <li>Make your publications public or private</li>
        <li>Make comments on publications</li>
        <li>Edit comments on publications</li>
        <li>Delete comments on publications</li>
        <li>Edit your profile information</li>
    </ul>
    <h2>Until then, enjoy our platform anonymously</h2>
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