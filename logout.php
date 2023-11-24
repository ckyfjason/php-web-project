<?php
session_start();
// Destroying All Sessions
if(session_destroy())
{
    echo '<script type="text/javascript">';
    echo 'window.location.href = "index.php";';
    echo '</script>';
}
?> 
