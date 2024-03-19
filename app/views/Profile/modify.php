<?php
     include('app/views/header.php');
?>
	<div class='container'>
		<form method='post' action=''>
			<div class="form-group">
				<label>First name:<input type="text" class="form-control" name="first_name" placeholder="Jon" value='<?= $data->first_name ?>' /></label>
			</div>
			<div class="form-group">
				<label>Last name:<input type="text" class="form-control" name="last_name" placeholder="Doe" value='<?= $data->last_name ?>' /></label>
			</div>
			<div class="form-group">
				<input type="submit" name="action" value="Record my profile" /> 
				<a href='/Profile/index'>Cancel</a>
			</div>
		</form>
	</div>
</body>
</html>