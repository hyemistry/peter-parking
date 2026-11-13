<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php include('templates/header.php'); ?>

<style>

    body{
        font-family: 'montserrat-light';
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
</style>

<div class="container" style="padding-top: 5em;">
    <h1>ikaw na bahala dito boss do whatev u want</h1>
    <h2>i placed these as placeholders</h2>
</div>

<section class="container" id="susie">
    <h3 class="center-align" style="margin-bottom: 1em;">Flounders</h3>

    <div class="row">
        <div class="center col s6">
            <img id="pix" src="stuff/photos/images.png" alt="placeholder" style="width: 25%;">
            <h5 id="boss">Rhian Angeline Lalimo</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit consequuntur distinctio ducimus beatae! Nulla pariatur fuga deleniti eos nobis vitae sequi voluptatem. Sint voluptatem, est sequi voluptate soluta sit consequatur.</p>
        </div>

        <div class="center col s6">
            <img id="pix" src="stuff/photos/images.png" alt="placeholder" style="width: 25%;">
            <h5 id="boss">Hanna Venice Galgo</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit consequuntur distinctio ducimus beatae! Nulla pariatur fuga deleniti eos nobis vitae sequi voluptatem. Sint voluptatem, est sequi voluptate soluta sit consequatur.</p>
        </div>
    </div>
</section>

<section class="container" id="charlie">
    <h3 class="center-align" style="margin-bottom: 1em;">Staff</h3>

    <div class="row">
        <div class="center col s4">
            <img id="pix" src="stuff/photos/images.png" alt="placeholder" style="width: 25%;">
            <h6 id="boss">Peter Parker</h6  >
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit consequuntur distinctio ducimus beatae! Nulla pariatur fuga deleniti eos nobis vitae sequi voluptatem. Sint voluptatem, est sequi voluptate soluta sit consequatur.</p>
        </div>

        <div class="center col s4">
            <img id="pix" src="stuff/photos/images.png" alt="placeholder" style="width: 25%;">
            <h6 id="boss">Sandara Park</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit consequuntur distinctio ducimus beatae! Nulla pariatur fuga deleniti eos nobis vitae sequi voluptatem. Sint voluptatem, est sequi voluptate soluta sit consequatur.</p>
        </div>

        <div class="center col s4">
            <img id="pix" src="stuff/photos/images.png" alt="placeholder" style="width: 25%;">
            <h6 id="boss">Alexander Parkington</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit consequuntur distinctio ducimus beatae! Nulla pariatur fuga deleniti eos nobis vitae sequi voluptatem. Sint voluptatem, est sequi voluptate soluta sit consequatur.</p>
        </div>
    </div>
</section>

    <?php include('templates/footer.php'); ?>

<html>