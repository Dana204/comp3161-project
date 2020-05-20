  <?php 
  
    include_once '../includes/db_conn.php';
    $comment = "";
    $redirectUrl = 'index.php';

    if (isset($_POST['submit_comment'])) {
        $comment = $_POST['comment'];
        
        $query = "INSERT INTO Comment (user_comment) VALUES ('$comment')";
        mysqli_query($conn,"INSERT INTO Comment (user_comment) VALUES ('$comment')");
        mysqli_query($conn,"INSERT INTO Commenter (username) VALUES ('{$_SESSION['username']}')");
        
        // if ($result) {
        //     echo '<script type="application/javascript">alert("Comment Added"); window.location.href = "'.$redirectUrl.'";</script>';
        // }else {
          echo '<script type="application/javascript">alert("Comment  Added"); window.location.href = "'.$redirectUrl.'";</script>';
        
        
        
      }
  
  ?>
  
