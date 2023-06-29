<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<?php

	include('header.php');
	include('konekcija.php');

	?>
	<form method="post">
		<div class="container" style=" margin-top:30px; ">
			<div class="row">
				<div class="col-lg-6">
				</div>

				<div class="col-lg-6">
					<a href="dodavanje.php"><button type="button" class="btn btn-outline-success" style="float:right; margin-bottom:30px;">Dodaj</button></a>
				</div>
				<table class="table table-striped table-dark">
					<thead>
						<tr>
							<th scope="col">#Id </th>
							<th scope="col">Izvođač </th>
							<th scope="col">Album </th>
							<th scope="col">Žanr </th>
							<th scope="col">Azuriranje </th>
							<th scope="col">Brisanje </th>
						</tr>
					</thead>
					<?php


					$upit = "SELECT * FROM vinil";

					$rez = $konekcija->query($upit);
					if($rez){


						while($red = $rez->fetch_assoc()){
							?>

							<tbody>
								<tr>
									<th scope="row"><?php echo $red['IdVinila'] ?></th>
									<td><?php echo $red['Izvodjac'] ?></td>
									<td><?php echo $red['Album'] ?></td>
									<td><?php echo $red['Zanr'] ?></td>
									<td><button name="azuriraj" value="<?php echo $red['IdVinila'] ?>" class="btn btn-sm btn-outline-warning">Ažuriraj</button></td>
									<td><button  name ="brisi" value="<?php echo $red['IdVinila'] ?>" class="btn btn-sm btn-outline-danger">Ukloni</button></td>
								</tr>


							</tbody>



							<?php

						}


					}
					else{

						echo $konekcija->error;

					}

					?>

				</table>
			</div>
		</div>
		<?php

		if(isset($_POST['azuriraj'])){


			$query = "SELECT * FROM vinil where IdVinila LIKE'".$_POST['azuriraj']."'";
			$rez = $konekcija->query($query);
			if($rez){

				if($red = $rez->fetch_assoc()){

					?>
					<div class="container">
						<div class="row">
							<div class="col-lg-6" style="margin:auto;">
								<div class="form-group">
									<label>Id:</label>
									<input class="form-control" name="id" type="text" value="<?php echo $red['IdVinila'] ?>" readonly>

									<small class="form-text text-danger " >Id se ne moze menjati</small>
								</div>
								<div class="form-group">
									<label>Album</label>
									<input type="text" name="album" class="form-control" id="exampleInputPassword1" value="<?php echo $red['Album'] ?>">
								</div>
								<div class="form-group">
									<label>Izvođač</label>
									<input type="text" name="izvodjac" class="form-control" id="exampleInputPassword1" value="<?php echo $red['Izvodjac'] ?>">
								</div>
								<div class="form-group">
									<label>Cena</label>
									<input type="text" name="cena" class="form-control" id="exampleInputPassword1" value="<?php echo $red['Cena'] ?>">
								</div>
								<div class="form-group">
									<label>Trajanje:</label>
									<input type="text" name="trajanje" class="form-control" id="exampleInputPassword1" value="<?php echo $red['Trajanje'] ?>">
								</div>
								<div class="form-group">
									<label>Žanr:</label>
									<input type="text" name="zanr" class="form-control" id="exampleInputPassword1" value="<?php echo $red['Zanr'] ?>">
								</div>
								<div class="form-group">
									<label>Label:</label>
									<input type="text" name="label" class="form-control" id="exampleInputPassword1" value="<?php echo $red['Label'] ?>">
								</div>
								<div class="form-group">
									<label>Slika:</label>
									<input type="text" name="slika" class="form-control" id="exampleInputPassword1" value="<?php echo $red['Slika'] ?>">
								</div>

								<button type="submit" name="azuriranje" class="btn btn-warning" style="margin-bottom: 60px;">Ažuriraj</button>
							</div>
						</div>
					</div>



				}
			

				<?php

			}
		}

	}
	if(isset($_POST['azuriranje'])){



		$id = $_POST['id'];
		$album = $_POST['album'];
		$izvodjac = $_POST['izvodjac'];
		$cena = $_POST['cena'];
		$trajanje = $_POST['trajanje'];
		$zanr = $_POST['zanr'];
		$label = $_POST['label'];
		$slika = $_POST['slika'];
		$query = " UPDATE vinil SET Album='$album', Izvodjac='$izvodjac',Cena='$cena',Trajanje='$trajanje',Zanr='$zanr',Label='$label',Slika='$slika' WHERE IdVinila like '".$id."'";

		$rez = $konekcija->query($query);
		if($rez){
            
			echo"<div class='alert alert-success alert-dismissable' role='alert'>
			<strong>USPEŠNO AŽURIRANO!</strong> <br>
			</div>";
			//header('Refresh:0; URL:admin.php');
			 echo"
          <script>
          alert('Proizvod je ažuriran ');
          window.location.href='admin.php';
          </script>";
		}
		else{

			echo $konekcija->error;


		}


	}




	?>
	<?php
	if(isset($_POST['brisi'])){


		$query = "SELECT * FROM vinil where IdVinila LIKE'".$_POST['brisi']."'";
		$rez = $konekcija->query($query);
		if($rez){

			if($red = $rez->fetch_assoc()){
				?>

				<div class="container">
					<div class="row">
						<div class="col-lg-6" style="margin:auto;">
							<div class="card" style="width: 100%;">
								<div class="card-header">
									Brisanje
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item"><?php echo $red['Izvodjac'];?></li>
									<li class="list-group-item"><?php echo $red['Album'];?></li>
									<li class="list-group-item"><?php echo $red['Cena'];?></li>
									<div class="card-body" style="margin:auto;">
									<button type="submit" value="<?php echo $red['IdVinila'] ?>" name="brisanje" class="btn btn-danger" style="margin-bottom: 60px;">Ukloni</button>
									</div>
								</ul>
							</div>


							
						</div>
					</div>
				</div>

				<?php
			}
		}
	}
	?>
	<?php

	if(isset($_POST['brisanje']))
	{
		$query = "DELETE FROM vinil WHERE IdVinila LIKE '".$_POST['brisanje']."'";
		$rez = $konekcija->query($query);
		if($rez){

			echo"<div class='alert alert-success alert-dismissable' role='alert'>
			<strong>USPEŠNO OBRISANO!</strong> <br>
			</div>";
			//header('Refresh: 0; URL = admin.php');
			 echo"
          <script>
          alert('Proizvod je obrisan ');
          window.location.href='admin.php';
          </script>";

		}
		else{

			echo $konekcija->die;


		}




	}




	?>
	<!--POCETAK-->
	
	<!--POCETAK-->
</form>


</body>
</html>