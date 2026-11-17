<?php

include('config/db_connect.php');

$username = $password = $id = '';

$errors = array('username' => '', 'password' => '', 'general' => '');

if(isset($_POST['submit'])){

    if(empty($_POST['username'])){
        $errors['username'] = 'A username is required <br/>';
      } else {
    
      }

    if(empty($_POST['password'])){
        $errors['password'] = 'A password is required <br/>';
    } else {

    }

    $sql = 'SELECT * FROM user_info';

    $result = mysqli_query($conn, $sql);

    $user_info = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    foreach($user_info as $userinfo){
        if($userinfo['username'] == $_POST['username'] && $userinfo['password'] == $_POST['password']){
            $id = $userinfo['id'];
            header("Location: details.php?id=$id");

        }else{
            if ($userinfo['username'] == $_POST['username'] && $userinfo['password'] != $_POST['password']){
                $errors['general'] = 'You may have entered the wrong password or username. Try again!';
            }{

            }
            if ($userinfo['username'] != $_POST['username'] && $userinfo['password'] == $_POST['password']){
                $errors['username'] = 'There is no such username.';
            }{
                
            }
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php include('templates/alt_header.php'); ?>

<!-- Just the header without the button below -->
<header>
    <nav class="white">
        <div class="container">
            <a href="index.php"><img src="stuff/photos/logo.png" alt="ParkUp"></a>

                <a href="#" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons">menu</i>
                </a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <!-- <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li> -->
                    <button id="hotdog" class="btn" style="
                    background-color: #268ad6; border-radius: 1em; margin-left: 1em;">
                        <li><a href="parking.php" style="color: white; font-family: 'montserrat-light';">Park Now!</a></li>
                    </button>
                </ul>
            </div>
            
        <ul class="sidenav" id="mobile-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="reservation.php">Reservation</a></li>
        </ul>
    </nav>
</header>


    <section style = "padding-top: 10em">
    </section>

    <div class="container center" style = "margin-top: 2em; margin-bottom: 1em;">
    <h4 style = "font-family: montserrat-light">Your reservation details:</h4>
    </div>


<!-- The forms for user detail request-->

<div class="container" style = "margin-bottom: 14em">
    <form action="reservation.php" method = "POST">


        <div class="row">
            <div class="col s6 input-field">
                <i class="material-icons prefix icon_orange">account_circle</i>
                <input type="text" name = "username" value = <?php echo $username?>>
                <label>Username:</label>
                <div class="red-text"><?php echo $errors['username']; ?></div>
            </div>
            <div class="col s6 input-field">
                <i class="material-icons prefix icon_orange">lock</i>
                <input type="text" name = "password" value = <?php echo $password?>>
                <label>Password:</label>
                <div class="red-text"><?php echo $errors['password']; ?></div>
            </div>
        </div> 


            <div class="red-text"><?php echo $errors['general']; ?></div>


    <div class="center" style = "margin-top: 2em">
        <button class="btn waves-effect waves-light" type="submit" name="submit" value = "submit">Submit
            <i class="material-icons right icon-green">send</i>
        </button>
    </div>


    </form>
</div>

    

 <?php include('templates/footer.php'); ?>
       
<html>