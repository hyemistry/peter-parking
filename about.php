<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link rel="stylesheet" href="style.css">

<?php include('templates/header.php'); ?>

<style>

    body{
        font-family: 'montserrat-light';
    }

    body::selection{
        background-color: #edae49;
        color:white;
    }

    #susie{
        margin-top: 5em;
    }

    #susie #pix{
        border-radius: 10000em;
        box-shadow: 0px 0px 10px 3px #EDAE49;
        margin-bottom: 1em;
    }
    
    #susie #pix:hover{
        border-radius: 10000em;
        box-shadow: 0px 0px 10px 5px #268ad6;
        transform: scale(1.2);
        transition: 0.3s all ease;
    }
    
    #susie #boss{
        font-weight: normal !important;
    }

    #charlie{
        margin-bottom: 3em;
    }

    #charlie h3{

    }
    
    #charlie #pix{
        border-radius: 10000em;
        box-shadow: 0px 0px 5px 2px #EDAE49;
        margin-bottom: 1em;
    }
    
    #charlie #pix:hover{
        border-radius: 10000em;
        box-shadow: 0px 0px 5px 2px #268ad6;
        transform: scale(1.2);
        transition: 0.3s all ease;
    }

    span{
        color: #edae49;
    }
</style>

<section class="container" id="susie">
    <h3 class="center-align" style="margin-bottom: 1em;">Founders</h3>

    <div class="row">
        <div class="center col s6">
            <img id="pix" src="stuff/photos/images.png" alt="placeholder" style="width: 25%;">
            <h5 id="boss">Rhian Angeline Lalimo</h5>
            <h6>Back-End Developer</h6>
            <p>Rhian is a dedicated second-year BS Computer Engineering student at the University of Rizal System - Antipolo Campus.</p>
        </div>

        <div class="center col s6">
            <img id="pix" src="stuff/photos/images.png" alt="placeholder" style="width: 25%;">
            <h5 id="boss">Hanna Venice Galgo</h5>
            <h6>Front-End Developer</h6>
            <p>Hanna is a dedicated second-year BS Computer Engineering student at the University of Rizal System - Antipolo Campus.</p>
        </div>
    </div>
</section>

<section class="container" id="charlie">
    <h4 class="center-align" style="margin-bottom: 1em;">About ParkUp</h4>
    
    <div class="container">
        <p><span>ParkUp</span> is an online vehicle parking service dedicated to the park near R&H Inc., bringing a peaceful parking system to maintain organization and lessen the clutter of illegally parked vehicles.</p><br>
        <p>To maintain the website's online status, users may donate to our cause <a href="#"><span>here</span></a>. Your donation will be greatly appreciated. Thank you!</p>
    </div>
</section>

    <?php include('templates/footer.php'); ?>

<html>