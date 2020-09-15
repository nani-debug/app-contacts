<?php
    $err_mail=null;
    $err_pass=null;
    $message=null;

    if($_POST) {
        $mail=trim($_POST['mail']);
        $password=$_POST['your_pass'];
        $isOk=true;
        if(!$mail){
            $err_mail='Saisie du mail obligatoire!!';
            $isOk=false;
        }

        if(!$password){
            $err_pass='Saisissez votre mot de passe!!';
            $isOk=false;
        }

        if($isOk){
            include_once('lib/fonction.php');
            $result = getUserByEmail($mail);
            if(!$result){
                $message='Identifiant ou mot de passe incorrect';
            }
            else{
               $pswd = $result->mot_de_passe;
               if($pswd==$password){
                   session_start();
                   $_SESSION['uid']=$result->iduser;
                   header('location:index.php');
               }
               else {
                $message='Identifiant ou mot de passe incorrect';
               }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="inscription.php" class="signup-image-link">Créer un compte</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Bienvenue</h2>

                        <?php if(!is_null($message)):?>
                            <div class="err">
                                <?php echo $message ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                                <label for="mail"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="mail" id="mail" 
                                       placeholder="Votre Email" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>"/>
                                <?php if($err_mail != null): ?>
                                    <span class="text-danger"><?= $err_mail ?></span>
                                <?php endif; ?>
                            </div>
                                
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Mot de passe"/>
                                <?php if($err_pass != null): ?>
                                    <span class="text-danger"><?= $err_pass ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Se souvenir de moi</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Se connecter"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>