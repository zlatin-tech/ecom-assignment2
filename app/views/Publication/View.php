<?php
     include('app/views/header.php');
?>
<h2>View All Publications</h2>

<h2><?= htmlspecialchars($publication->publication_title) ?></h2>
<p><?= nl2br(htmlspecialchars($publication->publication_text)) ?></p>
<p>Status: <?= htmlspecialchars($publication->publication_status) ?></p>

</body>
</html>