<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Data</title>
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
</style>
</head>
<body class="">
<div class="bg-image" 
     style="background-image: url('./images/php1.jpg');
            height: 100vh">

    <div class="" >
        <div class="container">
        <h1 class=" mt-3 text-white fw-bold text-center">*Daily Tasks*</h1>
        </div>
        
        <table class="table mt-5">
            <thead class="text-white text-uppercase bg-danger opacity-2 hover-shadow inner-shadow fs-4" style="--mdb-bg-opacity: .7;">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody class="text-white  bg-warning  opacity-2 fw-bold hover-shadow fs-5" style="--mdb-bg-opacity: .5;">
                
                <?php
                    require_once("db_connection.php");

                    $sql = "SELECT * FROM `list` ";
                    $query = mysqli_query($conn, $sql);
                    $totalrow = mysqli_num_rows($query);
                    
                    
                    while($row = mysqli_fetch_assoc($query)){

                        $date = date("g:i a",strtotime($row['created_at']));
                    echo "
                    <tr>
                        <td>{$row['Id']}</td>
                        <td>{$row['task']}</td>
                        <td>{$date}</td>
                        <td>
                        <div class='a1'>
                            <a href='update.php?id={$row['Id']}' >Update</a> |
                            <a href='delete.php?id={$row['Id']}'>Delete</a>
                        </div>   
                        </td>
                    </tr>
                    ";
                    // var_dump($row["Id"]);
                }


        ?>
        

            </tbody>
        </table>
        <a href="list.php" class="float-end  text-uppercase text-light shadow-strong fw-bold shadow-5"><button class="btn btn-danger m-3">Create tasks</button></a>
        
    </div>

</div>
</body>
</html>