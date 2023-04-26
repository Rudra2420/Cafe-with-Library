<?php
session_start();
include ('include/header_admin.php');
?>
    <div class="col-sm-9 col-md-10"><!--dashboard-->
        <div class="mx-5 mt-5 "><!--table-->
            <p class="bg-dark text-white text-center p-2"> List of Food Items</p>
            
            </nav>
            <div class="add-btn">
                <a href="add_menu.php">
                    <button type="submit" class="btn btn-primary"><b>Add Menu</b></button>
                </a>
            </div>
            <br>
                
			<form action="" method="post" enctype="multipart/from-data">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Food_image</th>
                        <th scope="col">Food_Name</th>
						<th scope="col">Food_Price</th>
                        <th scope="col">Category_Name</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody> 
                <?php
                    require "conn/dbconn.php";
                    $count=1;
                    // 
                    $sql_query="SELECT * from food_items INNER JOIN food_category ON food_items.fcat_id = food_category.fcat_id ;" ;  
                    $result = mysqli_query($conn,$sql_query);
                   
                    
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="col"><?php echo $count ; ?></th>
                        <th scope="col"><img src="<?php echo $row["fitem_img"]?>" alt="Image" style="width:70px ; height: 70px; " ></th>
                        <th scope="col"><?php echo $row["fitem_name"]; ?></th>
                        <th scope="col"><?php echo $row["fitem_price"]; ?></th>
                        <th scope="col"><?php echo $row["fcat_name"]; ?></th>
                        <th scope="col">
                            <a href="menu_update_a.php?id=<?php echo $row["fitem_id"]; ?>"><p class="far fa-edit"></p></a>
                        </th>
                        <th scope="col">
                            <a href="delete_menu_item.php?id=<?php echo $row["fitem_id"]; ?>"><p class="far fa-trash-alt"></p></a>
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
</body>
</html>