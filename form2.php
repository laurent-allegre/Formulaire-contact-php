<!DOCTYPE html>
<?php error_reporting(0); ?>
<html lang="fr">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catalogue PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="css/style.css" >
    <link rel="stylesheet" href="css/main.css" >




</head>
<body>
<?php
if(isset($_POST['submit'])){
    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
    if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
        $name_error = 'Nom invalide';
    }
    if(!preg_match("/^[A-Za-z0-9 éçè.'-]+$/", $subject)){
        $subject_error = 'Sujet invalide';
    }
    if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
        $email_error = 'Email invalide';
    }
    if(strlen($message) === 0){
        $message_error = 'Votre message est vide';
    }
}
?>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Web-Concept-Site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="test1.php">Formulaire 1 </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="form2.php">Formulaire 2</a>
            </li>

        </ul>
    </div>
</nav>

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-3 text-lg-start">
            <h2 class=" fw-bold lh-1 mb-3">Responsive Texte aligné à gauche et le formulaire sur la droite</h2>
            <p class="col-lg-10 fs-4">Vous trouverez ci-dessous un exemple de formulaire entièrement construit avec les contrôles de formulaire de Bootstrap. Chaque groupe de formulaires requis a un état de validation qui peut être déclenché en essayant de soumettre le formulaire sans le remplir.</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-9">
            <div class="contact1">
                <div class="contact1">
                    <div class="contact1-pic js-tilt" data-tilt>
                        <img src="images/img-01.png" alt="IMG">
                    </div>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="requires-validation contact1-form" novalidate>
				<span class="contact1-form-title">
					Pour nous écrire, Remplissez les données ci-dessous.
				</span>

                        <div class="wrap-input1 validate-input" data-validate = "Name is required">
                            <input class="input1" type="text" name="name" placeholder="Nom" >
                            <span class="shadow-input1"></span>
                            <p class="text-white text-center"><?php if(isset($name_error)) echo $name_error; ?></p>

                        </div>

                        <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input1" type="text" name="email" placeholder="Email">
                            <span class="shadow-input1"></span>
                            <p class="text-white text-center"><?php if(isset($email_error)) echo $email_error; ?></p>

                        </div>

                        <div class="wrap-input1 validate-input" data-validate = "Subject is required">
                            <input class="input1" type="text" name="subject" placeholder="Sujet">
                            <span class="shadow-input1"></span>
                            <p class="text-white text-center"><?php if(isset($subject_error)) echo $subject_error; ?></p>

                        </div>

                        <div class="wrap-input1 validate-input" data-validate = "Message is required">
                            <textarea class="input1" name="message" placeholder="Message"></textarea>
                            <span class="shadow-input1"></span>
                            <p class="text-white text-center"><?php if(isset($message_error)) echo $message_error; ?></p>

                        </div>

                        <div class="container-contact1-form-btn">
                            <button id="submit" name="submit" value="Submit" type="submit" class="contact1-form-btn">
						<span>
							Envoyer un email
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
                            </button>
                        </div>
                        <?php
                        if(isset($_POST['submit']) && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
                            $to = 'Ecrire ici votre email pour la réception des mails(contact@mail.com)'; // edit here
                            $body = " Nom: $name\n E-mail: $email\n Sujet: $subject\n Message:\n $message";
                            if(mail($to, $subject, $body)){
                                echo '<h5 class="text-center mt-1" style="color: green">Votre Message à bien été Envoyé</h5>';
                            }else{
                                echo "<h5>Une erreur s'est produite, veuillez réessayer plus tard</h5>";
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Footer -->
<footer class="page-footer bg-dark text-white  font-small blue">
    <div class="container">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://web-concept-site.fr/">Web-Concept-site</a>
        </div>
        <!-- Copyright -->
        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1">
                    <a href="https://www.linkedin.com/in/laurent-allegre-72225a93/"><i class="fab fa-linkedin-in"> </i></a>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-github mx-1">
                    <a href="https://github.com/laurent-allegre"><i class="fab fa-github"> </i></a>
                </a>
            </li>
        </ul>
        <!-- Social buttons -->
    </div>
</footer>
<!-- Footer -->
<script src="js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>


