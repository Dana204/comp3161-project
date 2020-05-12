<?php include ('../includes/login.inc.php'); ?>

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

    <body class="p-xl-5 p-2 text-white bg-star">
        <section class="filler p-2">
            <div class="container-fluid">
                <div class="grid-container py-lg-3 px-lg-5 p-md-3 p-sm-4 p-3 mx-auto">
                    <div class="row justify-content-center mb-2">
                        <h1 class="title d-inline mr-0">My</h1>
                        <h1 class="title text-redPigment d-inline">Book</h1>
                    </div>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="">
                        <span class="error row justify-content-center font-weight-bold"><?= $match_error ?></span>
                        <!-- ROW 1 -->
                        <div class="form-field mb-2 mt-3">
                            <!-- USERNAME -->
                            <input type="text" value="<?= $username ?>" name="username" class="d-block form-control form-control-md" id="username" placeHolder="Username">
                        </div>
                         <!-- END OF ROW 1 -->

                        <!-- ROW 2 -->
                        <div class="form-field mb-2">
                            <!-- PASSWORD-->
                            <input type="text" value="<?= $pwd ?>" name="pwd" class="d-block form-control form-control-md" id="pwd" placeHolder="Password">
                        </div>
                         <!-- END OF ROW 2 -->
                         
                         <!-- SUBMIT BUTTON -->
                         <div class="form-field mb-1">
                             <button type="submit" class="btn bg-redPigment text-white btn-block size-1rem" value="Submit" name="submit">Sign In</button>
                         </div>
                            
                    </form>
                    <div class="mx-auto">
                        <a href="#" class="text-center size-1rem mb-0 text-white d-block">Forgot Password?</a>
                        <a href="#" class="text-center size-1rem mb-0 text-white d-block">Forgot Username?</a>
                    </div>

                </div>
                <!-- END OF FORM CONTAINER -->
                <div class="mx-auto mt-3 grid-container p-3">
                    <p class="text-center text-white mr-2 d-inline size-1rem">Already have an account?</p>
                    <a href="register.php" class="text-white text-center d-inline size-1rem">Sign up here</a>
                </div>
            </div>
        </section>

        <footer class="fixed-bottom p-2"> 
           <div class="container-fluid">
               <div class="row d ">
                   <div class="col-xl-5 d-flex justify-content-between align-self-end">
                       <a href="#" class="text-white">About Us</a>
                       <a href="#" class="text-white">Help</a>
                       <a href="#" class="text-white">Press</a>
                       <a href="#" class="text-white">API</a>
                       <a href="#" class="text-white">Jobs</a>
                       <a href="#" class="text-white">Privacy</a>
                       <a href="#" class="text-white">Profiles</a>
                       <a href="#" class="text-white">Language</a>
                   </div>
               </div>
           </div>
       </footer>

        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    </body>
</html>