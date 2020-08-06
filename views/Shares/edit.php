<div class="card col col-lg-5 mx-3 mx-lg-auto p-0">
	<div class="card-header">
		<h3 class="card-title">Edit Post</h3>
	</div>
	<div class="card-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="title">Share Title</label>
				<input type="text" name="title" class="form-control" id="title" value="<?php echo $viewmodel['title']; ?>" />
			</div>
			<div class="form-group">
				<label for="body">Body</label>
				<textarea name="body" class="form-control" id="body"><?php echo $viewmodel['body']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="link">Link</label>
				<input type="text" name="link" class="form-control" id="link" value="<?php echo $viewmodel['link']; ?>" />
			</div>
			<input type="hidden" name="id" value="<?php echo $viewmodel['id']; ?>" />
			<input class="btn btn-primary" name="submit" type="submit" value="Update" />
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
		</form>
	</div>
</div>