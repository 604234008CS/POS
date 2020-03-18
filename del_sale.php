<?php
require 'db.php';
$sale_id = $_GET['id'];
$sql = 'DELETE FROM sale WHERE sale_id=?';
$statement = $connection->prepare($sql);
if ($statement->execute([$sale_id])) {
  header("Location: main.php");
}