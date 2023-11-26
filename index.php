<?php
    session_start();
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
                '<a id="hub__nav__link" href="./registration.php">
                Register
                </a>
                <a id="hub__nav__link" href="./login.php">
                Login
                </a>';
            } else { echo //當用已登入時
                '<a id="login__imformation"> Hi, '. $_SESSION['username'] .'!</a>
                <a id="hub__nav__link" href="./logout.php">
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
     
    <div class="hero__section">
        <h2>Capstone<br>Project</h2>
        <div class="hero__section__img">
            <img style="max-height: 550px;object-fit: contain;" src="./main/images/img.PNG">
        </div>
    </section>
    

    <main >
        <section id="room__list">
        </section>
        
     </main>
    
</body>
<script type="text/javascript" src="./main/js/AgoraRTC_N-4.11.0.js"></script>
<script type="text/javascript" src="./main/js/agora-rtm-sdk-1.4.4.js"></script>
<script src='./main/js/home.js'></script>
</html>
