<?php
session_start();
include('connection.php');?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
       <?php
      if(isset($_GET['id'])){
         $del=$_GET['id'];
        $up_row=mysqli_query($con,"SELECT * FROM `cetegory` WHERE id=$del");
        $up_query=mysqli_fetch_array($up_row);

      }
        ?> 
 
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">name</label>
              <input type="text" name="txtname" id="" value="<?php echo  $up_query[1]?>" class="form-control" placeholder="" aria-describedby="helpId" >
          
              
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <input type="text" name="txtdescription" id="" value="<?php echo $up_query[2]?>"  class="form-control" placeholder="" aria-describedby="helpId" >
              
            </div>
            <input type="text" class="form-control" value="<?php echo $up_query[3]?>" >
            <div class="form-group">

             <input type="file" name="cimage"  class="form-control">
            </div>
            <div class="form-group">
            <input type="submit" value="update" class="btn btn-info" name="btn_update">
            </div>
        </form>
        </div>
  </body>
</html>
<?php

 if(isset($_POST['btn_update'])){
  $name=$_POST['txtname'];
  $des=$_POST['txtdescription'];
  $image=$_FILES['cimage']['name'];
  $tamp_imagename=$_FILES['cimage']['tmp_name'];
  $desination="img/".$image;
  $extension=pathinfo($image , PATHINFO_EXTENSION);
  if($extension=='png' || $extension=='jpeg' || $extension=='jpg'){
      if(move_uploaded_file($tamp_imagename, $desination)){
$query=mysqli_query($con,"UPDATE `cetegory` SET `name`=' $name',`descripton`=' $des',`image`='  $image' WHERE id=$del");           
if($query){
              
                  echo"<script>alert('updated ')
                  location.assign('View_cetegory.php');</script>";
          
          }
         
        
      
      else{
          
        echo"<script>alert('update error ')</script>";
      }
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
