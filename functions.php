<?php


function check_login($conn)
{
//checks if user session exists then returns user data
    if(isset($_SESSION['student_number']))
    {
        $id = $_SESSION['student_number'];
        $query = "select * from students where student_number = '$id' limit 1";

        $result = mysqli_query($conn,$query);
        if ($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);

            return $user_data;
        }

    }

//if not redirects to login pages
//redirect to login
header("Location: login.php");
die;
}

