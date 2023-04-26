<?php 
session_start();

include ('conn/dbconn.php');
include ('include/header_staff.php');
?>

      <div class="col-sm-9 col-md-10"><!--dashboard-->
        <div class="row text-center mx-5"><!-- dashboard row-->
          
          <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger md-3" style="max-width:18rem">
              <div class="card-header">Table Reserved</div>
                <div class="card-body">
                  <h4 class="card-title">
                  <?php 
                    $sql = "SELECT count(rev_id) AS total from reservation_tbl";
                    $result = mysqli_query($conn,$sql);
                    $values = mysqli_fetch_array($result);

                    $num_row = $values['total'];
                    echo $num_row;
                  
                  ?></h4><!-- php code for customer -->
                  <a class="btn text-white" href="manage_user.php">view</a>
                </div>
            </div>
          </div>       
          <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success md-3" style="max-width:18rem">
              <div class="card-header">Menu Items</div>
                <div class="card-body">
                  <h4 class="card-title">
                  <?php
                    $sql = "SELECT count(fitem_id) AS total from food_items";
                    $result = mysqli_query($conn,$sql);
                    $values = mysqli_fetch_array($result);

                    $num_row = $values['total'];
                    echo $num_row;
                  ?></h4><!-- php code for total no. of item in menu-->
                  <a class="btn text-white" href="#">view</a>
                </div>
            </div>
          </div> 

          <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info md-3" style="max-width:18rem">
              <div class="card-header">Orders received</div>
                <div class="card-body">
                  <h4 class="card-title">
                  <?php
                    $sql3 = "SELECT count(ord_id) AS total3 from orders";
                    $result3 = mysqli_query($conn,$sql3);
                    $values3 = mysqli_fetch_array($result3);

                    $num_row3 = $values3['total3'];
                    echo $num_row3;
                  ?>
                  </h4><!-- php code for order-->
                  <a class="btn text-white" href="#">view</a>
                </div>
            </div>
          </div>
        </div><!-- dashbord row end-->  

        <div class="mx-5 mt-5 text-center"><!--table-->
          <p class="bg-dark text-white p-2"> Reservation List</p>
            
          <table class="table">
            <thead>
                <tr>
                  <th scope="col">Reservation Id</th>
                  <th scope="col">Customer Id</th>
                  <th scope="col">No. of Guests</th>
                  <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                  require "conn/dbconn.php";
                  $count=1;
                  $limit=10;
                  $sql_query="Select * from reservation_tbl LIMIT $limit;";
                  $result = mysqli_query($conn,$sql_query);
                  while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>

                  <th scope="col"><?php echo $row["rev_id"]; ?></th>
                  <th scope="col"><?php echo $row["cust_id"]; ?></th>
                  <th scope="col"><?php echo $row["capacity"]; ?></th>
                  <th scope="col"><?php echo $row["rev_date"]; ?></th>
                  
                  </td>

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