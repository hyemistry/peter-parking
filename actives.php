<?php

include('config/db_connect.php');

$username = $password = '';

$errors = array('username' => '', 'password' => '');

if(isset($_POST['submit'])){

    if(empty($_POST['username'])){
        $errors['username'] = 'A username is required <br/>';
      } else {
        $username = $_POST['username'];
        if(!preg_match('/^[a-zA-Z0-9_]{3,16}$/', $username)){
            $errors['username'] = 'Username must be alphanumeric and underscores only.';
        }
      }

    if(empty($_POST['password'])){
         $errors['password'] = 'A password is required <br/>';
      } else {
         $password = $_POST['password'];
         if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)){
            $errors['password'] = 'Password must have a minimum of eight characters, one uppercase letter, one lowercase letter, and one number.';
        }
    }
    //sql query command that gets the whole table
    $sql = 'SELECT * FROM user_info ORDER BY created_at';

    //query variable
    $result = mysqli_query($conn, $sql);

    //makes query into multidimensional associative array
    $user_info = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //removes query from memory
    mysqli_free_result($result);

    foreach($user_info as $userinfo){
        if($userinfo['username'] == $_POST['username'] && $userinfo['password'] == $_POST['password']){
            $username = $_POST['username'];
            $password = $_POST['password'];
        //sql command query, WHERE is used to indicate the row to select * from, where id is equal to the id on the url
            $sql1 = "SELECT * FROM user_info WHERE username = '$username'";
            $result1 = mysqli_query($conn, $sql1);
            $details = mysqli_fetch_assoc($result1);

            mysqli_free_result($result1);
        } else {
            if ($userinfo['username'] == $_POST['username'] && $userinfo['password'] != $_POST['password']){
                $errors['password'] = 'You may have entered the wrong password. Try again!';
            }{

            }
            if ($userinfo['username'] != $_POST['username'] && $userinfo['password'] != $_POST['password']){
                $errors['username'] = 'There is no such username.';
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


    <section style = "padding-top: 4em">
    </section>

    <div class="container center" style = "margin-top: 2em; margin-bottom: 1em;">
    <h4 style = "font-family: montserrat-light">Active Reservations:</h4>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s4">

            </div>
            <div class="col s4">
                <form action="reservation.php">
                    <label>Select a date:</label>
                    <input type="date">
                </form>
            </div>
        </div>
    </div>
    
<div style = "margin-top: 2em">
        <div class="row blue">

            <div class="col s6">
                <div class="container red">
                    <table>
                        <tr>
                            <td>A1</td>
                            <td>A1</td>
                        </tr>
                        <tr>
                            <td>A1</td>
                            <td>A1</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col s6">
                <div class="container red">
                    <table>
                        <tr>
                            <td bgcolor = '#ffc400'>A1</td>
                            <td>A1</td>
                        </tr>
                        <tr>
                            <td>A1</td>
                            <td>A1</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</div>

<!-- The forms for user detail request-->

<div class="container">
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


        <div class="center" style = "margin-top: 2em">
            <button class="btn waves-effect waves-light" type="submit" name="submit" value = "submit">Submit
                <i class="material-icons right icon-green">send</i>
            </button>
      </div>
    </form>
</div>

    <div class="container center">
        <!-- if details exists, print the title, email, and ingredients from id row-->

        <?php if($details): ?>
        <h4><?php echo htmlspecialchars($details['username']); ?></h4>
        <p>Created by: <?php echo htmlspecialchars($details['password']); ?></p>
        <p><?php echo date($details['created_at']); ?> </p>
        <h5>Ingredients: </h5>
        <p><?php echo htmlspecialchars($details['date']); ?> </p>
        <!-- prints if the query for the id does not return anything -->
        <?php else : ?>

        <?php endif; ?>
    </div>

 <?php include('templates/footer.php'); ?>
       
<html>