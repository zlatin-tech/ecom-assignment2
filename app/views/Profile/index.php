<?php
     include('app/views/header.php');
?>
	<div class='container'>
    <h1>User profile</h1>
    <dl>
        <dt>First name:</dt>
        <dd><?= $profile->first_name ?></dd>
        <dt>Last name:</dt>
        <dd><?= $profile->last_name ?></dd>
    </dl>
    <a href='/Profile/modify'>Modify my profile</a>
    <h2>Publications</h2>
    <ul>
        <?php foreach ($publications as $publication): ?>
            <li>
                <a href="/Publication/view/<?= $publication->publication_id ?>">
                    <?= htmlspecialchars($publication->publication_title, ENT_QUOTES, 'UTF-8') ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>