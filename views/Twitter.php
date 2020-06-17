<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Twitter</title>
    <link rel="stylesheet"  href="css/styleTwitter.css">
</head>

<body>

<!--menu-->

<?php include("menu.php"); ?>

<h1>
  Vous avez quelque chose à partager ? </br>
  Dites-nous tout !
</h1>
    
<article>
    <h4>Ecrire un nouveau Tweet</h4>
    <ul class="form-style-2">
    <form method="post" action="/projet_bd/pages/traitementTweet">
        <textarea name="tweet_content" id="tweet_content" class="field-divided" placeholder="Quoi de neuf ?" rows="5" cols="70" maxlength="140"></textarea>
        <input type="submit" value="Tweeter" />
    </ul>
    </form>

</article>

<img class="phoenix1" src="img/Phoenix_right.png" HEIGHT="350" alt="un phoenix a droite de l'ecran">
<img class="phoenix2" src="img/Phoenix_left.png" HEIGHT="350" alt="un phoenix a gauche de l'ecran">
<!-- Le pied de page -->

<?php include("pied_de_page.php"); ?>

</body>
</html>
