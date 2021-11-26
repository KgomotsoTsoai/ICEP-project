<?php

//redirects to the home page if not logged in
session_start();

include("connection.php");
include("functions.php");

//checks if user has clicked on the post button

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $student_number = $_POST['student_number'];
    $password = $_POST['password'];

    
    if(!empty($student_number) && !empty($password) && !ctype_alpha($student_number))
    {

        //read from database
        $query = "select * from students where student_number = '$student_number' limit 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password)
                {

                    $_SESSION['student_number'] = $user_data['student_number'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        
        echo "wrong username or password!";
    }else
    {
        echo "wrong username or password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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


body {
    margin: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    background: var(--light);
    background-size: cover;
}

#box {
    width: 400px;
    max-width: 400px;
    margin: 1rem;
    padding: 2rem;
    box-shadow: 0 0 40px rgba(0,0,0,0.2);
    border-radius: var(--border-radius);
    background: var(--light);
}

#box .form__button {
    font: 500 1rem 'Quicksand', sans-serif;
}

.form-link {
    text-decoration: none;
    cursor: pointer;
}

.form__title {
    text-align: center;
}

.form__input-group {
    margin-bottom: 1rem;
}

.form__input {
    display: block;
    width: 100%;
    padding: 0.75rem;
    box-sizing: border-box;
    border-radius: var(--border-radius);
    border: 1px solid var(--light-gray);
    outline: none;
    transition: background 0.2s, border-color 0.2s;
}

.form__button {
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

.form__button:hover {
    background: var(--light);
    border: 1px solid var(--light-gray);
}

</style>

<div id="box">

<form method="post" id="">
<h1 class="form__title">Login</h1>
<div class="form__input-group">
<input type="text" class="form__input" name="student_number" autofocus placeholder="Student Number">
</div>
<div class="form__input-group">
<input type="password" class="form__input" name="password" autofocus placeholder="Pin">
</div>
<!--<input type="submit" value="Login"> -->
<button class="form__button" type="submit" id="loginButton">Login</button><br><br>
<a href="signup.php" class="form-link">Sign Up</a>
</form>

</div>


</body>
</html>