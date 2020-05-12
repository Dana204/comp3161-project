<?php
    include("db_conn.php");
    $redirectUrl = 'index.php';

    $title="";
    $description="";

    if(isset($_POST['but_upload'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $name = $_FILES['file']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){       
            
            // if (!empty($title) AND (!empty($description)) {
                // Insert record
                $query = "insert into Post(username,title,description) values('{$_SESSION['username']}','$title','$description')";
                mysqli_query($conn,$query);

                $query2 = "insert into Image(image_name) values('".$name."')";
                mysqli_query($conn,$query2);

                // $query = "INSERT INTO Post_Image(post_id,image_id) SELECT ";
                
                // Upload file
                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

            // }
             echo '<script type="application/javascript">alert("Uploaded Successfully"); window.location.href = "'.$redirectUrl.'";</script>';
            
        }
    
    }

    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
