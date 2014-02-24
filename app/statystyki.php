<?php
  include "dane_na_zmienne.php";
  include "funkcje.php";

  Polacz_z_Baza();
  Wybierz_Baze();
  Stworz_Tabele_Osoby_Jesli_Nie_Istnieje();
  Zapisz_Dane_Z_Ankiety($imie, $nazwisko);

  include "naglowek.htm";
?>


  <h2 style="text-align: center;">Statystyki</h2>

<hr>

<p>Dane z tabeli "Osoby"</p>  
<?php
  $wynik = Wykonaj_Zapytanie("SELECT id, imie, nazwisko, czas, IP FROM osoby ORDER BY id DESC");
  Pokaz_Wynik($wynik);
?>

<p>Najpopularniejsze imiona</p>
<?php
  $wynik = Wykonaj_Zapytanie("SELECT count(1) as liczba, imie FROM osoby GROUP BY imie ORDER BY liczba DESC");
  Pokaz_Wynik($wynik);
?>

<p>Najpopularniejsze nazwiska</p>
<?php
  $wynik = Wykonaj_Zapytanie("SELECT count(1) as liczba, nazwisko FROM osoby GROUP BY nazwisko ORDER BY liczba DESC");
  Pokaz_Wynik($wynik);
?>

<?php
  include "stopka.htm";
?>