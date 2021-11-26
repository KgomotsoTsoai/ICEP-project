<?php

include("connection.php");
include("functions.php");

$query="select departure, book_dt, arrival from bookings"; 
$result = mysqli_query($conn, $query); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style text="text/css">
:root {
    --primary: #ddd;
    --dark: #000000;
    --light: #FFFFFF;
    --blue: #0995c4;
    --success: #008000;
    --error: #FF0000;
    --border-radius: 4px;
    --light-gray: #dddddd;
}

* {
  font-family: sans-serif; /* Change your font family */
}

nav {
    width:100%;
    min-width:100%;
    height: 60px;
    background-color: var(--blue);
    font-size: 21px;
    display: flex;
    flex-wrap: wrap;
    text-align:center;
    justify-content: center;
}

ul {
    list-style: none;
    display: flex;
    justify-content: center;
}

li a 
{
    text-decoration: none;
    color: black;
    cursor: pointer;
    margin-right: 60px;
}

h1 
{
    text-align: center;
}

.container {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 21px;
  min-width: 200px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.container thead {
  background-color: var(--blue);
  color:  black;
  text-align: left;
  font-weight: bold;
  height: 50px;
  width: 70px;
}

.container th,
.container td {
  padding: 12px 15px;
}

.container .data {
  border-bottom: 1px solid #dddddd;
}

.container tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.container .data {
  border-bottom: 2px solid #009879;
}

.container .data{
  font-weight: bold;
  color: #009879;
}


</style>

<body class="bg-dark">

<nav>
    <ul>
        <li><a>216756304</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>

<br>

<h1>Booking History</h1>

<br>

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td> Departure </td>
                                <td> Booking Date & Time </td>
                                <td> Arrival </td>
                            </tr>
                            </thead>
                            <?php 
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $departure = $row['departure'];
                                $book_dt = $row['book_dt'];
                                $arrival = $row['arrival'];
                            ?>
                            <tr class="data">
                                        <td><?php echo $departure ?></td>
                                        <td><?php echo $book_dt ?></td>
                                        <td><?php echo $arrival ?></td>
                                        <td><a href="#" class="btn btn-pencil">Edit</a></td>
                                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>