<?php

  $polaczenie = NULL;

  /**
   * Dokonuje próby połączenia z serwerem bazy danych
   */
  function Polacz_z_Baza()
  {
    global $polaczenie;

    $polaczenie = new PDO("sqlite:kwestionariusze.db");
  }

  /**
   * Tworzy tabele "osoby" jeśli jej nie ma w bazie danych
   */
  function Stworz_Tabele_Osoby()
  {
    global $polaczenie;

    $zapytanie = "CREATE TABLE IF NOT EXISTS osoby(id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, czas datetime, IP char(15), imie char(20), nazwisko char(50))";
    $polaczenie->exec($zapytanie);
  }

  /**
   * Zapisuje wartości z formularza do tabeli w bazie danych
   */
  function Zapisz_Dane($imie, $nazwisko)
  {
    global $polaczenie;  

    $zapytanie = "INSERT INTO osoby (imie, nazwisko, czas, IP) VALUES ('$imie', '$nazwisko', datetime(), '" . $_SERVER['HTTP_HOST'] . "')";
    $polaczenie->exec($zapytanie);
  }

  /**
   * Wykonuje zapytanie na tabeli w bazie danych i pokazuje wynik zapytania w postaci tabeli HTML
   */
  function Wykonaj_Zapytanie($zapytanie) 
  {
    global $polaczenie;

    $wynik = $polaczenie->query($zapytanie);
    $wynik->setFetchMode(PDO::FETCH_ASSOC);

    echo "<table border='1'>\n";
    
    echo "<tr>\n";
    for ($i = 0; $i < $wynik->columnCount(); $i++) {
      $kolumna = $wynik->getColumnMeta($i);
      echo "<th>" . $kolumna['name'] . "</th>\n";
    }
    echo "</tr>\n";

    foreach ($wynik as $wiersz) {
      echo "<tr>\n";
      foreach ($wiersz as $komorka) {
        echo "<td>$komorka</td>\n";
      }
      echo "</tr>\n";
    }
    
    echo "</table>\n";
  }

?>