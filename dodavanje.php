<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include('header.php');
	include('konekcija.php');
	?>
	<form id="form" onsubmit="return validateForm();" method="post" enctype="multipart/form-data">
		<div class="container" >
			<div class="row">
				<div class="col-lg-6" style="margin:auto;">

					<div class="form-group">
						<label>Album:</label>
						<input type="text" name="album" class="form-control" value="" required>
					</div>
					<div class="form-group">
						<label>Izvođač:</label>
						<input type="text" name="izvodjac" class="form-control" value="" required>
					</div>
					<div class="form-group">
						<label>Cena:</label>
						<input type="text" name="cena" class="form-control"  value="" required>
					</div>
					<div class="form-group">
						<label>Trajanje:</label>
						<input type="text" name="trajanje" class="form-control" value="" required>
					</div>
					<div class="form-group">
						<label>Žanr:</label>
						<input type="text" name="zanr" class="form-control"  value="" required>
					</div>
					<div class="form-group">
						<label>Label:</label>
						<input type="text" name="label" class="form-control" value="" required>
					</div>
					<div class="form-group">
						<label>Slika:</label>
						<div class="custom-file">
							<input type="file" name="fajl" class="custom-file-input" id="customFile" required>
							<label class="custom-file-label" for="customFile">Choose file</label>
						</div>

						
					</div>
					<button type="submit" name="dodavanje" class="btn btn-success"  style="margin-bottom: 60px; width: 100%;">DODAJ</button>
				</div>
			</div>
		</div>
	</form>

	<?php



	$query= "SELECT * FROM vinil where IdVinila = (SELECT MAX(IdVinila) FROM vinil)";
	$rezultat = $konekcija->query($query);

	if($rezultat){

		if($redovi = $rezultat->fetch_assoc()){

			$id= $redovi['IdVinila'];
			$id= $id+1;
		}

	}




	if(isset($_POST['dodavanje']))
	{
		$fajl = $_FILES["fajl"];

		$imefajla = $fajl['name'];
		$mestofajla = $fajl['tmp_name'];
		$tipfajla = $fajl['type'];
		$greskaFajla = $fajl['error'];
		$velicinaFajla = $fajl['size'];
		$ekstenzija = explode(".", $imefajla);
		$uzmiExtenziju = strtolower($ekstenzija[1]);
		$dozvoljene = ['jpg','jpeg','png'];
		if(in_array($uzmiExtenziju, $dozvoljene)){

			if($greskaFajla==0){

				if($velicinaFajla<1000000){
					$destinacija = 'vinili/'.$imefajla;
					move_uploaded_file($mestofajla, $destinacija);
				}
				else
					echo "$imefajla"."je prevelik fajl";

			}
			else
				echo "Greska prilikom ucitavanja";
		}
		else
			echo "nije odgovarajuca ekstenzija";


		$album = $_POST['album'];
		$izvodjac = $_POST['izvodjac'];
		$cena = $_POST['cena'];
		$trajanje = $_POST['trajanje'];
		$zanr = $_POST['zanr'];
		$label = $_POST['label'];
		$slika = $imefajla;


		$query="INSERT INTO vinil (IdVinila,Album,Izvodjac,Cena,Trajanje,Zanr,Label,Slika) values('$id','$album','$izvodjac','$cena','$trajanje','$zanr','$label','$slika') ";
		$rez = $konekcija->query($query);
		if($rez){

			echo"<div class='alert alert-success alert-dismissable' role='alert'>
			<strong>USPEŠNO DODATO!</strong> <br>
			</div>";


		}
		else{

			echo $konekcija->error;
		}
	}



	?>

<script type="text/javascript">
	
	document.getElementById('form').addEventListener('submit', function(event) {
    const inputs = this.querySelectorAll('input[required]');
    let isFormValid = true;

    inputs.forEach(function(input) {
      if (!input.value) {
        isFormValid = false;
      }
    });

    if (!isFormValid) {
      event.preventDefault(); 
      alert('Please fill in all required fields.');
    }
  });

	</script>
</body>
</html>