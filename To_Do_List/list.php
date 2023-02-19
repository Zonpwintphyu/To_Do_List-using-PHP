<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
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
        width: 140px;
        
    }
    .a1:hover{
        color: black;
        box-shadow: 0px 0px 4px 4px white ;
    }
    .a1 a{
       color: rgb(245, 96, 66); 
    }

    small{
        color: aqua;
        margin: 80px;
        
    }
</style>
</head>
<body>
<div class="bg-image" 
     style="background-image: url('./images/php3.jpg');
            height: 100vh">
    <div class="container m-4 ">
        <div class=" ">
            <form method="post">
            <h3 class="text-center fw-bold m-3 text-light fs-1">To Do List</h3>
            <div class="form text-light fw-bold">
                
                <label class="fs-3">Your Tasks</label>
                <div class="m-3 col-lg-6">
                <input type="text" name="taskName" placeholder="Enter your tasks..." class="form-control text-warning hover-shadow bg-dark">
                </div>
                <button name="btn" class="btn btn-success ms-4">Add</button>
            </div>
            
            </form>
        </div>
    </div>
    <?php
    require_once('db_connection.php');
    if(isset($_POST['btn'])){
        $taskName = $_POST['taskName'];

        if($taskName == "" || $taskName == null){
            echo "<small >Message required</small>";
        }else{
        $sql = " INSERT INTO `list`(`task`) VALUES ('[$taskName]')";

        if(mysqli_query($conn,$sql)){
                header("location:./read.php");
        }else{
            echo "Query Fail...";
        }}
    }
    ?>
</div>
</body>
</html>