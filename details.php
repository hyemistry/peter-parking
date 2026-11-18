
<?php

include('config/db_connect.php');

$slotdetails = null;

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM user_info WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
        exit;
    } else {
        echo 'Query error: ' . mysqli_error($conn);
    }
}

if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM user_info WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $slotdetails = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
}
    $cost = '';
    // deletable
    $date_in = $slotdetails['date'];
    $date_out = $slotdetails['date2'];
    $i = '';
    do {
        $date_in = date('Y-m-d', strtotime('+1 day', strtotime($date_in)));
        $i++;
    } while ($date_in <= $date_out);

    $cost = $i*50;

    // deletable
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Parking Reservation Details</title>

    <style>

       
    
body {
    background: #F7F9F4;
    font-family: 'montserrat-light';
    color: #202820;
}

/* Main Container */
.details-container {
    max-width: 1050px;
    margin: 90px auto;
    padding: 20px;
}

/* Main Card */
.details-card {
    background: #FFFFFF;
    border-radius: 16px;
    padding: 40px;
    box-shadow: 0 8px 30px rgba(32, 40, 32, 0.08);
    border: 1px solid #E6EBD9;
}

/* Page Heading */
.page-title {
    color: #30451B;
    font-weight: 700;
    margin-bottom: 8px;
}

.subtitle {
    color: #77816E;
    margin-bottom: 35px;
    font-size: 14px;
}

/* Two Column Layout */
.details-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 30px;
}

/* Section Headings */
.section-title {
    color: #527D19;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 20px;
    border-bottom: 2px solid #E6EBD9;
    padding-bottom: 12px;
}

/* Information Items */
.detail-item {
    background: #F8FAF4;
    border: 1px solid #E6EBD9;
    border-left: 4px solid #AAFF00;
    border-radius: 8px;
    padding: 14px 18px;
    margin-bottom: 12px;
    transition: 0.2s ease;
}

.detail-item:hover {
    background: #F0FFD9;
    transform: translateX(3px);
}

.detail-label {
    display: block;
    color: #77816E;
    font-size: 11px;
    margin-bottom: 5px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
}

.detail-value {
    color: #202820;
    font-size: 15px;
    font-weight: 600;
}

/* Parking Information Panel */
.parking-section {
    background: #202820;
    border-radius: 14px;
    padding: 30px 22px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

/* Decorative Circle */
.parking-section::before {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    border: 1px solid rgba(170, 255, 0, 0.12);
    border-radius: 50%;
    top: -80px;
    right: -60px;
}

/* Parking Labels */
.parking-label {
    color: #AAFF00;
    font-size: 11px;
    letter-spacing: 2px;
    font-weight: 700;
    margin-bottom: 12px;
}

/* Parking Code */
.parking-code {
    background: #AAFF00;
    border-radius: 10px;
    padding: 22px 10px;
    margin-bottom: 30px;
    color: #202820;
    font-size: 34px;
    font-weight: 800;
    letter-spacing: 3px;
    word-break: break-word;
}

/* Parking Slot */
.parking-slot {
    color: #FF8C00;
    font-size: 68px;
    font-weight: 800;
    margin: 5px 0;
}

.slot-subtitle {
    color: #D5E0CE;
    font-size: 13px;
}

/* Delete Button */
.delete-btn {
    background: #FF8C00;
    color: #FFFFFF;
    border: none;
    padding: 13px 30px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 30px;
}

.delete-btn:hover {
    background: #E87900;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 140, 0, 0.25);
}

/* Back Button */
.back-btn {
    display: inline-block;
    color: #527D19;
    text-decoration: none;
    font-size: 14px;
    margin-bottom: 25px;
    font-weight: 600;
}

.back-btn:hover {
    color: #FF8C00;
    transition: 0.3s all ease;
}

/* Not Found */
.not-found {
    text-align: center;
    padding: 50px;
    color: #527D19;
}

/* Mobile Responsive */
@media (max-width: 700px) {

    .details-container {
        margin: 40px auto;
        padding: 15px;
    }

    .details-card {
        padding: 25px 20px;
    }

    .details-grid {
        grid-template-columns: 1fr;
    }

    .parking-code {
        font-size: 27px;
    }

    .parking-slot {
        font-size: 55px;
    }
}


    </style>

</head>

<?php include('templates/alt_header.php'); ?>

<div class="details-container">

    <a href="index.php" class="back-btn">← Back to Reservations</a>

    <?php if($slotdetails): ?>

    <div class="details-card">

        <h4 class="page-title">
            Reservation Details
        </h4>

        <p class="subtitle">
            Here's everything you need to know about this parking reservation.
        </p>

        <div class="details-grid">

            <!-- LEFT SIDE: PERSONAL AND VEHICLE DETAILS -->

            <div>

                <h6 class="section-title">
                    Personal & Reservation Information
                </h6>

                <div class="detail-item">
                    <span class="detail-label">Username</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['username']); ?>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Date In</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['date']); ?>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Date Out</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['date2']); ?>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Time In</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['time_in']); ?>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Time Out</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['time_out']); ?>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Date Reserved</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['created_at']); ?>
                    </span>
                </div>

                <h6 class="section-title" style="margin-top: 30px;">
                    Vehicle Information
                </h6>

                <div class="detail-item">
                    <span class="detail-label">Vehicle Type</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['type']); ?>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Vehicle Color</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['color']); ?>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Plate Number</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['plate_number']); ?>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Vehicle Brand</span>
                    <span class="detail-value">
                        <?php echo htmlspecialchars($slotdetails['brand']); ?>
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Reservation Cost:</span>
                    <span class="detail-value">
                        <?php echo 'PHP ' . $cost . '.00'; ?>
                    </span>
                </div>

            </div>

            <!-- RIGHT SIDE: PARKING CODE AND SLOT -->

            <div class="parking-section">

                <p class="parking-label">YOUR PARKING CODE</p>

                <div class="parking-code" style ="font-family: 'Poppins', sans-serif !important;">
                    <?php echo htmlspecialchars($slotdetails['code']); ?>
                </div>

                <p class="parking-label">YOUR PARKING SLOT</p>

                <div class="parking-slot" style ="font-family: 'Poppins', sans-serif !important;">
                    <?php echo htmlspecialchars($slotdetails['slot']); ?>
                </div>

                <p class="slot-subtitle">
                    Your assigned parking space
                </p>

            </div>

        </div>

        <form action="details.php?id=<?php echo urlencode($slotdetails['id']); ?>"
              method="POST"
              onsubmit="return confirm('Are you sure you want to delete this reservation?');">

            <input type="hidden"
                   name="id_to_delete"
                   value="<?php echo htmlspecialchars($slotdetails['id']); ?>">

            <button type="submit" name="delete" class="delete-btn"  style ="font-family: 'montserrat-light' !important;">
                Delete Reservation
            </button>

        </form>

    </div>

    <?php else: ?>

        <div class="details-card not-found">
            <h4>Oops! No reservation found</h4>
            <p>This reservation may have been deleted or does not exist.</p>
            <a href="index.php" class="back-btn">Return to Home</a>
        </div>

    <?php endif; ?>

</div>

<br><br><br>

<?php include('templates/footer.php'); ?>

</html>
