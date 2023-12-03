<?php
    session_start();
    $serverName = "streamweb-dbserver.database.windows.net";
    $username = "ckyfjason";
    $password = "Database@password";
    $dbname = "streamweb-formaldb";

    $conn = sqlsrv_connect($serverName, array(
        "Database" => $dbname,
        "UID" => $username,
        "PWD" => $password
    ));
    $username = $_SESSION['username'];
    $query2 = "UPDATE users SET roomid=? WHERE username=?";
    $params = array(NULL, $username);

    $stmt = sqlsrv_query($conn, $query2, $params);
    if ($stmt) {
            
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>直播平台</title>
    <link rel="icon" href="./main/images/logo.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./main/styles/hub.css'>
</head>
<body>
    

    <header id="nav">
        <div class="nav--list">
             <a href="index.php">
                 <h3 id="logo">
                     <img src="./main/images/logo.png" alt="Site Logo">
                     <span>直播平台</span>
                 </h3>
             </a>
        </div>
 
         <div id="nav__links">
            <?php
            if(empty($_SESSION['username']) ) { echo//當用戶沒有登入時
                '<a class="hub__nav__link" href="./registration.php">
                Register
                </a>
                <a class="hub__nav__link" href="./login.php">
                Login
                </a>';
            } else { echo //當用已登入時
                '<a class="login__data"> Hi, '. $_SESSION['username'] .'!</a>
                <a class="hub__nav__link" href="./logout.php">
                Logout
                </a>';
            }
            ?>
             <a class="nav__link" id="create__room__btn" href="./main/lobby.php">
                 創建房間
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
             </a>
         </div>
     </header> 
     
    
    <!--<div class="hero__section">
        <h2>Capstone<br>Project</h2>
        <div class="hero__section__img">
            <img style="max-height: 550px;object-fit: contain;" src="./main/images/img.PNG">
        </div>
    </section>-->

    

    <main >
        <section class="hero__section">
            <h2>Capstone<br>Project</h2>
            <div class="hero__section__img">
                <img style="max-height: 550px;object-fit: contain;" src="./main/images/img.PNG">
            </div>
        </section>
        <div class="room__container" sytles="margin-top: 100px">
            <div class="room__item">
                <?php
                /*$query = "SELECT DISTINCT roomid FROM users WHERE roomid IS NOT NULL";
                $test = sqlsrv_query($conn, $query, NULL);
                while ($row = sqlsrv_fetch_array($test, SQLSRV_FETCH_ASSOC)) {
                    // $row 變數包含了每一行的資料，這裡使用 SQLSRV_FETCH_ASSOC 模式來取得關聯陣列形式的結果
                
                    // 列出每一行的資料
                    foreach ($row as $key => $value) {
                        echo $value; //. "<br>"; 這裡將每個欄位名稱和對應的值輸出
                    }
                    echo "<br>";
                }*/
                $query = "SELECT DISTINCT roomid FROM users WHERE roomid IS NOT NULL";
                $test = sqlsrv_query($conn, $query, NULL);
                while ($row = sqlsrv_fetch_array($test, SQLSRV_FETCH_ASSOC)) {
                    // $row 變數包含了每一行的資料，這裡使用 SQLSRV_FETCH_ASSOC 模式來取得關聯陣列形式的結果
                
                    // 列出每一行的資料
                    foreach ($row as $key => $value) { echo "<div class='room__content'>
                        <p class='room__meta'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M10.118 16.064c2.293-.529 4.428-.993 3.394-2.945-3.146-5.942-.834-9.119 2.488-9.119 3.388 0 5.644 3.299 2.488 9.119-1.065 1.964 1.149 2.427 3.394 2.945 1.986.459 2.118 1.43 2.118 3.111l-.003.825h-15.994c0-2.196-.176-3.407 2.115-3.936zm-10.116 3.936h6.001c-.028-6.542 2.995-3.697 2.995-8.901 0-2.009-1.311-3.099-2.998-3.099-2.492 0-4.226 2.383-1.866 6.839.775 1.464-.825 1.812-2.545 2.209-1.49.344-1.589 1.072-1.589 2.333l.002.619z'/></svg>
                            <span>ROOM ". $value ." 135 Participants</span>
                        </p>
                        <h4 class="room__title">Gary & Dennis Ivy Review your  Portfolios </h4>
                        <div class="room__box">
                            <div class="room__author">
                                <strong class="message__author">Dennis Ivy</strong>
                            </div>
                            <a class="room__action" href="room-video.html">Join Now</a>
                        </div>
                    </div>";//$value; //. "<br>"; 這裡將每個欄位名稱和對應的值輸出
                    }
                    echo "<br>";
                }

                

                /*<div class="room__content">
                    <p class="room__meta">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10.118 16.064c2.293-.529 4.428-.993 3.394-2.945-3.146-5.942-.834-9.119 2.488-9.119 3.388 0 5.644 3.299 2.488 9.119-1.065 1.964 1.149 2.427 3.394 2.945 1.986.459 2.118 1.43 2.118 3.111l-.003.825h-15.994c0-2.196-.176-3.407 2.115-3.936zm-10.116 3.936h6.001c-.028-6.542 2.995-3.697 2.995-8.901 0-2.009-1.311-3.099-2.998-3.099-2.492 0-4.226 2.383-1.866 6.839.775 1.464-.825 1.812-2.545 2.209-1.49.344-1.589 1.072-1.589 2.333l.002.619z"/></svg>
                        <span>135 Participants</span>
                    </p>
                    <h4 class="room__title">Gary & Dennis Ivy Review your  Portfolios </h4>
                    <div class="room__box">
                        <div class="room__author">
                            <strong class="message__author">Dennis Ivy</strong>
                        </div>
                        <a class="room__action" href="room-video.html">Join Now</a>
                    </div>
                </div>

                <div class="room__content">
                    <p class="room__meta">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10.118 16.064c2.293-.529 4.428-.993 3.394-2.945-3.146-5.942-.834-9.119 2.488-9.119 3.388 0 5.644 3.299 2.488 9.119-1.065 1.964 1.149 2.427 3.394 2.945 1.986.459 2.118 1.43 2.118 3.111l-.003.825h-15.994c0-2.196-.176-3.407 2.115-3.936zm-10.116 3.936h6.001c-.028-6.542 2.995-3.697 2.995-8.901 0-2.009-1.311-3.099-2.998-3.099-2.492 0-4.226 2.383-1.866 6.839.775 1.464-.825 1.812-2.545 2.209-1.49.344-1.589 1.072-1.589 2.333l.002.619z"/></svg>
                        <span>120 Participants</span>
                    </p>
                    <h4 class="room__title">Gary & Dennis Ivy Review your  Portfolios </h4>
                    <div class="room__box">
                        <div class="room__author">
                            <strong class="message__author">Dennis Ivy</strong>
                        </div>
                        <a class="room__action" href="room-video.html">Join Now</a>
                    </div>
                </div>*/
                ?>
            </div> 
            <!--插入的地方-->
        </div>
        
    </main>
    
</body>
<script type="text/javascript" src="./main/js/AgoraRTC_N-4.11.0.js"></script>
<script type="text/javascript" src="./main/js/agora-rtm-sdk-1.4.4.js"></script>
<!--<script src='./main/js/home.js'></script>-->
</html>
