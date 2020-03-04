<?php
require '../db.php';
$sql = 'SELECT * FROM staff';
$statement = $connection->prepare($sql);
$statement->execute();
$staff = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require '../header.php'; ?>
<?php require 'navbar.php'; ?>

<div class="container-fluid">
  <div class="card mt-5">
    <div class="card-header">
      <h2>ข้อมูลพนักงาน</h2>
      <a href="add.php" class='btn btn-info'>เพิ่มพนักงาน</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
            <!-- ชื่อที่จะเเสดงในตาราง -->
          <th>รหัสพนักงาน</th>
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>ประเภทพนักงาน</th>
          <th>ที่อยู่</th>
          <th>หมายเลขโทรศัพท์</th>
        </tr>
        <?php foreach($staff as $staffs): ?>
          <tr>
            
             <!-- สร้างใชื่อห้เหมือนในฐานข้อมูล -->
            <td><?= $staffs->staff_id; ?></td> 
            <td><?= $staffs->staff_name; ?></td> 
            <td><?= $staffs->staff_sname; ?></td> 
            <td><?= $staffs->staff_type_id; ?></td> 
            <td><?= $staffs->address; ?></td> 
            <td><?= $staffs->phoneNumber; ?></td>   
            <td>
              <a href="edit.php?id=<?= $staffs->staff_id ?>" class="btn btn-info">แก้ไข</a>
              <a onclick="return confirm('ต้องการลบหรือไม่?')" 
              href="delete.php?id=<?= $staffs->staff_id ?>" class='btn btn-danger'>ลบ</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>




<?php require '../footer.php'; ?>
