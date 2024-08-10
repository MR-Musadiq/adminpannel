<?php
include('sidebar.php');
include('connection.php')?>
                  <table class="table">
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
       
    $query= mysqli_query($con,"SELECT * FROM `category`");
       while ($row = mysqli_fetch_array( $query)){

       
       ?>
       <td scope="row"><?php echo $row[0]?></td>
       <td ><?php echo $row[1]?></td>
       <td ><?php echo $row[2]?></td>
       <td><img src="img/<?php echo $row[3]?>" alt="" height="100px"></td>
        <td><a href="view_category.php?id=<?php echo $row[0]?>" class="btn btn-danger"> delete</a>
       <!-- <a href="update.php?id=<?php echo $row[0]?>" class="btn btn-primary">update</a></td>  -->
        </tr>
        <?php
       }
        ?>
       </tbody>

    </table>
    


<?php
if(isset($_GET['id'])){
    $del=$_GET['id'];
    $del_row=mysqli_query($con,"DELETE FROM `category` WHERE id=$del");
    if($del_row){
        echo"<script>
        alert('rocord delete')
        location.assign('view_category.php');
        </script>";

    }
}
// if(isset($_GET['id'])){
//     $del=$_GET['id'];
//     $del_row=mysqli_query($con,"DELETE FROM `cetegory` WHERE id=$del");
//     if($del_row){
//         echo"<script>
//         alert('record delete');
//         location.assign('view_cetegory.php')</scrip>";
//     }
// }



?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/boots+trap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
   <!-- Footer -->
       
  


<?php 
            include('footer.php')?>
                      <!-- End of Footer -->