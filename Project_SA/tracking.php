<!DOCTYPE html>
<html lang="en">
<?php
    include('server.php');
    session_start();
    $_SESSION['num'] = "0";
    if(!isset($_SESSION['name'])){
        echo "<script type='text/javascript'>";
        echo "alert('กรุณาล็อคอินเข้าระบบก่อนใช้งาน');";
        echo "window.location = 'index.php'; ";
		echo "</script>";
    }
    if($_SESSION['username'] == "felix1234"){
        header("location: trackingadmin.php");
    }
    $name = $_SESSION['name'];
    $queryf = "SELECT * FROM datauser  WHERE nameuser = '$name'";
    $resultr = mysqli_query($conn, $queryf);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garbell_bkk</title>
    <link rel="stylesheet" href="style.css">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
</head>

<body>
    <nav>
        <!--menu-bar----------------------------------------->
        <div class="navigation">
          <!--logo------------>
          <a href="index.php" class="logo">
            GARBELL_BKK
          </a>
          <!--right-menu----------->
          <div class="right-menu">
          <?php 
	      //session_start();
          if (!isset($_SESSION['name'])) : ?>
          <a href="login.php" class="user">
          <i class="far fa-user"></i>
          </a>
          <?php else : ?>
           <a style="color: white; font-size: 20px;"> Welcome <?php echo $_SESSION['name']; ?><a>
            <a href="index.php?logout='1'" style="color: white;">Logout</a>
          <?php endif; ?>
            <a href="cart.php">
              <i class="fas fa-shopping-cart">
              </i>
            </a>
            <a href="tracking.php"><i class="fas fa-truck"></i></a>
          </div>
        </div>
      </nav>
    <div class="table-wrapper">
        <div class="table-title">
            <h3>Tracking Number</h3>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Name(ชื่อสินค้าที่สั่ง)</th>
                    <th>Quantity(จำนวนสินค้า)</th>
                    <th>Tracking&nbsp;Number</th>
                    <th>Status(สถานะจัดส่ง)</th>
                </tr>
            </thead>
            <?php while($rowh = mysqli_fetch_array($resultr)){  ?>
            <tbody>
                <tr data-status="inactive">
                    <td><?php echo $rowh['nameprice']?></td>
                    <td><?php echo $rowh['number']?></td>
                    <td>TH42071062001638</td>
                    <td>ยังไม่จัดส่ง</td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
    <div class="footer">
        <div class="social">
            <br><br><br><br><br><br>
            Contact&ensp;us:
            <a href="#"><i class="fab fa-facebook-f" style="color: blue;"></i></a>
            <a href="#"><i class="fab fa-line" style="color: green;"></i></a>
            <a href="#"><i class="fab fa-instagram" style="color: rgb(255, 0, 191);"></i></a>
        </div>


        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>

</html>