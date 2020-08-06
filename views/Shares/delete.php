<div class="card col col-md-6 mx-3 mx-md-auto p-3 text-center">
	<div class="card-text">
		<p>Are you sure you want to delete this post? This cannot be undone.</p>
	</div>
	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<input type="hidden" name="id" value="<?php echo $viewmodel; ?>"/>
		<input type="submit" name="submit" class="btn btn-danger" value="Yes, delete now" />
		<a class="btn btn-light" href="<?php echo ROOT_PATH; ?>shares">Nevermind</a>
	</form>
</div>