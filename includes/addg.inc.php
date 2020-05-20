<?php
    include("db_conn.php");
    include("groups.php");
    session_start();
    $redirectUrl = 'groups.php';
    if (isset($_POST['submit_add'])){
         // GROUPS THAT THE USER IS NOT A PART OF
        // $sql1 = "SELECT group_id FROM Groups WHERE group_id NOT IN (SELECT group_id FROM Group_Member WHERE username = '{$_SESSION['username']}')";
        // $result = mysqli_fetch_assoc(mysqli_query($conn,$sql1));
        // $group_id = $result['group_id'];

        $sql2 = "INSERT INTO Group_Member (group_id,username,date_joined) VALUES ('{$group_id}','{$_SESSION['username']}',now())";
        mysqli_query($conn,$sql2);

        echo '<script type="application/javascript">alert("Group Added"); window.location.href = "'.$redirectUrl.'";</script>';
    }
?>