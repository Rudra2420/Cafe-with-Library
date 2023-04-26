<?php
include ('conn/dbconn.php');
include ('include/header_staff.php');
?>		

			



	<div class="col-sm-9 col-md-10">
        <div class="mx-5 mt-5 text-center">
			<p class="bg-dark text-white p-2"> Order List</p>
</nav> 
               
							<div class="row">
								
								<div class="col-md-3">
									
									<br>	
									
									<div class="col-md-12" style="text-align: center; background: #000; color: #fff;">
									
										<h6>ORDER ID</h6>
										
									</div>
									
								</div>

								<div class="col-md-9">
								<br>
									<div class="col-md-12" style="background: #000; color: #fff;">
										
										<h6>ORDER DETAILS</h6>
										
									</div>
								
								</div>
								
								<div class="col-md-3" style="text-align: center;">
									
                                <?php 
                                    $fetchquery = "SELECT * FROM orders INNER JOIN customer ON orders.cust_id = customer.cust_id";
                                    $exeque = mysqli_query($conn,$fetchquery);
                                   
                                
                                    while ($res = mysqli_fetch_array($exeque))
                                    {?>
                                        <?php $order = $res['ord_id'];?>
                                        <a href="manage_order.php?id=<?php echo $res['ord_id'] ; ?>" style='display: block; background: #efefef; color: #333; border-bottom: 1px solid #ccc; padding: 10px 0px;'>
                                        <?php echo "ORD_".$order ; ?></a>
                                    
                                    <?php 
                                    }
                                    ?>
									
								</div>
								
								<div id="details_display" class="col-md-9 table-responsive" style="padding: 10px;">
									
                                    <table class='table table-hover'>
                                        <thead>
                                            <th>Order_id</th>
                                            <th>name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </thead>
									<tbody>
                                    <?php
                                            if(isset($_GET['id']))
                                            {
                                            $order_store = $_GET['id'];
                                            // echo $order_store;
                                            $sql = "SELECT * FROM orders INNER JOIN customer ON orders.cust_id = customer.cust_id where ord_id = $order_store";
                                            $exque2 = mysqli_query($conn,$sql);
                                            // $exeque = mysqli_query($conn,$fetchquery);
                                            // echo "hii";
                                           
                                            while ($row =  mysqli_fetch_array($exque2)) 
                                            {
                                            ?>
                                                <tr>
                                                    <td><?php echo "ORD_".$row['ord_id'] ;?>        </td>
                                                    <td><?php echo $row['cust_name'] ; ?>  </td>
                                                    <td><?php echo $row['cust_email'] ; ?> </td>
                                                    <td><?php echo $row['cust_mob'] ; ?>   </td>
                                                </tr>
                                                
                                            <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "Select Orders From Orders List";
                                        }
                                            
                                        
                                    ?>

                                    <table class='table table-hover'>
                                        <tbody>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </tr>

                                       
                                        <?php 
                                         if(isset($_GET['id']))
                                         {
                                            $order_store = $_GET['id'];
                                            $sql2 = "SELECT * FROM cart INNER JOIN orders ON cart.cust_id = orders.cust_id INNER JOIN food_items ON cart.fitem_id = food_items.fitem_id where ord_id = $order_store ";
                                            $exeque3 = mysqli_query($conn,$sql2);
                                            
                                            while ($row2 = mysqli_fetch_array($exeque3)) 
                                            {
                                            ?>
                                                <tr>
                                                    <td><?php echo$row2['fitem_name'];?>  </td>
                                                    <td><?php echo$row2['qty'];?>         </td>
                                                    <td><?php echo$row2['total_price'];?> </td>
                                                </tr>
                                            <?php 
                                            }
                                        }
                                        else
                                        {
                                            echo "Select Orders From Orders List";
                                        }
                                        ?>

                                    <tr>
										<th>Grand Price</th>
										<th></th>
										<th></th>
									</tr>
                                    <?php
                                        if(isset($_GET['id']))
                                        {
                                            $grndt = "SELECT grand_total FROM orders WHERE ord_id = $order_store";
                                             $exeque3 = mysqli_query($conn,$grndt);
                                             $fetch = mysqli_fetch_assoc($exeque3);
                                             $gt = $fetch['grand_total'];
                                          
                                            ?>
                                                <tr>
                                                    <td><?php echo $gt; ?> </td>
                                                </tr>
                                            <?php 
                                        } 
                                        ?>
                                         
                                        
                                       
                                        </tbody>
                                    </table>

                                        </tbody>
                                    </table>    
									
								</div>
								
							</div>
							
							<div class="content table-responsive table-full-width">
                                
								<p style="padding: 0px 20px;"></p>

                            </div>
                      
            </div>
        </div>
	<?php
		
	?>

</body>

</html>                   