<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Rentals|Home Page</title>
</head>
<body>
    <!--Mobile Checker-->
    <?php
    $mobile = false;
    $banner = 'banner-section';
    if ($detect->isMobile() || $detect->isTablet() ) {
        $mobile = true;
    $banner = 'mobile-banner-section';
    }
    ?>

    <!-- GET TAGS -->
<?php

if(isset($_SESSION['login'])) {
  $sql = "SELECT id, UserType FROM tblusers WHERE EmailId=:user_email";
  $query = $dbh->prepare($sql);
  $query->bindParam(':user_email', $_SESSION['login'], PDO::PARAM_STR);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_OBJ);
?>
<!-- REGISTER TAGS TO A USER -->
  <script>
    OneSignal.push(function() {
      OneSignal.sendTags({
        user_name:"<?php echo $_SESSION['login'] ?>",
        user_id: "<?php echo $result[0]->id ?>",
        user_type: "<?php echo $result[0]->UserType ?>",
      });
    });
  </script>
<?php
}
?>
    <!--Page Header-->
    <section id="banner" class="<?php echo $banner ?>">
    <div class="container">
        <div class="div_zindex">
            <div class="row">
                <div class="col-md-5 col-md-push-7">
                    <div class="banner_content">
                        <?php if ($mobile) {  echo '<span style="text-align:center !important;">'; } ?>
                        <?php if ($mobile) {  echo '<h2 style="color:#fff !important; margin-right:10px;">EzRent <span style="background-color:#e00d4c; padding: 4px;">Go!</span></h2><hr style="margin-right:10px;"><br/>'; } ?>
                        <h1 class="text-shadow" style="color:#fff !important;">Welcome to Smart Rentals.</h1>
                        <p class="text-shadow" style="margin-right:10px;"><small>We provide super vehicles for you.</small></p>
                        <!-- <a href="#" class="btn">Read More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div> -->
                        <?php 
                        if ($mobile) {  echo '<div class="text-center m-auto" style="background-color:#e00d4c; padding:4px; color:#fff; margin-right:20px;"><small>Scroll down for deals</small></div>'; } ?>
                        <?php if ($mobile) {  echo '</span>'; } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- /Page Header-->
</body>
</html>