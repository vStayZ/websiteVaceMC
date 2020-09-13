<!-- Coded by Mustafa (@KinqStay) -->
                                                                                      <!-- Hello! :-) -->
<!DOCTYPE html>
<html lang="de-DE">
  <head>
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">

    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="refresh" content="180">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Animate.css">
    <link rel="stylesheet" href="css/style.css">

    <title>ᴠᴀᴄᴇᴍᴄ.ɴᴇᴛ | sᴛᴀᴛs</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/VaceMC.png">
    <script src="https://kit.fontawesome.com/917144bc47.js" crossorigin="anonymous"></script>
  </head>
  <body oncontextmenu="return false;" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Loading page start -->
    <div class="loading-wrapper">
      <span class="loading"><span class="loading-inner"></span></span>
      <h4 class="loading-title">Lade</h4>
    </div>
    <!-- Loading page end -->

    <!-- block list start -->
    <?php
      require("adminpanel/inc/dbconn/dbconn-vacemcadminpanel.php");

      $stmt = $dbh->prepare("SELECT * FROM blacklist");
      $stmt->execute();
      $ips = $stmt->fetchAll();

      foreach($ips AS $IP){
      $deny = array($IP["IP"]);
      if (in_array ($_SERVER['REMOTE_ADDR'], $deny)){
         header("location: https://www.google.com/");
         exit();
      }
  	}
    ?>
    <!-- block list end -->

    <?php require("inc/stats/header.inc.php"); ?>
    <?php require("inc/stats/selection.inc.php"); ?>
    <?php require("inc/footer.inc.php"); ?>

    <!-- JavaScript -->
    <script src="lib/jQuery/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="lib/popper/popper.min.js" type="text/javascript"></script>
    <script src="lib/bootstrap-4.4.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="lib/js/wow.js" type="text/javascript"></script>
    <script src="lib/js/navbar-scrollanimate.js" type="text/javascript"></script>
    <script src="lib/js/navbar-autoclose.js" type="text/javascript"></script>
    <script type="text/javascript">
    // wow start
      new WOW().init();

    // Loading
    window.onscroll = function(){
      window.scrollTo(0, 0);
    };
      $(window).on("load",function(){
        $(".loading-wrapper").fadeOut("slow",function(){
          window.onscroll = null;
        });
      });

    // new loading top
      $(document).ready(function(){
        $(this).scrollTop(0);
      });

    /* dev tool */
      document.onkeydown=function(e)
      {
        if(event.keyCode == 123)
        {
          return false;
        }
        if(e.ctrlKey && e.keyCode == "I".charCodeAt(0))
        {
          return false;
        }
        if(e.ctrlKey && e.keyCode == "J".charCodeAt(0))
        {
          return false;
        }
        if(e.ctrlKey && e.keyCode == "U".charCodeAt(0))
        {
          return false;
        }
      }
    </script>

    <!-- Coded by Mustafa (@KinqStay) -->
  </body>
</html>
