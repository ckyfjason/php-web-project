<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');

if ($conn) {
    // 如果表單提交，將值插入資料庫。
    if (isset($_POST['submit'])) {
        // 刪除反斜線
        $username = stripslashes($_POST['username']);
        // 轉義特殊字符
        $username = sqlsrv_real_escape_string($username); 
        $email = stripslashes($_POST['email']);
        $email = sqlsrv_real_escape_string($email);
        $password = stripslashes($_POST['password']);
        $password = sqlsrv_real_escape_string($password);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // 使用bcrypt進行密碼哈希
        $trn_date = date("Y-m-d H:i:s");

        $query = "INSERT into users ('username', password, 'email', trn_date)
                  VALUES (?, ?, ?, ?)";
        $params = array($username, $hashedPassword, $email, 123);
        
        $stmt = sqlsrv_query($conn, $query, $params);

        if ($stmt) {
            echo "<div class='form'>
                  <h3>註冊成功。</h3>
                  <br/>點擊這裡<a href='login.php'>登錄</a></div>";
        } else {
            die(print_r(sqlsrv_errors(), true));
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
<?php
    }
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}

sqlsrv_close($conn);
?>
</body>
</html>