<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Korpa</title>

</head>
<body>



  <?php

  include('header.php');
  include('konekcija.php');

  echo'
  <div class="container" style=" margin-top:30px; ">
  <div class="row">
  <div class="col-lg-12">
  <table class="table table-striped">
  <thead>
  <tr>
  <th scope="col">ID#</th>
  <th scope="col">Izvođač</th>
  <th scope="col">Album</th>
  <th scope="col">Cena</th>
  <th scope="col"></th>
  </tr>
  </thead>
  ';



//echo count($_SESSION['cart']);
  if($_SERVER["REQUEST_METHOD"]=="POST"){


    if(isset($_POST['dugme'])){

      $vrednost_dugmeta = $_POST['dugme'];


      if(isset($_SESSION['cart'])){


        $niz = array_column($_SESSION['cart'],'id_proiz');
        if(in_array($_POST['dugme'],$niz))
        {

          echo"
          <script>
          alert('Izabran proizvod je vec unet');
          window.location.href='prikaz_proizvoda.php';
          </script>";

        }
        else{

          $count=count($_SESSION['cart']);
          $_SESSION['cart'][$count]= array('id_proiz'=>$vrednost_dugmeta,'Quantity'=>1,'cena'=>$_POST['cena'],'izvodjac'=>$_POST['izvodjac'],'album'=>$_POST['album']);
          echo"

          <script>

          alert('Uneto u korpu');
          window.location.href='prikaz_proizvoda.php';


          </script>";

        }




      }
      else{


        $_SESSION['cart'][0] = array('id_proiz'=>$vrednost_dugmeta,'Quantity'=>1,'cena'=>$_POST['cena'],'izvodjac'=>$_POST['izvodjac'],'album'=>$_POST['album']);
        echo"
        <script>
        alert('Uneto u korpu');
        window.location.href='prikaz_proizvoda.php';


        </script>";
        $niz = array_column($_SESSION['cart'],'id_proiz');
        if(in_array($_POST['id_proiz'],$niz))
        {

          echo"
          <script>
          alert('Vec je uneto');
          window.location.href='prikaz_proizvoda.php';


          </script>";

        }
      }
    }
    if(isset($_POST['proba'])){

      foreach ($_SESSION['cart'] as $key => $value) {
        if($value['id_proiz']==$_POST['id']){

          unset($_SESSION['cart'][$key]);
          $_SESSION['cart']=array_values($_SESSION['cart']);
          echo"
          <script>
          alert('Proizvod uklonjen');
          window.location.href='korpa.php';
          </script>";

        }
      }

    }
  }

  if(isset($_POST['brisi'])){

    $count=count($_SESSION['cart'])-1;
    if($count<0){
      echo"Niz je prazan<br>";
      print_r($_SESSION['cart']);
    }
    else{

      unset($_SESSION['cart'][$count]);
      print_r($_SESSION['cart']);
      echo '<br>'.$count;

    }

  }

  $ukupno=0;

  if(isset($_SESSION['cart'])){

    foreach($_SESSION['cart'] as $key => $value)
    {

      $ukupno =  $ukupno + $value['cena'] ;
      echo'

      <tbody>
      <tr>
      <th scope="row">'.$value['id_proiz'].'</th>
      <td>'.$value['izvodjac'].'</td>
      <td>'.$value['album'].'</td>
      <td>'.$value['cena'].' RSD</td>
      <form method="post" action="korpa.php"> 
      <td><button name ="proba" class="btn btn-sm btn-outline-danger">Ukloni</button</td>
      <input type = "hidden" name="id" value='.$value['id_proiz'].'>

      </tr>


      ';


    }

    echo '</body>
    </table>
    </div>
    </div>
    </div>
    
    <div class="container" style=" margin-top:30px; ">
    <div class="row">
    <div class="col-lg-3">
    <div class="border bg-light rounded p-3">
    <h4>Ukupno:</h4>
    <h5 class="text-right">'.$ukupno.' rsd</h5>
    <br>

    <button name="kupi" class="btn btn-primary btn-block">Kupi</button>

    </form>
    
    </div>
    </div>
    </div>
    </div>';
    


  }
  if(isset($_POST['kupi'])){

    if($_SESSION['id_korisnika']=="0"){



      

      echo'<div class="container" style="margin-top:40px;">
      <div class="alert alert-danger alert-dismissable" role="alert">
      <strong>Da biste izvršili kupovinu morate biti ulogovani!</strong> <br>
      </div>
      </div>';







    }
    else{





      $id_proizvoda='';
      foreach ($_SESSION['cart'] as $key => $value){


        $id_proizvoda = $value['id_proiz'].','.$id_proizvoda;
        $id_korisnika = $_SESSION['id_korisnika'];
        
      }
      

      $query = "SELECT * FROM narudzbenica where id_narudzbenica = (SELECT MAX(id_narudzbenica) FROM narudzbenica)";
      $rezultat = $konekcija->query($query);
      
      if($rezultat){

        if($redovi = $rezultat->fetch_assoc()){

          $id= $redovi['id_narudzbenica'];
          $id= $id+1;
        }

      }
      echo $id_korisnika;
      echo $id_proizvoda;
      echo $ukupno;
      

      $upit = "INSERT INTO narudzbenica(id_narudzbenica,id_korisnika,id_proizvoda,cena) values ('$id','$id_korisnika','$id_proizvoda','$ukupno')";
      $rezultat = $konekcija->query($upit);
      if($rezultat){


        echo"<div class='alert alert-success alert-dismissable' role='alert'>
        <strong>Kupovina uspešno izvršena!</strong> <br>
        </div>";

        foreach ($_SESSION['cart'] as $key => $value) {
          
          unset($_SESSION['cart'][$key]);
      }
        



      }
     
    }
  }






// print_r($_SESSION['cart']);




  ?>

  <?php include('footer.php');?>
</body>
</html>