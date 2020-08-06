<!DOCTYPE html>
<html>
<head>
	<title>ShareBoard - OOP CRUD with MVC &amp; Bootstrap</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-32x32.png" sizes="32x32" />
  <link rel="icon" href="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-192x192.png" sizes="192x192" />
  <link rel="apple-touch-icon" href="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-180x180.png" />
  <meta name="msapplication-TileImage" content="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-270x270.png" />

	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css?ver=1.0">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?php echo ROOT_PATH; ?>assets/js/bootstrap.js"></script>

</head>
<body>
	
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="<?php echo ROOT_PATH; ?>">ShareBoard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_PATH; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_PATH; ?>shares">Shares</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <li class="nav-item">
          <span class="navbar-text">Welcome, <?php echo $_SESSION['user_data']['name']; ?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_PATH; ?>users/logout">Logout</a>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_PATH; ?>users/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ROOT_PATH; ?>users/register">Register</a>
        </li>
      <?php endif; ?>
    </ul>

  </div>
</nav>

<main role="main" class="container-fluid">

	<div class="row">
    <?php Messages::display(); ?>
		<?php require($view); ?>
	</div>

</main><!-- /.container -->

</body>
</html>