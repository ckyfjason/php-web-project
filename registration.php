<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
$serverName = "streamweb-dbserver.database.windows.net"; // 資料庫伺服器名稱
$username = "ckyfjason"; // 資料庫使用者名稱
$password = "Database@password"; // 資料庫密碼
$dbname = "streamweb-formaldb"; // 資料庫名稱

$conn = sqlsrv_connect($serverName, array(
    "Database" => $dbname,
    "UID" => $username,
    "PWD" => $password
));

// 檢查連線是否成功
if ($conn) {
    echo "Connected successfully"; // 連線成功時顯示訊息
    // 在此可進行資料庫操作
} else {
    die(print_r(sqlsrv_errors(), true)); // 顯示連線錯誤訊息並停止程式執行
}

if ($conn) {
    // 如果表單提交，將值插入資料庫。
    if (isset($_POST['submit'])) {
        // 刪除反斜線
        $username = stripslashes($_POST['username']);
        // 轉義特殊字符
        //$username = sqlsrv_real_escape_string($username);
        $username = "88888"; 
        $email = stripslashes($_POST['email']);
        //$email = sqlsrv_real_escape_string($email);
        $email = "ckyf@g";
        $password = stripslashes($_POST['password']);
        $password = sqlsrv_real_escape_string($password);
        //$hashedPassword = password_hash($password, PASSWORD_BCRYPT); // 使用bcrypt進行密碼哈希
        $hashedPassword = "123456";
        $trn_date = "2023-12-01 15:30:00";

        $query = "INSERT into dbo.users (username, password, email, trn_date)
                  VALUES (?, ?, ?, ?)";
        //$params = array($username, $hashedPassword, $email, $trn_date);
        $params = array('aaaaa', '123', 'ckyfj@g', "2023-12-01 15:30:00");

        $stmt = sqlsrv_query($conn, "INSERT into dbo.users (username, password, email, trn_date) VALUES (?, ?, ?, ?)", array('aaaaa', '123', 'ckyfj@g', "2023-12-01 15:30:00"));


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