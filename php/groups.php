<?php include('sidebar.php') ?>
<?php include('../includes/group.inc.php') ?>

<?php include('../includes/dropg.inc.php') ?>
<?php include('../includes/db_conn.php') ?>

<main id="main" class="p-0">
    <div class="container-fluid">
        <!-- HEADER -->
        <nav class="row d-flex align-items-center bg-darkGunmetal sticky-top nav-header">
            <button class="openbtn text-lightGray" onclick="openNav()">☰</button>  
            <span class="text-lightGray ml-auto font-weight-bold mr-3">MyBook</span>
            
        </nav>
        <!-- END OF HEADER -->

        <!-- GROUP SECTION -->
        <div class="row justify-content-between">
            <div class="col col-lg-10 px-3 pt-3 pb-2 ">
                <div class="box d-block p-2">
                    <!-- JOIN GROUPS -->
                    <h1 class="size-1-1 mb-3">Join Groups</h1>
                    <?php
                        // GROUPS THAT THE USER IS NOT A PART OF
                        $sql1 = "SELECT group_name, group_id FROM Groups WHERE group_id NOT IN (SELECT group_id FROM Group_Member WHERE username = '{$_SESSION['username']}')";
                        $result = mysqli_query($conn,$sql1);
                         
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $group_name = $row['group_name'];
                                $group_id = $row['group_id'];
                    ?>
                    <div class ="mb-2 d-flex align-items-center">
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="mr-2">
                            <button type="submit" class="bg-redPigment group-btn" name="submit_add" value="Submit"><i class="addg fas fa-plus text-white "></i></button>
                        </form>
                        <span class="mr-1"><?php echo $group_name ?></span> 
                        <?php
                            $leader ="SELECT username FROM Group_Creator WHERE group_id='{$group_id}'";
                            $leader_row = mysqli_fetch_assoc(mysqli_query($conn,$leader));
                        ?> 
                        <span class="text-muted" style="font-size:0.9rem;">(@<?php echo $leader_row['username']; ?>)</span>    
                    </div>
                     
                    <div class="collape" id="drop"> 
                        <table class="border"> 
                            <tr>
                                <th class="p-2">Group Admin</th>
                                <th  class="p-2">Group Members</th>
                            </tr>
                            <tr>
                                <!-- ADMIN -->
                                <td  class="p-2">
                                    <?php
                                        $sql3 = "SELECT username FROM Group_Admin WHERE group_id =$group_id";
                                        $result3 = mysqli_query($conn,$sql3);
                                        if (mysqli_num_rows($result3) > 0) {
                                            // output data of each row
                                            while($row1 = mysqli_fetch_assoc($result3)) {
                                                $admin1 = $row1['username'];
                                                echo $admin1;
                                                echo '<br>';
                                            }
                                        }
                                    ?>
                                </td>
                                <td  class="p-2">
                                    <!-- MEMBER -->
                                    <?php
                                        $sql4 = "SELECT username FROM Group_Member WHERE group_id =$group_id";
                                        $result4 = mysqli_query($conn,$sql4);
                                        if (mysqli_num_rows($result4) > 0) {
                                            // output data of each row
                                            while($row2 = mysqli_fetch_assoc($result4)) {
                                                $member1= $row2['username'];
                                                    echo $member1;
                                                    echo '<br>';
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>

                     </div>
                            
                    
                    <br>
                    <?php }} ?>
                </div>
                
                <!-- MY GROUPS -->
                <div class="box p-2" style="">
                    <h1 class="size-1-1">My Groups</h1>
                    <?php
                        // ALL GROUPS THAT THE USER IS A PART OF
                        $sql5 = "SELECT group_name, group_id FROM Groups WHERE group_id IN (SELECT group_id FROM Group_Member WHERE username = '{$_SESSION['username']}')";
                        $result5 = mysqli_query($conn,$sql5);
                        if (mysqli_num_rows($result5) > 0) {
                            // output data of each row
                            while($row5 = mysqli_fetch_assoc($result5)) {
                                $group_name1 = $row5['group_name'];
                                $group_id1 = $row5['group_id'];
                            
                    ?>
                    <div class ="mb-2 d-flex align-items-center">
                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="mr-2">
                            <button type="submit" class="bg-redPigment group-btn" name="submit_drop" value="Submit">
                            <i class="far fa-trash-alt text-white"></i>
                            </button>
                        </form>
                        <span class="mr-1"><?php echo $group_name1 ?></span> 
                        <?php
                            $leader ="SELECT username FROM Group_Creator WHERE group_id='{$group_id1}'";
                            $leader_row = mysqli_fetch_assoc(mysqli_query($conn,$leader));
                        ?> 
                        <span class="text-muted" style="font-size:0.9rem;">(@<?php echo $leader_row['username']; ?>)</span>       
                    </div>
                    <div> 
                        <table class="border"> 
                            <tr>
                                <th class="p-2">Group Admin</th>
                                <th  class="p-2">Group Members</th>
                            </tr>
                            <tr>
                                <!-- ADMIN -->
                                <td  class="p-2">
                                    <?php
                                        $sql6 = "SELECT username FROM Group_Admin WHERE group_id =$group_id1";
                                        $result6 = mysqli_query($conn,$sql6);
                                        if (mysqli_num_rows($result6) > 0) {
                                            // output data of each row
                                            while($row6 = mysqli_fetch_assoc($result6)) {
                                                $admin2 = $row6['username'];
                                                echo $admin2;
                                                echo '<br>';
                                            }
                                        }
                                    ?>
                                </td>
                                <td  class="p-2">
                                    <!-- MEMBER -->
                                    <?php
                                        $sql7 = "SELECT username FROM Group_Member WHERE group_id =$group_id1";
                                        $result7 = mysqli_query($conn,$sql7);
                                        if (mysqli_num_rows($result7) > 0) {
                                            // output data of each row
                                            while($row7 = mysqli_fetch_assoc($result7)) {
                                                $member2= $row7['username'];
                                                    echo $member2;
                                                    echo '<br>';
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>

                     </div>
                            
                    
                    <br>
                    <?php }} ?>
                </div>
            
            </div>
            <!-- CREATE A GROUP -->
            <div class="col col-lg-2 col-md-3 col-sm-4 col-10 bg-drk pt-3 px-2">
                 <div class="" id="sticky-sidebar">
                    <button class="px-2 py-2 text-center bg-redPigment text-white btn-group" data-toggle="collapse" data-target="#dropdown" style="width:180px;">Create Group</button>
                    
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="bg-dark p-2 collapse mt-3" id="dropdown" style="width:180px;">
                        <input type="text" name="group_name" placeHolder="Group Name" class="d-block ml-auto form-control form-control-sm">
                        <button type="submit" class="btn-group px-5 mx-auto btn-block bg-redPigment text-white px-2 py-1 m-1" name="submit_group">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- END OF GROUP SECTION -->
        
    </div>
</main>
