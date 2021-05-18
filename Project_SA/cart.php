<?php 
    session_start();
    include('server.php');
    echo "-";
    $que = "SELECT * FROM tempdata"; 
    $res = mysqli_query($conn, $que);
    if(($_SESSION['username']) == "felix1234"){
        echo "<script type='text/javascript'>";
        echo "alert('แอดมินไม่สามารถใช้งานฟังก์ชันนี้ได้');";
        echo "window.location = 'index.php'; ";
		echo "</script>";
    }
    if(!isset($_SESSION['name'])){
        echo "<script type='text/javascript'>";
        echo "alert('กรุณาล็อคอินเข้าระบบก่อนใช้งาน');";
        echo "window.location = 'index.php'; ";
		echo "</script>";
    }
    if((!isset($_SESSION['nprice']))){
        echo "<script type='text/javascript'>";
        echo "alert('คุณไม่มีการสั่งซื้อของในตอนนี้');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
    if((mysqli_num_rows($res) < 1)){
        if($_SESSION['num'] == "0"){
            echo "<script type='text/javascript'>";
            echo "alert('คุณไม่มีการสั่งซื้อของในตอนนี้');";
            echo "window.location = 'index.php'; ";
            echo "</script>";
        }
    }
            $name = $_SESSION['tempn'];
            $queryx = "SELECT * FROM detailprice WHERE name = '$name'"  or die("Error:" . mysqli_error()); 
            $resultt = mysqli_query($conn, $queryx);
            $roww = mysqli_fetch_array($resultt);
            if($roww['number']-$_SESSION['num'] < 1){
                echo "<script type='text/javascript'>";
                echo "alert('จำนวนสินค้าไม่พอสั่งกรุณาสั่งใหม่');";
                echo "window.location = 'index.php'; ";
		        echo "</script>";
            }
            $total = 0;
            echo "-";
            $namepricex = $roww['nameprice'];
            $name2 = $roww['name'];
            $image = $roww['image'];
            $price = $roww['price'];
            if($_SESSION['check'] != "false"){
                $number = $_SESSION['num'];
                $sql = "INSERT INTO tempdata (name,image,nameprice,price,number) VALUES ('$name2','$image','$namepricex','$price','$number')";
                mysqli_query($conn, $sql);
            }
        
        $query2 = "SELECT * FROM tempdata";
        $result2 = mysqli_query($conn, $query2);
        if(mysqli_num_rows($result2) < 1){
            echo "<script type='text/javascript'>";
			echo "alert('คุณไม่มีการสั่งซื้อสินค้าใดๆในตอนนี้');";
			echo "window.location = 'index.php'; ";
			echo "</script>";
        }
        $_SESSION['check'] = "false";
        $_SESSION['total'] = 0;
   
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

    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                <?php while($row = mysqli_fetch_array($result2)){  ?>
                                    <?php $_SESSION['total'] += ($row['price']*$row['number']); ?>
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="#"><img src="<?php echo $row['image']?>" alt="Image"></a>
                                                <p><?php echo $row['nameprice']?></p>
                                            </div>
                                        </td>
                                        <td><?php echo $row['price']?></td>
                                        <td>
                                            <?php echo $row['number'] ?>
                                        </td>
                                        <td><?php echo $row['price']?></td>
                                        <td><a href="trash.php?row=<?php echo $row[0]?>"><button><i class="fa fa-trash"></i></button></a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h1>Cart Summary</h1>
                                        <p>Sub Total<span><?php echo $_SESSION['total'] ?> THB</span></p>
                                        <p>Shipping Cost<span>$1 THB</span></p>
                                        <h2>Grand Total<span><?php echo $_SESSION['total']+1?> THB</span></h2>
                                    </div>
                                    <div class="cart-btn">
                                    <button ><a href="cart.php">Refresh</a><Checkout</button>
                                        <button ><a href="payment.php">Check out</a><Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    <div class="footer">
        <div class="social">
        Contact&ensp;us:
        <a href="https://www.facebook.com/garbellbkk/"><i class="fab fa-facebook-f" style="color: blue;"></i></a>
        <a href="https://line.me/R/ti/p/%40922vqgwf#~"><i class="fab fa-line" style="color: green;"></i></a>
        <a href="https://instagram.com/garbell_bkk"><i class="fab fa-instagram" style="color: rgb(255, 0, 191);"></i></a>
      </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>
</html>