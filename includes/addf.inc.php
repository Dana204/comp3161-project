<?php
    include("db_conn.php");
    $redirectUrl = 'friend.php';
    if (isset($_POST['submit'])){
        $sql = "SELECT username,email FROM User WHERE username !='{$_SESSION['username']}' AND username NOT IN (SELECT username FROM User WHERE email in (SELECT email FROM Friends_With WHERE username = '{$_SESSION['username']}'))";
        $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));

        $user = $result['username'];
        $email = $result['email'];
        // dcam
                            
        $friend_sql = "SELECT email from User WHERE username='$user'";
        $friend_email = mysqli_fetch_assoc(mysqli_query($conn,$friend_sql));

        // $email = "SELECT email from User WHERE username = '{$_SESSION['username']}'";
        // $user_email = mysqli_fetch_assoc(mysqli_query($conn,$email));

        $sql1 ="INSERT INTO Friends_With VALUES ('{$_SESSION['username']}','{$friend_email['email']}','Work')";
        $sql2 ="INSERT INTO Friends_With VALUES ('$user','$email','Work')"; 
        mysqli_query($conn, $sql1);  
        mysqli_query($conn, $sql2);  
        echo '<script type="application/javascript">alert("Friend Added"); window.location.href = "'.$redirectUrl.'";</script>';
    }
?>