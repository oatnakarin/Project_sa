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
        <a href="#" class="user">
          <i class="far fa-user"></i>
        </a>
        <a href="cart.php">
          <i class="fas fa-shopping-cart">
          </i>
        </a>
        <a href="tracking.php"><i class="fas fa-truck"></i></a>
      </div>
    </div>
  </nav>
  <div class="payment-box">
    <div class="payment-detail">ช่องทางการชำระเงิน<br><br>
      ธนาคารไทยพาณิชย์(SCB): xxxxxxxxx<br><br>
      ชื่อบัญชี : GARBELL_BKK<br><br>
      _________________________________________________<br><br>
      หลักฐานการชำระเงิน(ตัวอย่าง)</a>
    </div>

    <div class="payment-img">
      <img src="slip.jpg" />
      <form method="post" action="adddata.php" enctype='multipart/form-data'>
        <input type='file' name='file' class="btn" required="กรุณาใส่ข้อมูล">
        <button type="submit" name="but_up" class="payment-select">อัพโหลด</button>
      </form>
    </div>
  </div>
  <div class="footer">
    <div class="social">
      <br><br><br><br><br>
      Contact&ensp;us:
    <a href="https://www.facebook.com/garbellbkk/"><i class="fab fa-facebook-f" style="color: blue;"></i></a>
    <a href="https://line.me/R/ti/p/%40922vqgwf#~"><i class="fab fa-line" style="color: green;"></i></a>
    <a href="https://instagram.com/garbell_bkk"><i class="fab fa-instagram" style="color: rgb(255, 0, 191);"></i></a>
    </div>
</body>

</html>