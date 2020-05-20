<?php include('sidebar.php') ?>
<?php include("../includes/addf.inc.php"); ?>
<?php include("../includes/dropf.inc.php"); ?>
<?php include("../includes/db_conn.php"); ?>


<main id="main" class="">
    <div class="container-fluid">
        <!-- HEADER -->
        <nav class="row d-flex align-items-center bg-dark sticky-top">
            <button class="openbtn text-lightGray" onclick="openNav()">☰</button>  
            <span class="text-lightGray ml-auto font-weight-bold mr-3 mybook">MyBook</span>
        </nav>
        <!-- END OF HEADER -->

        <div class=" row justify-content-between">    
            <div class="col col-lg-10">
                <div class="box pt-3 px-2">
                <h1 class="d-block" style="font-size:1.6rem;">Users</h1>
                <?php 
                    // ALL USERS THAT ARE NOT FRIENDS WITH THE LOGGED IN USER
                    $sql = "SELECT username FROM User WHERE username !='{$_SESSION['username']}' AND username NOT IN (SELECT username FROM User WHERE email in (SELECT email FROM Friends_With WHERE username = '{$_SESSION['username']}'))";

                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                             $user = $row['username'];
                ?>
                <div class="transition d-flex justify-content-between mx-sm-auto mx-md-1 align-items-center col-12 col-sm-10 col-md-7 col-lg-5 mb-2">
                    <span><?php echo $user ?></span>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                        <button type="submit" class="btn-add bg-redPigment text-white px-2 py-1 m-1" name="submit" value="Submit">Add Friend</button>
                    </form>
                </div>
                
                <?php
                        
                        }
                    } else {
                        echo ' No more friends to add';
                    }
                ?>
                </div>

                 <div class="box px-2 mt-5">
                 <h1 class="d-block" style="font-size:1.6rem;">My Friends</h1>
                <?php 
                    $sql = "SELECT username from User WHERE email in (SELECT email from Friends_With WHERE username = '{$_SESSION['username']}')";

                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {
                        
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $user = $row['username'];
                ?>
                <div class="transition d-flex justify-content-between mx-sm-auto mx-md-1 align-items-center col-12 col-sm-10 col-md-7 col-lg-5 mb-2">
                    <span><?php echo $user ?></span>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                        <button type="submit" class="btn-add bg-redPigment text-white px-2 py-1 m-1" name="drop">Drop Friend</button>
                    </form>
                </div>
                
                <?php
                        
                        } 
                    } else {
                        echo 'You have no Friends';
                    }
                ?>
                </div>
            </div>
             <div class="col col-lg-2 col-md-2 col-sm-5 col-12 pt-3 bg-darkGunmetal">
                 <div id="sticky-sidebar">
                    <h2 class="text-center text-white " style="font-size:1.2rem">Online Friends</h2>
                    
                </div>
            </div>
            
        </div>

        
    </div>
</main>