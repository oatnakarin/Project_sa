<?php
    include('server.php');
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        $xxx = "DELETE FROM tempdata";
        $conn->query($xxx);
        unset($_SESSION['name']);
        unset($_SESSION['username']);
        header('location: index.php');
    }
    $query = "SELECT * FROM detailprice" or die("Error:" . mysqli_error()); 
    $result = mysqli_query($conn, $query);
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
  <!--NEW ARRIVAL-------------------------------->
  <section class="new-arrival">
    <!--heading-------->
    <div class="arrival-heading">
      <strong>PAO PHAH</strong>
    </div>
    <!--products----------------------->
    <div class="product-container">
      <?php while($row = mysqli_fetch_array($result)){  ?>
          <div class="product-box">
            <div class="product-img">
                        <!--add-cart---->
                        <?php if((isset($_SESSION['username'])) and ($_SESSION['username'] == "felix1234")) : ?>
                        <a href="detailadmin.php?name=<?php echo $row['name'] ?>"   class="add-cart"  name="<?php echo $row['name']?>">
                        <?php else :?>
                          <a href="detail.php?name=<?php echo $row['name'] ?>"   class="add-cart"  name="<?php echo $row['name']?>">
                        <?php endif; ?>
                        <i class="fas fa-shopping-cart"></i>
                        </a>
                        <!--img------>
                        <img src='<?php echo $row['image'] ?>' >
                    </div>
                    <!--product-details-------->
                    <div class="product-details">
                        <a href="#" class="p-name"><?php echo $row['nameprice'] ?></a>
                        <span class="p-price"><?php echo $row['price']." THB" ?></span>
                    </div>
                </div>
          <?php
          }
          ?>
        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == "felix1234"):?>
         <div class="product-box">
                  <!--product-img------------>
                  <div class="product-img">
                      <!--add-cart---->
                      <a href="addstock.php" class="add-cart">
                          <i class="fas fa-shopping-cart"></i>
                        </a>
                      <!--img------>
                      <img src="plus.jpg">
                    </div>
                    <div class="product-details">
                      <a href="#" class="p-name">เพิ่มสินค้าในระบบ</a>
                    </div>
                  </div>
              </div>
        <?php endif; ?>
    </div>
   </section>
  <div class="footer">
    <div class="social">
    Contact&ensp;us:
    <a href="https://www.facebook.com/garbellbkk/"><i class="fab fa-facebook-f" style="color: blue;"></i></a>
    <a href="https://line.me/R/ti/p/%40922vqgwf#~"><i class="fab fa-line" style="color: green;"></i></a>
    <a href="https://instagram.com/garbell_bkk"><i class="fab fa-instagram" style="color: rgb(255, 0, 191);"></i></a>
  </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>