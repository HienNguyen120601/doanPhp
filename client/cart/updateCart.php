<?php
session_start();
if(isset($_GET['id']) && isset($_SESSION['giohang'])){
    $action = $_GET['type'];
    $id = $_GET['id'];
    foreach($_SESSION['giohang'] as $key => $value){
        if($value[3]==$id){
            if($action == "false"){
                $value[4] = $value[4] -1;
                $_SESSION['giohang'][$key] = $value;
            }
            else{
                $value[4] = $value[4] +1;
                $_SESSION['giohang'][$key] = $value;
            }
            break;
        }        
    } 
    header('location:' . 'cart.php');  
}
?>