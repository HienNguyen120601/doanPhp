<?php
 session_start();
//  session_destroy();

 if(!isset($_SESSION['giohang'])){
    $_SESSION['giohang']=[];
}
var_dump($_POST);
    if(isset($_POST['submit']) ){ 
        $tensp = $_POST['tensp'];
        $hinh = $_POST['hinh'];
        $giasp = $_POST['giasp'];
        $id = $_POST['id'];
        $count = $_POST['count'];
        
        foreach($_SESSION['giohang'] as $key => $value){
            if($value['3'] == $id){
                $count=$count+ $value['4'];
                $sp = [$tensp,$hinh,$giasp,$id,$count];
                $_SESSION['giohang'][$key] = $sp;
                header('location:' . 'index.php');
                exit;
            }  
        }
        $sp = [$tensp,$hinh,$giasp,$id,$count];
       
        $_SESSION['giohang'][] = $sp;
        
        header('location:' . 'index.php');
    }
    
?>