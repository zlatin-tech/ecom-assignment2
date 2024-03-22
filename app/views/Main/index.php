<?php
     include('app/views/header.php');
?>

<h1>Welcome to our app!</h1>

<?php
foreach($data as $publication){
     echo '<a href="/Publication/view/' . $publication->publication_id . '">' . $publication->publication_title . '</a>';
     echo '<br>';
}
?>


</body>
</html>