<title>ParkUp</title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link rel="stylesheet" href="style.css">

<!-- This is part of the header for the parking.php and reservation.php file -->

<head>
    <style>
        body::selection{
            background-color: #edae49;
            color:white;
        }

        nav a img{
            width: 15%;
            margin-bottom: 0.5em;
        }

        nav a img:focus:not(:focus-visible){
            outline-color: transparent;
        }

        nav{
            position: fixed;
            top: 0;
            z-index: 9999;
            /* BOSS DAPAT TRANSPARENT TO, IDUNNO WHY IT WONT WORK SO YAB NA MUNA */
        }

        #nav-mobile li a{
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: #ea8130;
        }

        #nav-mobile li a:hover{
            color: #f6ec5f;
            text-decoration: none;
            font-weight: bold;
            transition: 0.5s all ease;
            text-shadow: 0 0 5px 3px black;
        }

        .material-icons{
            color: #D1495B;
            decoration: none;
        }

        .sidenav{
            background-image: linear-gradient(to bottom, #b9dbf0, white, #b9dbf0);
        }

        #hotdog:hover{
            box-shadow: 0px 0px 5px 3px #ea8130;
            transition: 0.5s all ease;
        }

        table {
            border-collapse: separate;
            border-spacing: 10px 10px; 
        }
        th, td {
            border: 1px solid #333;
            border-radius: 6px;
            padding: 40px;
            border: none;
            border-collapse: collapse;
            text-align: center;
            vertical-align: middle;

        }

       table td h5 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            text-align: center;
            margin: 10px 0;
        }

        i.icon-green {
            color: white;
        }
        i.icon_orange{
            color: orange;
        }
        .subsub {
            color: #7F00FF;
        }
        #parkinglot {
            max-width: 38%;
            position: absolute;
            margin-left: 25em;
            margin-top: 1em;
            border-radius: 28px;
        }
        #car_details {
            margin-left: 50px;
            position: relative;
        }
        #slot_title {
            margin-bottom: 1em;
        }
        #row_1{
            margin-left: 2em;
        }

        #logo:focus{
            border: none:
            outline: none;
        }

        nav ul li a:focus{
            border: none;
            outline: none;
        }
        .brand-text{
            color: #000000 !important;
        }
        
    </style>
</head>
<body>

<header>
    <nav class="white">
        <div class="container">
            <a id="logo" href="index.php"><img id="logo" src="stuff/photos/logo.png" alt="ParkUp" style="margin-top: 0.7em;"></a>

                <a href="#" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons">menu</i>
                </a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="about.php">About</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <button id="hotdog" class="btn" style="
                    background-color: #268ad6; border-radius: 1em; margin-left: 1em;">
                        <li><a href="reservation.php" style="color: white; font-family: 'montserrat-light';">Your Reservation</a></li>
                    </button>
                    <button id="hotdog" class="btn" style="
                    background-color: #268ad6; border-radius: 1em; margin-left: 1em;">
                        <li><a href="openslots.php" style="color: white; font-family: 'montserrat-light';">Slots</a></li>
                    </button>
                </ul>
            </div>
            
        <ul class="sidenav" id="mobile-links">
            <li><a href="about.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="parking.php">Reservation</a></li>
        </ul>
    </nav>
</header>

    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="materialize/js/materialize.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.modal').modal();
            $('.tooltipped').tooltip();
            $('.materialboxed').materialbox();
        })
    </script>