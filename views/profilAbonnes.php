<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="css/styleProfilAbonnements.css">
</head>

<body>

<!--menu-->

<?php include("menu.php"); ?>

<!-- Petit menu: tweets, abonnements, abonnés, j'aime-->

<section>
    <a href="profilTweet.php"><h4>Tweets</h4></a><a href="profilAbonnement.php"><h4>Abonnements</h4></a><a href="profilAbonnes.php"><h4>Abonnés</h4></a><a href="profilLike.php"><h4>J'aime</h4></a><a href="ChangeProfil.php"><h14>Editer le profil</h14></a>
</section>

<!-- courte description du profil-->

<?php include("descriptionProfil.php"); ?>

<!-- nos abonnés-->

<?php foreach ($params['users'] as $user) : ?>
    <li>
        <a href="/Le-Faux-Teewter/traitementSuivre/<?php echo $user->getId() ?>">  <h5>Suivre</h5> </a>
        <a href="/Le-Faux-Tweeter/profilOtherPeopleAbonnement/<?php echo $user->getId() ?>"><h16><?php echo $user->getPseudo(); ?></h16></a>        <h7>@<?php echo $user->getUserName(); ?></h7>
        <h8><?php echo $user->getInfoPerso(); ?></h8>
    </li>
<?php endforeach; ?>

<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>