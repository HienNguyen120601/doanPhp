<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" href="../asserts/img/favicon-32x32.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="../assets/css/styleLogin.css">
    <title>Admin login</title>
</head>

<body>
    <?php
    session_start();
    include '../SQL/connect.php';
    if (isset($pdo)) {
        $sql = "select * from user";
        $result = $pdo->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($username == $row['UserName'] && $password == $row['PassWord']) {
                $_SESSION['isLoginAdmin'] = true;
                header('location:' . "admin.php");
            }
        }
    }

    ?>
    <div class="loginform">
        <div class="formlogo">
            <img src="../assets/Img/Logo-Kha-Go-khong-nen-2.png" alt="">
        </div>
        <form method="post" class="formgroup">
            <label for="username">Your username</label>
            <input type="text" name='username' class="username">
            <label for="password">Your password</label>
            <input type="password" name='password' class="password">
            <button type="submit" class="loginbtn">Log in</button>
        </form>
    </div>

    <script type="module" src="../../assets/js/login.js"></script>
</body>

</html>