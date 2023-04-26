<?php
session_start();
include ('include/header_admin.php');
?>
    <div class="col-sm-9 col-md-10"><!--dashboard-->
        <div class="mx-5 mt-5 text-center"><!--table-->
            <p class="bg-dark text-white p-2"> List of users</p>
            
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">c_id</th>
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

                    $sql_query="select * from customer " ;
                    $result = mysqli_query($conn,$sql_query);
                   
                    
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="col"><?php echo $count ; ?></th>
                        <th scope="col"><?php echo $row["cust_id"]; ?></th>
                        <th scope="col"><?php echo $row["cust_name"]; ?></th>
                        <th scope="col"><?php echo $row["cust_email"]; ?></th>
                        <th scope="col"><?php echo $row["cust_mob"]; ?></th>
                        <th scope="col">
                            <a href="update_record_user.php?id=<?php echo $row["cust_id"]; ?>"><p class="far fa-edit"></p></a>
                        </th>
                        <th scope="col">
                            <a href="delete_record_user.php?id=<?php echo $row["cust_id"]; ?>"><p class="far fa-trash-alt"></p></a>
                        </th>        
                    </tr>
                    <?php   $count++; }?>
                </tbody>
            </table>
        </div><!--table end-->
        </div><!--dashboard end--> 
    </div><!--end row-->
</div><!--end container-->
</body>
</html>