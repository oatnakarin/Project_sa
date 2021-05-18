<?php 
  session_start();
    include('server.php');
    $name = $_REQUEST['name'];
    $query = "SELECT * FROM detailprice WHERE name = '$name' " or die("Error:" . mysqli_error()); 
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if(!isset($_SESSION['name'])){
      header("location: login.php");
    }
    $_SESSION['check'] = "true";
    $_SESSION['tempn'] = $row['name'];
    $_SESSION['nprice'] = $row['nameprice'];
    $_SESSION['num'] = "0";
?>

<!DOCTYPE html>
<html lang="en">

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
    <div class="product-container-detail">
        <div class="product-box-detail">
            <div class="product-img-detail">
              <img src="<?php echo $row['image']; ?>">
            </div>
            <div class="product-details-detail">
                <div class="p-name-detail">
                  <?php echo $row['nameprice']; ?>
                </div>
                <div class="p-price-detail">
                  <?php echo $row['price']; ?> THB
                </div>
                <div class="pd">
                  กรุณาใส่จำนวนสินค้าในช่องด้านล่าง(ห้ามใส่ต่ำกว่า 1)
                </div>
                <div class="qty">
                  
                    <form  action="direct.php" method = "post">
                      <input type="text" name="price" required>
                      <div class="buttonsub">
                       <button type="submit" name="submit" >ใส่ตะกร้า</button>
                      </div>
                    </form>
                </div>
                <div class="pd">
                  ยอดสินค้าคงเหลือ : <?php echo $row['number']; ?> ชิ้น
                </div>
                <div class="p-price-detail">
                  รายละเอียดของสินค้า
                </div>
                <div class="p-detail">
                    <?php echo $row['detail']; ?>
                </div>
            </div>
        </div>
    </div>
    <!--social-links-and-phone-number----------------->
    <div class="footer">
        <div class="social">
            <br>
        Contact&ensp;us:
        <a href="https://www.facebook.com/garbellbkk/"><i class="fab fa-facebook-f" style="color: blue;"></i></a>
        <a href="https://line.me/R/ti/p/%40922vqgwf#~"><i class="fab fa-line" style="color: green;"></i></a>
        <a href="https://instagram.com/garbell_bkk"><i class="fab fa-instagram" style="color: rgb(255, 0, 191);"></i></a>
      </div>
    </div>
</body>
</html>
<?php
mysqli_close($conn); ?>