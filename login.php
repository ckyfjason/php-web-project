<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
$serverName = "streamweb-dbserver.database.windows.net";
$username = "ckyfjason";
$password = "Database@password";
$dbname = "streamweb-formaldb";

$conn = sqlsrv_connect($serverName, array(
    "Database" => $dbname,
    "UID" => $username,
    "PWD" => $password
));

if ($conn) {
    if (isset($_POST['submit'])) {
        // 使用 password_hash 函數進行密碼哈希
        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $username = $_POST['username'];
        $email = $_POST['email'];
        $trn_date = date("Y-m-d H:i:s");

        $query = "INSERT into users (username, password, email, trn_date)
                  VALUES (?, ?, ?, ?)";
        $params = array($username, $hashedPassword, $email, $trn_date);

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
            <input type="submit" name="submit" value="submit" />
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