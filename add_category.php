<?php
include('sidebar.php');
include('connection.php')?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
            <label for="">P:Name</label>
            <input type="text" name="cname" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Discription</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="">C:image</label>
            <input type="file" name="cimage" class="form-control">
        </div>
       <input type="submit" value="Add" name="add_btn">
    </form>
 <?php
 if(isset($_POST['add_btn'])){
    $name=$_POST['cname'];
    $des=$_POST['description'];
    $image=$_FILES['cimage']['name'];
    $tamp_imagename=$_FILES['cimage']['tmp_name'];
    $desination="img/".$image;
    $extension=pathinfo($image , PATHINFO_EXTENSION);
    if($extension=='png' || $extension=='jpeg' || $extension=='jpg'){
        if(move_uploaded_file($tamp_imagename, $desination)){
          $query= mysqli_query($con,"INSERT INTO `category`( `name`, `description`, `image`) VALUES ('$name','$des','$image')");
            if($query){
                
                    echo"<script>alert('cetegory addded ')</script>";
            
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
<?php
           include('footer.php')?>
            <!-- End of Footer -->