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
              <a class="btn text-light fs-5 font-weight-bold" href="./reservation.php">Enregistrement des emprunts</a>
            </div>
            <div class="d-flex flex-row justify-content-start align-items-center mb-4">
              <i class="fa-solid fa-bars-staggered fs-3 text-light"></i>
              <a class="btn text-light fs-5 font-weight-bold" href="list.php">List des ouvrages</a>
            </div>
          </div>



          <div class="col-9">
            <div class="container text-center text-uppercase">
              <h1 class="text-center mb-5 text-uppercase" style="color: #2F58CD">aperçu</h1>
              <div class="row row-cols-2">
                <div class="col mb-5 d-flex justify-content-center">
                  <div class="card shadow" style="background-color: #2F58CD; width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title text-light text-uppercase">Total <br> des emprunts</h5>
                      <div class="d-flex flex-row justify-content-center align-items-center my-4">
                        <h2 class="text-light">255</h2>
                        <i class="fa-sharp fa-solid fa-arrow-up fs-3 text-light mx-3"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col mb-5 d-flex justify-content-center">
                  <div class="card shadow" style="background-color: #2F58CD; width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title text-light">Nombre <br> d’ouvrages</h5>
                      <div class="d-flex flex-row justify-content-center align-items-center my-4">
                        <h2 class="text-light">255</h2>
                        <i class="fa-sharp fa-solid fa-arrow-up fs-3 text-light mx-3"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col mb-5 d-flex justify-content-center">
                  <div class="card shadow" style="background-color: #2F58CD; width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title text-light">Total des reservations validées</h5>
                      <div class="d-flex flex-row justify-content-center align-items-center my-4">
                        <h2 class="text-light">255</h2>
                        <i class="fa-sharp fa-solid fa-arrow-up fs-3 text-light mx-3"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col mb-5 d-flex justify-content-center">
                  <div class="card shadow" style="background-color: #2F58CD; width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title text-light">Nombre <br> d’adhérents</h5>
                      <div class="d-flex flex-row justify-content-center align-items-center my-4">
                        <h2 class="text-light">255</h2>
                        <i class="fa-sharp fa-solid fa-arrow-up fs-3 text-light mx-3"></i>
                      </div>
                    </div>
                  </div>
                </div>
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