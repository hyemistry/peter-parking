<?

    include('config/db_connect.php');

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM date WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        $date = mysquli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        print_r($date);
    }

?>

<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="materialize/css/materialize.min.css">
<link rel="stylesheet" href="style.css">

<style>

</style>

    <?php include('templates/alt_header.php'); ?>
    
    <div class="container">
        
    </div>
    
    <?php include('templates/footer.php'); ?>

</html>