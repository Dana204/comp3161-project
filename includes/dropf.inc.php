<?php
    include("db_conn.php");
    $redirectUrl = 'friend.php';

    if (isset($_POST['drop'])){
        // $sql = "SELECT username,email FROM User WHERE username !='{$_SESSION['username']}' AND username NOT IN (SELECT username FROM User WHERE email in (SELECT email FROM Friends_With WHERE username = '{$_SESSION['username']}'))";
        $sql = "SELECT username,email from User WHERE email in (SELECT email from Friends_With WHERE username = '{$_SESSION['username']}')";
        $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $user = $result['username'];
        $email = $result['email'];
        // aa
        
        // dcam
                            
        $current_user = "SELECT email from User WHERE username='{$_SESSION['username']}'";
        $row = mysqli_fetch_assoc(mysqli_query($conn,$current_user));


        $sql1 ="DELETE FROM Friends_With WHERE username ='{$_SESSION['username']}' AND email = '$email' ";

        $sql2 ="DELETE FROM Friends_With WHERE username ='$user' AND email ='{$row['email']}'"; 

        mysqli_query($conn, $sql1);  
        mysqli_query($conn, $sql2);  
        echo '<script type="application/javascript">alert("Friend Dropped"); window.location.href = "'.$redirectUrl.'";</script>';
    }
?>