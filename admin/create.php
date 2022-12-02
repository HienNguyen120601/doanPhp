<?php
include '../SQL/connect.php';
// if (isset($pdo)) {
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         $name = $_POST['Name'];
//         $price = $_POST['Price'];
//         $img = $_POST['Image'];
//         $count = $_POST['Count'];
//         $detail = $_POST['Detail'];
//         $type = $_POST['Type'];
//         $sqlInsert = "insert into product(name,price,img,count,detail,type)" . "values('$name','$price','$img','$count','$detail','$type')";
//         $smtp = $pdo->prepare($sqlInsert);
//         $smtp->execute();
//     }
// }
var_dump($_POST);
if (isset($pdo)) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['Name'];
        $price = (int)$_POST['Price'];
        $img = $_POST['Image'];
        $count = (int)$_POST['Count'];
        $detail = $_POST['Detail'];
        $type = $_POST['Type'];
        $sqlInsert = 'insert into product(name,price,img,count,detail,type)values(?,?,?,?,?,?)';

        $stmt = $pdo->prepare($sqlInsert);
        // $data = array(
        //     '$name',
        //     '$price',
        //     '$img',
        //     '$count',
        //     '$detail',
        //     '$type'
        // );
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $price);
        $stmt->bindParam(3, $img);
        $stmt->bindParam(4, $count);
        $stmt->bindParam(5, $detail);
        $stmt->bindParam(6, $type);
        $stmt->execute();
        header('location:' . 'admin.php');
    }
    //$row = $result->fetch(PDO::FETCH_ASSOC);
}
