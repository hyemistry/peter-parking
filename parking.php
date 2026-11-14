<?php 
include('config/db_connect.php');
   $username = $password = $date = $date2 = $time_in = $time_out = $type = $color = $plate_number = $brand = $code = $slot = '';

   $errors = array('username' => '', 'password' => '', 'date' => '', 'date2' => '', 'time_in' => '', 'time_out' => '', 'type' =>'', 'color' => '', 'plate_number' => '', 'brand' => '', 'code' => '', 'slot' => '');

   // not finished yet, just need the parking lot design
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
         if(!preg_match("^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$", $password)){
            $errors['password'] = 'Password must have a minimum of eight characters, at least one letter and one number.';
         }
      }

      if(empty($_POST['date'])){
         $errors['date'] = 'A date is required <br/>';
      } else {
         $date =  $_POST['date'];
         $date_compare = date("Y/m/d");
         if($date <= $date_compare){
            $errors['date'] = 'Date must not be before present date.';
         }else {
            // lmao, would be funny if they set the date far into the future
         }
      }

      if(empty($_POST['date2'])){
         $errors['date2'] = 'A date is required <br/>';
      } else {
         $date2 =  $_POST['date2'];
         $date_compare2 = date("Y/m/d");
         if($date2 <= $date_compare){
            $errors['date'] = 'Date must not be before present date.';
         }else {
            // lmao, would be funny if they set the date far into the future
         }
      }

       if ($date >= $date2){
         $errors['date2'] = 'End of reservation cannot be earlier than start of reservation.';
         $errors['date'] = 'Start of reservation cannot be later than start of reservation.';
      }else{

      }

      if(empty($_POST['time_in'])){
         $errors['time_in'] = 'Time-in is required <br/>';
      } else {
         $time_in =  $_POST['time_in'];
      }

      if(empty($_POST['time_out'])){
         $errors['time_out'] = 'Time-out is required <br/>';
      } else {
         $time_out =  $_POST['time_out'];
      }

      if ($time_in >= $time_out){
         $errors['time_in'] = 'Time-in cannot be more than time-out';
         $errors['time_out'] = 'Time-out cannot be more than time-in';
      }else{
         $sql1 = "SELECT time_in, time_out, 'date', date2 FROM user_info ORDER BY created_at";

         $result1 = mysqli_query($conn, $sql1);

         $user_infos1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

         mysqli_free_result($result1);

         foreach($user_infos1 as $user_info1){
            if ($date == $user_info1['date'] && $time_out >= $user_info1['time_in'] && $time_in <= $user_info1['time_out'] && $date >= $user_info1['date2'] && $date2 <= $user_info1['date']){
               $errors['date'] = 'This date slot is already reserved';
               $errors['date2'] = 'This date slot is already reserved';
               $errors['time_in'] = 'This time slot is already reserved';
               $errors['time_out'] = 'This time slot is already reserved';
               $errors[''] = 'This time slot is already reserved';
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

<!-- GO AHEAD BOSS DO WHATEVER U WANT -->
<!--bruh-->

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
                        <li><a href="reservation.php" style="color: white; font-family: 'montserrat-light';">Active Reservations</a></li>
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

<!-- Empty, so that theres space above the rows -->
<section style = "margin-top: 6em">
</section>

<div class="container center">
   <h4 style = "font-family:'montserrat-light'">User Details</h4>
</div>

<section class="container" style = "margin-top: 3em">
   <form action="parking.php" class="white" method = "POST">
   
      <div class="row">
         <div class="col s6">
            <label>Username:</label>
            <input type="text" name = "username" value = <?php echo $username?>>
         </div>
         <div class="col s3">
            <label>Start of Reservation:</label>
            <input type="date" name = "date" value = <?php echo $date?>>
         </div>
         <div class="col s3">
            <label>End of Reservation:</label>
            <input type="date" name = "date2" value = <?php echo $date2?>>
         </div>
      </div>

      <div class="row">
         <div class="col s6">
            <label>Password:</label>
            <input type="text" name = "password" value = <?php echo $password?>>
         </div>
         <div class="col s3">
            <label>Time-in:</label>
            <input type="time" name = "time_in" value = <?php echo $time_in?>>
         </div>
         <div class="col s3">
            <label>Time-out:</label>
            <input type="time" name = "time_out" value = <?php echo $time_out?>>
         </div>
      </div>

<div class="container center">
   <h4 style = "font-family:'montserrat-light'">Car Details</h4>
</div>

      <div class="container" style = "margin-top: 3em">
      <label>Type of Vehicle:</label>
      <input type="text" name = "type" value = <?php echo $type?>>

      <label>Color of Vehicle:</label>
      <input type="text" name = "color" value = <?php echo $color?>>

      <label>Plate number:</label>
      <input type="text" name = "plate_number" value = <?php echo $plate_number?>>

      <label>Brand/NA:</label>
      <input type="text" name = "brand" value = <?php echo $brand?>>
      </div>

      <div class="center" style = "margin-top: 2em">
         <input type="submit" name = "submit" value = "submit" class= "btn z-depth-0">
      </div>
   </form>

</section>
 
<!-- Boss, I need ya to put the parking lot buttons/map below here! even just a columns of like parking lot buttons would do. imma set the value for the buttons so it can match up with the database. also if you wanna go and beautify the form above, please do so, i succ at html lmaoaoao-->

<!-- couldnt figure out why the section couldnt get bottom margin so i just made a br lmao -->
<div class="gap">
   <br>
   <br>
</div>

<?php include('templates/footer.php'); ?>

<html>