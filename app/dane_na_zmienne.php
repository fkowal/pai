<?php
  $imie     = htmlspecialchars($_POST["imie"]);
  $nazwisko = htmlspecialchars($_POST["nazwisko"]);
  $album    = htmlspecialchars($_POST["album"]);
  $plec     = htmlspecialchars($_POST["plec"]);
  $nauka    = htmlspecialchars($_POST["nauka"]);
  $uwagi    = htmlspecialchars($_POST["uwagi"]);
  
  $pjA    = "";
  $pjB    = "";
  $pjC    = "";
  $pjD    = "";
  $pjInne = "";
  $pjBrak = false;
  
  if (isset($_POST["pjA"])) {
    $pjA = htmlspecialchars($_POST["pjA"]);
  }
  
  if (isset($_POST["pjB"])) {
    $pjB = htmlspecialchars($_POST["pjB"]);
  }
  
  if (isset($_POST["pjC"])) {
    $pjC = htmlspecialchars($_POST["pjC"]);
  }
      
  if (isset($_POST["pjD"])) {
    $pjD = htmlspecialchars($_POST["pjD"]);
  }
  
  if (isset($_POST["pjInne"])) {
    $pjInne = htmlspecialchars($_POST["pjInne"]);
  }
  
  if (empty($pjA) && empty($pjB) && empty($pjC) && empty($pjD) && empty($pjInne)) {
    $pjBrak = true;
  }
?>