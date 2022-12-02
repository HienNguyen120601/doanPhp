<?php
include '../SQL/connect.php';
if (isset($pdo)) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sqlDelete = 'delete from product where id=?';

        $stmt = $pdo->prepare($sqlDelete);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        header('location:' . 'admin.php');
    }
}
