<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
  

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>

    <?php
    include("header.php");
    include("konekcija.php");
    ?>

<form method="post">
<div class="container" style="margin-top:40px;">

<!--<div class='alert alert-danger alert-dismissable' role='alert'>
<strong>Paznja!</strong> Molimo unesite sve parametre!<br>
</div>-->
<?php

    $ime="";
    $prezime="";
    $mejl="";
    $sifra="";
    
    $query= "SELECT * FROM korisnik where idKorisnik = (SELECT MAX(idKorisnik) FROM korisnik)";
    $rezultat = $konekcija->query($query);
    
    if($rezultat){
          
        if($redovi = $rezultat->fetch_assoc()){

            $id= $redovi['idKorisnik'];
            $id= $id+1;
        }

    }

    if(isset($_POST["registracija"])){

        if(!$_POST["ime"] || !$_POST["prezime"] || !$_POST["mejl"] || !$_POST["sifra"] || !$_POST['sifra2']){

            
       
        echo"<div class='alert alert-danger alert-dismissable' role='alert'>
        <strong>Paznja!</strong> Molimo unesite sve parametre!<br>
        </div>";
        }

        else{

            if($_POST["sifra"]==$_POST["sifra2"]){


                $ime=$_POST["ime"];
                $prezime=$_POST["prezime"];
                $mejl=$_POST["mejl"];
                $sifra=$_POST["sifra"];
                
                $upit = "INSERT INTO korisnik(idKorisnik,Ime,Prezime,Email,Sifra,Uloga) VALUES('$id','$ime','$prezime','$mejl','$sifra','2')";
                $rez = $konekcija->query($upit);
                if($rez){

                    echo"
                    <div class='alert alert-success alert-dismissable' role='alert'>
                    <strong>Paznja!</strong> Uspesna registracija!<br>
                    </div>
                    ";
                    header('Refresh: 1; URL = login.php');

                        }
                else{

                    echo $con->error;
                    echo"<div class='alert alert-danger alert-dismissable' role='alert'>
                    <strong>Paznja!</strong> Greska prilikom registracije!<br>
                    </div>";

                    }

               

            }
        else{

         echo"<div class='alert alert-danger alert-dismissable' role='alert'>
         <strong>Paznja!</strong> Molimo unesite pravilno sifre!<br>
         </div>";


        }



        }

    }
    
    ?>
    
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	<a href="login.php" class="float-right btn btn-outline-primary mt-1">Prijava</a>
	<h4 class="card-title mt-2">Registracija</h4>
</header>
<article class="card-body">
<form>
	<div class="form-row">
		<div class="col form-group">
			<label>Ime</label>   
		  	<input type="text" class="form-control" name="ime" placeholder="" value="<?php echo $ime; ?>"required>
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>Prezime</label>
		  	<input type="text" class="form-control" placeholder=" " name="prezime" value="<?php echo $prezime; ?>"required>
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>E-mail</label>
		<input type="email" class="form-control" id="#mejl" placeholder="" name="mejl" value="<?php echo $mejl; ?>"required>
		
	</div> <!-- form-group end.// -->
	
	<div class="form-group">
		<label>Unesite šifru</label>
	    <input class="form-control" type="password" name="sifra" value="<?php echo $sifra; ?>"required>
	</div> <!-- form-group end.// -->  <!-- form-row.// -->
	<div class="form-group">
		<label>Potvrda šifre</label>
	    <input class="form-control" type="password" name="sifra2" value="<?php echo $sifra; ?>"required>
	</div> <!-- form-group end.// -->  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="registracija">Registruj se </button>
    </div>      
                                       
</form>
</article> 
<div class="border-top card-body text-center">Imate nalog? <a href="">Prijava</a></div>
</div>
</div> 
</div> 


</div> 
</form>
<br><br>


<?php include('footer.php');?>

<script type='text/javascript'>

  function regex(event) {
  // event.preventDefault(); // prevent form from refreshing the page
  let izraz = document.querySelector('#mejl').value;
  let patern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  let rezultat = patern.test(izraz);
  if (rezultat) {
    // return false; // prevent form from submitting


} else {
    alert('Neispravna email adresa');
    return false; // prevent form from submitting

  }
}
</body>
</html>