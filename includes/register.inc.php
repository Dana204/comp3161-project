  <?php 
  
    include_once '../includes/db_conn.php';
    $username = $fname = $lname = $email = $username = $pwd = "" ;
    $username_error = $fname_error = $lname_error = $email_error = $username_error = $pwd_error = "";

    if (isset($_POST['submit'])) {
        
        // USERNAME
        if(empty($_POST['username'])){
            $username_error = "Username is Required";
        } else {
            $username = ($_POST['username']);
            $query = "SELECT * FROM User WHERE username ='$username'";
            $user_name = mysqli_query($conn,$query);
            if (mysqli_num_rows($user_name) > 0) {
                $username_error = "Username already exists";
            } 
            if(!preg_match("/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/",$username)){
                $username_error = "Only letters and numbers are allowed"; 
            } 
        }

        // FIRSTNAME
        if(empty($_POST['fname'])){
            $fname_error = "First Name is Required";
        } else {
            $fname = test_input($_POST['fname']);
            if(!preg_match("/^[a-zA-Z]*$/",$fname)){
                $fname_error = "Only letters are allowed"; 
            }
        }

        // LASTNAME
        if(empty($_POST['lname'])){
            $lname_error = "Last Name is Required";
        } else {
            $lname = test_input($_POST['lname']);
            if(!preg_match("/^[a-zA-Z]*$/", $lname)){
                $lname_error = "Only letters are allowed"; 
            }
        }

        // EMAIL
        if(empty($_POST['email'])){
            $email_error = "Email is Required";
        } else {
            $email = test_input($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_error = "Invalid Email"; 
            }
        }

        // PASSWORD
        if(empty($_POST['pwd'])){
            $pwd_error = "Password is Required";
        } else {
            $pwd = $_POST['pwd'];
             if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pwd ) and (strlen($pwd) < 8))  {
                $pwd_error = "Password is weak";
            }
        }


        if ($username_error == "" and $fname_error == "" and $lname_error == "" and $email_error == "" and $pwd_error == "") {
            $sql = "INSERT INTO User (username,fname,lname,email,pwd) VALUES ('$username','$fname','$lname','$email','$pwd');";
            mysqli_query($conn,$sql);
             
            $username = $fname = $lname = $email =  $username = $pwd = '';
             $redirectUrl = 'index.php';

            echo '<script type="application/javascript">alert("Registered Successfully"); window.location.href = "'.$redirectUrl.'";</script>';
        }

    }

     function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

  ?>
  
