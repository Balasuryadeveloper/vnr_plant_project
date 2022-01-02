<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="shortcut icon" type="image" href="gct1.png">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/15b077b312.js" crossorigin="anonymous"></script>
    
<style>
    form{
        margin-top:20px;
        padding:20px 10px;
        border:1px solid lightgray;
        border-radius: 30px;
        height:370px;
        width:400px;
        background:rgba(255,255,255,.5);
        
    }

</style>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3 col-sm-3"></div>
            <div class="col-md-6 col-sm-6">
                <center><img src="logo.png" alt="" class="img-fluid"></center>
            </div>
            <div class="col-md-3 col-sm-3"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6">
               <center>
               <form action="index.php" method="post">
        <table>
            
     <tr>
         <td class="py-4"><b style="font-size:20px;">User Name </b><span style="color:red;">*</span></td><td><input type="text" class="form-control" placeholder="Enter Your Name" name="name" autocomplete="off"></td>
     </tr>
     <tr>
         <td  class="py-4"><b style="font-size:20px; ">Password </b></span><span style="color:red;">*</span></td>
         <td><input type="password" class="form-control mx-1" placeholder="Enter Your Password" name="password" id="myInput">
         </td>
     </tr><br><br>
     <tr>
         <!-- <td ><center><button class="btn btn-success float-end" name="save">Register</button> -->
         <td  class="py-3" colspan="2"><center><button class="btn btn-primary" name="login" style="width:100px;">login</button></center></td>
     </tr>
    </table>
        </form>
               </center> 
        </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>


<?php 
$con = new mysqli("localhost","root","","vnr");

// if(isset($_POST['save'])){
//     $name = $_POST['Name'];
//     $psw = $_POST['Password'];
//     $sql = "INSERT INTO person(Name,Password) VALUES('$name','$psw')";
//     if($con->query($sql))
//     {
//         echo "<script>alert('Registration Successfully Completed')</script>";
//         header("Location:dashboard.php");
//     }
//     else
//     {
//         echo "<script>alert('Registration Failed')</script>";
//     }
// }


if(isset($_POST['login']))
{
    $name = $_POST['name'];
    $psw = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE name='$name'and password='$psw'";
    $result=mysqli_query($con,$sql);
    if(!empty($name) and !empty($psw))
    {
    if(mysqli_num_rows($result)==0)
    {
        echo "<script>alert('User Name Or Password Is Wrong')</script>";
    }
    else
    {
        header("Location:dashboard.php");
    }
    }
    else
    {
        echo "<script>alert('Please Fill All the Field')</script>";
    }
}


?>
<?php
// error_reporting(E_ERROR | E_PARSE);
// $name = $_POST['name'];
// $psw = $_POST['password'];
//  $_SESSION['name']=$name;
//  $_SESSION['password']=$psw;
?>