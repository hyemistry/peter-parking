
<?php
include('config/db_connect.php');

$username = $password = $date = $date2 = $time_in = $time_out = $type = $color = $plate_number = $brand = $code = $slot = '';

$errors = array(
    'username' => '',
    'password' => '',
    'date' => '',
    'date2' => '',
    'time_in' => '',
    'time_out' => '',
    'type' => '',
    'color' => '',
    'plate_number' => '',
    'brand' => '',
    'code' => '',
    'slot' => ''
);

if (isset($_POST['submit'])) {

    // USERNAME
    if (empty($_POST['username'])) {
        $errors['username'] = 'A username is required <br/>';
    } else {
        $username = $_POST['username'];

        if (!preg_match('/^[a-zA-Z ]+$/', $username)) {
            $errors['username'] = 'Username must be alphabets only.';
        }

        $sql2 = "SELECT * FROM user_info";
        $result2 = mysqli_query($conn, $sql2);
        $user_infos2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        mysqli_free_result($result2);

        foreach ($user_infos2 as $usersname) {
            if ($usersname['username'] == $username) {
                $errors['username'] = 'Username is already taken.';
            }
        }
    }

    // PASSWORD
    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required <br/>';
    } else {
        $password = $_POST['password'];

        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
            $errors['password'] = 'Password must have a minimum of eight characters, one uppercase letter, one lowercase letter, and one number.';
        }
    }

    // START DATE
    if (empty($_POST['date'])) {
        $errors['date'] = 'A date is required <br/>';
    } else {
        $date = $_POST['date'];
        $date_compare = date("Y-m-d");

        if ($date < $date_compare) {
            $errors['date'] = 'Date must not be before present date.';
        }
    }

    // END DATE
    if (empty($_POST['date2'])) {
        $errors['date2'] = 'A date is required <br/>';
    } else {
        $date2 = $_POST['date2'];
        $date_compare2 = date("Y-m-d");

        if ($date2 < $date_compare2) {
            $errors['date2'] = 'Date must not be before present date.';
        }
    }

    // CHECK DATE ORDER
    if (!empty($date) && !empty($date2) && $date > $date2) {
        $errors['date2'] = 'End of reservation cannot be earlier than start of reservation.';
        $errors['date'] = 'Start of reservation cannot be later than end of reservation.';
    }

    // PARKING SLOT
    if (empty($_POST['slot'])) {
        $errors['slot'] = 'Parking slot is required <br/>';
    } else {
        $slot = $_POST['slot'];
    }

    // TIME IN
    if (empty($_POST['time_in'])) {
        $errors['time_in'] = 'Time-in is required <br/>';
    } else {
        $time_in = $_POST['time_in'];
    }

    // TIME OUT
    if (empty($_POST['time_out'])) {
        $errors['time_out'] = 'Time-out is required <br/>';
    } else {
        $time_out = $_POST['time_out'];
    }

    // CHECK COMPLETE DATE AND TIME ORDER
    if (
        !empty($date) &&
        !empty($date2) &&
        !empty($time_in) &&
        !empty($time_out)
    ) {
        $new_start = strtotime($date . ' ' . $time_in);
        $new_end = strtotime($date2 . ' ' . $time_out);

        if ($new_start >= $new_end) {
            $errors['time_in'] = 'Start time must be earlier than end time.';
            $errors['time_out'] = 'End time must be later than start time.';
        }
    }

    // VEHICLE TYPE
    if (empty($_POST['type'])) {
        $errors['type'] = 'A vehicle type is required <br/>';
    } else {
        $type = $_POST['type'];

        if (!preg_match('/^[a-zA-Z\s]+$/', $type)) {
            $errors['type'] = 'Vehicle type must contain letters and spaces only.';
        }
    }

    // VEHICLE COLOR
    if (empty($_POST['color'])) {
        $errors['color'] = 'A vehicle color is required <br/>';
    } else {
        $color = $_POST['color'];

        if (!preg_match('/^[a-zA-Z\s]+$/', $color)) {
            $errors['color'] = 'Color must contain letters and spaces only.';
        }
    }

    // PLATE NUMBER
    if (empty($_POST['plate_number'])) {
        $errors['plate_number'] = 'A plate number is required <br/>';
    } else {
        $plate_number = $_POST['plate_number'];

        if (!preg_match('/^[a-zA-Z0-9]{3,16}$/', $plate_number)) {
            $errors['plate_number'] = 'You have entered an invalid plate number.';
        }
    }

    // VEHICLE BRAND
    if (empty($_POST['brand'])) {
        $errors['brand'] = 'A vehicle brand is required <br/>';
    } else {
        $brand = $_POST['brand'];

        if (!preg_match('/^[a-zA-Z\s]+$/', $brand)) {
            $errors['brand'] = 'Brand must contain letters and spaces only';
        }
    }

    // GENERATE RANDOM CODE
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    $code = generateRandomString(7);

    // CHECK RESERVATION OVERLAP
    $sql1 = "SELECT time_in, time_out, date, date2, slot FROM user_info";
    $result1 = mysqli_query($conn, $sql1);

    $user_infos1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    mysqli_free_result($result1);

    if (
        !empty($date) &&
        !empty($date2) &&
        !empty($time_in) &&
        !empty($time_out)
    ) {
        $new_start = strtotime($date . ' ' . $time_in);
        $new_end = strtotime($date2 . ' ' . $time_out);

        foreach ($user_infos1 as $user_info1) {

            if ($slot == $user_info1['slot']) {

                $existing_start = strtotime(
                    $user_info1['date'] . ' ' . $user_info1['time_in']
                );

                $existing_end = strtotime(
                    $user_info1['date2'] . ' ' . $user_info1['time_out']
                );

                if (
                    $new_start < $existing_end &&
                    $new_end > $existing_start
                ) {
                    $errors['date'] = 'Please pick another time slot for this date.';
                    $errors['date2'] = 'Please pick another time slot for this date.';
                    $errors['time_in'] = 'This time slot is already reserved.';
                    $errors['time_out'] = 'This time slot is already reserved.';
                    $errors['slot'] = 'This parking space at this time slot is already reserved';

                    break;
                }
            }
        }
    }

    // INSERT INTO DATABASE
    if (array_filter($errors)) {

        // Errors exist, so do not insert the reservation.

    } else {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $time_in = mysqli_real_escape_string($conn, $_POST['time_in']);
        $time_out = mysqli_real_escape_string($conn, $_POST['time_out']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $plate_number = mysqli_real_escape_string($conn, $_POST['plate_number']);
        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $date2 = mysqli_real_escape_string($conn, $_POST['date2']);
        $slot = mysqli_real_escape_string($conn, $_POST['slot']);

        $sql = "INSERT INTO user_info
        (username, password, date, date2, time_in, time_out, type, color, plate_number, brand, code, slot)
        VALUES
        ('$username', '$password', '$date', '$date2', '$time_in', '$time_out', '$type', '$color', '$plate_number', '$brand', '$code', '$slot')";

        if (mysqli_query($conn, $sql)) {
            header('Location: reservation.php');
            exit;
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link rel="stylesheet" href="style.css">

<?php include('templates/alt_header.php'); ?>

<style>
    input {
        caret-color: #268ad6;
        border: none;
    }

    input::placeholder {
        font-family: 'montserrat-light';
        color: grey;
    }

    #butones {
        background-color: #268ad6;
        border-radius: 5em;
        text-align: center;
        width: 11em;
        height: 4em;
        margin-top: 2em;
    }

    #butones:focus {
        border: none;
        outline: none;
    }

    #butones a {
        text-decoration: none;
    }

    #butones span {
        font-family: 'montserrat-light';
        font-size: 1.3em;
        color: white;
    }

    #butones:hover {
        box-shadow: 0px 0px 10px 3px #ea8130;
        font-weight: bold;
        transition: 0.5s all ease;
    }

    #bruh label {
        font-size: 2em;
    }
</style>

<section style="margin-top: 6em"></section>

<div class="container center">
    <h4 style="font-family:'montserrat-light'">User Details</h4>
</div>

<section class="container" style="margin-top: 3em">
    <form action="parking.php" class="white" method="POST">

        <div class="row">
            <div class="col s6 input-field">
                <i class="material-icons prefix icon_orange">account_circle</i>
                <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
                <label>Full Name:</label>
                <div class="red-text"><?php echo $errors['username']; ?></div>
            </div>

            <div class="col s3">
                <label>Start of Reservation:</label>
                <input type="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
                <div class="red-text"><?php echo $errors['date']; ?></div>
            </div>

            <div class="col s3">
                <label>End of Reservation:</label>
                <input type="date" name="date2" value="<?php echo htmlspecialchars($date2); ?>">
                <div class="red-text"><?php echo $errors['date2']; ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col s6 input-field">
                <i class="material-icons prefix icon_orange">lock</i>

    <input type="password" name="password" id="password">

    <label for="password">Password:</label>

    <i class="material-icons icon_orange"
       id="togglePassword"
       style="position: absolute; right: 15px; top: 10px; cursor: pointer;">
        visibility
    </i>

    <div class="red-text">
        <?php echo $errors['password']; ?>
    </div>
            </div>

            <div class="col s3">
                <label>Time-in:</label>
                <input type="time" lang="en-US" step="60" name="time_in" value="<?php echo htmlspecialchars($time_in); ?>">
                <div class="red-text"><?php echo $errors['time_in']; ?></div>
            </div>

            <div class="col s3">
                <label>Time-out:</label>
                <input type="time" lang="en-US" step="60" name="time_out" value="<?php echo htmlspecialchars($time_out); ?>">
                <div class="red-text"><?php echo $errors['time_out']; ?></div>
            </div>
        </div>

        <div class="container center">
            <h4 style="font-family:'montserrat-light'">Car Details</h4>
        </div>

        <div class="row">
            <div class="col s6 input-field">
                <label>Type of Vehicle:</label>
                <input type="text" name="type" value="<?php echo htmlspecialchars($type); ?>">
                <div class="red-text"><?php echo $errors['type']; ?></div>
            </div>

            <div class="col s6 input-field">
                <label>Color of Vehicle:</label>
                <input type="text" name="color" value="<?php echo htmlspecialchars($color); ?>">
                <div class="red-text"><?php echo $errors['color']; ?></div>
            </div>
        </div>

        <div class="row">
            <div class="col s6 input-field">
                <label>Plate number:</label>
                <input type="text" name="plate_number" maxlength="10" value="<?php echo htmlspecialchars($plate_number); ?>">
                <div class="red-text"><?php echo $errors['plate_number']; ?></div>
            </div>

            <div class="col s6 input-field">
                <label>Brand/Not Applicable:</label>
                <input type="text" name="brand" value="<?php echo htmlspecialchars($brand); ?>">
                <div class="red-text"><?php echo $errors['brand']; ?></div>
            </div>
        </div>

        <div class="container center">
            <h4 id="slot_title" style="font-family:'montserrat-light'">Parking Spaces</h4>
            <div class="red-text"><?php echo $errors['slot']; ?></div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col s4">
                    <img id="parkinglot" src="stuff/photos/parkinglot.png" alt="car" class="responsive-img">
                </div>
            </div>
        </div>

        <br><br><br>

        <div id="bruh" class="row" style="margin-left: 5em;">

            <div class="input-field col s1" style="margin-top: 2em">
                <?php foreach (['A1', 'B1', 'C1', 'D1'] as $space): ?>
                    <p>
                        <label for="<?php echo $space; ?>">
                            <input name="slot" type="radio" id="<?php echo $space; ?>" value="<?php echo $space; ?>" <?php echo ($slot == $space) ? 'checked' : ''; ?> />
                            <span><?php echo $space; ?></span>
                        </label>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="input-field col s1" style="margin-top: 2em">
                <?php foreach (['A2', 'B2', 'C2', 'D2'] as $space): ?>
                    <p>
                        <label for="<?php echo $space; ?>">
                            <input name="slot" type="radio" id="<?php echo $space; ?>" value="<?php echo $space; ?>" <?php echo ($slot == $space) ? 'checked' : ''; ?> />
                            <span><?php echo $space; ?></span>
                        </label>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="input-field col s1" style="margin-top: 2em">
                <?php foreach (['A3', 'B3', 'C3', 'D3'] as $space): ?>
                    <p>
                        <label for="<?php echo $space; ?>">
                            <input name="slot" type="radio" id="<?php echo $space; ?>" value="<?php echo $space; ?>" <?php echo ($slot == $space) ? 'checked' : ''; ?> />
                            <span><?php echo $space; ?></span>
                        </label>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="input-field col s1" style="margin-top: 2em">
                <?php foreach (['A4', 'B4', 'C4', 'D4'] as $space): ?>
                    <p>
                        <label for="<?php echo $space; ?>">
                            <input name="slot" type="radio" id="<?php echo $space; ?>" value="<?php echo $space; ?>" <?php echo ($slot == $space) ? 'checked' : ''; ?> />
                            <span><?php echo $space; ?></span>
                        </label>
                    </p>
                <?php endforeach; ?>
            </div>

        </div>

        <div class="gap" style="margin-bottom: 3em">
            <br><br><br><br>
        </div>

        <div class="center" style="margin-top: 2em">
            <button id="butones" class="btn" type="submit" name="submit" value="submit">
                <span>Submit</span>
                <i class="material-icons right icon-green">send</i>
            </button>
        </div>

    </form>
</section>

<div class="gap" style="margin-bottom: 3em">
    <br>
</div>

<?php include('templates/footer.php'); ?>

<script src="jquery/jquery-3.3.1.min.js"></script>
<script src="materialize/js/materialize.min.js"></script>

<script>
    $(document).ready(function() {
        $('input#input_text, textarea#textarea2').characterCounter();
    });
    $('#togglePassword').click(function() {
    var password = $('#password');

    if (password.attr('type') === 'password') {
        password.attr('type', 'text');
        $(this).text('visibility_off');
    } else {
        password.attr('type', 'password');
        $(this).text('visibility');
    }
});
</script>

</html>
