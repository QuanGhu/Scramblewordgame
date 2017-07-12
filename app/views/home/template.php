<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <base href="http://localhost/Scramble/">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
        <link rel="stylesheet" href="Public/css/jquery-confirm.min.css">
         <link rel="stylesheet" href="public/css/style.css">
         <script src="public/js/jquery-1.12.3.min.js"></script>
         <script src="public/js/bootstrap.min.js"></script>
         <script src="Public/js/jquery-confirm.min.js"></script>
         <script src="public/js/jquery.validate.min.js"></script>
        <title>Scramble Game</title>
    </head>
    <body>
        <section class="header">
            <nav class="navbar navbar-default">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Simple Scramble Game</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <?php
                  session_start();
                  if(isset($_SESSION['player_name']) && isset($_SESSION['score'])) : ?>
                      <ul class="nav navbar-nav navbar-right">
                        <li><a><span>Player Name : <?php echo $_SESSION['player_name']; ?></span></a></li>
                        <li id="score" class="score-box"><a><span>Player Score : </span><span id="score-value"><?php echo $_SESSION['score']; ?></span></a></li>
                        <li><a href="home/stop">Stop Playing</a></li>
                      </ul>
                  <?php endif;?>
                </div>
              </div>
            </nav>
        </section>
         <?php require($content) ?>
         <section class="footer">
             <div class="container">
                 <div class="row">
                     <div class="col-md-6">
                         <p class="white text-left"> Contact : +6281267727145 ( Ari Putra ) </p>
                     </div>
                     <div class="col-md-6">
                         <p class="white text-right"> Email : ariteknologi@gmail.com </p>
                     </div>
                 </div>
             </div>
         </section>
    </body>
</html>
