<?php
require '../db.php';
$product_type_id = $_GET['id'];
$sql = 'DELETE FROM product_type WHERE product_type_id=?';
$statement = $connection->prepare($sql);
if ($statement->execute([$product_type_id])) {
  header("Location: ../product/show_Type.php");
}