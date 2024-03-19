<?php
     include('app/views/header.php');
?>
	<div class='container'>
		<h1>User profile</h1>
		<p>Do you want to proceed with deletion of your profile?</p>
		<dl>
		<dt>First name:</dt>
		<dd><?= $data->first_name ?></dd>
		<dt>Last name:</dt>
		<dd><?= $data->last_name ?></dd>
		</dl>
		<form method="post" action=''>
			<input type="submit" name="action" value="Delete">
			<a href='/Profile/index'>Cancel</a>
		</form>
	</div>
</body>
</html>