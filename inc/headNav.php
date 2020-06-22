<?php

function printr($data) {
   echo "<pre>";
      print_r($data);
   echo "</pre>";
}

$usernameCookie = $_COOKIE['usernameCookie'] ?? 'Login';

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <!-- icon stuff -->
  <link rel="apple-touch-icon" sizes="180x180" href="iconpack/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="iconpack/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="iconpack/favicon-16x16.png">
  <link rel="manifest" href="iconpack/site.webmanifest">
  <link rel="mask-icon" href="iconpack/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="iconpack/favicon.ico">
  <meta name="msapplication-TileColor" content="#b91d47">
  <meta name="msapplication-config" content="iconpack/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">


  <!-- Style / fonts -->
  <link rel="stylesheet" href="style/master.css" type="text/css" >
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <!-- CDNs -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">





  <!-- meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>C1 RACING</title>
</head>
<body>

  <!-- optional BS4 CDN -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <!-- NAV -->

  <nav class="navbar navbar-fixed-top navbar-expand-md navbar-dark bg-cr smart-scroll" id="navScript">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand transRed">
        <img src="iconpack/android-chrome-192x192.png" height="50px" alt="c1Icon"> C1 Racing </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myMenu" aria-controls="myMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="myMenu">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="index.php#about" class="nav-link">About</a>
            </li>
            <li class="nav-item">
              <a href="index.php#routes" class="nav-link">Routes</a>
            </li>
            <li class="nav-item">
              <a href="index.php#members" class="nav-link">Members</a>
            </li>
            <li class="nav-item">
              <a href="nuLogin.php" class="nav-link">NoviLogin</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp; <?php echo htmlspecialchars($usernameCookie); ?></a></li>
            <li id="special"><a href="addTrack.php"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp; Add Track</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <script>
    // add padding top to show content behind navbar
    $('body').css('padding-top', $('.navbar').outerHeight() + 'px')

    // detect scroll top or down
    if ($('.smart-scroll').length > 0) {
        var last_scroll_top = 0;
        $(window).on('scroll', function() {
            scroll_top = $(this).scrollTop();
            if(scroll_top < last_scroll_top) {
                $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up');
            }
            else {
                $('.smart-scroll').removeClass('scrolled-up').addClass('scrolled-down');
            }
            last_scroll_top = scroll_top;
        });
    }
</script>
