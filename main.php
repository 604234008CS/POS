<?php session_start(); ?>
<?php date_default_timezone_set('asia/bangkok');?>
<?php
require 'db.php';
if (isset($_POST['product_id'])) {
$product_id = $_POST['product_id'];
$sql = 'SELECT * FROM product WHERE product_id=?';
$statement = $connection->prepare($sql);
$statement->execute([$product_id]);
$products = $statement->fetch(PDO::FETCH_OBJ);
}

if (isset($_POST['product_id']) && isset($_POST['product_name'])  && isset($_POST['qty']) && isset($_POST['price'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $qty = $_POST['qty'];
    $price = $_POST['price']; 
    $sql = "INSERT INTO sale(product_id, product_name, qty, price)
    VALUES('$product_id', '$product_name', '$qty', '$price')";
    $statement = $connection->prepare($sql);
    if($statement->execute()){
        
    }
}

$sql = 'SELECT * FROM sale';
$statement = $connection->prepare($sql);
$statement->execute();
$product = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require 'header.php'; ?>
<?php require 'navbar.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>การขาย</h2>
    </div>
    
    <div align="right">
      ชื่อพนักงาน : 
      <label> <?php echo $_SESSION['staff_name']; ?> </label>
      <label> <?php echo $_SESSION['staff_sname']; ?> </label>
    </div>
    <div align="right">
      <input type="text"  name="date"  id="date" value="<?=date('Y-m-d H:i:s')?>"/>
    </div>
    <div class="card-body">
    <form action="" method="post">
        รหัสสินค้า :
        <input type="text" name="product_id" required />
        <input type="submit" value="ค้นหา" /> <br />
    </form>
    <br />

    
    <table class="table table-bordered">
        <tr>
            <!-- ชื่อที่จะเเสดงในตาราง -->
          <th>รหัสสินค้า</th>
          <th>ชื่อสินค้า</th>
          <th>จำนวน</th>
          <th>ราคา</th>
        </tr>
        <form action="" method="POST">
          <tr>   
          <td><input value="<?= $products->product_id; ?>" type="text" name="product_id" id="product_id" class="form-control" placeholder = 'รหัสสินค้า' required ></td>
          <td><input value="<?= $products->product_name; ?>" type="text" name="product_name" id="product_name" class="form-control" placeholder = 'ชื่อสินค้า' readonly ></td>
          <td><input type="number" name="qty" id="qty" class="form-control" placeholder = 'จำนวน' min="1" value="1" require ></td>
          <td><input value="<?= $products->price; ?>" type="text" name="price" id="price" class="form-control" placeholder = 'ราคา' readonly ></td>
          <td><button type="submit" class="btn btn-info">เพิ่ม</button></td>
          </tr>
        </form>
    </table> 

    <table class="table table-bordered">
       
        <tr>
          <th>รหัสสินค้า</th>
          <th>ชื่อสินค้า</th>
          <th>จำนวน</th>
          <th>ราคา</th>
        </tr>
     

        <?php foreach($product as $products): ?>
        <tr> 
            <!-- สร้างใชื่อห้เหมือนในฐานข้อมูล -->
           <td><?= $products->product_id; ?></td> 
           <td><?= $products->product_name; ?></td>  
           <td><?= $products->qty; ?></td>  
           <td><?= $products->price; ?></td>   
           <td>
             <a onclick="return confirm('ต้องการลบหรือไม่?')" 
             href="del_sale.php?id=<?= $products->sale_id ?>" class='btn btn-danger'>ลบ</a>
           </td>
         </tr>
         <?php endforeach; ?>
      </table>
    </div> 
    
  </div>
  <div class="card mt-5">
    <div class="card-header">
      <div class="form-group" align="left">
        <label>ยอดรวมทั้งหมด</label>
        <input type="text" name="total" id="total" class="form-control" placeholder = 'ยอดรวมทั้งหมด' disabled >
      </div>  
      <div class="form-group" align="left">
        <label>รับเงิน</label>
        <input type="text" name="pay" id="pay" class="form-control"  placeholder = 'รับเงิน' >
      </div>  
      <div class="form-group" align="left">
        <label>เงินทอน</label>
        <input type="text" name="due" id="due" class="form-control"  placeholder = 'เงินทอน' >
      </div>  
      <div align="right">
        <button type="button" class="btn btn-info" id="save" onclick="">เพิ่ม</button>
        <button type="button" class="btn btn-warning" id="reset" onclick="">รีเซ็ต</button>
      </div>     
    </div>
  </div>
</div>




<?php require 'footer.php'; ?>