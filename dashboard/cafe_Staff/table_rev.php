<?php
session_start();
include ('conn/dbconn.php');
include ('include/header_staff.php');

?>
    <div class="col-sm-9 col-md-10"><!--dashboard-->
        <div class="mx-5 mt-5 text-center"><!--table-->
            <p class="bg-dark text-white p-2"> Table Reservation List</p>
 
</nav>
			<form method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">No. of Guests</th>
                        <th scope="col">Email</th>
						<th scope="col">Phone No.</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Submit</th>
                        <!-- <th scope="col">Reject</th> -->
                    </tr>
                </thead>
                <tbody> 
                <?php
                   
                    $count=1;
                    
                    $sql_query="SELECT * from reservation_tbl JOIN customer on reservation_tbl.cust_id = customer.cust_id " ; 
                    $result = mysqli_query($conn,$sql_query);
                   
                    
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="col"><?php echo $count  ?></th>
                        <th scope="col"><?php echo $row["capacity"]?></th>
                        <th scope="col"><?php echo $row["cust_email"] ?></th>
                        <th scope="col"><?php echo $row["cust_ph"] ?></th>
                        <th scope="col"><?php echo $row["rev_date"] ?></th>
                        <th scope="col"><?php echo $row["rev_time"] ?></th>
                        <th scope="col">
                        <select name='category'>
                            <!-- <option><?php //echo $row["rev_status"];?></option>
                            <option disabled>-------------</option> -->
                            <!-- <option value='Pending'>Pending</option> -->
                            <option value='Confirmed'>Confirmed</option>
                            <option value='Rejected'>Rejected</option>
                        </select>
                
                        <th scope="col">
                            
                                <button type="submit" name="submit" class="fa fa-check" style="color:green;"></button>
                            
                        </th>        
                    </tr>
                    <?php   $count++; }?>
                </tbody>
            </table>
			</form>
        </div><!--table end-->
        </div><!--dashboard end--> 
    </div><!--end row-->
</div><!--end container-->

<?php
if(isset($_POST['submit']))
{   
    $sql_query="SELECT * FROM reservation_tbl";
    $data = mysqli_query($conn,$sql_query);
    $row1 = mysqli_fetch_assoc($data);
    $id = $row1['rev_id'];

    

    $sqlquery = "UPDATE reservation_tbl SET rev_status = '$_POST[category]' WHERE rev_id = $id";
    $query_run = mysqli_query($conn,$sqlquery);

    echo $_POST['category'];

    if ($query_run) 
    {
        echo "<script> alert('data updated'); </script>";
        
    } 
    else 
    {
        echo "<script> alert('data not updated'); </script>";
       
    }  
}
?>
</body>
</html>