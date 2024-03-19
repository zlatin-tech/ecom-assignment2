<?php
     include('app/views/header.php');
?>

<h1>Welcome to our app!</h1>
<?php
foreach($data as $publication){
     $this->view('Publication/view', $publication);
}
?>


</body>
</html>