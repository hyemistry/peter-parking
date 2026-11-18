
<?php
include('config/db_connect.php');

$slot = $_GET['id'] ?? '';

$validSlots = [
    'A1', 'A2', 'A3', 'A4',
    'B1', 'B2', 'B3', 'B4',
    'C1', 'C2', 'C3', 'C4',
    'D1', 'D2', 'D3', 'D4'
];

if (!in_array($slot, $validSlots, true)) {
    die('Invalid parking slot!');
}

$sql = "SELECT * FROM user_info WHERE slot = ? ORDER BY date";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $slot);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$everything = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_stmt_close($stmt);
mysqli_close($conn);

function formatDate($date) {
    return date("F j, Y", strtotime($date));
}

function formatTime($time) {
    return date("g:i A", strtotime($time));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ParkUp - Reservations</title>

    <!-- Materialize CSS -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        body {
            background-color: #f4f7fb;
            font-family: 'Montserrat', sans-serif;
        }

        .reservation-container {
            margin-top: 70px;
            margin-bottom: 70px;
        }

        .reservation-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

        .card-header {
            background: linear-gradient(135deg, #268ad6, #1769aa);
            padding: 30px;
            color: white;
        }

        .card-header h4 {
            margin: 0;
            font-weight: 600;
        }

        .card-header p {
            margin-bottom: 0;
            opacity: 0.85;
        }

        .slot-badge {
            display: inline-block;
            background: white;
            color: #268ad6;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 22px;
            font-weight: bold;
            margin-top: 15px;
        }

        .table-container {
            padding: 25px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: #f1f5f9;
        }

        table th {
            color: #555;
            font-weight: 600;
            padding: 18px 12px;
        }

        table td {
            padding: 18px 12px;
            border-bottom: 1px solid #eeeeee;
            color: #555;
        }

        table tbody tr:hover {
            background-color: #f8fbff;
        }

        .time-badge {
            background-color: #e3f2fd;
            color: #1976d2;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: 600;
            white-space: nowrap;
        }

        .empty-message {
            text-align: center;
            padding: 45px 15px;
            color: #888;
        }

        .empty-message i {
            font-size: 45px;
            color: #b0bec5;
        }

        .back-button {
            margin-top: 25px;
            border-radius: 25px;
            background-color: #268ad6;
        }

        @media(max-width: 600px) {
            .reservation-container {
                margin-top: 100px;
                margin-bottom: 70px;
            }

            .card-header {
                padding: 22px;
            }

            .table-container {
                padding: 12px;
            }

            table th, table td {
                padding: 12px 8px;
                font-size: 12px;
            }
        }

        #souei a{
            background-color: #268ad6;
            width: 20em;
            height: 2.7em;
            border-radius: 2em;
            align-items: center;
        }

        #souei a:hover{
            transform: scale(1.1);
            transition: 0.3s all ease;
            box-shadow: 0px 0px 5px 2px #edae49;
        }

        #souei a i{
            color: white;
        }

        #diablo{
            margin-bottom: 2.5em;
        }


    </style>
</head>

<body>

<?php include('templates/alt_header2.php'); ?>

<br>
<br>
<br>
<br>
<div class="container reservation-container" id="diablo">

    <div class="card reservation-card">

        <!-- Header -->
        <div class="card-header">
            <h4>Parking Reservations</h4>
            <p>View all reservations for this parking space.</p>

            <div class="slot-badge">
                <?php echo htmlspecialchars($slot); ?>
            </div>
        </div>

        <!-- Reservation Table -->
        <div class="table-container">

            <?php if (empty($everything)) { ?>

                <div class="empty-message">
                    <i class="material-icons">event_available</i>
                    <h5>No Reservations Found</h5>
                    <p>This parking slot currently has no reservations.</p>
                </div>

            <?php } else { ?>

                <table class="highlight responsive-table">

                    <thead>
                        <tr>
                            <th>Date In</th>
                            <th>Date Out</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                        </tr>
                    </thead>

                    <tbody>

    <?php foreach ($everything as $everythings) { ?>

        <tr>
            <td>
                <?php echo htmlspecialchars(formatDate($everythings['date'])); ?>
            </td>

            <td>
                <?php echo htmlspecialchars(formatDate($everythings['date2'])); ?>
            </td>

            <td>
                <span class="time-badge">
                    <?php echo htmlspecialchars(formatTime($everythings['time_in'])); ?>
                </span>
            </td>

            <td>
                <span class="time-badge">
                    <?php echo htmlspecialchars(formatTime($everythings['time_out'])); ?>
                </span>
            </td>
        </tr>

    <?php } ?>

</tbody>

                </table>

            <?php } ?>

            <div class="center" id="souei">
                <a href="openslots.php" class="btn back-button">
                    <i class="material-icons left">arrow_back</i>
                    Back to Reservations
                </a>
            </div>

        </div>

    </div>

</div>

<?php include('templates/footer.php'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>
