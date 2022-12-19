<?php
// on initialise la superglobale $_session comme un tableau vide
include("assets/inc/headFront.php");
?>
    <title>Portfolio</title>
<?php
include("assets/inc/headerFront.php");
?>
    <main>
        <div class="container">
            <?php 
            if (isset($_SESSION["message"])) echo '<div class="alert alert-success">' . $_SESSION["message"] . '</div>'; 
            unset($_SESSION["message"]);
            ?>
        </div>
    </main>
<?php
include("assets/inc/footerFront.php");
?>