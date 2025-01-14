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

    if(isset($_COOKIE['mytestvalue'])) {
        $roomid = $_COOKIE['mytestvalue'];
        // 現在您可以使用$myVar變數了
    }

    $username = $_SESSION['username'];
    $query2 = "UPDATE users SET roomid=? WHERE username=?";
    $params = array($roomid, $username);

    $stmt = sqlsrv_query($conn, $query2, $params);
    if ($stmt) {
            
    }
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>直播室</title>
    <link rel="icon" href="./images/logo.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles/room.css'>
    
</head>
<body>
    <?php
    if(empty($_SESSION['username']) ) {
        echo "<div class='backk'>
                <h3>你未登入。</h3>
                <br/>點擊這裡<a href='../index.php'>返回</a></div>";
        exit();
    } 
    ?>

    <header id="nav">  <!-- 頭標欄處 -->
        <div class="nav--list">  <!-- 頭標欄左上角logo與文字 -->
                <button id="members__button"> <!--手機?-->
                    <svg id="members__button__svg" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 18v1h-24v-1h24zm0-6v1h-24v-1h24zm0-6v1h-24v-1h24z" fill="#ede0e0"><path d="M24 19h-24v-1h24v1zm0-6h-24v-1h24v1zm0-6h-24v-1h24v1z"/></svg>
                </button>

                <a href="https://streamweb.azurewebsites.net">
                    <h3 id="logo">
                        <img src="./images/logo.png" alt="Site Logo">
                        <span>直播平台</span>
                    </h3>
                </a>
                <!--<button onclick="sendData()">Send</button>-->
                
        </div>

        <div id="nav__links">  
            <button id="theme__button"> <!--切換主題按鈕-->
                <!--<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="#ede0e0" clip-rule="evenodd"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z"/></svg>-->
                <svg width="24" height="24" fill="#ede0e0" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12,2A7,7,0,0,0,8,14.74V17a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V14.74A7,7,0,0,0,12,2ZM9,21a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V20H9Z"></path></svg>
            </button>

            <button id="chat__button"> <!--手機?-->
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="#ede0e0" clip-rule="evenodd"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z"/></svg>
            </button>

           
            <a class="nav__link" id="create__room__btn" href="../index.php">
                返回大廳
               <svg id="create__room__btn__svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
            </a>
        </div>

    </header>

    <main class="container">

        <div id="room__container">
            <section id="members__container">    

                <div id="member__list">


                </div>

                <div id="members__header">
                    <p>上線人數</p>
                    <strong id="members__count">0</strong>
                </div>

            </section>

            <section id="stream__container">
                <div id="stream__box"></div>
                <div id="streams__container"></div>

                <div class="stream__actions">
                    <button id="camera-btn" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 4h-3v-1h3v1zm10.93 0l.812 1.219c.743 1.115 1.987 1.781 3.328 1.781h1.93v13h-20v-13h3.93c1.341 0 2.585-.666 3.328-1.781l.812-1.219h5.86zm1.07-2h-8l-1.406 2.109c-.371.557-.995.891-1.664.891h-5.93v17h24v-17h-3.93c-.669 0-1.293-.334-1.664-.891l-1.406-2.109zm-11 8c0-.552-.447-1-1-1s-1 .448-1 1 .447 1 1 1 1-.448 1-1zm7 0c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5-2.239-5-5-5z"/></svg>
                    </button>
                    <button id="mic-btn" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c1.103 0 2 .897 2 2v7c0 1.103-.897 2-2 2s-2-.897-2-2v-7c0-1.103.897-2 2-2zm0-2c-2.209 0-4 1.791-4 4v7c0 2.209 1.791 4 4 4s4-1.791 4-4v-7c0-2.209-1.791-4-4-4zm8 9v2c0 4.418-3.582 8-8 8s-8-3.582-8-8v-2h2v2c0 3.309 2.691 6 6 6s6-2.691 6-6v-2h2zm-7 13v-2h-2v2h-4v2h10v-2h-4z"/></svg>
                    </button>
                    <button id="screen-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 1v17h24v-17h-24zm22 15h-20v-13h20v13zm-6.599 4l2.599 3h-12l2.599-3h6.802z"/></svg>
                    </button>
                    <button id="bgm-btn" style="display: none;">  
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 1v17h24v-17h-24zm22 15h-20v-13h20v13zm-6.599 4l2.599 3h-12l2.599-3h6.802z"/></svg>
                    </button>
                    <button id="leave-btn" style="background-color: #FF5050;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 10v-5l8 7-8 7v-5h-8v-4h8zm-16-8v20h14v-2h-12v-16h12v-2h-14z"/></svg>
                    </button>
                </div>
                <button id="join-btn">Join Stream</button>
            </section>

            <section id="messages__container">

                <div id="messages"> <!--聊天室的文字區塊-->
                    
                </div>
                <form id="message__form"> <!--聊天室的輸入區塊-->
                    <input type="text" name="message" placeholder="Send a message...." />
                </form>
            </section>

        </div>
    </main>
    
    <script>
        function sendData() {
            var userInput = 10;

            $.ajax({
            type: 'POST',
            url: 'room.php',
            data: { user_input: userInput },
            success: function(response) {
                alert('已成功发送至 PHP 文件');
            }
            });
        }
    </script>
</body>
<script type="text/javascript" src="js/AgoraRTC_N-4.11.0.js"></script>
<script type="text/javascript" src="js/agora-rtm-sdk-1.4.4.js"></script>
<script type="text/javascript" src="js/room.js"></script>
<script type="text/javascript" src="js/room_rtm.js"></script>
<script type="text/javascript" src="js/room_rtc.js"></script>
</html>