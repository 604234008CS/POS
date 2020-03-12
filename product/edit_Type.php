<?php
require '../db.php';

$product_type_id = $_GET['id'];
$sql = 'SELECT * FROM product_type WHERE product_type_id=?';
$statement = $connection->prepare($sql);
$statement->execute([$product_type_id]);
$products = $statement->fetch(PDO::FETCH_OBJ);

$message = '';
if (isset($_POST['product_type_name'])){
    $product_type_name = $_POST['product_type_name'];
    $sql = "UPDATE product_type SET product_type_name=? WHERE product_type_id=?";
    $statement = $connection->prepare($sql);
    if($statement->execute([$product_type_name, $product_type_id])){
        $message = 'แก้ไขประเภทสินค้าสำเร็จ';
        header("Location: ../product/show_Type.php");
    }
}
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-5">
    <div class = "card-header">
    <h2>แก้ไขสินค้า</h2>
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
          <input value="<?= $products->product_type_id; ?>" type="text" name="product_type_id" id="product_type_id" class="form-control" placeholder = 'รหัสประเภทสินค้า' readonly></div>
        <div class="form-group">
          <label for="">ชื่อประเภทสินค้า</label>
          <input value="<?= $products->product_type_name; ?>" type="text" name="product_type_name" id="product_type_name" class="form-control" placeholder = 'ชื่อประเภทสินค้า' required ></div>
        <div class="form-group">
           <button type="submit" class="btn btn-info">แก้ไขประเภทสินค้า</button></div>
      </form>
    </div>
  </div>
</div>

<?php require '../footer.php'; ?>