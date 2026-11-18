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

    body{
        font-family: 'montserrat-light';
    }

    #iwannasleep{
        margin-top: 5em;
}

    #iwannasleep ul li a{
        font-size: 25px;
        color: black;
        text-decoration: none;
        display: inline-block;
        margin-top: 0.5em;
    }

    #iwannasleep ul li a:hover{
        transition: 0.3s all ease;
        color: #268ad6;
        text-shadow: 0px 0px 3px 1px black;
    }

    #ah{
        margin-bottom: 3em;
    }

    span{
        margin-left: 1em;
    }

    h5{
        font-weight: light;
    }

    h6{
        padding-top: 1em;
    }

</style>

<?php include('templates/header.php'); ?>

<div id="iwannasleep" class="container">
    <h3 class="center-align">Contact Us!</h3>

    <div class="social-links center-align" id="ah">
        <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i><span>Facebook: ParkUp</span></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i><span>Instagram: @parkupinc</span></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i><span>Twitter: @parkupinc</span></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i><span>LinkedIn: R&H Inc.</span></a></li>
        </ul>
    </div>

    <div id="ah" class="center-align" style="margin-top: 3em !important;">
        <h5 class="center-align">You may also contact us here:</h5>
        <h6>Number: +63 967 420 6967<br><br>Email: parkupinc@gmail.com</h6>
    </div>
</div>

<?php include('templates/footer.php'); ?>

<html>