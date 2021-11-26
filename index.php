<?php

//redirects to the home page if not logged in
session_start();

include("connection.php");
include("functions.php");

//collects users data
//checks whether a user is logged in
$user_data = check_login($conn);

//saves booking to database
if (isset($_POST['save_datetime']))
{
    $departure = $_POST['departure'];
    $book_dt = $_POST['book_dt'];
    $arrival = $_POST['arrival'];

    $query = "insert into bookings (student_number,departure,book_dt,arrival) values ('$student_number','$departure','$book_dt','$arrival')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run)
    {
        $_SESSION['status'] = "Bus Seat Reservation Successful.";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Booking was unsucessfull";
        header("Location: index.php");
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootsrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


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

body 
{
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    
    justify-content: center;
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

.form__button
{
    width: 100%;
    padding: 1rem 2rem;
    font-weight: bold;
    font-size: 1.1rem;
    border: none;
    border-radius: var(--border-radius);
    outline: none;
    cursor: pointer;
    background: var(--blue);
}


.form-section
{
    width: 400px;
    max-width: 400px;
    margin: 1rem;
    padding: 2rem;
    box-shadow: 0 0 40px rgba(0,0,0,0.2);
    border-radius: var(--border-radius);
    background: var(--light);
}

.form-input 
{
    margin-bottom: 1rem;
    margin-top:1rem; 
}

.form-group
{
    margin-bottom: 1rem;
    margin-top:1rem; 
}



</style>


<nav>
    <ul>
    <li><a><?php echo $user_data['student_number']; ?></a></li>
        <li><a href="bookings.php">Bookings</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>




    <br><br><br>

<div class="wrappper">



<section class="form-section">


<form action="" method="POST" class="form">
<h1 class="form__title">Bus Seat Reservation</h1>

<label for="departure">Departure: </label>
<div class="form-input">
<select name="departure" id="departure">
    <option>Select Option</option>
    <option>South Campus</option>
    <option>North Campus</option>
    <option>Pretoria Campus</option>
    <option>Arcadia Campus</option>
</select>
</div>


<div class="form-group">
    <label for="">Booking Date & Time</label>
    <input type="datetime-local" name="book_dt" class="form-control">
</div>


<label for="arrival">Arrival: </label>
<div class="form-input">
<select name="arrival" id="arrival">
    <option>Select Option</option>
    <option>South Campus</option>
    <option>North Campus</option>
    <option>Pretoria Campus</option>
    <option>Arcadia Campus</option>
</select>
</div>
<button class="form__button" type="submit" name="save_datetime" id="submitButton">Submit Booking</button><br><br>

</form>

</section>

<div class="para">
<h3>Please use form above to submit your bus seat reservation</h3>
<p>NB: Bus Time is Every Hour, make sure time has no extra minutes</p>
</div>
</div>

</body>
</html>