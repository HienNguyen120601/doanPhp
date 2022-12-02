<?php
include '../SQL/connect.php';
if (isset($pdo)) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = (int)$_POST['Id'];
        $name = $_POST['Name'];
        $price = (int)$_POST['Price'];
        $img = $_POST['Image'];
        $count = (int)$_POST['Count'];
        $detail = $_POST['Detail'];
        $type = $_POST['Type'];
        $sqlInsert = 'update product
         set name=?,price=?,img=?,count=?,detail=?,type=? 
        where id=?';

        $stmt = $pdo->prepare($sqlInsert);
        // $data = array(
        //     '$name',
        //     '$price',
        //     '$img',
        //     '$count',
        //     '$detail',
        //     '$type'
        // );
        var_dump($stmt);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $price);
        $stmt->bindParam(3, $img);
        $stmt->bindParam(4, $count);
        $stmt->bindParam(5, $detail);
        $stmt->bindParam(6, $type);
        $stmt->bindParam(7, $id);
        $stmt->execute();
        header('location:' . 'admin.php');
    }
    //$row = $result->fetch(PDO::FETCH_ASSOC);
}
