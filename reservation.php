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
       
<html>