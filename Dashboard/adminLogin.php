<html>
    <head>
        <title> Connexion Administrateur </title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="../Assets/CSS/admin.css" rel="stylesheet"/>
        <script src="https://kit.fontawesome.com/b31216a86e.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <a href="../index.php" class="lien1"> <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> </a>
        <form action="adminLogin.php" method="POST">
            <div class="div0"> </div>
            <div class="div1">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="mail" placeholder="admin@gmail.com"/>
            </div>
            <div class="div1">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="password" placeholder="passer"/>
            </div>
            <input type="submit" value="Valider" class="valider"/>
        </form>

        <section class="modal1">
            <section class="modal1_content">
                <h3>Veuillez remplir tous les champs !</h3>
                <a href="" class="modal_close">&times;</a> 
            </section>
        </section>

        <section class="modal2">
            <section class="modal2_content">
                <h3> Enregistrement effectué avec succès! </h3>
                <a href="" class="modal_close">&times;</a> 
            </section>
        </section>
    </body>
</html>

<?php 
    if ((isset($_POST['mail'])) && (isset($_POST['password'])))
    {
        if (($_POST["mail"] == "admin@gmail.com") && ($_POST["password"] == "passer"))
        {
            header("Location: dashbordAdmin.php");
            exit();
        }
    }
?>
