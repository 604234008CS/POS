<?php
require '../db.php';

$staff_type_id = $_GET['id'];
$sql = 'SELECT * FROM staff_type WHERE staff_type_id=?';
$statement = $connection->prepare($sql);
$statement->execute([$staff_type_id]);
$staffs = $statement->fetch(PDO::FETCH_OBJ);

$message = '';
if (isset($_POST['staff_type_name'])){
    $staff_type_name = $_POST['staff_type_name'];
    $sql = "UPDATE staff_type SET staff_type_name=? WHERE staff_type_id=?";
    $statement = $connection->prepare($sql);
    if($statement->execute([$staff_type_name, $staff_type_id]))   {
        $message = 'แก้ไขประเภทพนักงานสำเร็จ';
        header("Location: ../staff/show_Type.php");
    }
}
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class = "card mt-4">
    <div class = "card-header">
    <h2>แก้ไขข้อมูลพนักงาน</h2>
    </div>
    <div class = "card-body">
    <?php if(!empty($message)): ?>
    <div class = "alert alert-success">
    <?= $message; ?>
    </div>
    <?php endif; ?>

      <form method="post">        
        <div class="form-group">
          <label for="">รหัสประเภทพนักงาน</label>
          <input value="<?= $staffs->staff_type_id; ?>" type="text" name="staff_type_id" id="staff_type_id" class="form-control" placeholder = 'รหัสประเภทพนักงาน' readonly ></div>
        <div class="form-group">
          <label for="">ชื่อประเภทพนักงาน</label>
          <input value="<?= $staffs->staff_type_name; ?>" type="text" name="staff_type_name" id="staff_type_name" class="form-control" placeholder = 'ชื่อประเภทพนักงาน' required ></div>   
        <div class="form-group">
           <button type="submit" class="btn btn-info">แก้ไขประเภทพนักงาน</button></div>
      </form>
    </div>
  </div>
</div>

<?php require '../footer.php'; ?>