<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
 
</head>
<body>
<?php

include('header.php');
include('konekcija.php');
$mejl = ""; 
$sifra = "";


if(isset($_POST["prijava"])){

	$mejl = $_POST['mejl'];
	$sifra= $_POST['sifra'];



	$upit = "SELECT * FROM korisnik where Email = '$mejl' AND Sifra = '$sifra' ";
	$rezultat = $konekcija->query($upit);

	if(!$rezultat){

		die("greska".$konekcija->error);
		echo"<div class='alert alert-danger alert-dismissable' role='alert'>
		<strong>Paznja!</strong> Molimo unesite odgovarajuće parametre!<br>
		</div>";
		

		
	}
	else{

		if($red = $rezultat->fetch_assoc()){

			$_SESSION['id'] = $red['Uloga'];
			$_SESSION['korIme'] = $red['Ime'];
			$_SESSION['id_korisnika'] = $red['idKorisnik'];
			echo"<div class='alert alert-success alert-dismissable' role='alert'>
                    <strong>Uspešna prijava!</strong> <br>
                    </div>";
			header('Refresh: 2; URL = prikaz_proizvoda.php');

		}




	}

	



}


?>
<form method="post">
<div class="container" style="margin-top:40px;">

<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	<a href="reg.php" class="float-right btn btn-outline-primary mt-1">Registracija</a>
	<h4 class="card-title mt-2">Prijava</h4>
</header>
<article class="card-body">
<form>
	
	<div class="form-group">
		<label>E-mail</label>
		<input type="email" class="form-control" placeholder="" name="mejl" value="<?php echo $mejl; ?>" required>
		
	</div> <!-- form-group end.// -->
	
	<div class="form-group">
		<label>Unesite šifru</label>
	    <input class="form-control" type="password" name="sifra" value="<?php echo $sifra; ?>"required>
	</div> <!-- form-group end.// -->  <!-- form-row.// -->

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="prijava">Prijavi se </button>
    </div> <!-- form-group// -->      
                                       
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Nemate nalog? <a href="reg.php">Registracija</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
</form>
<!--container end.//-->

<br><br>


    <?php include('footer.php');?>
</body>
</html>