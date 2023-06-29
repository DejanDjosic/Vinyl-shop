<div class="page-header" >
	<h2 style="margin-left: 100px; margin-top: 20px;">Dobrodošli u našu prodavnicu vinila GrooVinil</h2>
</div>
<div class="container">
	<div class="row">

		<div class="col-md-5" style="padding: 20px;">

			<p class="lead" style="color: black;"> U našoj  prodavnici imate širok izbor vinila  <br>Pravo mesto za ljubitelje kvalitetnog zvuka!</p>
			<p class="text-justify" style="color: black;">

				Hvala Vam što ste nas posetili. <br><br>
			</p>

		</div>

		<div class="col-md-7" style="padding: 20px;">
			<div class="slide_in">
     <div class="slider">
     <div class="images-container">
				<img  src="img/1.jpg" alt="img1"  >
				<img  src="img/2.jpg" alt="img2"  >
				<img  src="img/3.jpg" alt="img3"  >
				<img  src="img/4.jpg" alt="img4"  >
				<img  src="img/5.jpg" alt="img5"  >
       </div>
			</div>
</div>
		</div>
	</div>
</div>
<style>

.slider {
  overflow: hidden;
  width: 100%;
}

.slider .images-container {
  display: flex;
  width: 600%;
  margin: 0;
  left: 0;
  animation: slider 25s infinite;
}

.slider .images-container img {
  width: 16.66%;
}

@keyframes slider {
  0% {
    transform: translateX(0);
  }
  16.66% {
    transform: translateX(0);
  }
  20% {
    transform: translateX(-16.66%);
  }
  36.66% {
    transform: translateX(-16.66%);
  }
  40% {
    transform: translateX(-33.32%);
  }
  56.66% {
    transform: translateX(-33.32%);
  }
  60% {
    transform: translateX(-49.98%);
  }
  76.66% {
    transform: translateX(-49.98%);
  }
  80% {
    transform: translateX(-66.64%);
  }
  96.66% {
    transform: translateX(-66.64%);
  }
  100% {
    transform: translateX(0);
  }
}


.slide_in
{
  animation: slideMe .7s ease-in;
}


@keyFrames slideMe {
  0%
  {
    transform: skewX(35deg) translateX(500px);
  }
  60%
  {
    transform: translateX(0px);
  }
  62%
  {
    transform:skewX(0deg) translateX(10px);
  }
  100%
  {
    transform:skew(0deg);
  }
}
</style>
