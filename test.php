<?php 
include('config/db_connect.php');
    $slot = '';

   $errors = array('slot' => '');

   // not finished yet, just need the parking lot design
   if(isset($_POST['submit'])){

      if(empty($_POST['slot'])){
         $errors['slot'] = 'Parking slot is required <br/>';
      } else {
         $slot = $_POST['slot'];
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<div class="row">
      <div class="input-field col s6" style = "margin-top: 2em">
      <i class="material-icons prefix icon_orange">car_repair</i>
      <select name = "slot">
         <option value=<?php echo $slot?> disabled selected>Choose a parking space:</option>
         <option value = 'A1'>A1</option>
         <option value = 'A2'>A2</option>
         <option value = 'A3'>A3</option>
         <option value = 'A4'>A4</option>
         <option value = 'B1'>B1</option>
         <option value = 'B2'>B2</option>
         <option value = 'B3'>B3</option>
         <option value = 'B4'>B4</option>
         <option value = 'C1'>C1</option>
         <option value = 'C2'>C2</option>
         <option value = 'C3'>C3</option>
         <option value = 'C4'>C4</option>
         <option value = 'D1'>D1</option>
         <option value = 'D2'>D2</option>
         <option value = 'D3'>D3</option>
         <option value = 'D4'>D4</option>
      </select>
         <div class="red-text"><?php echo $errors['slot']; ?></div>
      </div>
   </div>
    
</html>

