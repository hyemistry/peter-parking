<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php include('templates/header.php'); ?>

<style>
    #lightyagami{
        background-image: url("stuff/photos/parkingaest.jpg");
        height: 75vh;
        background-size: cover;
        background-position: 50% 100%;
        box-shadow: 0px 0px 20px 20px #191919;
    }

    #lightyagami #sheesh{
        padding-top: 5em;
    }

    #lightyagami #sheesh h5{
        color: white;
    }
</style>

<body id="index_background">

<section id="lightyagami" style="padding-top: 4em;">
    <div id="sheesh" style="font-family: 'montserrat-light'; padding-top: 11em;" class="center-align">
        <h5 class="center-align" style="margin: 0 auto;">Welcome to</h5>
        <img style="width: 30%; margin-top: -1em;" src="stuff/photos/logo2.png" alt="ParkUp">
        <h5 class="center-align" style="margin: 0 auto; padding-top: 10px;">The best parking solution in the city!</h5>
    </div>
</section>

</body>


<!-- GO AHEAD BOSS DO WHATEVER U WANT -->
<!--bruh-->
   

    <?php include('content.php'); ?>
    <?php include('templates/footer.php'); ?>

<html>