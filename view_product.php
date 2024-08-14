<?php
include('sidebar.php');
include('connection.php')
?>
          
                  <table class="table">
                    <h1>VIEW product</h1>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th>image</th>
                <th>cetegory_id</th>
            </tr>
        </thead>
       <tbody>
        <tr>
       <?php
       
    $query=mysqli_query($con,"SELECT * FROM `product` ");
       while ($row = mysqli_fetch_array( $query)){

       
       ?>
       <td scope="row"><?php echo $row[0]?></td>
       <td ><?php echo $row[1]?></td>
       <td ><?php echo $row[2]?></td>
       <td><?php echo $row[3]?></td>
       <td><img src="img/<?php echo $row[4]?>" alt="" height="100px"></td>
       <td><?php echo $row[5]?></td>

        <td><a href="view_product.php?id=<?php echo $row[0]?>" class="btn btn-danger"> delete</a>
       <a href="update_product.php?id=<?php echo $row[0]?>" class="btn btn-primary">update</a></td>  
        </tr>
        <?php
       }
        ?>

       </tbody>

    </table>
    <a href="add_product.php"><button class="btn btn-primary">Add_product</button></a>


    


<?php
if(isset($_GET['id'])){
    $del=$_GET['id'];
    $del_row=mysqli_query($con,"DELETE FROM `product` WHERE id=$del");
    if($del_row){
        echo"<script>
        alert('rocord delete')
        location.assign('view_product.php');
        </script>";

    }
}



?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>



<?php
include('footer.php');
?>
       
  




   
