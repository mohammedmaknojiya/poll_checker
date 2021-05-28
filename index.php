<?php
include './db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Live Poll</title>
  </head>
  <body>
    <h1 class="text-center py-2 mb-5 bg-info">Live Poll</h1>
    

    <!----Poll Options--->
    <div class="container border border-2 px-5 py-5">
        <form method="post" id="poll_form" action="index.php">
                <h3>Who is your favorite author?</h3>
                <br />
                <div class="radio">
                    <label><h4><input type="radio" name="poll_option" class="poll_option" value="1" /> Miguel de Cervantes</h4></label>
                </div>
                
                <div class="radio">
                    <label><h4><input type="radio" name="poll_option" class="poll_option" value="2" /> Charles Dickens</h4></label>
                </div>
                <div class="radio">
                    <label><h4><input type="radio" name="poll_option" class="poll_option" value="3" /> J.R.R. Tolkien</h4></label>
                </div>
                <div class="radio">
                    <label><h4><input type="radio" name="poll_option" class="poll_option" value="4" /> Antoine de Saint-Exuper</h4></label>
                </div>
                
                <br />
                <div class="mb-3">
                   <h4><label >Email address</label></h4> 
                    <input type="email"  style="width:350px; height:35px;border-radius:10px;" placeholder="name@example.com" name="user_email">
                </div>
                <button type="submit" class="btn btn-primary" name="btnclick">Submit !</button>
        </form>
        <br>
        <a  href="results.php"> <button  class="btn btn-primary"  >Check Poll Results !</button></a>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<!----------------------php code ------------------------------------->
<?php

if (isset($_POST["btnclick"]))
{
    $user_email=$_POST["user_email"];
    $poll_option=$_POST["poll_option"];

    //for checking already exist user
    $query = "SELECT `email_id` FROM `poll_table` WHERE email_id= '$user_email' ";

    $query_run = mysqli_query($connect,$query);
    if($query_run)
    {
        if(mysqli_num_rows($query_run)>0){
            echo '<script type="text/javascript">alert("User Already Responded")</script>';
        }
        else{
            $query = "INSERT INTO `poll_table`(`email_id`, `option_select`) VALUES ('$user_email','$poll_option')";

            $query_run = mysqli_query($connect,$query);
            if($query_run){
                echo '<script type="text/javascript">alert("Your Response Is Added")</script>';
            }
            else{
                echo '<script type="text/javascript">alert("User Already Responded")</script>';
            }

        }

    }

}
?>