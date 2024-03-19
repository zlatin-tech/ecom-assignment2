<?php
     include('app/views/header.php');
?>

<h1>Welcome to our app!</h1>
<?php
foreach($data as $publication){

     ?>
     <a href="/Publication/view/<?php echo $publication->no; ?>"><?php $publication->title?></a>
     <?php
     $this->view('Publication/view', $publication);
}
?>


</body>
</html>