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
        body{
            background-image: linear-gradient(to bottom, #b9dbf0, white, #b9dbf0);
        }

        #title{
            font-family: 'montserrat-light';
            color: #D1495B;
        }

        #title:hover{
            color: #EDAE49;
            text-shadow: 0px 0px 3px #342c1e;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        nav{
            background-image: linear-gradient(to bottom, #b9dbf0, white, white);
            /* BOSS DAPAT TRANSPARENT TO, IDUNNO WHY IT WONT WORK SO YAB NA MUNA */
        }

        #nav-mobile li a{
            font-family: 'montserrat-light';
            color: #D1495B;
        }

        #nav-mobile li a:hover{
            color: #EDAE49;
            text-decoration: none;
        }

        .material-icons{
            color: #D1495B;
            decoration: none;
        }

        .sidenav{
            background-image: linear-gradient(to bottom, #b9dbf0, white, #b9dbf0);
        }

    </style>
</head>
<body>

<header>
    <nav>
        <div class="nav-wrapper">
            <a href="#" id="title" class="brand-logo brand-text" style="font-size: 25px; margin: 0; padding-left: 25px; padding-right: 25px;">Peter's Parking Lot</a>

                <a href="#" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons">menu</i>
                </a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
            
        <ul class="sidenav" id="mobile-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
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