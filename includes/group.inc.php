  <?php 
  
    include_once '../includes/db_conn.php';
    $group_name =  "" ;
    $redirectUrl = 'groups.php';

    if (isset($_POST['submit'])) {
        $group_name = $_POST['group_name'];
        
        $sql = "INSERT INTO Groups (group_name) VALUES ('$group_name')";
        mysqli_query($conn,$sql);

        // $sql2 = "INSERT INTO Group_Member (group_id,username) VALUES (LAST_INSERT_ID(),'{$_SESSION['username']}')";
        mysqli_query($conn,$sql2);
            echo '<script type="application/javascript">alert("Group Added"); window.location.href = "'.$redirectUrl.'";</script>';
        
        // else {
        //   echo '<script type="application/javascript">alert("Group Added"); window.location.href = "'.$redirectUrl.'";</script>';
        // }
        
      }
  
  ?>
  
