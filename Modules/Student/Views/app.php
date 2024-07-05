<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    <?php $this->renderSection("title") ?> 
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

  <?php $this->renderSection("styles") ?>
</head>
<body style="font-family: 'Poppins', sans-serif;">
  <div class="container">
    <h1 style="text-align: center; margin: 30px 0px; font-family: 'Kaushan Script', cursive;">
      Student Manager
    </h1>
    <?php
      if(session()->get("success")){
        ?>
        <div class="alert alert-success">
          <?= session()->get("success")?>
        </div>
        <?php
      }

      if(session()->get("error")){
        ?>
        <div class="alert alert-danger">
          <?= session()->get("error")?>
        </div>
        <?php
      }
    ?>
    
    <?php $this->renderSection("body") ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <?php $this->renderSection("scripts") ?>
</body>
</html>
