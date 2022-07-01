<?php
    if(!empty($_POST))
    //verification si les forlualires sont pas vides
    {
      require_once'inclusion_sql.php';


        if(empty($_POST['nom']) || !preg_match('#^[a-zA-Z]+$#', $_POST['nom']))
        {
          $erreur['nom']='Votre nom n\'est pas valide';
        }

        if(empty($_POST['prenom']) || !preg_match('#^[a-zA-Z]+$#', $_POST['prenom']))
        {
          $erreur['prenom']='Votre prenom n\'est pas valide';
        }

        //Verification pseudo
        if(empty($_POST['pseudo']) || !preg_match('#^[a-zA-Z0-9 _-]+$#', $_POST['pseudo']))
        {
          $erreur['pseudo']='Votre pseudo n\'est pas valide';
        }
             else 
            {
              //recupurer les donnees dans les tables, 
              $req=$bdd->prepare('SELECT id FROM liste WHERE pseudo= ?');
              $req->execute(array($_POST['pseudo']));
              $liste=$req->fetch();
                  if($liste)
                  {
                    $erreur['pseudo']='choissisez d\'autre pseudo';
                  }
            }

        //cverification de l'email avec regex
        if(empty($_POST['email']) || !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['email']))
        {
          $erreur['email']='Votre email n\'est pas valide';
        }
        else 
        {
          //recupurer les donnees dans les tables, 
          $req=$bdd->prepare('SELECT id FROM liste WHERE email= ?');
          $req->execute(array($_POST['email']));
          $liste=$req->fetch();
              if($liste)
              {
                $erreur['email']='Cette email est deja utiliser';
              }
        }

        //adresse
        if(empty($_POST['adresse']))
        {
          $erreur['adresse']="Votre adresse n'est pas valide";
        }
        //date de naisssance
        if(empty($_POST['birth']))
        {
          $erreur['birth']="Votre date de naissance n'est pas valide";
        }
        //szexe
        if(empty($_POST['sexe']))
        {
          $erreur['sexe']="Votre sexe n'est pas mentioner";
        }
        //nationaliter
        if(empty($_POST['nationaliter']))
        {
          $erreur['nationaliter']="Votre nationaliter n'est pas memntioner";
        }
        
        //mot de passe
        if(empty($_POST['mdp']) || $_POST['mdp'] != $_POST['mdp2'])
        {
          $erreur['mdp']="Les mots de passe sont  differents";
        }

        //connexionn base de données
        if(empty($erreur))
        {
        
$req= $bdd->prepare("INSERT INTO liste SET nom= ?, prenom= ?, pseudo= ?, email= ?, adresse= ?, birth= ? , sexe= ? , nationaliter= ?,mdp= ?");
$mdp_hash=sha1($_POST['mdp']);
$req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['adresse'], $_POST['birth'], $_POST['sexe'], $_POST['nationaliter'], $mdp_hash));
            header('Location: login_first.php');
        }
    }
?>
<!doctype html>
<html lang="fr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
<body class="d-flex h-100 text-white bg-dark">  
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

<main class="sing-in">

    <div class="py-3">
      <img class="d-block mx-auto mb-4" src="image/logo.png" alt="Logo coco" width="100" height="100">
    </div>

    <div class="row g-3">
        <h2 class="mb-3 text-center text-warning">Inscrivez vous sur  COCOhuB</h2> <!--
        <?php /*if(!empty($erreur)): ?>
          <div class="alert alert-primary"><p>Les formulaires sont vides</p></div>
          <?php foreach($erreur as $erreura): ?>
            <ul>
              <li><?=$erreura; ?></li>
              <?php endforeach; ?>
            </ul>
        <?php endif; */?>-->
        <form action="" method="POST">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="nom" name="nom" placeholder="" value="" >
            </div>

            <div class="col-md-6">
              <label for="prenom" class="form-label">Prenom</label>
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="" value="">
              <div class="invalid-feedback">
              Votre prenom est obligatoire.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="pseudo" class="form-label">Pseudo</label>
              <div class="input-group has-validation">
                <span class="input-group-text text-warning">@</span>
                <input type="text" class="form-control text-warning" id="pseudo" name="pseudo" placeholder="pseudo">
              <?php  echo "<p class=alert alert-danger'>".$erreur["pseudo"]."</p>" ?>
              </div>
            </div>

            <div class="col-sm-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
              <?php  echo "<p class=alert alert-danger'>".$erreur["email"]."</p>" ?>
            </div>

            <div class="col-md-6">
              <label for="adresse" class="form-label">Adresse</label>
              <input type="text" class="form-control" name="adresse" placeholder="102 , Tanjombato" required>
            </div>

            <div class="col-md-6">
              <label for="birth" class="form-label">Date de naissance</label>
              <input type="date" class="form-control" name="birth" placeholder="Appartement ou rue">
            </div>
            <div class="col-md-5">
              <label for="sexe" class="form-label">Sexe</label>
              <select class="form-select" name="sexe" id="sexe" required>
                <option value="">Choisir...</option>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
                <option value="inconnue">Je ne sais pas</option>
              </select>
              <div class="invalid-feedback">
                Validez votre Sexe.
              </div>
            </div>

            <div class="col-md-5">
              <label for="nationalite" class="form-label">Nationalité <span class="text-muted text-warning">(Optionel)</span></label>
              <select class="form-select" id="nationalite" name="nationaliter">
                <option value="">Choisir...</option>
                <option value="Malagasy">Malagasy</option>
                <option value="Français">Français</option>
                <option value="Africain">Africain</option>
                <option value="Anglais">Anglais</option>
                <option value="Noob">Noob</option>
                <option value="Propla">Propla</option>
                <option value="Faible">Faible</option>
              </select>
              <div class="invalid-feedback">
                Validez votre nationalité.
              </div>
            </div>
            <div class="col-mb-5">
             <label for="photo" class="form-label">Ajouter un photo</label>
             <input class="form-control form-control-sm" id="photo" name="photo" type="file">
            </div>
            <div class="col-md-6">
              <label for="mdp" class="form-label">Mot de passe</label>
              <input type="password" name="mdp" class="form-control" id="mdp" placeholder="Mot de passe">
              <small class="text-muted">12 caracteres autorisé</small>
              <div class="invalid-feedback">
                Le mot de passe est obligatoire.
              </div>
            </div>

            <div class="col-md-6">
              <label for="mdp2" class="form-label">Confirmation du mot de passe</label>
              <input type="password" class="form-control" name="mdp2" id="mdp2" placeholder="Confirmer votre mot de passe" required>
              <div class="invalid-feedback">
                La confirmation du mot den passe est obligatoire*.
              </div>
            </div>
          </div>
          <?php  echo "<p class=alert alert-danger'><p>".$erreur["mdp"]."</p>" ?>
          <hr class="my-4">
          <div class="form-check">
            <input type="checkbox" name="termcond" class="form-check-input" id="conditionsterms" required>
            <label class="form-check-label" for="same-address">J'ai deja lu la terme et conditions</label>
          </div>

          <div class="form-check">
            <input type="checkbox" name="agree" class="form-check-input" id="info" required>
            <label class="form-check-label" for="save-info">Accepter la terme et condition</label>
          </div>

          <hr class="my-4">
          <button class="w-100 btn btn-outline-warning   btn-lg" type="submit">S'inscrire</button>
        </form>
        </div>
  </main>
          <hr class="my-4">
      <p class="lh-lg">Vous êtes deja abonné?<a href="login.php" target="_blank"> connnectez-vous </a>ici.</p>
  <footer class="mx-auto p-5 text-white-50">
    <p class="mb-1">&copy; 2021–2022 COCO company</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
<script src="script/bootstrap.bundle.min.js"></script>
  </body>
</html>

