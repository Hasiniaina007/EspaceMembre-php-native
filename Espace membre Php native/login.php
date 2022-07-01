<?php
    try
    {
        $bdd=new PDO('mysql:host=localhost;dbname=cocohub;charset=utf-8','root', '');
    }
catch(Exception $e)
    {
        die('Erreur :'.$e->getMessage());
    }
    $mdp_hash=sha1($_POST['mdp']);

if(isset($_POST['pseudo']) && isset($_POST['mdp']))
{
  $req=$bdd->prepare('SELECT id FROM liste WHERE pseudo= ? AND mdp= ?');
  $req->execute(array($_POST['pseudo'],$mdp_hash));
    $resultat = $req->fetch();
    if (!$resultat)
    {
      $err_connexion='votre mot de passe ou votre nom d\'utilisateur est incorrect';  
    }
    else
    {
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $resultat['pseudo'];
    header('Location: compte.php'); 
    }
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="script/script.js"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
<body class="text-center d-flex h-100 text-white bg-dark">
<div class="d-flex w-100 h-100 p-3 mx-auto flex-column">
<main class="form-signin">
  <form action="" method="POST">
    <img class="mb-4" src="image/logo.png" alt="Logo du COCO" width="100" height="100">
    <h1 class="h3 mb-5 fw-normal orange-500">Connectez vous</h1>

    <div class=" input-group-text mb-4 bg-dark ">
      <input type="text" name="pseudo" class="form-control bg-dark text-warning" id="pseudo" placeholder="example69">
    </div>

    <div class="input-group-text mb-4 bg-dark">
      <input type="password" name="mdp" class="form-control" id="floatingPassword" placeholder="Password">
    </div>
    <div class="checkbox mb-4">
      <label>
        <input type="checkbox" value="remember-me text-warning"> me souvenir
      </label>
    </div>
    <button class="w-100 btn btn-outline-warning" type="submit">Se connecter</button>
    <hr class="my-4">
    <p>Vous n'êtes pas encore abonné? <a href="sing_in.php">inscrivez-vous</a> ici</p>
    <p class="mt-5 mb-3 text-muted">&copy; 2020–2021</p>
  </form>
</main>
</div>
</body>
</html>