<?php
require '../db.php';
$sql = 'SELECT * FROM product_type';
$statement = $connection->prepare($sql);
$statement->execute();
$product = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลสินค้า</h2>
      <a href="add_Type.php" class='btn btn-info'>เพิ่มประเภทสินค้า</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
            <!-- ชื่อที่จะเเสดงในตาราง -->
          <th>รหัสประเภทสินค้า</th>
          <th>ชื่อประเภทสินค้า</th>
        </tr>
        <?php foreach($product as $products): ?>
          <tr>
            
             <!-- สร้างใชื่อห้เหมือนในฐานข้อมูล -->
            <td><?= $products->product_type_id; ?></td> 
            <td><?= $products->product_type_name; ?></td>   
            <td>
              <a href="edit_Type.php?id=<?= $products->product_type_id ?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบหรือไม่?')" 
              href="delete_Type.php?id=<?= $products->product_type_id ?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>




<?php require '../footer.php'; ?>
