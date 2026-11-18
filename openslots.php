<?php
    // $color = array('A1' => '','A2' => 'blue', 'A3' => 'blue', 'A4' => 'blue', 'B1' => 'blue','B2' => 'blue', 'B3' => 'blue', 'B4' => 'blue', 'C1' => 'blue','C2' => 'blue', 'C3' => 'blue', 'C4' => 'blue', 'D1' => 'blue','D2' => 'blue', 'D3' => 'blue', 'D4' => 'blue' )
    include('config/db_connect.php');

    $date = '';
    $errors = ['date' => ''];
    $slots = array('A1' => '#AAFF00','A2' => '#AAFF00', 'A3' => '#AAFF00', 'A4' => '#AAFF00', 'B1' => '#AAFF00','B2' => '#AAFF00', 'B3' => '#AAFF00', 'B4' => '#AAFF00', 'C1' => '#AAFF00','C2' => '#AAFF00', 'C3' => '#AAFF00', 'C4' => '#AAFF00', 'D1' => '#AAFF00','D2' => '#AAFF00', 'D3' => '#AAFF00', 'D4' => '#AAFF00');

    if(empty($_POST['date'])){
        $errors['date'] = 'A date is required <br/>';
    } else {
        $date = $_POST['date'];

        $sql = 'SELECT * FROM user_info ORDER BY created_at';

        $result = mysqli_query($conn, $sql);

        $everything = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);

        mysqli_close($conn);

        foreach($everything as $everythings) {
        if($date <= $everythings['date2'] && $date >= $everythings['date']) {
            $slots[$everythings['slot']] = 'orange';
        }
        }
    }



?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link rel="stylesheet" href="style.css">

<style>

    #butones{
        background-color: #268ad6;
        border-radius: 5em;
        text-align: center;
        width: 25em;
        height: 4em;
        margin-top: 2em;
        margin-bottom: 2em;
    }

    #butones:focus{
      border:none;
      outline: none;
    }

    #butones a{
        text-decoration: none;
    }

    #butones span{
        font-family: 'montserrat-light';
        font-size: 1.3em;
        color: white;
    }

    #butones:hover{
        box-shadow: 0px 0px 10px 3px #ea8130;
        font-weight: bold;
        transition: 0.5s all ease;
    }

    #reginageorge table td a{
        text-decoration: none;
    }

    #reginageorge table tr td:hover{
        transform: scale(1.07);
        transition: 0.3s all ease;
        box-shadow: 0px 0px 10px 4px grey;
    }

    #reginageorge table tr td a:hover{
        font-size: 3em;
        transition: 0.3s all ease;
    }

    #reginageorge table td a:focus{
        outline: none;
    }

    #fushi{
        font-family: 'montserrat-light' !important;
    }

    #fushi span{
        margin-right: 0.5em;
    }

    #gabiru {
        color: green;
    }
    #capybara {
        color: orange;
    }
    /* #mike {
        color: red;
    } */

</style>

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
    <h4 style = "font-family: montserrat-light">Active Reservations</h4>
    </div>


<!-- Form -->


<form action="openslots.php" class = "white" method = "POST">
<div style = "margin-bottom: 4em">

    <div class="container">
        <div class="row">
            <div class="col s4">

            </div>
            <div class="col s4">
                <label>Select a date:</label>
                <input type="date" name = "date" value = <?php echo $date?>>
                <div class="red-text"><?php echo $errors['date']; ?></div>
            </div>
        </div>
    </div>

    <div class="center">
        <button id="butones" class="btn" type="submit" name="submit" value = "submit"><span>View reservation status</span>
        <i class="material-icons right icon-green">calendar_month</i>
        </button>
    </div>

    <div id="fushi" class="container center-align">
        <h6><span id="gabiru">◼</span>Available</h6>
        <h6><span id="capybara">◼</span>Has bookings</h6>
        <!-- <h6><span id="mike">◼</span>Fully Booked</h6> -->
    </div>
    
<div style = "margin-top: 2em">
        
<div class="row" id="reginageorge">

    <div class="col s6">
        <div class="container">
            <table>
                <tr>
                    <td bgcolor="<?php echo $slots['A1']; ?>">
                        <a href="timeslots.php?id=A1" class="brand-text"><h5>A1</h5></a>
                    </td>
                    <td bgcolor="<?php echo $slots['A2']; ?>">
                        <a href="timeslots.php?id=A2" class="brand-text"><h5>A2</h5></a>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="<?php echo $slots['B1']; ?>">
                        <a href="timeslots.php?id=B1" class="brand-text"><h5>B1</h5></a>
                    </td>
                    <td bgcolor="<?php echo $slots['B2']; ?>">
                        <a href="timeslots.php?id=B2" class="brand-text"><h5>B2</h5></a>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="<?php echo $slots['C1']; ?>">
                        <a href="timeslots.php?id=C1" class="brand-text"><h5>C1</h5></a>
                    </td>
                    <td bgcolor="<?php echo $slots['C2']; ?>">
                        <a href="timeslots.php?id=C2" class="brand-text"><h5>C2</h5></a>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="<?php echo $slots['D1']; ?>">
                        <a href="timeslots.php?id=D1" class="brand-text"><h5>D1</h5></a>
                    </td>
                    <td bgcolor="<?php echo $slots['D2']; ?>">
                        <a href="timeslots.php?id=D2" class="brand-text"><h5>D2</h5></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="col s6">
        <div class="container">
            <table>
                <tr>
                    <td bgcolor="<?php echo $slots['A3']; ?>">
                        <a href="timeslots.php?id=A3" class="brand-text"><h5>A3</h5></a>
                    </td>
                    <td bgcolor="<?php echo $slots['A4']; ?>">
                        <a href="timeslots.php?id=A4" class="brand-text"><h5>A4</h5></a>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="<?php echo $slots['B3']; ?>">
                        <a href="timeslots.php?id=B3" class="brand-text"><h5>B3</h5></a>
                    </td>
                    <td bgcolor="<?php echo $slots['B4']; ?>">
                        <a href="timeslots.php?id=B4" class="brand-text"><h5>B4</h5></a>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="<?php echo $slots['C3']; ?>">
                        <a href="timeslots.php?id=C3" class="brand-text"><h5>C3</h5></a>
                    </td>
                    <td bgcolor="<?php echo $slots['C4']; ?>">
                        <a href="timeslots.php?id=C4" class="brand-text"><h5>C4</h5></a>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="<?php echo $slots['D3']; ?>">
                        <a href="timeslots.php?id=D3" class="brand-text"><h5>D3</h5></a>
                    </td>
                    <td bgcolor="<?php echo $slots['D4']; ?>">
                        <a href="timeslots.php?id=D4" class="brand-text"><h5>D4</h5></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>

</div>

        
</div>
</form>

<!-- The forms for user detail request-->


 <?php include('templates/footer.php'); ?>
       
<html>