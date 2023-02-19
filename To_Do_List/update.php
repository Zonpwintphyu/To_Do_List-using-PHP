<!-- Get Data => Show => Edit => Update -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
/>
<style>
    .a1{
        
        background-color: wheat;
        border: 1px solid wheat;
        width: 100px;
        
    }
    .a1:hover{
        color: black;
        box-shadow: 0px 0px 4px 4px white ;
    }
    .a1 a{
       color: rgb(245, 96, 66); 
    }

    input{
        border: 2px solid pink;
        width: fit-content;
        
    }
</style>
</head>
<body>
<div class="bg-image" 
     style="background-image: url('./images/php2.jpg');
            height: 100vh">
<?php
require('db_connection.php');
$id = $_GET['id'];
$sql = " SELECT * FROM `list` WHERE Id = $id ";

$query = mysqli_query($conn,$sql); //get data
$data = mysqli_fetch_assoc($query);

if(isset($_GET['updateBtn'])){
    $taskName = $_GET['taskName'];
    if($taskName == null || $taskName == ""){
        echo "<small style ='color: red;'>Required to Fill</small>"; 
    }else{
        require('db_connection.php');
        $updatesql = "UPDATE list SET task= '$taskName' WHERE Id=$id";
        echo "<pre>";
        var_dump($updatesql);
        if(mysqli_query($conn,$updatesql)){
            header("location:./read.php");
        }else{
            echo "Update error...";
        }
    
        };

    
}

?>  
<form action="" method="GET">
    <div class="m-3 text-center fs-2 text-light">
    <a href="./read.php" class="text-light fw-bold">Lists With Data</a>
    </div>
    <label for="text" class="text-light ms-4 fw-bold fs-3 mb-0">Tasks</label>
    
    <input type="hidden" name="id" value="<?php echo $data['Id'];?>" >
    <div class="form-outline-light p-3 ms-3 col-md-4 ">
    <input type="text" name="taskName" value="<?php echo $data['task']; ?>" class="form-control text-warning hover-shadow ">
    </div>
    <button name="updateBtn" class="btn btn-warning  float-start ms-5 mt-0">Update</button>
</form>
</div>
</body>
</html>


  
  
