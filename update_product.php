<?php
include('sidebar.php');
include('connection.php');?>


  <body>
       <?php
      if(isset($_GET['id'])){
         $del=$_GET['id'];
        $up_row=mysqli_query($con,"SELECT * FROM `product` WHERE  id=$del");
        $up_query=mysqli_fetch_array($up_row);

      }
        ?> 
 
    <div class="container">
    <h1>update product</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">name</label>
              <input type="text" name="txtname" id="" value="<?php echo  $up_query[1]?>" class="form-control" placeholder="" aria-describedby="helpId" >
          
              
            </div>
            <div class="form-group">
              <label for="">price</label>
              <input type="text" name="txtprice" id="" value="<?php echo $up_query[2]?>"  class="form-control" placeholder="" aria-describedby="helpId" >
              
            </div>
            <div class="form-group">
           <label for="">Quantity</label>
           <input type="text" name="txtquantity" value="<?php echo  $up_query[3]?>">
            </div>
            <input type="text" class="form-control" value="<?php echo $up_query[4]?>" >
            <div class="form-group">

             <input type="file" name="pimage"  class="form-control">
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
            <div class="form-group">
            <input type="submit" value="update" class="btn btn-info" name="product_update">
            </div>
        </form>
        </div>
  </body>
</html>
<?php

if(isset($_POST['product_update'])){
    $name=$_POST['txtname'];
    $des=$_POST['txtprice'];
    $qua=$_POST['txtquantity'];
    $cat=$_POST['cat'];
    $pro_image=$_FILES['pimage']['name'];
    $tamp_imagename=$_FILES['pimage']['tmp_name'];
    $desination="img/". $pro_image;
    $extension=pathinfo( $pro_image , PATHINFO_EXTENSION);
    if($extension=='png' || $extension=='jpeg' || $extension=='jpg'){
        if(move_uploaded_file($tamp_imagename, $desination)){
          $query= mysqli_query($con,"UPDATE `product` SET `name`=' $name',`price`='    $des',`quantity`='    $qua',`image`=' $pro_image ',`category_id`=' $cat'");
            if($query){
                
                    echo"<script>alert('product update ')</script>";
            
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
 
// if(isset($_POST['btn_update'])){
//   $name=$_POST['"txtname'];
//   $des=$_POST['txtdescription'];
//   $image=$_FILES['cimage']['name'];
//   $tamp_imagename=$_FILES['cimage']['tmp_name'];  
//   $desination="img/".$image;
//   $extension=pathinfo($image , PATHINFO_EXTENSION);
//   if($extension=='png' || $extension=='jpeg' || $extension=='jpg'){
//       if(move_uploaded_file($tamp_imagename, $desination)){
// $query=mysqli_query($con,"UPDATE `cetegory` SET `name`=' $name',`descripton`=' $des',`image`='$image' WHERE id=$del ");           
// if($query){
              
//                   echo"<script>alert('cetegory updated ')</script>";
          
//           }
         
        
//       }
     
//       else{
//           echo"<script>alert('error update')</script>";
//       }
//   }
//   else{
//       echo"<script>alert('extension doesnot match ')</script>";

//   }
// }
?>