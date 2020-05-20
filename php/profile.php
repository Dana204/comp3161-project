<?php include('sidebar.php') ?>
<?php include('../includes/profile.inc.php') ?>
   <?php
        if(isset($_POST['upload_pic']))
        { 
        $filepath = "../upload/" . $_FILES["file"]["name"];

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
        {
        // echo "<img src=".$filepath." height=200 width=300 />";
        $redirectUrl = 'profile.php';
        echo '<script type="application/javascript">alert("Uploaded Successfully"); window.location.href = "'.$redirectUrl.'";</script>';
        } 
        else 
        {
        echo "Error !!";
        }
        } 
    ?>
<main id="main" class="p-0">
    <div class="container-fluid">
        <!-- HEADER -->
        <nav class="row d-flex align-items-center bg-darkGunmetal sticky-top nav-header">
            <button class="openbtn text-lightGray" onclick="openNav()">☰</button>  
            <span class="text-lightGray ml-auto font-weight-bold mr-3">MyBook</span>
            
        </nav>
        <!-- END OF HEADER -->
        <div class="row px-3 pt-3 pb-2 profile-header">
            <div class="col col-lg-12">
                
                <!-- <img class="img-flui img-rounded profile-img float-left mr-2" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture"> -->
                <?php echo "<img src=".$filepath." height=200 width=300 />";?>
                
                <h1 class="title font-weight-bold">My Profile</h1>
                <p></p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam ratione asperiores praesentium vel enim porro voluptates reiciendis tempora repellendus! Molestias enim, eum atque officiis aliquam in recusandae ex fuga quisquam repudiandae id doloremque quis, sint soluta corporis ratione, dolore laboriosam deleniti reiciendis quaerat nisi repellendus cumque maxime. Modi, tenetur recusandae!</p>
                <button class="btn bg-redPigment text-white float-right mt-0 mb-1" type="button" data-toggle="collapse" data-target="#drop">
                         Edit Profile Image
                </button>
                <form action="" class="collapse" id="drop" enctype="multipart/form-data">
                    <input type="file" name="file" />
                <button type="submit" class="btn bg-redPigment text-white size-1rem" value="Submit" name="upload_pic">Upload</button>
                </form>
                         
            </div>
        </div>

        <!-- VIEW PROFILE SECTION -->
        <div class="row justify-content-center mt-3">
            <div class="col col-lg-12 col-12 pt-2 bg-drkGunmetal">
                <h2 class="title font-weight-bold mb-2 text-center ext-white">My Details</h2>
            </div>
        </div>
        <div class="row justify-content-center px-0 pb-5">      
            <div class="col col-lg-4 col-md-5 col-8 pt-2">
                <span class="d-block mt-2">
                    <strong>First Name : </strong>
                    <?php echo $_SESSION['fname'] ?> 
                    <button type="button" class="btn bg-white float-right" data-toggle="collapse" data-target="#demo" title="Edit First Name">
                        <i class="fas fa-pencil-alt text-redPigment "></i>
                    </button>
                    <div id="demo" class="collapse mt-1">
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="text" name="fname" class="mb-2" id="fname">
                            <button type="submit" class="btn bg-redPigment text-white p-1 ml-auto" value="Submit" name="submit">Update</button>
                        </form>
                    </div>
                    
                </span>
                <span class="d-block  mt-2">
                    <strong>Gender: </strong>
                    <?php 
                        $query = "SELECT * FROM Profile WHERE username='$_SESSION[username]'";
                        $result = mysqli_query($conn,$query);
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['gender'] = $row['gender'];
                        echo $_SESSION['gender']
                    ?> 
                </span>
                <span class="d-block mt-2">
                    <strong>Date of Birth : </strong>
                    <?php 
                        $query = "SELECT * FROM User_Age WHERE username='$_SESSION[username]'";
                        $result = mysqli_query($conn,$query);
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['dob'] = $row['dob'];
                        echo $_SESSION['dob']
                        // $_SESSION['age'] = $row['age'];
                    ?> 
                </span>
            </div>
            <div class="col col-lg-4 col-md-5 col-8 pt-2 ">
                <span class="d-block mt-2">
                    <strong>Last Name : </strong>
                    <?php echo $_SESSION['lname'] ?> 
                </span>
                <span class="d-block bg-dak mt-2">
                    <strong>Occupation : </strong>
                    <?php 
                        $query = "SELECT * FROM Profile WHERE username='$_SESSION[username]'";
                        $result = mysqli_query($conn,$query);
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['occupation'] = $row['occupation'];
                        echo $_SESSION['occupation']
                    ?>  
                </span>
                <span class="d-block bg-dak mt-2">
                    <strong>Age : </strong>
                    <?php 
                        $query = "SELECT * FROM User_Age WHERE username='$_SESSION[username]'";
                        $result = mysqli_query($conn,$query);
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['age'] = $row['age'];
                        echo $_SESSION['age']
                    ?> 
                </span>
            </div>
        </div>
        <!-- END OF VIEW PROFILE SECTION -->
        
    </div>
</main>
