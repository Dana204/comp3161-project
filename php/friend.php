<?php include('sidebar.php') ?>

<main id="main" class="">
    <div class="container-fluid">
        <!-- HEADER -->
        <nav class="row d-flex align-items-center bg-dark sticky-top">
            <button class="openbtn text-lightGray" onclick="openNav()">☰</button>  
            <span class="text-lightGray ml-auto font-weight-bold mr-3 mybook">MyBook</span>
        </nav>
        <!-- END OF HEADER -->

        <div class="row ml-lg-3 ml-md-3 m-2 mt-4 justify-content-sm-center justify-content-md-start  justify-content-lg-start ">
            <h1 class="d-block" style="font-size:1.6rem;">Users</h1>
        </div>
        <div class=" row ml-lg-1 ml-md-3 ">    
            <div class="col">
                <?php 
                    function AddFriend(){
                        // $con = mysqli_connect(connectvalues); 
                        $query = "INSERT INTO Friends_With VALUES ('$_SESSION[username]','{$friend_email['email']}','Work');";
                        mysqli_query($conn, $query);  
                    };
                  
                    // ALL USERS THAT ARE NOT FRIENDS WITH THE LOGGED IN USER
                    $sql = "SELECT username FROM User WHERE username !='{$_SESSION['username']}' AND username NOT IN (SELECT username FROM User WHERE email in (SELECT email FROM Friends_With WHERE username = '{$_SESSION['username']}'))";

                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                             $user = $row['username'];
                            // THE EMAIL OF USERS THAT ARE NOT FRIENDS WITH THE LOGGED IN USER
                              $friend_sql = "SELECT email from User WHERE username='$user'";
                             $friend_email = mysqli_fetch_assoc(mysqli_query($conn,$friend_sql));
                             echo '<div class="transition d-flex justify-content-between mx-sm-auto mx-md-1 align-items-center col-12 col-sm-10 col-md-6 col-lg-5 mb-2">';
                             echo $user;
                             echo '<a class="bg-redPigment text-white p-1 m-1" href="friend.php">Add Friend</a>';
                             echo '</div>';
                            //  echo '<div class="underline bg-gray mx-auto"></div>';
                            //  echo '<br>';
                             
                            
                            // echo '<a href="friend.php" class="text-white bg-redPigment p-2 float-rigt" onlick="AddFriend();>Add Friend</a>';
                            // echo '<br>';
                        }
                    } else {
                    echo "No Users Found";
                    }
                ?>
            </div>
        </div>

        <!-- FRIENDS -->
        <div class="row ml-lg-3 ml-md-3 m-2 mt-3 justify-content-sm-center justify-content-md-start justify-content-lg-start ">
            <h1 class="d-block" style="font-size:1.6rem;">My Friends</h1>
        </div>
        <div class="row ml-lg-1 ml-md-3 ">
            <div class="col">
                <?php 
                    function DropFriend(){
                        // $con = mysqli_connect(connectvalues); 
                        $drop_query = "DELETE FROM Friends_With WHERE username = '{$_SESSION['username']}' AND email='{$friend_email['email']}'";
                        mysqli_query($conn, $query);  
                    };

                    $sql = "SELECT username from User WHERE email in (SELECT email from Friends_With WHERE username = '{$_SESSION['username']}')";

                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {
                        
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $user = $row['username'];

                            // THE EMAIL OF USERS THAT ARE FRIENDS WITH THE LOGGED IN USER
                            $friend_sql = "SELECT email from User WHERE username='$user'";
                             $friend_email = mysqli_fetch_assoc(mysqli_query($conn,$friend_sql));

                            echo '<div class="transition d-flex justify-content-between mx-sm-auto mx-md-0 align-items-center col-12 col-sm-10 col-md-6 col-lg-5 mb-2">';
                            echo $user;
                            echo '<a class="bg-redPigment text-white p-1" href="friend.php">Drop Friend</a>';
                            echo '</div>';
                        }
                    } else {
                    echo "You have no Friends";
                    }
                ?>
            </div>
        </div>
    </div>
</main>