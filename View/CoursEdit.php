<?php
session_start();
$titre = 'warProg - Apprendre en Ligne';
$CSS = '../Style/Cours.css'; // Assurez-vous que ce chemin est correct
$JS = '../Assets/js/ConnexionInscription.js';

require_once('../Controller/ControlleurCours.php');
$conn = new ControlleurCours();
$cours = $conn->getCours($_GET['id']);

ob_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre; ?></title>
    <link rel="stylesheet" href="<?php echo $CSS; ?>">
    <link rel="icon" type="image/png" sizes="64x64" href="../Media/file (3).png">
    <title><?php echo $titre; ?></title>
</head>

<body>



    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="post" action="../index.php?action=adminEditCours" enctype="multipart/form-data" id="coursForm">
                <h1>Cours</h1>

                <input type=" text" value="<?php
                                            echo $cours['id'];
                                            ?>"" name='id' hidden>
                    <input type=" text" placeholder="Titre" name="titre" value="<?php
                                                                                echo $cours['titre'];
                                                                                ?>" required>
                <input type="text" placeholder="Catégorie" name="categorie" value="<?php
                                                                                    echo $cours['categorie'];
                                                                                    ?>" required>
                <!-- <input type="file" id="filename" placeholder="Cours" name="cours" accept="application/pdf" onchange="validateFileType1()"> -->
                <p id="msg-error" hidden></p>
                <input type="text" placeholder="Prix" name="prix" value="<?php
                                                                            echo $cours['prix'];
                                                                            ?>" required>
                <!-- <input type="password" placeholder="Mot de passe" name="mdp" required> -->
                <button type="submit" name="inscription">Modifer</button>
                <button type="submit" name="inscription" onclick="setAction1('../index.php?action=adminRemoveCours')">Supprimer</button>
            </form>
        </div>
        <div class="form-container sign-up">
            <form method="post" action="../index.php?action=connexion">
                <h1>Connexion</h1>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Mot de passe" name="mdp" required>
                <!-- <a href="#">Forget Your Password?</a> -->
                <button type="submit" name="connexion">Connexion</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Modification Cours</h1>
                    <p>Vous êtes sur le point de modifier un Cours !</p>
                    <!-- <button class="hidden" id="register">Inscription</button> -->
                </div>
            </div>
        </div>
    </div>




    <script src="<?php echo $JS; ?>"></script>
</body>

</html>
<?php
$contenu = ob_get_clean();
echo $contenu;
?>