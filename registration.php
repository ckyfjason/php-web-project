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
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $checkQuery = "SELECT COUNT(*) AS count FROM users WHERE username = ?";
            $checkParams = array($username);
            $checkStmt = sqlsrv_query($conn, $checkQuery, $checkParams);
            $row = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);
    
            if ($row['count'] > 0) {
                // 使用者名稱已存在，向使用者顯示錯誤訊息
                echo "使用者名稱已存在。請選擇不同的使用者名稱。";
            } else {
                // 使用者名稱不存在，可以進行資料插入
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $trn_date = date("Y-m-d H:i:s");
    
                $insertQuery = "INSERT into users (username, password, email, trn_date) VALUES (?, ?, ?, ?)";
                $insertParams = array($username, $hashedPassword, $email, $trn_date);
    
                $insertStmt = sqlsrv_query($conn, $insertQuery, $insertParams);
    
                if ($insertStmt) {
                    echo "<div class='form'>
                            <h3>註冊成功。</h3>
                            <br/>點擊這裡<a href='login.php'>登錄</a></div>";
                } else {
                    die(print_r(sqlsrv_errors(), true));
                }
            }
        } else {
            // 其他註冊表單顯示部分的程式碼
        }
} else {
        echo "Connection could not be established.<br />";
        die(print_r(sqlsrv_errors(), true));
        } 
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