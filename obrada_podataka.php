<?php

include('konekcija.php');

if(isset($_POST["action"]))
{
   
 $query = "
 SELECT * FROM vinil WHERE 1
 ";
 
 if(isset($_POST["izvodjac"]))
 {
  $izvodjac_filter = implode("','", $_POST["izvodjac"]);
  $query .= "
   AND Izvodjac IN('".$izvodjac_filter."')
  ";
 }
 if(isset($_POST["zanr"]))
 {
  $zanr_filter = implode("','", $_POST["zanr"]);
  $query .= "
   AND Zanr IN('".$zanr_filter."')
  ";
 }
 if(isset($_POST["cenamin"]))
 {
  $query .= "
   order by cena asc
  ";
 }
 if(isset($_POST["cenamax"]))
 {
  $query .= "
   order by cena desc
  ";
 }

//  if(isset($_POST['cenamin'])&&isset($_POST['cenamax']))
//  {
//     echo"morate izabrati izmedju";
//  }

 $rezultat = $konekcija->query($query);
 $output = '';

if($rezultat===false){

echo"Greska prilikom upita";
$rezultat = $konekcija->query($query);
$output .= '';

echo($query);



}
else{

    $total_row = $rezultat->num_rows;
   
    if($total_row > 0)
    {
     while($redovi = $rezultat->fetch_assoc())
     {
      $output .= '
      <div class="col-md-4 col-sm-6 mb-4 pb-2">
      <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
          <div class="list-card-image">

              <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="icofont-heart"></i></a></div>

              <a href="#">
                  <img src="vinili/'. $redovi['Slika'] .'" class="img-fluid item-img">
              </a>
          </div>
          <div class="p-3 position-relative">
              <div class="list-card-body">
                  <h6 class="mb-1"><a href="#" class="text-black">'. $redovi['Album'] .'
                  </a>
              </h6>
              <p class="text-gray mb-3">Album : '. $redovi['Label'].'<br> Izvođač : '. $redovi['Izvodjac'] .'<br>'.'Trajanje : '. $redovi['Trajanje'] .'min'.'</p>
              <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"> '. $redovi['Cena'] .' rsd</span></p>
              <form method="post" action="korpa.php">
              <input type="hidden" name="album" value="'. $redovi['Album'] .'">
              <input type="hidden" name="izvodjac" value="'. $redovi['Izvodjac'] .'">
              <input type="hidden" name="cena" value="'. $redovi['Cena'] .'">
              <button class="btn btn-primary" id="dgm" name="dugme" value ="'.$redovi['IdVinila'].'">Dodaj u korpu</button>
              </form>
          </div>
          
      </div>
  </div>
</div>
      ';
     }
    }
    else
    {
     $output = '<h3>No Data Found</h3>';
    }
    echo $output;
   
   
   
   
   
   
   
   
    
   }
   





}




?>