<?php 
// session_start();
// $con=new mysqli("localhost","root","","vnr");
// $sql="SELECT * FROM admin";
// $res=mysqli_query($con,$sql);
// $row=mysqli_fetch_assoc($res);
// extract($_REQUEST);
// $name=$row['name'];
// $psw=$row['password'];
// if(!empty($_SESSION['Name']==$name and $_SESSION['Password']==$psw)){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../sidebar/style.css">
    <title>முகப்பு - Dashboard</title>
    <link rel="shortcut icon" type="image" href="../pp.jpg">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
        span{
            color:red;
        }
        form{
        border-radius: 20px;
        padding-top: 20px;
        padding-bottom: 20px;
        padding-left: 20px;
        padding-right: 20px;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <center>Title</center>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                
                <li>
                <a href="add_tree.php">Trees and Benifits</a>
                </li>
                <li>
                    <a href="add_plant.php">Add Plant</a>
                </li>
                <li>
                    <a href="planted.php">Planted</a>
                </li>

                <li>
                    <a href="index.php">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn" style="background: #202d64;color: #fff;">
                        <i class="fas fa-align-left"></i>
                        <font>Toggle Sidebar</font>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
        
                </div>
            </nav>
            
            <div class="container mt-5">
            <form method='post' action='add_plant.php' class="row g-3 shadow-lg">
            <?php 
                    $con=new mysqli("localhost","root","","vnr");
            
                    $sql="SELECT DISTINCT treename FROM tree_details";
                    echo "<div class='col-md-12 col-sm-12 mb-2'>
                    <label class='mb-2'>Tree's Name <span>*</span></label>
                    <select name='treename' class='form-control'>
                    <option>-- Select --</option>";
                    $result=mysqli_query($con,$sql);
                    if($result)
                    {
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $treename=$row['treename'];
                            echo "
                            <option value='$treename'>$treename</option>
                        ";
                        }
                    } ?>
                        </select>
                        </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label for="count">Purchesed <span style="color:red">*</span></label>
                <input type="number" name="count" class="form-control" required placeholder="Enter Here" autocomplete="off" id="count">
                </div>
                <div class="col-md-6 col-sm-6 mb-2">
                    <label for="date">Date <span style="color:red">*</span></label>
                <input type="date" name="date" class="form-control" required value="<?php echo date('Y-m-d');?>">
                </div>
                <div class="col-md-12 col-sm-12 mb-2">
                
                <input type='submit' name='submit' style="background: #202d64;color: #fff; float:right;" class="btn" value='Save'>
                </div>
               </form>
            </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>


<?php 
 $con=new mysqli("localhost","root","","vnr");
 if(isset($_POST['submit'])){

  $treename=$_POST['treename'];
  $count=$_POST['count'];
  $date=date("Y-m-d",strtotime($_POST['date']));
   $sql="INSERT INTO add_plant(treename,count,date) VALUES('$treename','$count','$date')";
   $result=mysqli_query($con,$sql);
  } 
 ?>

<?php
// }
// else{
//     header("Location:index.php");
// }
?>