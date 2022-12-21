<?php
include("../assets/inc/headBack.php");

if(!isset($_SESSION['prenom'], $_SESSION['isLog'], $_SESSION['role']) || !$_SESSION['isLog'] || $_SESSION['role'] != 1){
    $_SESSION["message"] = "Vous n'avez pas le droit d'accés à l'administration";
    header("Location:../admin/index.php");
    exit;
}
include("../core/connexion.php");
$id = $_GET['id_user'];
$sql = "SELECT `id_user`,`nom`,`prenom`,`email`,`role`
        FROM user
        WHERE id_user = $id
";
$query = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
$user = mysqli_fetch_assoc($query);
/*TODO
 - afficher les information de l'utilisateur sur la page
 -afficher un utilisateur en fonction de son id quand on clique dessus depuis la liste des utulisateur 
 */
?>
<title>Modification de l'utilisateur</title>

<?php
include("../assets/inc/headerBack.php");
?>
<main>
    <?php
    
    ?>
    <div class="container">
        <div class="card mb-3 mt-5 bg-light" style="max-width: 540px;">
            <div class="row g-0 text-muted">
                <div class="col-md-4">
                    <img src="../assets/images/img_profil.png" class="img-fluid rounded-start mt-3" alt="profil">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title ">Profile</h5>
                        <p class="card-text"> Utilisateur: <?= htmlspecialchars($user["nom"])." ".($user["prenom"])?></p>
                        <p class="card-text">Email: <?=htmlspecialchars($user["email"])?></p>
                        <?php
                        if($user["role"] == 1){
                            echo '<p class="card-text">Role: Admin</p>';
                        }else{
                            echo '<p class="card-text">Role: User</p>';
                        }
                        ?>
                        <a href="#" class="btn btn-dark mb-2">Supprimer</a>
                    </div>
                </div>
            </div>     
        </div>
        <a class="btn btn-outline-light" href="listUsers.php">Liste des utilisateurs</a>
    </div>
</main>
<?php
include("../assets/inc/footerBack.php");
?>


