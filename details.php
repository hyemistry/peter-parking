<?php

include('config/db_connect.php');

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM user_info WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
    }{
        echo 'query error: ' . mysqli_error($conn);
    }
}


if(isset($_GET['id'])){
       
        $id = mysqli_real_escape_string($conn, $_GET['id']);
       
        $sql = "SELECT * FROM user_info WHERE id = $id";

        $result = mysqli_query($conn, $sql);
        $slotdetails = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
    <?php include('templates/header.php'); ?>
    <!-- yo, please put a design, maybe some formatting on the <p> tags or sum shi, like centralize or add butterflies whatever you want. You can also make the p tags become h4 or whatnot, and also columns, go buns buns bro -->
    <div class="container center" style = "margin-top: 10em">
        <?php if($slotdetails): ?>
        <h4><?php echo htmlspecialchars($slotdetails['username']); ?></h4>
        <p>Date in: <?php echo htmlspecialchars($slotdetails['date']); ?></p>
        <p>Date out: <?php echo htmlspecialchars($slotdetails['date2']); ?></p>
        <p>time-in:  <?php echo htmlspecialchars($slotdetails['time_in']); ?></p>
        <p>time-in:  <?php echo htmlspecialchars($slotdetails['time_out']); ?></p>
        <p>Date reserved: <?php echo htmlspecialchars($slotdetails['created_at']); ?></p>
        <p>Type of Vehicle: <?php echo htmlspecialchars($slotdetails['type']); ?></p>
        <p>Color of Vehicle: <?php echo htmlspecialchars($slotdetails['color']); ?></p>
        <p>Plate number: <?php echo htmlspecialchars($slotdetails['plate_number']); ?></p>
        <p>Brand:  <?php echo htmlspecialchars($slotdetails['brand']); ?></p>
        <!-- btw, make these 'slot' and 'code' text like big, like pretty big yknow? maybe make some columns and put it on the right side of the screen and delete the labels like parking code while the other datas are on the left side -->
        <p>Parking Code: <?php echo htmlspecialchars($slotdetails['code']); ?></p>
        <p>Parking Slot: <?php echo htmlspecialchars($slotdetails['slot']); ?></p>


        <form action ="details.php" method = "POST">
            <input type = "hidden" name = "id_to_delete" value = "<?php echo $slotdetails['id']?>">
            <input type="submit" name = "delete" value = "Delete" class = "btn brand z-depth-0">
        </form>
        






        <?php else : ?>
            <h5>No such account exists!</h5>
        <?php endif; ?>




        </div>
        <!-- just for spacing lmao -->
        <br>
        <br>
        <br>

        <?php include('templates/footer.php'); ?>
</html>