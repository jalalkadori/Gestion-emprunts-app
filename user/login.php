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
                    <a class="btn btn-primary" href="inscription.php" role="button">Inscription</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <?php 
        $error_email = '';
        if(isset($_POST['connecter'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $adherent_connection_request = "SELECT * FROM `adherent` WHERE EMAIL_ADHERENT = '$email' AND MDP_ADHERENT = '$password'";
            $adherent_connection = $db_connection->prepare($adherent_connection_request);
            $adherent_connection->execute();
            $adherent_connection_results = $adherent_connection->fetch( PDO::FETCH_ASSOC );
            $count = $admin_connection->rowCount();
            if($count == 0) {
                $error_email = 'Adresse email ou mot de pass incorect';
            } else {
                echo $admin_connection_results['EMAIL_BIBLIOTHECAIRE'];
                echo $admin_connection_results['MDP_BIBLIOTHECAIRE'];

                session_start();
                $_SESSION['email'] = $admin_connection_results['EMAIL_BIBLIOTHECAIRE'];
                $_SESSION['password'] = $admin_connection_results['MDP_BIBLIOTHECAIRE'];
                $_SESSION['id'] = $admin_connection_results['ID_BIBLIOTHECAIRE'];
                $_SESSION['full_name'] = $admin_connection_results['NOM_BIBLIOTHECAIRE'];
                header('Location: index.php');
            }
        }
    
    
    ?>

    <div class="container-fluid ">
        <div class="container mt-5">
            <div class="row mt-5 w-100 d-flex justify-content-center">
                <div class="col-6 mt-5">
                    <form action="#" method="post">
                        <div class="my-3 text-center">
                            <img src="./logo/user.png" class="circle p-2 rounded-circle" style="width=100px">
                        </div>
                        <div class="my-3 text-center">
                            <h3>Se connecter à votre compte</h3>
                        </div>
                        <div class="my-3">
                            <input type="email" class="w-100 input-blue" name="email" placeholder="name@example.com">
                        </div>
                        <div class="my-3">
                            <input type="password" class="w-100 input-blue" name="password" placeholder="Entrer votre mot de pass ...">
                            
                        </div>
                            <span class="text-danger"><?= $error_email?></span>
                        <div class="my-3">
                            <button Class="w-100 blue" name="connecter">Connecter</button>
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