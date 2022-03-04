<?php
 include "vendor/autoload.php";
 use Goutte\Client;

 $cr =$cr->request("https://www.autocosmos.cl/auto/nuevo/audi");

 $cr_->filter("#filtros-section-container .card listing-card")->each(function($node){

 }); 
 
 
