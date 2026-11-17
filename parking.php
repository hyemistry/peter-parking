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
         if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)){
            $errors['password'] = 'Password must have a minimum of eight characters, one uppercase letter, one lowercase letter, and one number.';
         }
      }

      if(empty($_POST['date'])){
         $errors['date'] = 'A date is required <br/>';
      } else {
         $date =  $_POST['date'];
         $date_compare = date("Y-m-d");
         if($date < $date_compare){
            $errors['date'] = 'Date must not be before present date.';
         }else {
         }
      }

      if(empty($_POST['date2'])){
         $errors['date2'] = 'A date is required <br/>';
      } else {
         $date2 =  $_POST['date2'];
         $date_compare2 = date("Y-m-d");
         if($date2 < $date_compare2){
            $errors['date2'] = 'Date must not be before present date.';
         }
            // lmao, would be funny if they set the date far into the future
      }

      if ($date > $date2){
         $errors['date2'] = 'End of reservation cannot be earlier than start of reservation.';
         $errors['date'] = 'Start of reservation cannot be later than start of reservation.';
      }else{

      }

      if(empty($_POST['slot'])){
         $errors['slot'] = 'Parking slot is required <br/>';
      } else {
         $slot = $_POST['slot'];
      }

      if ($_POST['time_in'] >= $_POST['time_out']){
         $errors['time_in'] = 'Time-in cannot be more or the same as time-out';
         $errors['time_out'] = 'Time-out cannot be more or the same as time-in';
      }

      if(empty($_POST['time_in'])){
         $errors['time_in'] = 'Time-in is required <br/>';
      } else {
         $time_in = $_POST['time_in'];
      }

      if(empty($_POST['time_out'])){
         $errors['time_out'] = 'Time-out is required <br/>';
      } else {
         $time_out =  $_POST['time_out'];
      }
      
      if(empty($_POST['type'])){
         $errors['type'] = 'A vehicle type is required <br/>';
      } else {
         $type = $_POST['type'];
         if(!preg_match('/^[a-zA-Z\s]+$/', $type)){
            $errors['type'] = 'Vehicle type must contain letters and spaces only.';
         }
      }

      if(empty($_POST['color'])){
         $errors['color'] = 'A vehicle color is required <br/>';
      } else {
         $color = $_POST['color'];
         if(!preg_match('/^[a-zA-Z\s]+$/', $color)){
            $errors['color'] = 'Color must contain letters and spaces only.';
         }
      }

      if(empty($_POST['plate_number'])){
         $errors['plate_number'] = 'A plate number is required <br/>';
      } else {
         $plate_number = $_POST['plate_number'];
         if(!preg_match('/^[a-zA-Z0-9]{3,16}$/', $plate_number)){
            $errors['plate_number'] = 'Plate number must be alphanumeric only.';
         }
      }

      if(empty($_POST['brand'])){
         $errors['brand'] = 'A vehicle brand is required <br/>';
      } else {
         $brand = $_POST['brand'];
         if(!preg_match('/^[a-zA-Z\s]+$/', $brand)){
            $errors['brand'] = 'Brand must contain letters and spaces only';
         }
      }

      function generateRandomString($length = 10) {
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';

      for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[random_int(0, $charactersLength - 1)];
      }
      return $randomString;
      }

      $code = generateRandomString(7);

      // code for overlap
      $sql1 = "SELECT time_in, time_out, 'date', date2, slot FROM user_info ORDER BY created_at";

         $result1 = mysqli_query($conn, $sql1);

         $user_infos1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

         mysqli_free_result($result1);

         foreach($user_infos1 as $user_info1){
            if ($slot == $user_info1['slot'] && $time_out >= $user_info1['time_in'] && $time_in <= $user_info1['time_out'] && $date >= $user_info1['date2'] && $date2 <= $user_info1['date']){
               $errors['date'] = 'Please pick another time slot for this date.';
               $errors['date2'] = 'Please pick another time slot for this date.';
               $errors['time_in'] = 'This time slot is already reserved.';
               $errors['time_out'] = 'This time slot is already reserved.';
               $errors['slot'] = 'This parking space at this time slot is already reserved';
            }
         }

      if(array_filter($errors)){
        
      }else{

            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $time_in = mysqli_real_escape_string($conn, $_POST['time_in']);
            $time_out = mysqli_real_escape_string($conn, $_POST['time_out']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $color = mysqli_real_escape_string($conn, $_POST['color']);
            $plate_number = mysqli_real_escape_string($conn, $_POST['plate_number']);
            $brand = mysqli_real_escape_string($conn, $_POST['brand']);
            $date = mysqli_real_escape_string($conn, $_POST['date']);
            $date2 = mysqli_real_escape_string($conn, $_POST['date2']);
            $slot = mysqli_real_escape_string($conn, $_POST['slot']);

            $sql = "INSERT INTO user_info(username, password, date, date2, time_in, time_out, type, color, plate_number, brand, code, slot) VALUES('$username', '$password',  '$date', ' $date2',  '$time_in',  '$time_out',  '$type', ' $color',  '$plate_number', ' $brand',  '$code', '$slot')";
            
            if(mysqli_query($conn, $sql)){
               header('Location: reservation.php');
            }else{
               echo 'query error: ' . mysqli_error($conn);
            }
        }

}
   
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link rel="stylesheet" href="style.css">

<?php include('templates/alt_header.php'); ?>

<style>
   input{
      caret-color: #268ad6;
      border: none;
   }

   input::placeholder{
      font-family: 'montserrat-light';
      color: grey;
   }




</style>

<!-- GO AHEAD BOSS DO WHATEVER U WANT -->
<!--bruh-->

<!-- <header>
    <nav class="white">
        <div class="container">
            <a href="index.php"><img src="stuff/photos/logo.png" alt="ParkUp"></a>

                <a href="#" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons">menu</i>
                </a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
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
</header> -->

<!-- Empty, so that theres space above the rows -->
<section style = "margin-top: 6em">
</section>

<div class="container center">
   <h4 style = "font-family:'montserrat-light'">User Details</h4>
</div>

<section class="container" style = "margin-top: 3em">
   <form action="parking.php" class="white" method = "POST">
   
      <div class="row">
         <div class="col s6 input-field">
            <i class="material-icons prefix icon_orange">account_circle</i>
            <input type="text" name = "username" value = <?php echo $username?>>
            <label>Username:</label>
            <div class="red-text"><?php echo $errors['username']; ?></div>
         </div>
         <div class="col s3">
            <label>Start of Reservation:</label>
            <input type="date" name = "date" value = <?php echo $date?>>
            <div class="red-text"><?php echo $errors['date']; ?></div>
         </div>
         <div class="col s3">
            <label>End of Reservation:</label>
            <input type="date" name = "date2" value = <?php echo $date2?>>
            <div class="red-text"><?php echo $errors['date2']; ?></div>
         </div>
      </div>

      <div class="row">
         <div class="col s6 input-field">
            <i class="material-icons prefix icon_orange">lock</i>
            <input type="text" name = "password" value = <?php echo $password?>>
            <label>Password:</label>
            <div class="red-text"><?php echo $errors['password']; ?></div>
         </div>
         <div class="col s3">
            <label>Time-in:</label>
            <input type="time" name = "time_in" value = <?php echo $time_in?>>
            <div class="red-text"><?php echo $errors['time_in']; ?></div>
         </div>
         <div class="col s3">
            <label>Time-out:</label>
            <input type="time" name = "time_out" value = <?php echo $time_out?>>
            <div class="red-text"><?php echo $errors['time_out']; ?></div>
         </div>
</section>

<div class="container center">
   <h4 style = "font-family:'montserrat-light'">Car Details</h4>
</div>

<div class="container" style = "margin-left: auto margin-right: auto">

   <div class="row">
      <div class="col s6 input-field">
         <label>Type of Vehicle:</label>
         <input type="text" name = "type" value = <?php echo $type?>>
         <div class="red-text"><?php echo $errors['type']; ?></div>
      </div>
      <div class="col s6 input-field">
         <label>Color of Vehicle:</label>
         <input type="text" name = "color" value = <?php echo $color?>>
         <div class="red-text"><?php echo $errors['color']; ?></div>
      </div>
   </div>
   
   <div class="row">
      <div class="col s6 input-field">
         <label>Plate number:</label>
         <input type="text" name = "plate_number" value = <?php echo $plate_number?>>
         <div class="red-text"><?php echo $errors['plate_number']; ?></div>
      </div>
      <div class="col s6 input-field">
         <label>Brand/Not Applicable:</label>
         <input type="text" name = "brand" value = <?php echo $brand?>>
         <div class="red-text"><?php echo $errors['brand']; ?></div>
      </div>
   </div>

   <div class = "container center">
      <h4 id= "slot_title" style = "font-family:'montserrat-light'">Parking Spaces</h4>
      <div class="red-text"><?php echo $errors['slot']; ?></div>
   </div>
   

   <!-- <div>
      <img id = "parkinglot" src="stuff/photos/parkinglot.png" alt="car">
   </div> -->

   <div class="container">
      <div class="row">
         <div class="col s4">
            <img id = "parkinglot" src="stuff/photos/parkinglot.png" alt="car" class="responsive-img">
         </div>
      </div>
   </div>

   <br/>
   <br/>
   <br/>

   <div class="row" style="margin-left: 5em;">
      <div class="input-field col s1" style = "margin-top: 2em">
      <p>
      <label for = "A1">
         <input name="slot" type="radio"  id = "A1" value="A1" <?php echo ($slot == 'A1') ? 'checked' : ''; ?>/>
            <span>A1</span>
         </label>
      </p>
      <p>
      <label for = "B1">
         <input name="slot" type="radio"  id = "B1" value="B1" <?php echo ($slot == 'B1') ? 'checked' : ''; ?>/>
            <span>B1</span>
         </label>
      </p>
      <p>
      <label for = "C1">
         <input name="slot" type="radio"  id = "C1" value="C1" <?php echo ($slot == 'C1') ? 'checked' : ''; ?>/>
            <span>C1</span>
         </label>
      </p>
      <p>
      <label for = "D1">
         <input name="slot" type="radio"  id = "D1" value =  value="D1" <?php echo ($slot == 'D1') ? 'checked' : ''; ?>/>
            <span>D1</span>
         </label>
      </p>
   </div>


   <div class="input-field col s1" style = "margin-top: 2em">
      <p>
      <label for = "A2">
         <input name="slot" type="radio"  id = "A2" value="A2" <?php echo ($slot == 'A2') ? 'checked' : ''; ?>/>
            <span>A2</span>
         </label>
      </p>
      <p>
      <label for = "B2">
         <input name="slot" type="radio" id = "B2" value="B2" <?php echo ($slot == 'B2') ? 'checked' : ''; ?>/>
            <span>B2</span>
         </label>
      </p>
      <p>
      <label  for = "C2">
         <input name="slot" type="radio"  id = "C2" value="C2" <?php echo ($slot == 'C2') ? 'checked' : ''; ?>/>
            <span>C2</span>
         </label>
      </p>
      <p>
      <label for = "D2">
         <input name="slot" type="radio"  id = "D2" value="D2" <?php echo ($slot == 'D2') ? 'checked' : ''; ?>/>
            <span>D2</span>
         </label>
      </p>
   </div>


   <div class="input-field col s1" style = "margin-top: 2em">
      <p>
      <label for = "A3">
         <input name="slot" type="radio" id = "A3" value="A3" <?php echo ($slot == 'A3') ? 'checked' : ''; ?>/>
            <span>A3</span>
         </label>
      </p>
      <p>
      <label for = "B3">
         <input name="slot" type="radio"  id = "B3" value="B3" <?php echo ($slot == 'B3') ? 'checked' : ''; ?>/>
            <span>B3</span>
         </label>
      </p>
      <p>
      <label for = "C3">
         <input name="slot" type="radio" id = "C3" value = value="C3" <?php echo ($slot == 'C3') ? 'checked' : ''; ?>/>
            <span>C3</span>
         </label>
      </p>
      <p>
      <label for = "D3">
         <input name="slot" type="radio" id = "D3" value="D3" <?php echo ($slot == 'D3') ? 'checked' : ''; ?>/>
            <span>D3</span>
         </label>
      </p>
   </div>


   <div class="input-field col s1" style = "margin-top: 2em">
      <p>
      <label for = "A4">
         <input name="slot" type="radio"  id = "A4" value="A4" <?php echo ($slot == 'A4') ? 'checked' : ''; ?>/>
            <span>A4</span>
         </label>
      </p>
      <p>
      <label for = "B4">
         <input name="slot" type="radio" id = "B4" value="B4" <?php echo ($slot == 'B4') ? 'checked' : ''; ?>/>
            <span>B4</span>
         </label>
      </p>
      <p>
      <label for = "C4">
         <input name="slot" type="radio"  id = "C4" value="C4" <?php echo ($slot == 'C4') ? 'checked' : ''; ?>/>
            <span>C4</span>
         </label>
      </p>
      <p>
      <label for = "D4">
         <input name="slot" type="radio"  id = "D4" value="D4" <?php echo ($slot == 'D4') ? 'checked' : ''; ?>/>
            <span>D4</span>
         </label>
      </p>

   </div>
   <!-- div row -->
   </div>
 <!-- div container -->
</div>

   <div class="gap" style = "margin-bottom: 3em">
      <br>
      <br>
      <br>
      <br>
   </div>

      <div class="center" style = "margin-top: 2em">
         <button class="btn waves-effect waves-light" type="submit" name="submit" value = "submit">Submit
            <i class="material-icons right icon-green">send</i>
         </button>
      </div>
   </form>
</div>
<!-- couldnt figure out why the section couldnt get bottom margin so i just made a br lmao -->
<div class="gap" style = "margin-bottom: 3em">
   <br>
   <br>
</div>

<?php include('templates/footer.php'); ?>
   
<script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="materialize/js/materialize.min.js"></script>
    <script>
      $(document).ready(function() {
      $('input#input_text, textarea#textarea2').characterCounter();
      });
    </script>
<html>
