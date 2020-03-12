<?php
require 'db.php';
if (isset($_POST['product_id'])) {
$product_id = $_POST['product_id'];
$sql = 'SELECT * FROM product WHERE product_id=?';
$statement = $connection->prepare($sql);
$statement->execute([$product_id]);
$products = $statement->fetch(PDO::FETCH_OBJ);
}

if (isset($_POST['product_id']) && isset($_POST['product_name']) && isset($_POST['price'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price']; 
    $sql = "INSERT INTO sale(product_id, product_name, price)
    VALUES('$product_id', '$product_name', '$price')";
    $statement = $connection->prepare($sql);
    if($statement->execute()){
        header("Location: test.php");
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
      <h2>ข้อมูลสินค้า</h2>
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
          <th>ราคา</th>
        </tr>
          <tr>
            
          <td><input value="<?= $products->product_id; ?>" type="text" name="product_id" id="product_id" class="form-control" placeholder = 'รหัสสินค้า' required ></td>
          <td><input value="<?= $products->product_name; ?>" type="text" name="product_name" id="product_name" class="form-control" placeholder = 'ชื่อสินค้า' readonly ></td>
          <td><input value="<?= $products->price; ?>" type="text" name="price" id="price" class="form-control" placeholder = 'ราคา' readonly ></td>
          <td><button type="submit" class="btn btn-info">เพิ่ม</button></td>
          </tr>
    </table> 

    <table class="table table-bordered">
       
        <tr>
          <th>รหัสสินค้า</th>
          <th>ชื่อสินค้า</th>
          <th>ราคา</th>
        </tr>
     

        <?php foreach($product as $products): ?>
        <tr> 
            <!-- สร้างใชื่อห้เหมือนในฐานข้อมูล -->
           <td><?= $product->product_id; ?></td> 
           <td><?= $product->product_name; ?></td>  
           <td><?= $product->price; ?></td>   
           <td>
             <a onclick="return confirm('ต้องการลบหรือไม่?')" 
             href="delete_sale.php?id=<?= $products->product_id ?>" class='btn btn-danger'>ลบ</a>
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
        <button type="button" class="btn btn-info" id="save" onclick="AddBrand()">เพิ่ม</button>
        <button type="button" class="btn btn-warning" id="reset" onclick="">รีเซ็ต</button>
      </div>     
    </div>
  </div>
</div>




<?php require 'footer.php'; ?>
