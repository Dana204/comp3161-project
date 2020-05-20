 <?php
   //  include '../includes/db_conn.php';
   //  include '../includes/register.inc.php';
   //  include '../includes/login.inc.php';

    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];
    $_SESSION['email'] = $row['email'];

    $query= "SELECT * FROM User_Age WHERE username='$_SESSION[username]'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['dob'] = $row['dob'];
    $_SESSION['age'] = $row['age'];

    $query1= "SELECT * FROM Profile WHERE username='$_SESSION[username]'";
    $result1 = mysqli_query($conn,$query1);
     $row1 = mysqli_fetch_assoc($result1);
     $_SESSION['occupation'] = $row['occupation'];
    $_SESSION['gender'] = $row['gender'];
 ?>
