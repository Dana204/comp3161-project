<?php
    Session_start();
    Session_destroy();

    $redirectUrl = 'login.php';
    echo '<script type="application/javascript">alert("Logout successful"); window.location.href = "'.$redirectUrl.'";</script>';

?>