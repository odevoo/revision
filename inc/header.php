
<?php
//Si il n'y a pas de $_SESSION demarrée, on n'en start une
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title><?php echo $titrePage ?></title>

  <!-- Bootstrap core CSS -->
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
 
    <link href="css/app2.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <?php require_once 'inc/db.php' ?>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Revision</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
 
    </div>
  </nav>

  <div class="container">


    <!-- AFFICHAGE DES MSG DE LA VARIABLE SESSION -->

    <?php if (isset($_SESSION['flash'])): ?>
      <?php foreach ($_SESSION['flash'] as $type => $message): ?>

        <div class="alert alert-<?= $type; ?>">
          <?= $message; ?>
        </div>

      <?php endforeach; ?>
      <?php unset($_SESSION['flash']); ?>
    <?php endif ?>
