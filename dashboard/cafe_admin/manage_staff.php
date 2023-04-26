<?php
session_start();
include ('include/header_admin.php');
?>

    <div class="col-sm-9 col-md-10"><!--dashboard-->
        <div class="mx-5 mt-5 "><!--table-->
            <p class="bg-dark text-white text-center p-2"> List of Staff Members</p>
        </nav>
            <div class="add-btn">
                <a href="add_staff.php">
                    <button type="submit" class="btn btn-primary"><b>Add Staff</b></button>
                </a>
            </div>
            <br>

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">s_id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody> 
<?php
    require "conn/dbconn.php";
    $count=1;
    $sql_query="Select * from staff;";
    $result = mysqli_query($conn,$sql_query);
    while($row = mysqli_fetch_assoc($result)) {
?>
                    <tr>

                    <th scope="col"><?php echo $count;?></th>
                    <th scope="col"><?php echo $row["stf_id"]; ?></th>
                    <th scope="col"><?php echo $row["stf_name"]; ?></th>
                    <th scope="col"><?php echo $row["stf_email"]; ?></th>
                    <th scope="col"><?php echo $row["stf_mob"]; ?></th>
                    <th scope="col">
                        <a href="update_record_staff.php?id=<?php echo $row["stf_id"]; ?>"><p class="far fa-edit"></p></a>
                    </th>
                    <th scope="col">
                        <a href="delete_record_staff.php?id=<?php echo $row["stf_id"]; ?>"><p class="far fa-trash-alt"></p></a>
                    </th>        
                    </tr>
<?php   
    $count++; }
?>                   
                </tbody>
            </table>
        </div><!--table end-->
        
        </div><!--dashboard end--> 
    </div><!--end row-->
</div><!--end container-->
</body>
</html>