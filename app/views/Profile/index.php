<?php
     include('app/views/header.php');
?>
	<div class='container'>
		<h1>User profile</h1>
		<dl>
		<dt>First name:</dt>
		<dd><?= $data->first_name ?></dd>
		<dt>Last name:</dt>
		<dd><?= $data->last_name ?></dd>
		</dl>
		<a href='/Profile/modify'>Modify my profile</a>
	</div>
</body>
</html>