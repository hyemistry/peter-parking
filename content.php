<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link rel="stylesheet" href="style.css">

<style>
    body{
        background-image: linear-gradient(to bottom, #906767, white, #424f56);
    }

    body span::selection{
        color:black;
    }

    hr{
        border: 1px solid #268ad6;
        width: 80em;
        margin-top: 5em !important;
        margin: 3em auto;
    }

    #towmater{
        font-family: 'montserrat-light';
    }

    #benjamin{
        background-color: #268ad6;
        border-radius: 5em;
        text-align: center;
        width: 13em;
        height: 3.5em;
    }

    #benjamin a{
        text-decoration: none;
    }

    #benjamin span{
        font-family: 'montserrat-light';
        font-size: 1.5em;
        color: white;
    }

    #benjamin:hover{
        box-shadow: 0px 0px 10px 3px #ea8130;
        transform: scale(1.1);
        font-weight: bold;
        transition: 0.5s all ease;
    }

    #benjamin a:focus{
        outline: none;
    }

    #benimaru h6{
        font-weight: bolder;
        color: black;
    }

    #benimaru p{
        font-size: 2.5vh;
        color: black;
    }

    #benimaru h6{
        margin-top: 0.5em;
        font-size: 3vh;
    }

    #benimaru #col1{
        position: relative;
        border-right: 1px solid #268ad6;
        height: 23vh;
    }

    .parallax-container {
        height: 80vh;
        margin-top: 5em;
    }

    .parallax {
        position: absolute;
    }

    .parallax img {
        display: block;
    }


    #shuna h4, h6, p{
        font-weight: bold;
    }

    #shuna h6{
        text-align: center;
    }

    #shuna{
        margin-top: 3em;
        /* margin-bottom: 3em; */
        font-family: 'montserrat-light';
        font-size: 1em !important;
        background-position: center;
        background-image: url('stuff/photos/parkingaest3.jpg');
        background-size: cover;
        backdrop-filter: blur(5px);
        background-attachment: fixed;
    }

    #shuna::before{
        content: "";
        position: absolute;
        inset: -5px;
        background-image: url('stuff/photos/parkingaest3.jpg');
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        filter: blur(5px);
        z-index: -100;
    }

    #shuna #fahh{
        border-radius: 1em;
        background-color: white;
        box-shadow: 0 0 5px 3px rgba(0, 0, 0, 0.5);
    }

</style>



<div id="towmater" class="center-align" style="margin-top: 6em;">
    <h5 class="black-text" style="margin-bottom: 1em;">Here, we offer:</h3>

    <div id="benimaru" class="container">
        <div class="row">
            <div class="col s4" id="col1">
                <h6><span>Swift Compliance</span></h6>
                <p>Spot reservations are done in a swift manner, providing easy assistance to customers.<p>
            </div>

            <div class="col s4" id="col1">
                <h6><span>Open 24/7</span></h6>
                <p>The parking spots are open 24 hours a day, 7 days a week, so long as the spots are not fully booked.</p>
            </div>

            <div class="col s4">
                <h6><span>Cityscape Center</span></h6>
                <p>The parking lot is located in a rather convenient position, leaving the customers agape with a variety of places to enjoy.</p>
            </div>

        </div>
    </div>
</div>

<div class="center-align" style="margin: 20px;">
    <button id="benjamin" class="btn">
        <a href="parking.php"><span>Park Now</span></a>
    </button>
</div>

<!-- <div class="parallax-container">
    <div class="parallax">
        <img src="stuff/photos/parkingaest3.jpg" alt="" class="responsive-img">
    </div>
</div> -->

<section id="shuna">
    <div class="container center-align" style="margin-bottom: 3em;">
        <h4 class="white-text" style="margin-top: 1.2em;">Reviews</h4>
    </div>

    <div class="container">
        <div class="row">
            <div class="col s4 offset-l1" id="fahh">

                <h6><span>Natsuki Subaru</span></h6>
                <p>Best parking service ever! Di ako nalate sa date namin ni Emilia-tan ❤️</p>
            </div>

            <div class="col s4 offset-l4" id="fahh" style="margin-top: 2em;">
                <h6><span>Peter Parker</span></h6>
                <p>10/10! Mabait yung staff sa amin ni Gwen lalo na yung Hanna ang pangalan</p>
            </div>
            
            <div class="col s4 offset-l7" id="fahh" style="margin-top: 2em; margin-bottom: 2em;">
                <h6><span>Rimuru Tempest</span></h6>
                <p>Ganda nung parking lot location! Wala kaming ganito sa Tempest eh. Kung pwede ko lang sana 'to pag-investan...</p>
            </div>
        </div>
    </div>
</section>

<!-- <div class="input-field container">
    <i class="material-icons prefix">date_range</i>
    <input type="date" id="date" class="datepicker">
    <label for="date">Choose a date you need me for...</label>
</div> -->

<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="materialize/js/materialize.min.js"></script>

<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $('.materialboxed').materialbox();
        $('.parallax').parallax();
        $('.tabs').tabs();
        $('.datepicker').datepicker({
            disableWeekends: false,
            yearRange: 1
        });
        $('.tooltipped').tooltip();
        $('.scrollspy').scrollSpy();
    });
</script>
    