<?php 
//   session_start();
    include_once '../includes/db_conn.php';
    include_once '../includes/profile.inc.php';
    $redirectUrl = 'profile.php';

    if(isset($_POST['upload_pic'])){
        $name = $_FILES['file']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){    
                $query = "insert into Image(image_name) values('".$name."')";
                mysqli_query($conn,$query);
                
                // Upload file
                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                $img = "upload/".$name;

            // }
             echo '<script type="application/javascript">alert("Uploaded Successfully"); window.location.href = "'.$redirectUrl.'";</script>';
            
        }
    
    }
  
?>