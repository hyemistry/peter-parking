<title>Peter's Parking Lot</title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link rel="stylesheet" href="style.css">

<!-- boss if you're reading this, change what u think should be changed boss especially sa nav bc i suck at designing ze nav -->

<head>
    <style>
        /* body{
            background-image: linear-gradient(to bottom, #b9dbf0, white, #b9dbf0);
        } */

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

    </style>
</head>
<body>

<header>
    <nav class="white">
        <div class="container">
            <a href="index.php"><img src="stuff/photos/logo.png" alt="ParkUp"></a>

                <a href="#" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons">menu</i>
                </a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <button id="hotdog" class="btn" style="
                    background-color: #268ad6; border-radius: 1em; margin-left: 1em;">
                        <li><a href="parking.php" style="color: white; font-family: 'montserrat-light';">Park Now!</a></li>
                    </button>
                    <button id="hotdog" class="btn" style="
                    background-color: #268ad6; border-radius: 1em; margin-left: 1em;">
                        <li><a href="reservation.php" style="color: white; font-family: 'montserrat-light';">Your Reservations</a></li>
                    </button>
                </ul>
            </div>
            
        <ul class="sidenav" id="mobile-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="parking.php">Park Now</a></li>
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