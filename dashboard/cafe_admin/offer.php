<?php
session_start();
include ('include/header_admin.php');
?>

    <div class="col-sm-9 col-md-10"><!--dashboard-->
        <div class="mx-5 mt-5 "><!--table-->
            <p class="bg-dark text-white text-center p-2"> List of Staff Members</p>
        </nav>
            <div class="add-btn">
                <a href="add_offer.php">
                    <button type="submit" class="btn btn-primary"><b>Add Offer</b></button>
                </a>
            </div>
            <br>  
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Offer Name</th>
                        <th scope="col">Offer Code</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">On Min Amount</th>
                        <th scope="col">Discount %</th>
                        <th scope="col">Exp date</th> 
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody> 
<?php
    require "conn/dbconn.php";
    $count=1;
    $sql_query="Select * from offers;";
    $result = mysqli_query($conn,$sql_query);
    while($row = mysqli_fetch_assoc($result)) {
?>
                    <tr>

                    <th scope="col"><?php echo $count;?></th>
                    <th scope="col"><?php echo $row["offer_name"]; ?></th>
                    <th scope="col"><?php echo $row["offer_code"]; ?></th>
                    <th scope="col"><?php echo $row["offer_category"]; ?></th>
                    <th scope="col"><?php echo $row["offer_desc"]; ?></th>
                    <th scope="col"><?php echo $row["min_ord_amt"]; ?></th>
                    <th scope="col"><?php echo $row["disc_per"]." %"; ?></th>
                    <th scope="col"><?php echo $row["offer_expr_date"]; ?></th>
                    
                    <th scope="col">
                        <a href="update_offer.php?id=<?php echo $row["offer_id"]; ?>"><p class="far fa-edit"></p></a>
                    </th>
                    <th scope="col">
                        <a href="delete_offer.php?id=<?php echo $row["offer_id"]; ?>"><p class="far fa-trash-alt"></p></a>
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