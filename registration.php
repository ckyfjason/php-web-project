<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
if (isset($_POST['submit'])){
    $username = stripslashes($_POST['username']);
    // 轉義特殊字符
    $username = mysqli_real_escape_string($conn, $username); 
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // 使用bcrypt進行密碼哈希
    $trn_date = date("Y-m-d H:i:s");

    $query = "INSERT into users (username, password, email, trn_date)
              VALUES ('$username', '$hashedPassword', '$email', '$trn_date')";
    $result = mysqli_query($connnn, $query);

    if ($result){
        echo "<div class='form'>
              <h3>註冊成功。</h3>
              <br/>點擊這裡<a href='login.php'>登錄</a></div>";
    }
} else {
?>
    <div class="form">
        <h1>註冊</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="用戶名" required />
            <input type="email" name="email" placeholder="電子郵件" required />
            <input type="password" name="password" placeholder="密碼" required />
            <input type="submit" name="submit" value="註冊" />
        </form>
    </div>
<?php } ?>
</body>
</html>
