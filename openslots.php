<?php
    // $color = array('A1' => '','A2' => 'blue', 'A3' => 'blue', 'A4' => 'blue', 'B1' => 'blue','B2' => 'blue', 'B3' => 'blue', 'B4' => 'blue', 'C1' => 'blue','C2' => 'blue', 'C3' => 'blue', 'C4' => 'blue', 'D1' => 'blue','D2' => 'blue', 'D3' => 'blue', 'D4' => 'blue' )

    $color = array('blue' => 'blue', 'red' => 'red');
    $slots = array('A1' => '','A2' => '', 'A3' => '', 'A4' => '', 'B1' => '','B2' => '', 'B3' => '', 'B4' => '', 'C1' => '','C2' => '', 'C3' => '', 'C4' => '', 'D1' => '','D2' => '', 'D3' => '', '' => '' );

    $sql = 
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
                            <td bgcolor = "<?php echo $color['A1'] ?>">A1</td>
                            <td bgcolor = "<?php echo $color['A1'] ?>">A2</td>
                        </tr>
                        <tr>
                            <td bgcolor = "<?php echo $color['A1'] ?>">B1</td>
                            <td bgcolor = "<?php echo $color['A1'] ?>">B2</td>
                        </tr>
                        <tr>
                            <td bgcolor = "<?php echo $color['A1'] ?>">C1</td>
                            <td bgcolor = "<?php echo $color['A1'] ?>">C2</td>
                        </tr>
                        <tr>
                            <td bgcolor = "<?php echo $color['A1'] ?>">D1</td>
                            <td bgcolor = "<?php echo $color['A1'] ?>">D2</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col s6">
                <div class="container red">
                    <table>
                        <tr>
                            <td bgcolor = "<?php echo $color['A1'] ?>">A3</td>
                            <td bgcolor = "<?php echo $color['A1'] ?>">A4</td>
                        </tr>
                        <tr>
                            <td bgcolor = "<?php echo $color['A1'] ?>">B3</td>
                            <td bgcolor = "<?php echo $color['A1'] ?>">B4</td>
                        </tr>
                        <tr>
                            <td bgcolor = "<?php echo $color['A1'] ?>">C3</td>
                            <td bgcolor = "<?php echo $color['A1'] ?>">C4</td>
                        </tr>
                        <tr>
                            <td bgcolor = "<?php echo $color['A1'] ?>">D3</td>
                            <td bgcolor = "<?php echo $color['A1'] ?>">D4</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</div>

<!-- The forms for user detail request-->


 <?php include('templates/footer.php'); ?>
       
<html>