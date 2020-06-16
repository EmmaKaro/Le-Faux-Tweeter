<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Le Faux Twitter inscription</title>
    
  <link rel="stylesheet" href="css/styleInscription.css">
</head>

<body>


    <h1>Rejoignez notre communauté!!!</h1>
    <form method="post" action="/projet_bd/pages/traitement">
        <ul class="form-style-1">
    
		<!--Name field-->
			<div class="form-group">
				<label class="control-label" for="name">Nom:</label>
				<input type="text" class="form-control" id="name" name="name"
					required="required"/>
			</div>
			<!--FirstName field-->
			<div class="form-group">
				<label class="control-label" for="firstname">Prénom:</label>
				<input type="text" class="form-control" id="firstname" name="firstname"
					required="required"/>
			</div>

			<!--Pseudo field-->
			<div class="form-group">
				<label class="control-label" for="pseudo">Pseudo:</label>
				<input type="text" class="form-control" id="pseudo" name="pseudo"
					required="required"/>
			</div>

			<!--Email field-->
			<div class="form-group">
				<label class="control-label" for="email">Addresse Email:</label>
				<input type="email" class="form-control" id="email" name="email"
					required="required"/>
			</div>
			
			<!--<?php if(isset($_SESSION['flashInscription'])) {
            echo "
           <p style='color: red'>
            " . $_SESSION['flashInscription'] . " 
           </p>
        ";
        }
        ?>-->
			
			<!--Password field-->
			<div class="form-group">
				<label class="control-label" for="password">Mot de passe: </label>
				<input type="password" class="form-control" id="password" name="password"
					required="required"/>
			</div>	
			<!--PasswordConfirmation field-->
			<div class="form-group">
				<label class="control-label" for="password_confirm">Confirmer votre mot de passe:</label>
				<input type="password" class="form-control" id="password_confirm" name="password_confirm"
					required="required"/>
			</div>	
			
			<div>
				<label for="birth">Votre date de naissance<br/></label>
				<input type="date" name="birth" id="birth" class="field-divided" placeholder="birth"/>
			</div>
			
			<input type="submit" class="btn btn-primary" value="Inscription" name="register"/
			
		</form>
        </ul>
    </form>

<img src="./view/img/twitter_bird.png" HEIGHT="700">
<!-- Le pied de page -->

<!--<?php include("pied_de_page.php"); ?>-->

</body>
</html>
