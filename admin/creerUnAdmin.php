<?php
// on initialise la superGlobale $_session comme un tableau
// il faut créer un user avec le role admin dans la bdd 
//pour avoir une personne adminstateaur du back-office(console-d'administration )
//pour cela, on créer un formulaire user pour renseigner la bdd au niveau du CRUD, nous allons faire un Create avec l'instruction
// SQL INSERT INTO 
include("../assets/inc/headFront.php");
?>
<title>Création d'un admin</title>
<?php
include("../assets/inc/headerFront.php");
?>
<main>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4 ">
            <h3 class="text-center">Inscription</h3>
            <form class="form-group" action="" method="post">
                <input type="text" class="form-control mt-2" name="nom" id="nom" placeholder="Votre nom"> 
                <input type="text" class="form-control mt-2" name="prenom" placeholder="Votre prénom">
                <input type="email" class="form-control mt-2" name="email" placeholder="abc@yahoo.fr">
                <input type="password" class="form-control mt-2" name="password" placeholder="Votre mot de passe">
                <button type="submit" class="btn btn-success mt-1 text-light fw-bold" name="soumettre">Valider</button>
            </form>
            <?php
            // 1- récupération des données 
            // on récupere le fichier de connexion -> connexion.php qui correspond aux paramètres de connexions de notre bdd
            require("../core/connexion.php");
            //une condition pour récupérer les données du 
            if(isset($_POST["soumettre"])){
                //on utilise des fonctions natives php pour formater  correctement le texte 
                //addslashes() rajoute un antislashe devant
                //trim() efface les espace devant et derrière le mot
                //ucfirst() met la 1ére lettre en majuscule
                $nom = addslashes(trim(ucfirst($_POST['nom'])));
                $prenom = addslashes(trim(ucfirst($_POST['prenom'])));
                $email = trim(strtolower($_POST['email']));
                //la gestion du mot de passe
                // encodage mot de passe
                $options = ['cost' => 12];
                $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT, $options);
                // on dit que 1 est admin pour le role 
                $role = 1;
                // 2- préparation de l'écriture sql
                $sql ="INSERT INTO user ( 
                                        nom,
                                        prenom,
                                        email,
                                        password,
                                        role
                                    )
                                VALUE (
                                        '$nom',
                                        '$prenom',
                                        '$email',
                                        '$password',
                                        '$role'
                                )";
                    
                // 3- execution de la requête avec les paramètres de connexion
                mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
                //4 message
                $_SESSION["message"] = "Administateur $nom $prenom est correctement ajouté à la BDD";
                // 5 redirection vers notre page d'accueil 
                header("Location:../index.php");
            }
                
            ?>
        </div>
    </div>
</div>
</main>