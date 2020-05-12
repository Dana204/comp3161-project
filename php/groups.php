<?php include('sidebar.php') ?>
<?php include('../includes/group.inc.php') ?>

<main id="main" class="p-0">
    <div class="container-fluid">
        <!-- HEADER -->
        <nav class="row d-flex align-items-center bg-darkGunmetal sticky-top nav-header">
            <button class="openbtn text-lightGray" onclick="openNav()">☰</button>  
            <span class="text-lightGray ml-auto font-weight-bold mr-3">MyBook</span>
            
        </nav>
        <!-- END OF HEADER -->

        <!-- GROUP SECTION -->
        <!-- <div class="row px-3 pt-3 pb-2 justify-content-center text-center">
            <div class="col col-lg-6">
                <h1>Join Groups</h1>

            </div>
            <div class="col col-lg-6">
                <h1>My Groups</h1>
            </div>
            
         </div> -->
         <div class="row justify-content-end text-right mt-2">
            <div class="col col-lg-2 text-center">
                <!-- <h1>Create Group</h1> -->
                <button class="text-black bg-dak btn-block btn-group" data-toggle="collapse" data-target="#drop">Create Group</button>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="bg-dark p-2 collapse mt-3" id="drop">
                    <input type="text" name="group_name" placeHolder="Group Name" class="d-block ml-auto form-control form-control-sm">
                     <button type="submit" class="btn-group px-5 mx-auto btn-lock bg-redPigment text-white px-2 py-1 m-1" name="submit">Submit</button>
                </form>
            </div>
         </div>
        <!-- END OF GROUP SECTION -->
        
    </div>
</main>
