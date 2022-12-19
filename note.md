Nous allons créer un site Portfolio
    -partie front
    -partie back-office(admin) qui permettra un webmaster (vous) de configurer le site ou récupérer des informations
    
    -au niveau de la BDD
        l'accès au back-office
        -une table user(avec plusieur champs ou colonnes)
            -nom
            -prénom
            -email
            -password
            -role
        messagerie
        -message
            -nom
            -prenom
            -societe
            -email
            -telephone
            -description
        compétence
        un table front_end
            -titre
            -texte
            -image
            -lien
            -active
        un table back_end
            -titre
            -texte
            -image
            -lien
            -active


    * creation de l'architecture(arborescence des dossiers et fichiers)
    * création de la table user dans la bdd portfolio
    * création du dosiers et fichier aide/creerUnAdmin.php
    -ce fichier va nous permettre de créer un formulaire pour enregistrer un administateur qui aura
     acces au back office(console d'administration) de notre site(pour le portfolio vous-même)
    * création un bar navigation dans le fichier assets/inc/headerFront.php

    * création du fichier admin/index.php qui va gérer le formulaire de connexion au back-office
    * création du fichier core/userController.php qui va gérer les differents fonctionalités
    
