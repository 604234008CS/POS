<?php
require '../db.php';
$sql = 'SELECT * FROM staff_type';
$statement = $connection->prepare($sql);
$statement->execute();
$staff = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลประเภทพนักงาน</h2>
      <a href="add_Type.php" class='btn btn-info'>เพิ่มประเภทพนักงาน</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
            <!-- ชื่อที่จะเเสดงในตาราง -->
          <th>รหัสประเภทพนักงาน</th>
          <th>ชื่อประเภทพนักงาน</th>
        </tr>
        <?php foreach($staff as $staffs): ?>
          <tr>
            
             <!-- สร้างใชื่อห้เหมือนในฐานข้อมูล -->
            <td><?= $staffs->staff_type_id; ?></td> 
            <td><?= $staffs->staff_type_name; ?></td> 
            <td>
              <a href="edit_Type.php?id=<?= $staffs->staff_type_id ?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบหรือไม่?')" 
              href="delete_Type.php?id=<?= $staffs->staff_type_id ?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>




<?php require '../footer.php'; ?>
