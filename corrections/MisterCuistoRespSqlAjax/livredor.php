<?php

// display_errors = On;
error_reporting(E_ALL);
ini_set('display_errors', 1);
$messageRetour = "Coucou";
// On vérifie qu"une valeur e-mail ait été envoyée par le formulaire
// On déclenche une écriture dans la base de données
if(isset($_POST["email"])){
    // Création d"un objet PDO
    $connexionPDO = "mysql:host=127.0.0.1;dbname=mistercuisto";
    $pdo = new PDO($connexionPDO, "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

    // On récupère la date, on veut l'écrire dans la base de données
    $date = new DateTime();
    $dateLa = $date->getTimestamp();

    // Nous sommes prêts à nous connecter, préparons une requête SQL
    $requete = $pdo->prepare("INSERT INTO livredor (nom, email, commentaire) VALUES (:nom, :email, :commentaire)");
    if($requete->execute(array(
            "nom" => $_POST['nom'], 
            "email" => $_POST['email'],
            "commentaire" => $_POST['commentaire']
            ))){
                $messageRetour = "Nous vous remercions pour votre message, il a bien été enregistré";
            }else{
                $messageRetour = "Nous sommes désolés mais il semble qu'il y ait eu un problème dans l'enregistrement de votre message";
            };
}

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="css/mistercuisto.css" rel="stylesheet" />

    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
    <nav>
        <div id="burger"><a href="#" onclick="afficheMenu()" title="Afficher le menu"><img src="images/burger.png"/></a></div>
        <div id="menu"></div>
    </nav>
    <header>
        <a href="./" title="Revenir à l'accueil de Mister Cuisto"><img src="images/logo_header.png" /></a>
    </header>
    <main>
        <h1>Le livre d"or</h1>
        <p class="message"><?php echo $messageRetour; ?></p>
        <section>
            <!--
                Une option pour utiliser Javascript plutôt que PHP et éviter le rechargement de la page (cf. réservation pour plus d"infos)
                <form id="livredor" onsubmit="valideFormulaire(this); return false;" method="POST">
            -->
            <form id="livredor" action="livredor.php" method="POST">
                <label>Votre nom complet</label>
                <input type="text" id="nom" name="nom" required pattern=".{5,}" placeholder="Un nom ? Un prénom"/>
                <label>Un e-mail ?</label>
                <input type="email" id="email" name="email" required placeholder="Saisissez un e-mail" />
                <label>Votre témoignage *</label>
                <textarea rows="4" id="commentaire" name="commentaire" required placeholder="Laissez-nous un petit commentaire *"></textarea>
                <button type="submit">Soumettre</button>
                <button type="reset">Annuler</button>
            </form>

        </section>
        <aside></aside>
    </main>
    <footer>
        <nav>
            <a href="#" title="Mentions légales">Mentions légales</a>
            <a href="#" title="Contacts & réservations">contact</a>
            <a href="#" title="Réalisation La Fabrique du Numérique">Réalisation La Fabrique du Numérique</a>
        </nav>
    </footer>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/formulaires.js"></script>
</body>

</html>