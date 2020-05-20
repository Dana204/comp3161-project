<?php
    include("db_conn.php");
    $redirectUrl = 'groups.php';
    if (isset($_POST['submit_drop'])){
        // CHECK IF THE USER IS THE CREATOR
        $creator = "SELECT group_id from Group_Creator WHERE username = '{$_SESSION['username']}' and group_id='{$group_id1}'";
        $creator_row = mysqli_query($conn,$creator);
        $result_query = mysqli_fetch_assoc($creator_row);
        $g_id=$result_query['group_id'];
         if (mysqli_num_rows($creator_row) > 0) {
             $drop1 = "DELETE FROM Groups WHERE group_id='{$g_id}'";
             $drop2 = "DELETE FROM Group_Member WHERE group_id= '{$g_id}'";
             $drop3 = "DELETE FROM Group_Admin WHERE group_id= '{$g_id}'";
             $drop4 = "DELETE FROM Group_Creator WHERE group_id= '{$g_id}'";
             mysqli_query($conn,$drop1);
             mysqli_query($conn,$drop2);
             mysqli_query($conn,$drop3);
             mysqli_query($conn,$drop4);
             echo '<script type="application/javascript">alert("Entire Group Deleted"); window.location.href = "'.$redirectUrl.'";</script>';
         }else {
             $member = "SELECT group_id from Group_Member WHERE username = '{$_SESSION['username']}' and group_id='{$group_id1}'";
            $member_row = mysqli_query($conn,$member);
            $result_query1 = mysqli_fetch_assoc($member_row);
            $g_id1=$result_query1['group_id'];
            $drop5 = "DELETE FROM Group_Member WHERE group_id= '{$g_id1}'";
            $drop6 = "DELETE FROM Group_Admin WHERE group_id= '{$g_id1}'";
             mysqli_query($conn,$drop5);
             mysqli_query($conn,$drop6);
             echo '<script type="application/javascript">alert("You are no longer in that group"); window.location.href = "'.$redirectUrl.'";</script>';
         }

        
    }
?>