<?php

$konekcija = new mysqli("localhost","root","","prodavnicavinila");

if($konekcija->error){

    die("Greska:".$konekcija->error);
}

?>