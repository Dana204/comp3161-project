  <?php 
  
    include_once '../includes/db_conn.php';
    $group_name =  "" ;
    $redirectUrl = 'groups.php';

    if (isset($_POST['submit_group'])) {
        $group_name = $_POST['group_name'];
        
        $sql1 = "INSERT INTO Groups (group_name) VALUES ('$group_name')";
        
        $sql2 = "INSERT INTO Group_Member (group_id,username,date_joined) VALUES (LAST_INSERT_ID(),'{$_SESSION['username']}',now())";

        $sql3 = "INSERT INTO Group_Admin (group_id,username) VALUES (LAST_INSERT_ID(),'{$_SESSION['username']}')";

        $sql4 = "INSERT INTO Group_Creator (group_id,username,date_created) VALUES (LAST_INSERT_ID(),'{$_SESSION['username']}',now())";
        
        mysqli_query($conn,$sql1);
        mysqli_query($conn,$sql2);
        mysqli_query($conn,$sql3);
        mysqli_query($conn,$sql4);
            echo '<script type="application/javascript">alert("Group Added"); window.location.href = "'.$redirectUrl.'";</script>';
        
        // else {
        //   echo '<script type="application/javascript">alert("Group Added"); window.location.href = "'.$redirectUrl.'";</script>';
        // }
        
      }
  
  ?>
  
