  <?php 
  
    include_once '../includes/db_conn.php';
    $username = $pwd = "" ;
    $match_error = "";

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        
        $query = "SELECT * FROM User WHERE username ='$username' AND pwd='$pwd'";
        $result = mysqli_query($conn,$query);
        
        if ($row = mysqli_fetch_assoc($result)) {
          session_start();
          $_SESSION['username'] = $row['username'];
          $_SESSION['fname'] = $row['fname'];
          $_SESSION['lname'] = $row['lname'];

            $redirectUrl = 'index.php';
            echo '<script type="application/javascript">alert("Login successful"); window.location.href = "'.$redirectUrl.'";</script>';
        }else {
          $match_error="Username or Password is Invalid";
        }
        
      }
  
  ?>
  
