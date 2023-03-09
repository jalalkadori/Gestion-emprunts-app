<?php include("./dbConnection.php");
session_start();

if(!isset($_SESSION['email'])) {  
  header('Location: login.php');
} 


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LGM | accueil</title>
    <link rel="stylesheet" href="./style.css">
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
  
      <div class="container-fluid ">

        <div class="row min-vh-100 d-flex justify-content-between">

          <div class="col-2 d-flex flex-column align-items-center shadow-sm" style="background-color: #2F58CD; border-radius: 0 25px 0 0">
            <a class="btn bg-white my-4 rounded-pill w-100 font-weight-bold">Gestionnaire de taches</a>
            <div class="d-flex flex-row justify-content-start align-items-center mb-4">
              <i class="fa-solid fa-circle-plus fs-3 text-light"></i>
              <a class="btn text-light fs-5 font-weight-bold" href="./ajout.php" name="ajouter">Ajouter un ouvrage</a>
            </div>
            <div class="d-flex flex-row justify-content-start align-items-center mb-4">
              <i class="fa-solid fa-check fs-3 text-light"></i>
              <a class="btn text-light fs-5 font-weight-bold" name="validation">Enregistrement des emprunts</a>
            </div>
            <div class="d-flex flex-row justify-content-start align-items-center mb-4">
              <i class="fa-solid fa-bars-staggered fs-3 text-light"></i>
              <a class="btn text-light fs-5 font-weight-bold" name="list">List des ouvrages</a>
            </div>
          </div>
            <?php
                $list_ouvrage_request = "SELECT * FROM `ouvrage`";
                $list_ouvrage = $db_connection->prepare($list_ouvrage_request);
                $list_ouvrage->execute();

            
            ?>


          <div class="col-9">
            <div class="container text-center text-uppercase">
              <h1 class="text-center mb-5 text-uppercase" style="color: #2F58CD">list des ouvrages</h1>
              <div class="row row-cols-4">
                <?php
                while($row = $list_ouvrage->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                        <div class='col'>
                            <div class='card position-relative' style='width: 15rem; height:400px;'>
                                <img src='".$row['IMG_OUVRAGE']."' class='card-img-top img-thumbnail' style='height:200px;'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$row['TITRE_OUVRAGE']."</h5>
                                    <p class='card-text'>Par : ".$row['NOM_AUTHEUR']."</p>
                                    <a href='#' class='btn btn-success'>Modifer</a>
                                    <a href='#' class='btn btn-danger'>Supprimer</a>
                                </div>
                                <span class='position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle'>
                                    <span class='visually-hidden'>New alerts</span>
                                </span>
                            </div>
                        </div>
                    ";
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>