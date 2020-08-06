<div class="card col col-md-4 col-lg-3 mx-3 mx-md-auto p-0">
	<div class="card-header">
		<h3 class="card-title">User Login</h3>
	</div>
	<div class="card-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control" id="email" required />
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" id="password" required />
			</div>
			<input class="btn btn-primary" name="submit" type="submit" value="Login" />
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
		</form>
	</div>
</div>