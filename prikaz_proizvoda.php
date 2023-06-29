<!DOCTYPE html>
<html>
<head>
	<title>Vinil</title>

   

	

</head>
<?php

include("header.php");
include("konekcija.php");



?>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-3">
				
			<div class="list-group" style="height:170px" >
					<h2  style="margin-top: 30px;">Sortiraj po ceni</h2>
					<div style="height:360px;  overflow-y:auto; overflow-x:hidden;">
					<div class="list-group-item">
							<div class="list-item">
								<label><input type="checkbox" id="single-checkbox" class=" common_selector cenamin"> Rastuće <b> &#8679;</b></label>
							</div>
							<div class="list-item">
								<label><input type="checkbox" id="single-checkbox" class=" common_selector cenamax"> Opadajuće <b> &#8681;</b></label>
							</div>
				

					</div>
</div>
				</div>
				
				
				<div class="list-group" style="margin-top:30px;">
					<h2>Žanr</h2>
					<div style="height: 360px; overflow-y:auto; overflow-x:hidden;">

						
						<?php

						$upit = "SELECT DISTINCT(Zanr) from vinil order by IdVinila";
						$rezultat= $konekcija->query($upit);
						

						while($red = $rezultat->fetch_assoc()){

							?>

							<div class="list-group-item">
								<label><input type="checkbox" class=" common_selector zanr " value="<?php echo $red['Zanr'];?>"> <?php echo $red['Zanr'];?> </label>
							</div>
							<?php

						}
						?>

					</div>
				</div>
				<div class="list-group" >
					<h2  style="margin-top: 30px;">Izvođač</h2>
					<div style="height:360px;  overflow-y:auto; overflow-x:hidden;">

						
						<?php

						$upit = "SELECT DISTINCT(Izvodjac) from vinil order by IdVinila";
						$rezultat= $konekcija->query($upit);
						

						while($red = $rezultat->fetch_assoc()){

							?>

							<div class="list-item">
								<label><input type="checkbox" class=" common_selector izvodjac" value="<?php echo $red['Izvodjac'];?>"> <?php echo $red['Izvodjac'];?> </label>
							</div>
							<?php

						}
						?>

					</div>
				</div>
				
			</div>

				<div class="col-md-9">
					<br/>
					<div class="row filter_data">

					</div>


				</div>
				
			







		</div>
	</div>

<script>

// JavaScript code
const checkboxes = document.querySelectorAll('#single-checkbox');

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', function() {
    if (this.checked) {
      checkboxes.forEach(cb => {
        if (cb !== this) {
          cb.checked = false;
        }
      });
    }
  });
});



      $(document).ready(function(e){
       
        filter_data();

        function filter_data(){

            
            var action = 'fetch_data';
            var izvodjac = get_filter('izvodjac');
            var cenamin = get_filter('cenamin');
			var cenamax=get_filter('cenamax');
            var zanr = get_filter('zanr');

            $.ajax({
            url:"obrada_podataka.php",
            method:"POST",
            data:{action:action,izvodjac:izvodjac, cenamin:cenamin, cenamax:cenamax, zanr:zanr},
            success:function(data){
                $('.filter_data').html(data);
            }
        });


        }
function get_filter(class_name){

    var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;

}

$('.common_selector').click(function(){
        filter_data();
    });

    

})

</script>

<?php include('footer.php');?>
	</body>
	</html>