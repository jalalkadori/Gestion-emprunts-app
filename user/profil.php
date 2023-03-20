<?php 
include("./dbConnection.php");
include("./session_config.php");

$adherent_id = $_SESSION['id_adherent'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LGM | Profil</title>
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

    <?php
        

        $adherent_account_request = "SELECT * FROM `adherent` WHERE adherent.ID_ADHERENT = '$adherent_id'";
        $adherent_account = $db_connection->prepare($adherent_account_request);
        $adherent_account->execute();
        $adherent = $adherent_account->fetch( PDO::FETCH_ASSOC);


    ?>




      <div class="container-fluid">

        <div class="row min-vh-100 d-flex justify-content-between">

          <div class="col-2 d-flex flex-column align-items-center shadow-sm" style="background-color: #2F58CD; border-radius: 0 25px 0 0">
            <a class="btn bg-white my-3 rounded-pill w-100 font-weight-bold" href="index.php">Page d'accueil</a>
            <a class="btn bg-white mb-3 rounded-pill w-100 font-weight-bold" href="modification.php">Modifier mes informations</a>
          </div>
       
    

          <div class="col-9">
            <section class="container-fluid text-uppercase">
                <h3 class="text-center colorBlue">mon profil</h2>
                <div class="border-bottom border-3">
                    <h5 class=" colorBlue">mes information peronnelles :</h2>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom et Prenom</th>
                            <th scope="col">CIN</th>
                            <th scope="col">pénalités</th>  
                            <th scope="col">Staut de compte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $adherent['NOM_ADHERENT'] . ' ' . $adherent['PRENOM_ADHERENT']?></td>
                            <td><?php echo $adherent['CIN_ADHERENT'] ?></td>
                            <td><?php echo $adherent['PENALITE'] ?></td>
                            <td><?php if($adherent['PENALITE'] < 3){echo 'active';} else {echo 'suspendu';}?></td>
                        </tr>
                    </tbody>
                </table>
                      
            </section>
            <section class="container-fluid text-uppercase my-5">   
                <div class="border-bottom border-3">
                    <h5 class=" colorBlue">mes reservations : </h2>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID reservation</th>
                            <th scope="col">code ouvrage</th>
                            <th scope="col">date de reservation</th>
                            <th scope="col">staut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      
                            $reservation_request = "SELECT * FROM `reservation` WHERE ID_ADHERENT = '$adherent_id'";
                            $reservation_list = $db_connection->prepare($reservation_request);
                            $reservation_list->execute();
                            

                            while($row = $reservation_list->fetch(PDO::FETCH_ASSOC)) {
                           
                                echo "
                                        <tr>
                                            <td>".$row['ID_RESERVATION']."</td>
                                            <td>".$row['CODE_OUVRAGE']."</td>
                                            <td>".date("d-m-Y h:i", strtotime($row['DATE_RESERVATION'])) ."</td>
                                            <td>en cours</td>
                                        </tr>
                                    ";
                            }

                        ?>
                    </tbody>
                </table>
                <h6 class="text-danger fw-lighter text-lowercase">* Les réservations annulées seront supprimées automatiquement après 24 h. </h6>   
            </section>
            <section class="container-fluid text-uppercase my-5">
                <div class="border-bottom border-3">
                    <h5 class=" colorBlue">mes emprunts :</h2>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id d'emprunt</th>
                            <th scope="col">code d'ouvrage</th>
                            <th scope="col">date d'emprunt</th>
                            <th scope="col">Date effective du retour</th>
                            <th scope="col">date du retour</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      
                      $emprunt_list_request = "SELECT * FROM `emprunt` WHERE ID_ADHERENT = '$adherent_id'";
                      $emprunt_list = $db_connection->prepare($emprunt_list_request);
                      $emprunt_list->execute();
                      

                      while($row = $emprunt_list->fetch(PDO::FETCH_ASSOC)) {
                     
                          echo "
                                <tr>
                                    <td>".$row['ID_EMPRUNT']."</td>
                                    <td>".$row['CODE_OUVRAGE']."</td>
                                    
                                    <td>en cours</td>
                                    <td>en cours</td>
                                    <td>en cours</td>
                                </tr>
                              ";
                      }

                  ?>
                    </tbody>
                </table>
                      
            </section>

            <div class="container my-5 text-center text-uppercase">
              <!-- <h3 class="text-center mb-5 text-uppercase">list des ouvrages</h1>
              <div class="row row-cols-4"> -->
                <!-- <?php

                // $list_ouvrage = $db_connection->prepare($list_ouvrage_request);
                // $list_ouvrage->execute();

                // while($row = $list_ouvrage->fetch(PDO::FETCH_ASSOC)) {
                //     echo "
                //         <div class='col'>
                //             <div class='card position-relative' style='width: 15rem; height:400px;'>
                //                 <img src='".$row['IMG_OUVRAGE']."' class='card-img-top img-thumbnail' style='height:200px;'>
                //                 <div class='card-body d-flex flex-column justify-content-end'>
                //                     <h5 class='card-title'>".$row['TITRE_OUVRAGE']."</h5>
                //                     <p class='card-text'>Par : ".$row['NOM_AUTHEUR']."</p>                               
                //                     <a href='#' class='btn btn-dark w-100 text-uppercase'>réserver</a>
                //                 </div>
                //                 <span class='position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle'>
                //                     <span class='visually-hidden'>New alerts</span>
                //                 </span>
                //             </div>
                //         </div>
                //     ";
                // }
                ?> -->
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