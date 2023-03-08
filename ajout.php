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
            <a class="navbar-brand" href="./index.php"><img src="./logo/LGM.png" alt="Logo" style="width:120px;"></a>
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
          

          <div class="col-9">
            <div class="container text-uppercase">
              <h2 class="text-center mb-5 text-uppercase" style="color: #2F58CD">Ajouter un ouvrage</h2>
              <div class="row">
                <form action="" method="post">
                        <div class="my-3">
                            <input type="text" class="w-100 input-blue" name="titre" placeholder="le titre de l’ouvrage ...">
                        </div>
                        <div class="my-3">
                            <input type="text" class="w-100 input-blue" name="auteur" placeholder="Le nom du l’auteur ...">
                        </div>
                        <div class="my-3">
                            <label class="form-label mx-3">Image de couverture : </label>
                            <input type="file" class="w-100 input-blue" name="file">
                        </div>
                        <div class="my-3 d-flex justify-content-between gap-3">
                            <select class="w-50 input-blue" name="etat_ouvrage">
                                <option>Choisir l’état de l’ouvrage</option>
                                <option value="Neuf">Neuf</option>
                                <option value="Bon état">Bon état</option>
                                <option value="Acceptable">Acceptable</option>
                                <option value="Assez usé">Assez usé </option>
                                <option value="Déchiré">Déchiré</option>
                            </select>

                            <select class="w-50 input-blue" name="type_ouvrage">
                                <option>Choisir le type de l’ouvrage</option>
                                <option value="livre">livre</option>
                                <option value="roman">roman</option>
                                <option value="DVD">DVD</option>
                                <option value="mémoire de recherche">mémoire de recherche</option>
                            </select>
                        </div>
                        <div class="my-3 d-flex d-flex justify-content-between gap-2">
                            <div>
                                <label class="form-label mx-3"> La date d’édition : </label>
                                <input type="date" class="w-100 input-blue" name="date_edition">
                            </div>
                            <div>
                                <label class="form-label mx-3">  La date d’achat : </label>
                                <input type="date" class="w-100 input-blue" name="date_achat">
                            </div>
                            <div>
                                <label class="form-label mx-3">le nombre de pages : </label>
                                <input type="number" class="w-100 input-blue" name="nombre_pages">
                            </div>
                            
                        </div>
                        <div class="my-3">
                            <button Class="w-100 blue" name="ajoter">Ajouter</button>
                        </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    
            <?php 
                if(isset($_POST['ajoter'])) {
                    $titre = $_POST['titre'];
                    $auteur = $_POST['auteur'];
                    $etat_ouvrage = $_POST['etat_ouvrage'];
                    $type_ouvrage = $_POST['type_ouvrage'];
                    $date_edition = $_POST['date_edition'];
                    $date_achat = $_POST['date_achat'];
                    $nombre_pages = $_POST['nombre_pages'];
                    
                    if(isset($_FILES['file'])) {
                      $image_name = $_FILES['file']['name'];
                      $tmp_name = $_FILES['file']['tmp_name'];
                      $destination = 'images/';
                      move_uploaded_file($tmp_name,$destination.$image_name);
                    }
             


                    // $book_insert_request = "INSERT INTO `ouvrage` VALUES (NULL, '$titre', '$auteur', '$image_link', '$etat_ouvrage', '$type_ouvrage', '$date_edition', '$date_achat', '$nombre_pages')";
                    // $book_insert = $db_connection->prepare($book_insert_request);
                    // $book_insert->execute();

                }



            ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>