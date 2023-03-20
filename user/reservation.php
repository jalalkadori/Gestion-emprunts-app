<?php 
include("./dbConnection.php");
include("./session_config.php");


$id_adherent = $_SESSION['id_adherent'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LGM | Reservation</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/75c6b1327b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
   
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#"><img src="./logo/LGM.png" alt="Logo" style="width:120px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link mx-2">
                      <?php echo $_SESSION['full_name'];?>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center ">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <a class="btn" href="./logout.php" name="Deconnxion" role="button">Deconnxion</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
  
      <div class="container-fluid">

        <div class="row min-vh-100 d-flex justify-content-between">

          <div class="col-2 d-flex flex-column align-items-center shadow-sm" style="background-color: #2F58CD; border-radius: 0 25px 0 0">
            <a class="btn bg-white my-3 rounded-pill w-100 font-weight-bold" href="index.php">Page d'accueil</a>
            <a class="btn bg-white mb-3 rounded-pill w-100 font-weight-bold" href="profil.php">Mon Profil</a>
          </div>
           

          <div class="col-9">

            <div class="container my-5  text-uppercase">
                <h3 class="text-center mb-5 text-uppercase">PAGE DE RESERVATION !</h1>
             
                <?php
                    $code = $_GET['code'];
                    

                    $ouvrage_selectione_request = "SELECT * FROM `ouvrage` WHERE ouvrage.RESERVATION = 'non' AND ouvrage.CODE_OUVRAGE = '$code'";
                    $ouvrage_selectione = $db_connection->prepare($ouvrage_selectione_request);
                    $ouvrage_selectione->execute();
                    $ouvrage = $ouvrage_selectione->fetch( PDO::FETCH_ASSOC);

                    
                    echo "
                    <div class='card mx-auto' style='max-width: 800px;'>
                        <div class='row g-0'>
                            <div class='col-md-4'>
                                <img src='".$ouvrage['IMG_OUVRAGE']."' alt='".$ouvrage['TITRE_OUVRAGE']."' class='img-fluid'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body mt-2'>
                                    <h5 class='card-title'>".$ouvrage['TITRE_OUVRAGE']."</h5>
                                    <ul class='list-group list-group-flush my-2'>
                                        <li class='list-group-item'><p class='card-text'>Par : ".$ouvrage['NOM_AUTHEUR']."</p></li>
                                        <li class='list-group-item'><p class='card-text'>Type d'ouvrage : ".$ouvrage['TYPE_OUVRAGE']."</p></li>
                                        <li class='list-group-item'><p class='card-text'>date d'édition : ". date("d-m-Y", strtotime($ouvrage['DATE_EDITION'])) ."</p></li>
                                        <li class='list-group-item'><p class='card-text'>nombre de page : ".$ouvrage['NOMBRE_PAGE']."</p></li>
                                        <li class='list-group-item'></li>
                                    </ul>
                                    <p class='text-danger'>* Après validation de votre réservation, vous devez vous présenter en 24h à la médiathèque afin de récupérer l'ouvrage réservé. </p>
                                    <form action='reservation-script.php' methode='POST'>
                                        <input type='hidden' value='".$ouvrage['CODE_OUVRAGE']."' name='codeOuvrage'>
                                        <button class='btn btn-dark w-100 text-uppercase'>réserver</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";  



                ?>


            </div>
          </div>
        </div>
      </div>
    


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>