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
// var_dump($user);

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
    <div class="container">
        <!-- <div class="card mb-3 mt-5 bg-light" style="max-width: 540px;">
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
        </div> -->
        <!-- <a class="btn btn-outline-light" href="listUsers.php">Liste des utilisateurs</a> -->
        <h2>Modifier l'utilisateur</h2>
        <?php 
            if (isset($_SESSION["message"])) echo '<div class="alert alert-success">' . $_SESSION["message"] . '</div>'; 
            unset($_SESSION["message"]);
        ?>
        <form action="../core/userController.php" method="post" class="form-group">
            <input type="hidden" name="faire" value="update">
            <input type="hidden" name="id" value="<?=$user["id_user"];?>">
            <!-- champs nom -->
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?=$user["nom"];?>">
            <!-- champs prenom -->
            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="nom" class="form-control" value="<?=$user["prenom"];?>">
            <!-- champs email -->
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?=$user["email"];?>">
            <!-- champ password -->
            <label for="password">Mot de passe: </label>
            <input type="password" name="password" id="password" class="form-control">

            <label for="role">Rôle</label>
            <select name="role" id="role" class="form-control">
                    <option value="2" selected <?php
                    if($user['role'] == 2){
                        echo "selected";} ?>>Utilisateur</option>

                    <option value="1" <?php
                    if($user['role'] == 1){
                        echo "selected";} ?>>Administrateur</option>
            </select>
            <button type="submit" class="btn btn-success mt-1">Modifier</button>

        </form>
    </div>
</main>
<?php
include("../assets/inc/footerBack.php");
?>


