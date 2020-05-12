
<?php
// include '../includes/register.inc.php';
    // include '../includes/session.inc.php';
    include '../includes/db_conn.php';
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!-- BOOTSTRAP -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- JSCRIPT/JQUERY -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico&display=swap|Arbutus+Slab|Bangers&display=swap" rel="stylesheet">

    <!-- CSS LINK -->
    <link rel="stylesheet" type="text/css" href="../css/new.css">
    <title>MyBook</title>
</head>

<body>

    <div id="mySidebar" class="sidebar bg-darkGunmetal br-right">
        <!-- CONTENT -->
        <div class="sidebar-content">
            <!-- TOGGLE BUTTON -->
            <div class="sidebar-brand d-flex align-items-center">
                <a href="index.php" class="text-lightGray font-weight-bold"><?php echo $_SESSION['username'] ?></a>
                 <a href="javascript:void(0)" class="closebtn text-lightGray" onclick="closeNav()">×</a>
            </div>
           
           
            <div class="underline bg-gray mx-auto"></div>

            <!-- SIDE BAR HEADER -->
            <div class="sidebar-header px-3 py-2">
                <div class="">
                    <img class="img-responsive user-pic" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name text-lightGray d-block">
                        <?php echo $_SESSION['fname']
                        ?>

                        <strong><?php echo $_SESSION['lname'] ?></strong>
                    </span>
                    <span class="user-status d-block">
                        <i class="fa fa-circle text-success"></i>
                        <span class="text-lightGray">Online</span>
                    </span>
                </div>
            </div>
            <!-- END OF SIDE BAR HEADER -->

            <div class="underline bg-gray mx-auto"></div>
            <!-- SEARCH BAR -->
            <div class="sidebar-search">
                <div class="input-group">
                    <input type="text" class="form-control search-menu bg-gray" placeholder="Search...">
                    <div class="input-group-append">
                        <span class="input-group-text bg-gray border-gray">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
             </div>
            <!-- END OF SEARCH BAR -->

            <div class="underline bg-gray mx-auto my-2"></div>

            <!-- SIDEBAR MENU -->
            <div class="sidebar-menu px-3">
                <!-- FAVOURITES -->
                <span class="label text-lightGray d-block font-weight-bold">Favourites</span>
                <!-- PROFILE -->
                <div class="ml-3 mt-1 d-block mb-3">
                    <span>
                        <i class="fas fa-id-card-alt text-lightGray bg-gray p-2 menu-icon text-center"></i>
                        <a href="profile.php" class="ml-2 text-lightGray menu-link">Profile
                            <i class="fas fa-chevron-right text-lightGray float-right mt-1"></i>
                        </a>
                    </span>
                </div>
                <!-- FRIENDS -->
                <div class="ml-3 mt-1 d-block mb-3">
                    <span>
                        <i class="fas fa-user-plus text-lightGray bg-gray p-2 menu-icon text-center"></i>
                        <a href="friend.php" class="ml-2 text-lightGray menu-link">Friends
                            <i class="fas fa-chevron-right text-lightGray float-right mt-1"></i>
                        </a>
                    </span>
                </div>
                <!-- GROUPS -->
                <div class="ml-3 mt-1 d-block mb-3">
                    <span>
                        <i class="fas fa-users text-lightGray bg-gray p-2 menu-icon text-center"></i>
                        <a href="groups.php" class="ml-2 text-lightGray menu-link">Groups
                            <i class="fas fa-chevron-right text-lightGray float-right mt-1"></i>
                        </a>
                    </span>
                </div>

                <!-- POSTS -->
                <div class="ml-3 mt-1 d-block mb-3">
                    <span>
                        <i class="fas fa-file-alt text-lightGray bg-gray p-2 menu-icon text-center"></i>

                        <a href="" class="ml-2 text-lightGray menu-link">
                            <span>
                                Posts
                                <sup class="bg-redPigment text-white icon-superscript my-0 ">15</sup>
                            </span> 
                            <i class="fas fa-chevron-right text-lightGray float-right mt-1"></i>
                        </a>
                        
                    </span>
                </div>
                <!-- MOST RECENT -->
                <div class="ml-3 mt-1 d-block">
                    <span>
                        <i class="fas fa-newspaper text-lightGray bg-gray p-2 menu-icon text-center"></i>
                        <a href="" class="ml-2 text-lightGray menu-link">Most Recent
                            <i class="fas fa-chevron-right text-lightGray float-right mt-1"></i>
                        </a>
                    </span>
                </div>
                    
                <span class="label text-lightGray d-block font-weight-bold mt-3">Events</span>
                <!-- BIRTHDAYS -->
                <div class="ml-3 mt-1 d-block mb-3">
                    <span>
                        <i class="fas fa-birthday-cake text-lightGray bg-gray p-2 menu-icon text-center"></i>
                        <a href="" class="ml-2 text-lightGray menu-link">Birthdays
                            <i class="fas fa-chevron-right text-lightGray float-right mt-1"></i>
                        </a>
                    </span>
                </div>
                <!-- GAMES -->
                <div class="ml-3 mt-1 d-block mb-3">
                    <span>
                        <i class="fas fa-gamepad text-lightGray bg-gray p-2 menu-icon text-center"></i>
                        <a href="" class="ml-2 text-lightGray menu-link">Games
                            <i class="fas fa-chevron-right text-lightGray float-right mt-1"></i>
                        </a>
                    </span>
                </div>
            </div>
            <!-- SIDE BAR MENU  -->       
            
        </div>
        <!-- END OF CONTENT -->

        <!-- SIDE BAR FOOTER -->
        <div class="sidebar-footer d-flex bg-gray pt-2">
            <a href="#">
                <i class="fa fa-bell text-white">
                    <sup class="bg-redPigment text-white icon-superscript my-0 ">10</sup>
                </i>
            </a>
            <a href="#">
                <i class="fa fa-envelope text-white">
                    <sup class="bg-redPigment text-white icon-superscript my-0 ">50</sup>
                </i>
            </a>
            <a href="#">
                <i class="fa fa-cog text-white"></i>
                <span class="badge-sonar"></span>
            </a>
            <a href="logout.php">
                <i class="fa fa-power-off text-white"></i>
            </a>
        </div>
        <!-- END OF SIDE BAR FOOTER -->
    </div>
    <!-- END OF SIDEBAR -->

   
    <script>
        function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        }
    </script>
   



















    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
</body>
</html>