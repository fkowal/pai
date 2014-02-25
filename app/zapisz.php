<?php
  include "dane_na_zmienne.php";
  include "funkcje.php";

  Polacz_z_Baza();
  Stworz_Tabele_Osoby();
  Zapisz_Dane($imie, $nazwisko);
  
  include "naglowek.htm";
?>

    <h2 style="text-align: center;">Dziękujemy</h2>

	<hr>

	<p>Dane zostały zapisane.</p>

<?php
  include "stopka.htm";
?>