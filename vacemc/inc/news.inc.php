<div class="news">
  <div class="container">
    <div class="row">
      <div class="col-4">
        <img src="https://minotar.net/cube/versprochenyt/150.png" alt="VaceMC Icon" class="news-image" title="VersprochenYT">
      </div>
      <div class="col-12 col-md-8">
        <div class="news-box-top" id="news-boxall">
            <div class="d-flex justify-content-between">
                <h4 class="text-left news-box-title">NEWS</h4>
                <i class="far fa-newspaper"></i>
            </div>
            <div class="news-box">
              <div class="arrow_box"></div>
              <?php
                require("./adminpanel/inc/e-function.inc.php");
                require("./adminpanel/inc/dbconn/dbconn-vacemcadminpanel.php");

                $stmt = $dbh->prepare("SELECT * FROM newsconfig");
                $stmt->execute();
                $news = $stmt->fetch();
              ?>
              <h4 class="newstitle"><?php echo e($news["titel"]); ?></h4>
                <p class="newsmessage"><?php echo substr($news["message"],0, 60) . "<br>" . substr($news["message"],60, 60); ?></p>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
