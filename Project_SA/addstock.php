<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="stylex.css">
</head>
<body>
<div class="header">
        <h2>เพิ่มสินค้าเข้าระบบ</h2>
</div>
<form method="post" action="addstock_db.php" enctype='multipart/form-data'>
<div class="input-group">
            <label for="price">อัพโหลดรูปสินค้า</label>
            <input type='file' name='file' class="btn" required="กรุณาใส่ข้อมูล">
   </div>
  <div class="input-group">
            <label for="nameprice">ชื่อสินค้า</label>
            <input type="text" name="nameprice" required="กรุณาใส่ข้อมูล" placeholder="ชื่อสินค้าภาษาไทยหรืออังกฤษ">
  </div>
  <div class="input-group">
            <label for="price">ราคา</label>
            <input type="text" name="price" required="กรุณาใส่ข้อมูล" placeholder="ใส่เป็นตัวเลข">
   </div>
   <div class="input-group">
            <label for="number">จำนวนสินค้า</label>
            <input type="text" name="number" required="กรุณาใส่ข้อมูล" placeholder="ใส่เป็นตัวเลข">
   </div>
   <div class="input-group">
            <label for="detail">รายละเอียดสินค้า(ไม่มีให้ใส่ - )</label>
            <input type="text" name="detail" required="กรุณาใส่ข้อมูล" placeholder="ใส่เป็นรายละเอียด">
   </div>
  <input type='submit' value='อัพโหลดสินค้า' name='but_upload' class="btn">
  
</form>
</body>
</html>