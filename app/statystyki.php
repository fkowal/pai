<?php
  include "funkcje.php";

  Polacz_z_Baza();
  
  include "naglowek.htm";
?>


  <h2 style="text-align: center;">Statystyki</h2>

  <hr>

<p>Dane z tabeli "Osoby"</p>  
<?php
  $zapytanie = "SELECT id, imie, nazwisko, czas, IP FROM osoby ORDER BY id DESC";
  Wykonaj_Zapytanie($zapytanie);
?>

<p>Najpopularniejsze imiona</p>
<?php
  $zapytanie = "SELECT count(1) as liczba, imie FROM osoby GROUP BY imie ORDER BY liczba DESC";
  Wykonaj_Zapytanie($zapytanie);
?>

<p>Najpopularniejsze nazwiska</p>
<?php
  $zapytanie = "SELECT count(1) as liczba, nazwisko FROM osoby GROUP BY nazwisko ORDER BY liczba DESC";
  Wykonaj_Zapytanie($zapytanie);
?>

<?php
  include "stopka.htm";
?>