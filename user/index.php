<?php 
include("./dbConnection.php");
include("./session_config.php");
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
            <?php
                $list_ouvrage_request = "SELECT * FROM `ouvrage` WHERE ouvrage.RESERVATION = 'non'";
         
                if(isset($_POST['chercher'])) {
                  $titre = $_POST["titre"];
                  $auteur = $_POST["auteur"];
                  $type_ouvrage = $_POST["type_ouvrage"];

                  if(!empty($titre)) {
                      $list_ouvrage_request.=" AND ouvrage.TITRE_OUVRAGE LIKE '$titre'";
                  } 
                  if(!empty($auteur)) {
                      $list_ouvrage_request.=" AND ouvrage.NOM_AUTHEUR = '$auteur'";
                  }
                  if(!empty($type_ouvrage)) {
                      $list_ouvrage_request.=" AND ouvrage.TYPE_OUVRAGE = '$type_ouvrage'";
                  }
               
                } 

               

            ?>


          <div class="col-9">
            <section class="container">
                  <h3 class="">Filtrer la liste des ouvrage !</h2>
                  <form class="row row-cols-1 row-cols-lg-4"  action="" method="POST">
                      <div class="col">
                          <h5 for="type">Titre de l’ouvrage</h5>
                          <input type="text" class="w-100 input-blue" name="titre"  > 
                      </div>
                      <div class="col">
                          <h5 for="type">Nom d’auteur</h5>
                          <input type="text" class="w-100 input-blue" name="auteur">
                      </div>
                      <div class="col"> 
                          <h5 for="type">Type de l’ouvrage</h5>
                          <select class="w-100 input-blue" name="type_ouvrage">
                                <option></option>
                                <option value="livre">livre</option>
                                <option value="roman">roman</option>
                                <option value="DVD">DVD</option>
                                <option value="mémoire de recherche">mémoire de recherche</option>
                          </select>
                      </div>
                      
                      <div class="col d-flex align-items-end mt-2">
                          <h5 for="type"></h5>
                          <button Class="w-100 blue" name="chercher">Chercher</button>
                      </div>
                  </form>
              </section>

            <div class="container my-5 text-center text-uppercase">
              <h3 class="text-center mb-5 text-uppercase">list des ouvrages</h1>
              <div class="row row-cols-4">
                <?php

                $list_ouvrage = $db_connection->prepare($list_ouvrage_request);
                $list_ouvrage->execute();

                while($row = $list_ouvrage->fetch(PDO::FETCH_ASSOC)) {
                    echo "
                        <div class='col'>
                            <div class='card position-relative' style='width: 15rem; height:400px;'>
                                <img src='".$row['IMG_OUVRAGE']."' class='card-img-top img-thumbnail' style='height:200px;'>
                                <div class='card-body d-flex flex-column justify-content-end'>
                                    <h5 class='card-title'>".$row['TITRE_OUVRAGE']."</h5>
                                    <p class='card-text'>Par : ".$row['NOM_AUTHEUR']."</p>                               
  
                                    <form action='reservation.php' methode='post'>
                                        <input type='hidden' name='code' value='".$row['CODE_OUVRAGE']."'>
                                        <button type='submit' class='btn btn-dark w-100 text-uppercase' value='Submit'>réserver</button>
                                    </form>
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