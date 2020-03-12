<?php
require '../db.php';
$message = '';
if (isset($_POST['product_type_id']) && isset($_POST['product_type_name'])){
    $product_type_id = $_POST['product_type_id'];
    $product_type_name = $_POST['product_type_name'];
    $sql = "INSERT INTO product_type(product_type_id, product_type_name)
    VALUES('$product_type_id', '$product_type_name')";
    $statement = $connection->prepare($sql);
    if($statement->execute())   {
        $message = 'เพิ่มสินค้าสำเร็จ';
        header("Location: ../product/show_Type.php");
    }
}
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-5">
    <div class = "card-header">
    <h2>เพิ่มประเภทสินค้า</h2>
    </div>
    <div class = "card-body">
    <?php if(!empty($message)): ?>
    <div class = "alert alert-success">
    <?= $message; ?>
    </div>
    <?php endif; ?>

      <form method="post">        
        <div class="form-group">
          <label for="">รหัสประเภทสินค้า</label>
          <input type="text" name="product_type_id" id="product_type_id" class="form-control" placeholder = 'รหัสประเภทสินค้า' required ></div>
        <div class="form-group">
          <label for="">ชื่อประเภทสินค้าสินค้า</label>
          <input type="text" name="product_type_name" id="product_type_name" class="form-control" placeholder = 'ชื่อประเภทสินค้า' required ></div>
        <div class="form-group">
           <button type="submit" class="btn btn-info">เพิ่มประเภทสินค้า</button></div>
      </form>
    </div>
  </div>
</div>

<?php require '../footer.php'; ?>