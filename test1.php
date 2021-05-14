<!DOCTYPE html>
<?php error_reporting(0); ?>
<html lang="fr">
<head>
    <title>Secure contact form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Web-Concept-Site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="test1.php">Formulaire 1 </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="form2.php">Formulaire 2</a>
            </li>

        </ul>
    </div>
</nav>


<?php
if(isset($_POST['submit'])){
    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));
    if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
        $name_error = 'Votre nom ne semble pas correct';
    }
    if(!preg_match("/^[A-Za-z0-9 éçè.'-]+$/", $subject)){
        $subject_error = 'Veuillez écrire un sujet ';
    }
    if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
        $email_error = 'Votre email ne semble pas correct';
    }
    if(strlen($message) === 0){
        $message_error = 'Votre message ne doit pas être vide';
    }
}
?>

<!--========================================================================-->




<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <div class="form-body">
                <div class="row">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items">
                                <h3>Pour nous contacter</h3>
                                <p>Remplissez les données ci-dessous.</p>
                                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                                    <div class="col-md-12">
                                        <label for="name">Nom:</label><br>
                                        <input type="text" name="name">
                                        <p class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></p>

                                    </div>

                                    <div class="col-md-12">
                                        <label for="email">Email:</label><br>
                                        <input type="text" name="email">
                                        <p class="text-danger"><?php if(isset($email_error)) echo $email_error; ?></p>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="subject">Sujet:</label><br>
                                        <input type="text" name="subject">
                                        <p class="text-danger"><?php if(isset($subject_error)) echo $subject_error; ?></p>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="message">Message:</label><br>
                                        <textarea name="message"></textarea>
                                        <p class="text-danger"><?php if(isset($message_error)) echo $message_error; ?></p>
                                    </div>



                                    <div class="form-button mt-3">
                                        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Inscrivez-vous</button>
                                    </div>
                                </form>
                                <?php
                                if(isset($_POST['submit']) && !isset($name_error) && !isset($subject_error) && !isset($email_error) && !isset($message_error)){
                                    $to = 'youremail@addres.com'; // edit here
                                    $body = " Name: $name\n E-mail: $email\n Message:\n $message";
                                    if(mail($to, $subject, $body)){
                                        echo '<p style="color: green">Message Envoyer</p>';
                                    }else{
                                        echo "<p class='text-danger'>Une erreur s'est produite, veuillez réessayer plus tard</p>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Responsive Texte aligné à gauche et le formulaire sur la droite</h1>
            <p class="lead">Concevez et personnalisez rapidement des sites mobiles réactifs avec Bootstrap, la boîte à outils open source frontale la plus populaire au monde, avec des variables et des mixins Sass, un système de grille réactif, de nombreux composants prédéfinis et de puissants plugins JavaScript.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" class="btn btn-success btn-lg px-4 me-md-2">Primary</button>
                <button type="button" class="btn btn-outline-info btn-lg px-4">Default</button>
            </div>
        </div>
    </div>
</div>


<footer class="text-muted py-5 text-white bg-dark">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Exemple de formulaire de contact fonctionnel &copy; Web-Concept-site, téléchargez-le et personnalisez-le vous-même!</p>
        <p class="mb-0">Web-Concept-Site<a href="https://web-concept-site.fr/">Visiter le site</a> .</p>
    </div>
</footer>
<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>


</html>