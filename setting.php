 <?php
    require 'includes/common.php';
    ?>

<html>
  <head>
    <title>SET YOUR PASSWORD</title>
    <link rel="stylesheet" href="webframeworks\bootstrap\css\bootstrap.css" type="text/css" />

    <script src="webframeworks\bootstrap\js\jquery-3.3.1.min.js" type="text/javascript"/>
    </script>

    <script src="webframeworks\bootstrap\js\bootstrap.js" type="text/javascript"/>
   </script>
   <link rel="stylesheet" type="text/css" href="index.css">
  </head>
  <body>
                <?php
                include 'includes/header.php';
                ?>
<?php
 if(!isset($_SESSION['email']))
                    header('location:main.php');
 ?>






    <div class="panel container">
      <div class="panel-heading">
        <h1>Change Password</h1>
      </div>
      <div class="panel-body">
        <!--<p class="text-warning">Login to make a purchase</p>-->
          <form action="pwd_update.php" method="post">
          <div class="form-group">
            <input type="password" name="pwdold" class="form-control" placeholder="Old Password">
          </div>
          <div class="form-group">
            <input type="password" name="pwdnew" class="form-control" placeholder="New Password">
          </div>
          <div class="form-group">
            <input type="password" name="pwdrenew" class="form-control" placeholder="Retype New Password">
          </div>
              <?php if(isset($_GET['str']))
              echo '<p class="label label-warning">'.$_GET['str'].'</p><br><br><br>';
              else
                  echo '';
                      ?>
              <input type="submit" class="btn btn-primary">
        </form>
      </div>
    </div>

  
		<?php
                include 'includes/footer.php';
                ?>
  </body>
  </html>