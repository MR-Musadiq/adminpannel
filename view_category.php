<?php
include('sidebar.php');
include('connection.php')
?>
          
                  <table class="table">
                  <h1>view cetegory</h1>

        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>Description</th>
                <th>image</th>
            </tr>
        </thead>
       <tbody>
        <tr>
       <?php
       
    $query=mysqli_query($con,"SELECT * FROM `category`");
       while ($row = mysqli_fetch_array( $query)){

       
       ?>
       <td scope="row"><?php echo $row[0]?></td>
       <td ><?php echo $row[1]?></td>
       <td ><?php echo $row[2]?></td>
       <td><img src="./img/<?php echo $row[2]; ?>" alt="" height="100px"></td>
       <td><a href="View_cetegory.php?id=<?php echo $row[0]?>" class="btn btn-danger"> delete</a>
       <a href="update_cetegory.php?id=<?php echo $row[0]?>" class="btn btn-primary">update</a></td>  
        </tr>
        <?php
       }
        ?>

       </tbody>

    </table>
    <a href="add_cetegory.php"><button class="btn btn-primary">Add</button></a>

    


<?php
if(isset($_GET['id'])){
    $del=$_GET['id'];
    $del_row=mysqli_query($con,"DELETE FROM `category` WHERE  id=$del");
    if($del_row){
        echo"<script>
        alert('rocord delete')
        location.assign('View_cetegory.php');
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
       
  





