<?php include('sidebar.php') ?>
<?php include('../includes/post.inc.php') ?>
<?php include('../includes/comment.inc.php') ?>


<main id="main" class="p-0">
    <div class="container-fluid">
        <!-- HEADER -->
        <nav class="row d-flex align-items-center bg-dark sticky-top">
            <button class="openbtn text-lightGray" onclick="openNav()">☰</button>  
            <span class="text-lightGray ml-auto font-weight-bold mr-3">MyBook</span>
        </nav>
        <!-- END OF HEADER -->

        <div class="row ml-3 justify-content-center justify-content-sm-center justify-content-md-star m-0">
            <p class="size-1-1 text-center">Welcome back 
                <?php echo $_SESSION['username'] ?>!
            </p>        
        </div>
        <div class="row ml-3 justify-content-center justify-content-sm-center justify-content-md-star m-0">
            <a href="" class="bg-redPigment text-white rounded-comment px-2 py-1" data-toggle="collapse" data-target="#drop" >Create Post</a>     
        </div>
        <div class="row justify-content-center mx-auto mt-3 transition collase" id="drp" >
            <div class="col col-lg-4 col-md-6 col-sm-7 col-12">
                <!-- CREATE POST -->
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="collapse border bg-darkGunmetal p-4" enctype='multipart/form-data' id="drop">
                    <!-- TITLE -->
                    <div class="form-field mb-2">
                        <input type="text"  name="title" class="d-block form-control form-control-md" id="username" placeHolder="Title">
                    </div>
                    <!-- DESCRIPTION -->
                    <div class="form-field mb-2">
                        <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <!-- IMAGE -->
                    <div class="form-field mb-2">
                        <input type="file" style="width:100%;" name="file"/>
                    </div>
                    
                    <input type="submit" value="Upload" name='but_upload' class="btn text-white bg-redPigment rounded-comment py-1">
                </form>    
            </div>
        </div>

        <div class="row p-3 ">
            <?php 
                $query = "Select * FROM Post";
                $result = mysqli_query($conn,$query);

                if (mysqli_num_rows($result) > 0) {                        
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        // GETTING DATE AND TIME FROM POST DATE TABLE
                        $query2 = "Select * FROM Post_Date WHERE post_id = '{$row['post_id']}'";
                        $result2 = mysqli_query($conn,$query2);
                        $date_row = mysqli_fetch_assoc($result2);


                        $title = $row['title'];
                        $description = $row['description'];
                        $user = $row['username'];
                        $date = $date_row['post_date'];
                        $time = $date_row['post_time'];
            ?>
            <!-- COULMN START -->
            <div class="col col-lg-4 col-md-6 col-sm-7 col-12 transition mb-2">
                <div class="card shadow-sm" style="">
                    <img class="card-img-top img-fluid" src="../img/p17.jpg" alt="Card image cap" style="width:100%;height:140px;">
                    <div class="card-body p-1">
                        <h5 class="card-title mb-0 p-0 text-center bg-drkGunmetal"><?php echo $title ?></h5>
                        <h5 class="sub-title text-muted text-center"style="font-size:0.9rem;">@<?php echo $user ?></h5>
                        <p class="card-text mb-0"><?php echo $description ?></p>
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="sub-title text-muted"style="font-size:0.9rem;"><?php echo $time ?></h5>
                            <h5 class="sub-title text-muted text-right"style="font-size:0.9rem;"><?php echo $date ?></h5>
                        </div>       
                    </div>
                    <div class="card-footer bg-gray d-flex justify-content-between">
                        <i class="far fa-thumbs-up text-white">
                            <sup class="bg-redPigment text-white icon-superscript my-0 ">10</sup>
                        </i>
                        <i class="far fa-thumbs-down text-white">
                            <sup class="bg-redPigment text-white icon-superscript my-0 ">20</sup>
                        </i>
                        <i class="far fa-comment text-white" data-toggle="collapse" data-target="#dropform">
                             <sup class="bg-redPigment text-white icon-superscript my-0 ">17</sup>
                        </i>
                    </div>
                </div>
                <!-- END OF CARD -->
                <!-- COMMENT SECTION -->
                 <div class="comment-section border collapse transition mt-2 p-2" id="dropform" style="width:100%">
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="">
                        <button type="submit" class="bg-darkGunmetal border-dark" name="submit"><i class="fas fa-plus-circle text-redPigment"></i>
                        </button>
                        <input type="text" class="" style="width:90%;" name="comment">
                    </form>

                    <button class="btn btn-block mt-3 text-center text-white bg-redPigment d-block text-right transition" data-toggle="collapse" 
                    data-target="#dropcomments">View Comments</button>

                     <?php 
                        $query3 = "Select user_comment FROM Comment WHERE post_id ='{$row['post_id']}'";
                        $query3 = "Select user_comment FROM Comment WHERE post_id ='{$row['post_id']}'";
                        $result3 = mysqli_query($conn,$query3);

                        if (mysqli_num_rows($result3) > 0) {                        
                            // output data of each row
                            while($comment_row = mysqli_fetch_assoc($result3)) {
                                // GETTING USERNAME FROM COMMENTER TABLE
                                $query4 = "Select username FROM Commenter WHERE comm_id = '{$comment_row['comm_id']}'";
                                $query4 = "Select username FROM Commenter WHERE comm_id = '4'";
                                $result4 = mysqli_query($conn,$query4);
                                $username_row = mysqli_fetch_assoc($result4);
                                $comment = $comment_row['user_comment'];
                                $commenter = $username_row['username'];

                    ?>

                    <!-- COMMENTS -->
                    <div class="comments mt-3 collapse" id="dropcomments">
                        <div class="comment rounded-comment d-flex px-2 py-1 ">
                            <strong class="size-9 mr-1">@<?php $commenter ?></strong>                        
                            <p class="size-9 rounded-comment p-0 mb-0"><?php $comment ?></p>
                        </div>
                    </div> 
                </div>
                <?php }} else echo '<p class="text-muted text-center size-9 mt-2"> Be the First to Comment!</p>';
                ?>       
            </div>
            <br>
            <!-- END OF COLUMN 1 -->
            <?php }} ?>       
        </div>
    </div>
</main>