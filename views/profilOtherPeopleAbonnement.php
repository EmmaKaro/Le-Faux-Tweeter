<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="css/styleProfil.css">
</head>

<body>

<!--menu-->

<?php include("menu.php"); ?>

<!-- Petit menu: tweets, abonnements, abonn�s, j'aime-->

<section>
    <a href="/projet_bd/pages/profilTweet"><h4>Tweets</h4></a><a href="/projet_bd/pages/profilAbonnement"><h4>Abonnements</h4></a><a href="/projet_bd/pages/profilAbonnes"><h4>Abonn�s</h4></a><a href="/projet_bd/pages/profilLike"><h4>J'aime</h4></a><a href="/projet_bd/pages/changeProfil"><h14>Editer le profil</h14></a>
</section>

<!-- courte description du profil-->

<?php include("descriptionProfil.php"); ?>

<!-- nos tweets et retweet-->

<?php foreach ($params['tweets'] as $tweet) : ?>

    <li>
        <h8><?php echo $tweet["user_name"]; ?></h8><h10><?php echo $tweet["tweet_date"];?></h10>
        <h9><?php echo $tweet["tweet_content"]; ?></h9>
        <a href="/projet_bd/pages/traitementRetweet/<?php echo $tweet["tweet_id"] ?>">  <h10>Retweeter</h10> </a><a href="/projet_bd/pages/traitementLike/<?php echo $tweet["tweet_id"] ?>">  <h12>J'aime </h12> </a>
    </li>
<?php endforeach; ?>

<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>