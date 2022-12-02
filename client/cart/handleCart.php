<?php
    session_start();
    include "../../sql/connect.php";
    $date = getdate();
    $day = $date['mday'];
    $month = $date['mon'];
    $year = $date['year'];
    $temp = date_create("$month/"."$day/"."$year");
    $startDay = date_format($temp,"m/d/Y");
    $userId = $_SESSION['user']['id'];
    $product = [];
    var_dump($_SESSION['giohang']);
    if(isset($pdo)){
    foreach($_SESSION['giohang'] as $value){       
            $product["id"][] = $value[3]."";
            $product["dem"][] = $value[4]."";
            $product["hinh"][] = $value[1]."";
            $product["gia"][] = $value[2]."";
        }
    }
    $productJson = json_encode($product);
    $sql = "insert into invoice(product_id,user_id,start_date) values(?,?,?)";
    $pdo->query("set names 'utf8'");
        $result = $pdo->prepare($sql);
        $result->bindParam(1,$productJson);
        $result->bindParam(2,$userId);
        $result->bindParam(3,$startDay);
        $result->execute();
        unset($_SESSION['giohang']);
    header('location:' . 'cart.php');  
?>