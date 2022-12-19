<!-- dans fichier on va créer la page de connexion  à notre back-office 
avec le login : identifiant & mot de passe  -->
<?php
include("../assets/inc/headFront.php");

?>
<title>login Admin</title>
<?php
include("../assets/inc/headerFront.php");
?>
<main>
    <div class="container">
        <!-- gestion de  -->
        <div class="row">
            <?php
            if(isset($_SESSION["message"])){
                echo '<div class="alert alert-danger" role="alert mt-3">' .$_SESSION["message"] . "</div>";
                //on efface la clé message, un fois qu'elle a été affiche avec unset()
                unset($_SESSION["message"]);
            }
            ?>
        </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <h3>Admin</h3>
            <form action="../core/userController.php" method="post">
                <input type="hidden" name="faire" value="log-admin">
                <input type="email" class="form-control mt-2" name="login" placeholder="email@yahoo.fr">
                <input type="password" class="form-control mt-2" name="password" placeholder="votre mot de passe">
                <button type="submit" class="btn btn-primary mt-1">Enregistrer</button>
            </form>
        </div>
    </div>
    </div>
</main>