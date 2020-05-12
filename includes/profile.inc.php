<?php 
//   session_start();
    include_once '../includes/db_conn.php';
    include_once '../includes/profile.inc.php';
    $redirectUrl = 'profile.php';
    
    if (isset($_POST['submit'])) {
        if (isset($_SESSION['username'])) {
            $fname = test_input($_POST['fname']);
            
            mysqli_query($conn, "UPDATE User SET fname = '{$fname}' WHERE username='{$_SESSION['username']}'");
           
            echo '<script type="application/javascript">alert("Update Successfully"); window.location.href = "'.$redirectUrl.'";</script>';
        } else {
            echo '<script type="application/javascript">alert("Could Not Update Successfully"); window.location.href = "'.$redirectUrl.'";</script>';
        }
    }


    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
  
?>