<?php
    session_start();
    $errors = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="stylex.css">
</head>
<body>
    
    <div class="header">
        <h2>Register</h2>
    </div>
    <form action="register_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="ตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น" required>
            <span id="usernameavailable"></span>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="xxxxxx@gmail.com" required>
        </div>
        <div class="input-group">
            <label for="email">Name</label>
            <input type="text" name="name" placeholder="ชื่อไว้แสดงบนเว็บไซต์" required>
        </div>
        <div class="input-group">
            <label for="email">Address</label>
            <input type="text" name="address" placeholder="ที่อยู่ในการจัดส่งของ" required>
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1" placeholder="ตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น" required>
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2" placeholder="ตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น" required>
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
</body>
</html>