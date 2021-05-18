<!DOCTYPE html>
<html lang="en">
<?php
    include("server.php");
    session_start();
    $queryy3x = "SELECT * FROM datauser";
    $result3d = mysqli_query($conn, $queryy3x);
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
    <div class="tablecheck">
        <div class="table-titlecheck">
            <h3>Checking Order</h3>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ชื่อผู้สั่ง</th>
                    <th>รายการของ</th>
                    <th>ราคาของ</th>
                    <th>ที่อยู่</th>
                    <th>จำนวนที่สั่ง</th>
                    <th>เงินรวมที่ชำระ</th>
                    <th>หลักฐาน</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($rowz = mysqli_fetch_array($result3d)){ ?>
                    <tr data-status="active">
                        <td><?php echo $rowz['nameuser'] ?></td>
                        <td><?php echo $rowz['nameprice']?></td>
                        <td><?php echo $rowz['price']?></td>
                        <td><?php echo $rowz['address']?></td>
                        <td><?php echo $rowz['number']?></td>
                        <td><?php echo $rowz['total']?></td>
                        <td><img src='<?php echo $rowz['image'] ?>' style="width:50px; height:50px"></td>
                    </tr>
                <?php } ?>  
            </tbody>
        </table>
    </div>
    <div class="footer">
        <div class="social">
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