<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="css/styleChangeProfil.css">
</head>

<body>

<!--menu-->

<?php include("menu.php"); ?>

<!-- Petit menu: tweets, abonnements, abonnés, j'aime-->

<section>
    <a href="profilTweet.php"><h4>Tweets</h4></a>
    <a href="profilAbonnement.php"><h4>Abonnements</h4></a>
    <a href="profilAbonnes.php"><h4>Abonnés</h4></a>
    <a href="profilLike.php"><h4>J'aime</h4></a>
    <a href="ChangeProfil.php"><h14>Editer le profil</h14></a>
</section>

<!--section où nous pourrons modifier les données de notre profil-->
<article>
    <form method="post" action="/Le-Faux-Tweeter/traitementChangeProfil">
        <p>
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" size="30" maxlength="10" />
            <input type="text" name="info_perso" id="info_perso" placeholder="bio de l'utilisateur" size="30"/><br/>
            <label for="birth">Votre date de naissance<br/></label>
            <input type="date" name="birth" id="birth" placeholder="date de naissance"/>
            <input type="submit" value="Enregistrer les modifications" />
        </p>
    </form>
</article>

<img class="phoenix1" src="img/Phoenix_right.png" HEIGHT="350" alt="un phoenix a droite de l'ecran">
<img class="phoenix2" src="img/Phoenix_left.png" HEIGHT="350" alt="un phoenix a gauche de l'ecran">
<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>
