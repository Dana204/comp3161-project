<?php include ('../includes/register.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico&display=swap|Arbutus+Slab|Bangers&display=swap" rel="stylesheet">

    <!-- Css Link -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>MyBook</title>
</head>
    <body class="pb-0 px-xl-3 pt-xl-3 text-white bg-star">
        <section class="filler p-2">
            <div class="container-fluid">
                <div class="grid-container py-xl-1 px-xl-5 px-lg-5 p-md-3 p-sm-4 p-3 mx-auto">
                    <div class="row justify-content-center">
                        <h1 class="title d-inline mr-0">My</h1>
                        <h1 class="title text-redPigment d-inline">Book</h1>
                        
                        <p class="text-center size-1rem">Sign up to see photos and videos from your friends.</p>
                        <button type="submit" class="btn bg-redPigment btn-block text-white size-1rem ">
                        <i class="fab fa-facebook mr-2 text-white"></i>Login with FaceBook</button>
                        <p class="text-center size-1rem mb-1 or">OR</p>
                    </div>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method= "POST">
                        <!-- ROW 1 -->
                        <div class="form-field mb-1">
                            <!-- FIRST NAME -->
                            <input type="text" value="<?= $fname ?>" name="fname" class="d-block form-control form-control-md" id="fname" placeHolder="First Name">
                            <span class="error row justify-content-center font-weight-bold"><?= $fname_error ?></span>
                        </div>
                         <!-- END OF ROW 1 -->

                        <!-- ROW 2 -->
                        <div class="form-field mb-1 ">
                            <!-- LAST NAME -->
                               <input type="text" value="<?= $lname ?>" name="lname" class="d-block form-control form-control-md " id="lname" placeHolder="Last Name">
                               <span class="error row justify-content-center font-weight-bold"><?= $lname_error ?></span>
                        </div>
                         <!-- END OF ROW 2 -->

                        <!-- ROW 3 -->
                        <div class="form-field mb-1">
                            <!-- USERNAME -->
                            <input type="text" value="<?= $username ?>" name="username" class="d-block form-control form-control-md" id="username" placeHolder="Username">
                            <span class="error row justify-content-center font-weight-bold"><?= $username_error ?></span>
                        </div>
                         <!-- END OF ROW 3 -->
                        
                         <!-- ROW 4 -->
                        <div class="form-field mb-1">
                            <!-- EMAIL -->
                            <input type="email" name="email" title="example@gmail.com" value=" <?= $email ?>" class="d-block form-control form-control-md" id="email" placeHolder="Email">
                            <span class="error row justify-content-center font-weight-bold"><?= $email_error ?></span>
                        </div>
                         <!-- END OF ROW 4 -->

                         <!-- ROW 5 -->
                        <div class="form-field mb-1">
                            <!-- PASSWORD -->
                            <input type="text" name="pwd" title="Passwords should exceed 7 characters and must contain atleast one number, uppercase and lowercase letter" value="<?= $pwd ?>" class="d-block form-control form-control-md" id="pwd" placeHolder="Password">
                            <span class="error row justify-content-center font-weight-bold"><?= $pwd_error ?></span>
                        </div>
                         <!-- END OF ROW 5 -->

                         <!-- SUBMIT BUTTON -->
                         <div class="form-field mb-1">
                             <button type="submit" class="btn bg-redPigment text-white btn-block size-1rem" value="Submit" name="submit">Sign Up</button>
                         </div>
                            
                    </form>
                    <div class="row">
                        <p class="text-center size-1rem">By signing up, you agree to our Terms , Data Policy and Cookies Policy .</p>
                    </div>

                </div>
                <!-- END OF FORM CONTAINER -->
                <div class="row justify-content-center mt-3">
                    <p class="text-center text-white mr-2 size-1rem">Have an account?</p>
                    <a href="login.php" class="text-white size-1rem">Login</a>
                </div>
            </div>
        </section>

       <footer class="mt-xl-3"> 
           <div class="container-fluid">
               <div class="row ">
                   <div class="col-xl-5 d-flex justify-content-between">
                       <a href="#" class="text-white">About Us</a>
                       <a href="#" class="text-white">Help</a>
                       <a href="#" class="text-white">Press</a>
                       <a href="#" class="text-white">API</a>
                       <a href="#" class="text-white">Jobs</a>
                       <a href="#" class="text-white">Privacy</a>
                       <a href="#" class="text-white">Profiles</a>
                       <a href="#" class="text-white">Language</a>
                   </div>
                   <div class="col-xl-7 d-flex justify-content-end">
                       <p>2020<i class="far fa-copyright text-white copy-r mx-1"></i>MyBook</p>
                   </div>
               </div>
           </div>
       </footer>

        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    </body>
</html>