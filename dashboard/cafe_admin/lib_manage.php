<?php
session_start();
include ('include/header_admin.php');
?>
    <div class="col-sm-9 col-md-10"><!--dashboard-->
        <div class="mx-5 mt-5 "><!--table-->
            <p class="bg-dark text-white text-center p-2"> List of Books</p>
            
            </nav>
            <div class="add-btn">
                <a href="add_books.php">
                    <button type="submit" class="btn btn-primary"><b>Add Book</b></button>
                </a>
            </div>
            <br>
			<form action="" method="post" enctype="multipart/from-data">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Book_image</th>
                        <th scope="col">Book_Name</th>
						<th scope="col">Book_Author</th>
                        <th scope="col">Book_Category_Name</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody> 
                <?php
                    require "conn/dbconn.php";
                    $count=1;

                    $sql_query="SELECT * from books inner join book_category on books.bcat_id = book_category.bcat_id" ;
                    $result = mysqli_query($conn,$sql_query);
                   
                    
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="col"><?php echo $count ; ?></th>
                        <th scope="col"><img src="<?php echo $row["book_img"]?>" alt="Image" style="width:70px ; height: 70px; " ></th>
                        <th scope="col"><?php echo $row["book_name"]; ?></th>
                        <th scope="col"><?php echo $row["bauth_name"]; ?></th>
                        <th scope="col"><?php echo $row["bcat_name"]; ?></th>
                        <th scope="col">
                            <a href="lib_update.php?id=<?php echo $row["book_id"]; ?>"><p class="far fa-edit"></p></a>
                        </th>
                        <th scope="col">
                            <a href="delete_lib_book.php?id=<?php echo $row["book_id"]; ?>"><p class="far fa-trash-alt"></p></a>
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