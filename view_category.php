<?php
include('sidebar.php');
include('connection.php')
?>

<div class="container">
             <form action="" method="post"  enctype="multipart/form-data">
        <div class="for-group">
        <label for="">P:name</label>
        <input type="text" name="pname" class="form-control">
        </div>
        <div class="for-group">
        <label for="">P:price</label>
        <input type="text" name="price" class="form-control">
        </div>
        <div class="for-group">
        <label for="">P:Quaninty</label>
        <input type="text" name="quaninty" class="form-control">
        </div>
        <div class="for-group">
        <label for="">P:image</label>
        <input type="file" name="pimage" class="form-control">

        </div>
        <div class="form-group">
         <select name="cat" id="">
          <option value=""> select any category</option>
            <?php
       $data=mysqli_query($con,"SELECT * FROM `category`");
       while($cat=mysqli_fetch_array($data)){?>
         <option value="<?php echo $cat[0]?>"><?php echo $cat[1]?></option>
         <?php
       }

            ?>
           
         </select>

        </div>
        <input type="submit" value="product" name="add_pro" class="btn btn-info">

        

                
            

             </form>
             </div>
             <?php
 if(isset($_POST['add_pro'])){
    $name=$_POST['pname'];
    $des=$_POST['price'];
    $qua=$_POST['quaninty'];
    $cat=$_POST['cat'];
    $pro_image=$_FILES['pimage']['name'];
    $tamp_imagename=$_FILES['pimage']['tmp_name'];
    $desination="img/". $pro_image;
    $extension=pathinfo( $pro_image , PATHINFO_EXTENSION);
    if($extension=='png' || $extension=='jpeg' || $extension=='jpg'){
        if(move_uploaded_file($tamp_imagename, $desination)){
          $query= mysqli_query($con,"INSERT INTO `product`(`id`, `name`, `price`, `quantity`, `image`, `category_id`) VALUES ('  $name',' $des','  $qua','   $pro_image',' $cat')");
            if($query){
                
                    echo"<script>alert('product addded ')</script>";
            
            }
           
          
        }
       
        else{
            echo"<script>alert('error ')</script>";
        }
    }
    else{
        echo"<script>alert('extension doesnot match ')</script>";

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

</body>

</html>

  <!-- Footer -->
 
            <!-- End of Footer -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<!-- Footer -->
<?php
           include('footer.php');
           ?>
