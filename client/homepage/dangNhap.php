<?php
session_start();
    include "../../sql/connect.php";
    if(isset($_POST['taiKhoan']) && isset($_POST['matKhau']))
    {
        $tk = $_POST['taiKhoan'];
        $mk = $_POST['matKhau'];
        if (isset($pdo)) 
        {
            $sql = "select * from customer ";
            $pdo->query("set names 'utf8'");
            $result = $pdo->prepare($sql);
            $result->execute();
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {
            if($row['username']==$tk && $row['password']==$mk)
                $_SESSION['user']=$row;
            header('location:'.'index.php');
            exit;
            }

        }   
    }
?>