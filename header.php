<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodavnica vinila</title>
 
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
  <!--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>-->
  <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
  <!--<script src="JS/jquery-ui.js"></script>-->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="JS/jquery-1.10.2.min.js"></script>
  <link href = "stil/bootstrap.min.css" rel = "stylesheet">
  <link href = "stil/all.min.css" rel = "stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  
</head>
<body>
  <!-- MORA DA SE DORADI NE ZABORAVI!!!!! -->

      <?php
    if(!isset($_SESSION['IdKorisnik'])){

      $_SESSION['IdKorisnik'] = "0";


    }

      if(!isset($_SESSION['id'])){

       
        $_SESSION['id']= 0; 
        
       
        
      }
      else{
        $broj_proizvoda = 0;
        if(isset($_SESSION['cart'])){

          $broj_proizvoda=count($_SESSION['cart']);
          


        }
        if($_SESSION['id'] === 0){

         
          echo'
          <nav class="navbar navbar-expand-md  navbar navbar-dark bg-dark">
        
          <!-- Collapse button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav17"
            aria-controls="basicExampleNav17" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <!-- Links -->
          <div class="collapse navbar-collapse" id="">
        
            <!-- Right -->
           <h3> <a class="navbar-brand" href="index.php" style="margin-left:50px;">GrooVinyl</a></h3>
            <ul class="navbar-nav ml-auto">
            
              <li class="nav-item">
              
                <a href="korpa.php" class="nav-link navbar-link-2 waves-effect">
                  <span class="badge badge-danger">';echo $broj_proizvoda; echo'</span>
                  <i class="fas fa-shopping-cart pl-0"></i> Korpa
                </a>
             
              <li class="nav-item">
                <a href="index.php" class="nav-link waves-effect">
                  Home
                </a>
              </li>
             <li class="nav-item">
                <a href="prikaz_proizvoda.php" class="nav-link waves-effect">
                  Proizvodi
                </a>
              </li>

              
              <li class="nav-item">
                <a href="login.php" class="nav-link waves-effect">
                  Prijava
                </a>
              </li>
              <li class="nav-item pl-2 mb-2 mb-md-0">
                <a href="reg.php" type="button"
                  class="btn btn-outline-info btn-md btn-rounded btn-navbar waves-effect waves-light">Registracija</a>
              </li>
          ';
        
        
        }
        
        if($_SESSION['id'] == 1){
        echo'
        <nav class="navbar navbar-expand-md  navbar navbar-dark bg-dark">
        
          <!-- Collapse button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav17"
            aria-controls="basicExampleNav17" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <!-- Links -->
          <div class="collapse navbar-collapse" id="">
        
            <!-- Right -->
            <h3> <a class="navbar-brand" href="index.php" style="margin-left:50px;">GrooVinyl</a></h3>
            <ul class="navbar-nav ml-auto">
            
              <li class="nav-item">
                <a href="korpa.php" class="nav-link navbar-link-2 waves-effect">
                  <span class="badge badge-danger">';echo $broj_proizvoda; echo'</span>
                  <i class="fas fa-shopping-cart pl-0"></i> Korpa
                </a>
              </li>
              
             
              <li class="nav-item">
                <a href="index.php" class="nav-link waves-effect">
                  Home
                </a>
              </li>
             <li class="nav-item">
                <a href="prikaz_proizvoda.php" class="nav-link waves-effect">
                  Proizvodi
                </a>
              </li>
             <li class="nav-item">
                  <a href="admin.php" class="nav-link waves-effect">
                    Admin panel
                  </a>
                </li>
              </li>
              <li class="nav-item">
                <div class="nav-link waves-effect">
                  Dobrodošli '; echo $_SESSION['korIme']; echo'
                </div>
              </li>
              <li class="nav-item">
                <a href="odjava.php" class="nav-link waves-effect">
                  Odjava
                </a>
              </li>
             
        ';
        
        }
        if($_SESSION['id'] == 2){
          echo'
          <nav class="navbar navbar-expand-md  navbar navbar-dark bg-dark" style="margin-bottom:30px;">
          
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav17"
              aria-controls="basicExampleNav17" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <!-- Links -->
            <div class="collapse navbar-collapse" id="">
          
              <!-- Right -->
              <h3> <a class="navbar-brand" href="index.php" style="margin-left:50px;">GrooVinyl</a></h3>
              <ul class="navbar-nav ml-auto">
              
                <li class="nav-item">
                  <a href="korpa.php" class="nav-link navbar-link-2 waves-effect">
                    <span class="badge badge-danger">';echo $broj_proizvoda; echo'</span>
                    <i class="fas fa-shopping-cart pl-0"></i> Korpa
                  </a>
                </li>
                
                <li class="nav-item">
                <a href="index.php" class="nav-link waves-effect">
                  Home
                </a>
              </li>
               <li class="nav-item">
                  <a href="prikaz_proizvoda.php" class="nav-link waves-effect">
                    Proizvodi
                  </a>
                </li>
                <li class="nav-item">
                  <div class="nav-link waves-effect">
                    Dobrodošli '; echo $_SESSION['korIme']; echo'
                  </div>
                </li>
               
                <li class="nav-item">
                  <a href="odjava.php" class="nav-link waves-effect">
                    Odjava
                  </a>
                </li>
               
          ';
          
          }





      }
     


?>
    </ul>

  </div>
 

</nav>









</body>
</html>