<!-- Coded by Mustafa (@vStayzDeveloper) -->
                                                                                      <!-- Hello! :-) -->
<!DOCTYPE html>
<html lang="de-DE">
  <head>
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Domine:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if(isset($_GET["chat"]) OR empty($_GET)): ?>
      <meta http-equiv="refresh" content="10">
    <?php endif; ?>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>VaceMC.net | Admin Panel</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/VaceMC.png">
    <script src="https://kit.fontawesome.com/917144bc47.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Loading page start -->
    <div class="loading-wrapper">
      <span class="loading"><span class="loading-inner"></span></span>
      <h4 class="loading-title">Lade</h4>
    </div>
    <!-- Loading page end -->

    <?php require("inc/navbar.inc.php"); ?>

    <?php if(empty($_GET)): ?>
      <header class="header">
        <div class="container">
          <h2 class="adminpanel-header-title">Server Stats</h2>
          <div class="adminpanel-header-hr"></div>
          <div class="row">
            <div class="col-4">
              <h3 class="allplayers">Registrierte Spieler</h3>
              <?php
                require("inc/dbconn/dbconn-bungeesystem.inc.php");

                $stmt = $dbh->prepare("SELECT * FROM Player_Data");
                $stmt->execute();
                $anzahl_id = $stmt->rowcount();
              ?>
              <h3 class="allplayers-number" id="value"><?php echo $anzahl_id; ?></h3>
            </div>
            <div class="col-4">
              <h3 class="allplayers">Gebannte Spieler</h3>
              <?php
                require("inc/dbconn/dbconn-ban.inc.php");

                $stmt = $dbh->prepare("SELECT * FROM ban");
                $stmt->execute();
                $anzahl_ban = $stmt->rowcount();
              ?>
              <h3 class="allplayers-number" id="valuee"><?php echo $anzahl_ban; ?></h3>
            </div>
            <div class="col-4">
              <h3 class="allplayers">Offene Reports</h3>
              <?php
                require("inc/dbconn/dbconn-report.inc.php");

                $stmt = $dbh->prepare("SELECT * FROM Report");
                $stmt->execute();
                $anzahl_ban = $stmt->rowcount();
              ?>
              <h3 class="allplayers-number" id="valuee"><?php echo $anzahl_ban; ?></h3>
            </div>
            <span class="wlan-icon">
              <i class="fas fa-wifi text-center"></i>
            </span>
            <div class="col-12 text-center mt-3">
              <span class="server-icon">
                <i class="fas fa-server"></i>
              </span>
              <div class="server-status" id="playeronline">
                  <span class="server-text"></span><span class="server-online"></span>
              </div>
            </div>
          </div>
        </div>
      </header>
    <?php endif; ?>

    <?php if(isset($_GET["config"])): ?>
      <header class="header">
        <div class="container">
          <h2 class="adminpanel-header-title">Config</h2>
          <div class="adminpanel-header-hr mb-5"></div>
          <div class="news">
            <form method="GET" action="newsconfig-save.php">
              <div class="input-group mb-3 mt-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Titel</span>
                </div>
                <input type="text" class="form-custom" name="titel" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Mes</span>
                </div>
                <input type="text" class="form-custom" name="message" required>
              </div>
              <p class="news-info">INFO: Zeilenabruch mit <input type="text" class="config-input-info-br" placeholder="<br>" readonly required value="<br>"></p>
              <div class="text-center"><input type="submit" value="Speichern" class="news-config-button btn btn-success"></div>
            </form>
          </div>
        </div>
      </header>
    <?php endif; ?>

    <?php if(isset($_GET["blacklist"])): ?>
      <header class="header">
        <div class="container">
          <h2 class="adminpanel-header-title">Blacklist</h2>
          <div class="adminpanel-header-hr mb-3"></div>
          <form class="form-inline d-flex justify-content-center" method="GET" action="blacklist-save.php">
            <div class="form-group mx-sm-3 mb-2 mb-5">
              <input type="text" class="form-control mr-3" placeholder="Kommentar" name="comment">
              <input type="text" class="form-control mr-3" placeholder="IP-Adresse" name="ipadresse" required>
            </div>
            <button type="submit" class="btn btn-danger mb-5">Weg mit dem Müll</button>
          </form>
          <?php
            require("inc/dbconn/dbconn-vacemcadminpanel.php");

            $stmt = $dbh->prepare("SELECT * FROM blacklist");
            $stmt->execute();
            $ips = $stmt->fetchAll();
          ?>
          <div class="pt-5 mt-5 ml-5 mr-5">
              <table class="table text-white">
                  <thead>
                      <th scope="col">ID</th>
                      <th scope="col">Kommentar</th>
                      <th scope="col">IP</th>
                  <tbody>
                  <?php foreach($ips AS $ip): ?>
                      <tr>
                          <td><?php echo $ip["ID"]; ?></td>
                          <td><?php echo $ip["comment"]; ?></td>
                          <td><?php echo $ip["IP"]; ?></td>
                      </tr>

                      <td class="d-flex justify-content-start form-td">
                          <form method="GET" action="blacklist-delete.php" class="form-delete">
                              <input type="hidden" name="ID" value="<?php echo $ip["ID"]; ?>">
                              <button type="submit" class="btn btn-danger">
                                  <i class="fas fa-trash-alt"></i>
                              </button>
                          </form>
                      </td>
                  <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if(isset($_GET["chat"]) OR isset($_GET["chatoff"])): ?>
      <div class="chat">
        <div class="container">
          <h2 class="adminpanel-header-title mt-0 pt-0">Livechat</h2>
          <div class="adminpanel-header-hr mb-3"></div>
          <?php if(empty($_POST)): ?>
            <form method="POST" action="?chatoff">
              <input type="submit" name="autoreloadoff" value="Reload aus">
            </form>
          <?php endif; ?>
          <form method="POST" class="d-flex justify-content-center ml-auto mr-auto">
            <input type="text" name="search" placeholder="Spieler Name">
            <input type="submit" name="submit" value="Suchen">
          </form>

          <!-- search -->
          <?php
          require("inc/dbconn/dbconn-chat.inc.php");
          require 'mojang-api.class.php';

          if (isset($_POST["submit"])) {
          	$search = MojangAPI::getUuid($_POST["search"]);
            $str = MojangAPI::formatUuid($search);
          	$sth = $dbh->prepare("SELECT * FROM chat WHERE UUID = '$str' ORDER BY id DESC");

          	$sth->setFetchMode(PDO::FETCH_OBJ);
          	$sth -> execute();

          	if($row = $sth->fetch()){
          		?>
          		<br><br><br>
              <div class="chat-box mt-5">
                <h3 class="chat-name text-center d-flex justify-content-center"><?php $username = MojangAPI::getUsername($row->UUID); echo $username; ?></h3>
                <p class="chat-message"><?php echo $row->MESSAGE; ?></p>
                <p style="float: right; position: relative; bottom: 15px; right: 15px;"><?php echo $row->SERVER; ?></p>
                <img src="https://minotar.net/helm/<?php echo $row->UUID; ?>/100.png" class="chat-head">
              </div>
          <?php
          require("inc/search-chat.inc.php");
          	}else{
          			echo "<div class='text-white' style='text-align: center; padding-top: 10px;'>Spieler nicht gefunden</div>";
          		}
          }
          ?>

          <?php
            require("inc/dbconn/dbconn-chat.inc.php");
            require("inc/e-function.inc.php");

            $stmt = $dbh->prepare("SELECT * FROM chat ORDER BY id DESC LIMIT 5");
            $stmt->execute();
            $chats = $stmt->fetchAll();

          ?>
          <?php foreach($chats AS $chat): ?>
            <div class="chat-box mt-5">
              <h3 class="chat-name text-center d-flex justify-content-center"><?php $username = MojangAPI::getUsername($chat["UUID"]); echo $username; ?></h3>
              <p class="chat-message"><?php echo e($chat["MESSAGE"]); ?></p>
              <p style="float: right; position: relative; bottom: 15px; right: 15px;"><?php echo e($chat["SERVER"]); ?></p>
              <img src="https://minotar.net/helm/<?php echo $chat["UUID"]; ?>/100.png" class="chat-head">
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if(isset($_GET["check"])): ?>
      <div class="check">
        <div class="container">
          <h2 class="adminpanel-header-title mt-0 pt-5">Check Player</h2>
          <div class="adminpanel-header-hr mb-3"></div>
          <form method="POST" class="d-flex justify-content-center ml-auto mr-auto pt-5">
            <input type="text" name="checksearch" placeholder="Spieler Name">
            <input type="submit" name="submit" value="Check">
          </form>
          <?php
            if(isset($_GET["check"]) && $_GET["check"] == "ban"){
              ?>
              <script type="text/javascript">
                alert("Spieler erfolgreich gebannt!");
                window.location.href = "adminpanel.php";
              </script>
              <?php
              exit();
            }elseif(isset($_GET["check"]) && $_GET["check"] == "unban"){
              ?>
              <script type="text/javascript">
                alert("Spieler erfolgreich entbannt!");
                window.location.href = "adminpanel.php";
              </script>
              <?php
            }elseif(isset($_GET["check"]) && $_GET["check"] == "lobbycoins"){
              ?>
              <script type="text/javascript">
                alert("Spieler erfolgreich Lobby Coins gegeben!");
                window.location.href = "adminpanel.php";
              </script>
              <?php
            }elseif(isset($_GET["check"]) && $_GET["check"] == "citybuildcoins"){
              ?>
              <script type="text/javascript">
                alert("Spieler erfolgreich CityBuild Coins gegeben!");
                window.location.href = "adminpanel.php";
              </script>
              <?php
            }elseif(isset($_GET["check"]) && $_GET["check"] == "skyblockcoins"){
              ?>
              <script type="text/javascript">
                alert("Spieler erfolgreich SkyBlock Coins gegeben!");
                window.location.href = "adminpanel.php";
              </script>
              <?php
            }elseif(isset($_GET["check"]) && $_GET["check"] == "joinmecoins"){
              ?>
              <script type="text/javascript">
                alert("Spieler erfolgreich Joinme gegeben!");
                window.location.href = "adminpanel.php";
              </script>
              <?php
            }
          ?>
          <?php
          if (isset($_POST["submit"])) {
            require("inc/dbconn/dbconn-bungeesystem.inc.php");
            require 'mojang-api.class.php';

            $search = MojangAPI::getUuid($_POST["checksearch"]);
            $str = MojangAPI::formatUuid($search);
            $sth = $dbh->prepare("SELECT * FROM Player_Data WHERE UUID = '$str'");

            $sth->setFetchMode(PDO::FETCH_OBJ);
            $sth->execute();

            if($row = $sth->fetch()){
              ?>
              <div class="row">
                <div class="col-12 text-center">
                  <img src="https://minotar.net/helm/<?php echo $row->UUID; ?>/100.png" class="check-head">
                  <h1 class="check-name"><?php $username = MojangAPI::getUsername($row->UUID); echo $username; ?></h1>
                  <div class="check-header-hr mb-5"></div>
                </div>
                <div class="col-12 text-center">
                  <h5 class="check-title" style="font-family: 'Righteous', cursive;">UUID <i class="fas fa-id-card"></i></h5>
                  <h4 class="check-subtitle mb-4" style="color: #ffffffc7;"><?php echo $row->UUID; ?></h4>
                </div>
                <div class="col-12 text-center mt-3 mb-2">
                  <h5 class="check-title text-danger" style="font-family: 'Righteous', cursive;">Ban <i class="fas fa-ban"></i></h5>
                  <h4 class="check-subtitle"><?php
                    require("inc/dbconn/dbconn-ban.inc.php");

                    $stmt = $dbh->prepare("SELECT * FROM ban WHERE UUID = '$str'");
                    $stmt->setFetchMode(PDO::FETCH_OBJ);
                    $stmt->execute();

                    if($rows = $stmt->fetch()){
                      echo "<span class='text-danger'>Ja</span>";
                      echo "<h5 class='check-subtitle'>Grund:</h5>";
                      echo "<h4 class='check-subtitle text-success'>" . $rows->Grund . "</h4>";
                    }else{
                      echo "<span class='text-success'>Nein</span>";
                    }
                  ?></h4>
                </div>
                <div class="col-12 mb-2">
                  <?php
                  require("inc/dbconn/dbconn-rechtesystem.inc.php");

                  $search = MojangAPI::getUuid($_POST["checksearch"]);
                  $str = MojangAPI::formatUuid($search);
                  $sth = $dbh->prepare("SELECT * FROM permissions_inheritance WHERE child = '$str'");

                  $sth->setFetchMode(PDO::FETCH_OBJ);
                  $sth->execute();
                  if($row = $sth->fetch()){
                  ?>
                  <h5 class="check-title text-center" style="font-family: 'Righteous', cursive; color: #17a2b8;">Rang</h5>
                  <?php
                    if($row->parent == "Owner"){
                      ?>
                      <h4 class="check-subtitle text-center text-danger" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "Admin"){
                      ?>
                      <h4 class="check-subtitle text-center text-danger" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->child == "7602f295-25ba-42b7-8dcd-8a6252834828"){
                      ?>
                      <h4 class="check-subtitle text-center text-primary" style="font-size: 180%;"><?php echo "<script>document.write(unescape('Ich%20habe%20es%20Programmiert%20%3AD%0A'));</script>"; ?></h4>
                      <?php
                    }elseif($row->parent == "Leitung"){
                      ?>
                      <h4 class="check-subtitle text-center text-danger" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "Manager"){
                      ?>
                      <h4 class="check-subtitle text-center text-danger" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "SrDeveloper"){
                      ?>
                      <h4 class="check-subtitle text-center text-info" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "Developer"){
                      ?>
                      <h4 class="check-subtitle text-center text-info" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "JrDeveloper"){
                      ?>
                      <h4 class="check-subtitle text-center text-info" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "SrStaff"){
                      ?>
                      <h4 class="check-subtitle text-center text-success" style="font-size: 180%;"><?php echo "SrModerator"; ?></h4>
                      <?php
                    }elseif($row->parent == "Staff"){
                      ?>
                      <h4 class="check-subtitle text-center text-success" style="font-size: 180%;"><?php echo "Moderator"; ?></h4>
                      <?php
                    }elseif($row->parent == "SrContent"){
                      ?>
                      <h4 class="check-subtitle text-center text-primary" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "Content"){
                      ?>
                      <h4 class="check-subtitle text-center text-primary" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "JrContent"){
                      ?>
                      <h4 class="check-subtitle text-center text-primary" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "SrSupporter"){
                      ?>
                      <h4 class="check-subtitle text-center text-primary" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "Supporter"){
                      ?>
                      <h4 class="check-subtitle text-center text-primary" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "SrBuilder"){
                      ?>
                      <h4 class="check-subtitle text-center text-warning" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "Builder"){
                      ?>
                      <h4 class="check-subtitle text-center text-warning" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "JrBuilder"){
                      ?>
                      <h4 class="check-subtitle text-center text-warning" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "Azubi"){
                      ?>
                      <h4 class="check-subtitle text-center text-primary" style="font-size: 180%;"><?php echo "JrSupporter"; ?></h4>
                      <?php
                    }elseif($row->parent == "YouTuber"){
                      ?>
                      <h4 class="check-subtitle text-center text-lila" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "JrYouTuber"){
                      ?>
                      <h4 class="check-subtitle text-center text-lila" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "Vace"){
                      ?>
                      <h4 class="check-subtitle text-center text-pink" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "VIP"){
                      ?>
                      <h4 class="check-subtitle text-center text-warning" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }elseif($row->parent == "Master"){
                      ?>
                      <h4 class="check-subtitle text-center text-primary" style="font-size: 180%;"><?php echo $row->parent; ?></h4>
                      <?php
                    }
                  }
                    ?>
                </div>
                <div class="col-12 text-center mt-3 mb-3">
                  <?php
                  require("inc/dbconn/dbconn-bungeesystem.inc.php");

                  $search = MojangAPI::getUuid($_POST["checksearch"]);
                  $str = MojangAPI::formatUuid($search);

                  $sth = $dbh->prepare("SELECT * FROM Player_Data WHERE UUID = '$str'");
                  $sth->setFetchMode(PDO::FETCH_OBJ);
                  $sth->execute();
                  if($row = $sth->fetch()){
                  ?>
                  <h5 class="check-title" style="font-family: 'Righteous', cursive;">Erster Login <i class="fas fa-sign-in-alt"></i></h5>
                  <h4 class="check-subtitle mb-4" style="color: #17a2b8;"><?php echo date("d.m.Y - H:i", substr($row->FirstJoin, 0, 10)); ?></h4>
                  <h5 class="check-title" style="font-family: 'Righteous', cursive;">Letzter Login <i class="fas fa-sign-out-alt"></i></h5>
                  <h4 class="check-subtitle" style="color: #17a2b8;"><?php echo date("d.m.Y - H:i", substr($row->LastJoin, 0, 10)); ?></h4>
                <?php
              }
                ?>
                </div>
                <div class="col-12 text-center mt-3">
                  <?php
                    require("inc/dbconn/dbconn-bungeesystem.inc.php");

                    $search = MojangAPI::getUuid($_POST["checksearch"]);
                    $str = MojangAPI::formatUuid($search);

                    $stmt = $dbh->prepare("SELECT * FROM Lobby WHERE UUID = '$str'");
                    $stmt->setFetchMode(PDO::FETCH_OBJ);
                    $stmt->execute();
                    if($rows = $stmt->fetch()){
                      ?>
                      <h5 class="check-title" style="font-size: 230%;">Coins <i class="fas fa-coins"></i></h5>
                      <h5 class="check-title" style="color: #ffffffc7;">Lobby</h5>
                      <form method="GET" action="check-coins.php">
                        <input type="hidden" name="checkcoins" value="<?php echo $rows->UUID; ?>">
                        <input class="check-subtitle text-warning text-center check-coins-input" value="<?php echo $rows->Coins; ?>" name="coins-lobby"></input>
                      </form>
                      <?php
                        require("inc/dbconn/dbconn-bungeesystem.inc.php");

                        $stmt = $dbh->prepare("SELECT * FROM Citybuild WHERE UUID = '$str'");
                        $stmt->setFetchMode(PDO::FETCH_OBJ);
                        $stmt->execute();
                        if($row = $stmt->fetch()){
                      ?>
                      <h5 class="check-title" style="color: #ffffffc7;">CityBuild</h5>
                      <form method="GET" action="check-coins.php">
                        <input type="hidden" name="checkcoins" value="<?php echo $rows->UUID; ?>">
                        <input class="check-subtitle text-warning text-center check-coins-input" value="<?php echo $row->Coins; ?>" name="coins-citybuild"></input>
                      </form>
                      <?php
                      require("inc/dbconn/dbconn-bungeesystem.inc.php");

                      $stmt = $dbh->prepare("SELECT * FROM SkyBlock WHERE UUID = '$str'");
                      $stmt->setFetchMode(PDO::FETCH_OBJ);
                      $stmt->execute();
                      if($row = $stmt->fetch()){
                    ?>
                    <h5 class="check-title" style="color: #ffffffc7;">SkyBlock</h5>
                    <form method="GET" action="check-coins.php">
                      <input type="hidden" name="checkcoins" value="<?php echo $rows->UUID; ?>">
                      <input class="check-subtitle text-warning text-center check-coins-input" value="<?php echo $row->Coins; ?>" name="coins-skyblock"></input>
                    </form>
                  <?php
                  }
                    }
                  }else{
                    echo "ERROR";
                  }
                  ?>
                </div>
                <div class="col-12 text-center">
                  <h5 class="check-title text-white" style="font-family: 'Righteous', cursive;">Joinme</i></h5>
                  <?php
                    require("inc/dbconn/dbconn-bungeesystem.inc.php");

                    $stmt = $dbh->prepare("SELECT * FROM Player_Stats WHERE UUID = '$str'");
                    $stmt->setFetchMode(PDO::FETCH_OBJ);
                    $stmt->execute();
                    if($row = $stmt->fetch()){
                  ?>
                  <form method="GET" action="check-coins.php" class="mb-5">
                    <input type="hidden" name="checkcoins" value="<?php echo $rows->UUID; ?>">
                    <input class="check-subtitle text-warning text-center check-coins-input" value="<?php echo $row->Joinme; ?>" name="coins-joinme"></input>
                  </form>
                  <?php
                }else{
                  echo "Player not found ERROR JOINME";
                }
                 ?>
                </div>
                <div class="col-12 text-center mb-3">
                  <?php
                  require("inc/dbconn/dbconn-bungeesystem.inc.php");

                  $search = MojangAPI::getUuid($_POST["checksearch"]);
                  $str = MojangAPI::formatUuid($search);

                  $stmt = $dbh->prepare("SELECT * FROM Player_Data WHERE UUID = '$str'");
                  $stmt->execute();
                  $uuid = $stmt->fetch();
                  ?>
                    <form method="POST" action="check-ban.php" class="form-delete">
                        <input type="hidden" name="checkban" value="<?php echo $uuid["UUID"]; ?>">
                        <button type="submit" class="btn btn-danger">
                          Ban
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
                <div class="col-12 text-center mb-3">
                  <?php
                  require("inc/dbconn/dbconn-bungeesystem.inc.php");

                  $search = MojangAPI::getUuid($_POST["checksearch"]);
                  $str = MojangAPI::formatUuid($search);

                  $stmt = $dbh->prepare("SELECT * FROM Player_Data WHERE UUID = '$str'");
                  $stmt->execute();
                  $uuid = $stmt->fetch();
                  ?>
                    <form method="POST" action="check-unban.php" class="form-delete">
                        <input type="hidden" name="checkban" value="<?php echo $uuid["UUID"]; ?>">
                        <button type="submit" class="btn btn-success">
                          Unban
                            <i class="fas fa-door-open"></i>
                        </button>
                    </form>
                </div>
              </div>
          <?php
            }else{
                echo "<div class='text-white' style='text-align: center; padding-top: 10px;'>Spieler nicht gefunden</div>";
              }
              ?>

              <?php
          }
          ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- JavaScript -->
    <script src="../lib/jQuery/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../lib/popper/popper.min.js" type="text/javascript"></script>
    <script src="../lib/bootstrap-4.4.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="lib/js/animation-z.js" type="text/javascript"></script>
    <script src="lib/js/animation-x.js" type="text/javascript"></script>
    <script src="https://mcapi.us/scripts/minecraft.js" type="text/javascript"></script>
    <script src="lib/js/mc-status.js" type="text/javascript"></script>
    <script type="text/javascript">
    // Loading
      $(window).on("load",function(){
        $(".loading-wrapper").fadeOut("slow");
      });

    // new loading top
      $(document).ready(function(){
        $(this).scrollTop(0);
      });
    </script>

    <!-- Coded by Mustafa (@vStayzDeveloper) -->
  </body>
</html>
