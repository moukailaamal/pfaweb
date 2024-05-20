
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
     <link href="css/style.css" rel="stylesheet" /> 
      <script src="js/script.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   </head>

   <body class="d-flex flex-column min-vh-100">
 

      <?php require_once "include/nav.php"; ?>
      <div class="flex-grow-1">
         <?= $content ?>
      </div>
      <?php require_once "include/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   </body>
</html>