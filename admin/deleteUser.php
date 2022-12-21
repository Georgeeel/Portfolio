<?php
include("../assets/inc/headBack.php");
if(!isset($_SESSION['prenom'], $_SESSION['isLog'], $_SESSION['role']) || !$_SESSION['isLog'] || $_SESSION['role'] != 1){
    $_SESSION["message"] = "Vous n'avez pas le droit d'accés à l'administration";
    header("Location:../admin/index.php");
    exit;
}
$id = $_GET['id_user'];

?>
<title>Supprimer un utilisatuer</title>
<?php
include("../assets/inc/headerBack.php");
?>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-3">
                <h3>Suppression</h3>
            </div>
        </div>
        <div class="col-6">
            <?php
            $id = $_GET['id_user'];
            require("../core/connexion.php");
            $sql = "SELECT `id_user`,`nom`,`prenom`,`email`,`role`
                    FROM user
                    WHERE id_user = $id
            ";
            $query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
            $user = mysqli_fetch_assoc($query);
            ?>
            <h4>Attention vous voulez supprimer le user <?=$user["nom"] .' '. $user["prenom"]?></h4>
            <a type="button" class="btn bg-success" href="createUser.php">Retour liste</a>
            <form action="../core/userController.php" method="post">
                <input type="hidden" name="faire" value="delete-user">
                <input type="hidden" name="id" value="<?php $user['id_user']?>">
            <a type="button" class="btn bg-danger" href="createUser.php">Supprimer</a>
            </form>
        </div>
    </div>
</main>
<?php
include("../assets/inc/footerBack.php");
?>