<?php
include("../assets/inc/headBack.php");
if(!isset($_SESSION['prenom'], $_SESSION['isLog'], $_SESSION['role'])
 || !$_SESSION['isLog'] || $_SESSION['role'] != 1){
    $_SESSION["message"] = "Vous n'avez pas le droit d'accés à l'administration";
    header("Location:../admin/index.php");
    exit;
 }

// if(!isset($_SESSION["isLog"]) || ($_SESSION["role"] !== "1")){
//     header("Location:../admin/index.php");
   
// } 


?>
<title>Back office admin</title>
<?php
include("../assets/inc/headerBack.php");
?>
<main>
    <div class="container">
        <div class="row ">
            <div class="col-4 mt-4">
                <h3>Bonjour <?=$_SESSION["prenom"]?> sur le back-office</h3>
            </div>
            <?php
                var_dump($_SESSION);
            ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-3">
                <form action="../core/userController.php" method="post">
                    <input type="hidden" name="faire" value="log-out">
                    <button class="btn btn-primary fw-bold" type="submit" name="soumettre ">Se deconnecter</button>
                </form>
            </div>
        </div>
    </div>
</main>