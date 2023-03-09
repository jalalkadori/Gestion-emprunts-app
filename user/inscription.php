<?php include("./dbConnection.php");


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LGM | Connection</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/75c6b1327b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="./logo/LGM.png" alt="Logo" style="width:120px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-primary" href="login.php" role="button">Se connecter</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <?php 

        if(isset($_POST['creer'])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $cin = $_POST['cin'];
            $date_naissance = $_POST['date_naissance'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $type_adherent = $_POST['type_adherent'];
            $email = $_POST['email'];
            $password = $_POST['password'];



            $creation_compte_request = "INSERT INTO `adherent` VALUES (NULL, '$nom', '$prenom', '$cin', '$adresse', '$date_naissance', '$telephone', '$email', '$password', '$type_adherent', current_timestamp(), 0);";
            $creation_compte = $db_connection->prepare($creation_compte_request);
            $creation_compte->execute();
    
            header('Location: login.php');
        }
    
    
    ?>

    <div class="container-fluid ">
        <div class="container">
            <div class="row w-100 d-flex justify-content-center">
                <div class="col-6">
                    <form action="#" method="post">
                        <div class="my-3 text-center">
                            <h3>Création de compte</h3>
                        </div>
                        <div class="row">
                            <div class="col my-3">
                                <input type="text" class="w-100 input-blue" name="nom" placeholder="Nom ...">
                            </div>
                            <div class="col my-3">
                                <input type="text" class="w-100 input-blue" name="prenom" placeholder="Prénom ...">
                            </div>
                        </div>
                        <div class="my-3">
                            <input type="text" class="w-100 input-blue" name="cin" placeholder="CIN ...">
                        </div>
                        <div class="my-3">
                            <label class="form-label mx-3"> La date de naissance : </label>
                            <input type="date" class="w-100 input-blue" name="date_naissance">
                        </div>
                        <div class="my-3">
                            <input type="text" class="w-100 input-blue" name="adresse" placeholder="Adresse postale ... ">
                        </div>
                        <div class="my-3">
                            <input type="number" class="w-100 input-blue" name="telephone" placeholder="Numero de telephone ... ">
                        </div>
                        <div class="my-3">
                            <select class="w-100 input-blue" name="type_adherent">
                                <option>Type d’adherent</option>
                                <option value="Étudiants">Étudiants</option>
                                <option value="fonctionnaires">fonctionnaires</option>
                                <option value="femmes au foyer">femmes au foyer</option>
                            </select>
                        </div>
                        <div class="my-3">
                            <input type="email" class="w-100 input-blue" name="email" placeholder="name@example.com">
                        </div>
                        <div class="my-3">
                            <input type="password" class="w-100 input-blue" name="password" placeholder="Choisir un mot de pass ...">
                        </div>
                        <div class="my-3">
                            <button Class="w-100 blue" name="creer">Créer votre compte</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>