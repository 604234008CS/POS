<?php
$dsn = 'mysql:host = localhost;dbname=pos';
$username = 'root';
$password = '';
$options = [];
try{
    $connection = new PDO($dsn, $username, $password, $options);
    echo 'connection.successfully';
} catch(PDOException $e){
    echo 'connection.fail';
}
?>