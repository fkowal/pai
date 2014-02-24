<?php

  /**
   * Dokonuje próby połączenia z serwerem bazy danych
   */
  function Polacz_z_Baza()
  {
    $wynik = mysql_connect("localhost","pai" ,"paipass"); 
    if (!$wynik) {
      Pokaz_Blad();
    }
  }

  /**
   * Wybiera właściwą bazę danych
   */
  function Wybierz_Baze()
  {
    $wynik = mysql_select_db("pai");
    if (!$wynik) {
      Pokaz_Blad();
    }
  }

  /**
   * Tworzy tabele Osoby jeśli jej nie ma w bazie danych
   */
  function Stworz_Tabele_Osoby_Jesli_Nie_Istnieje()
  {
    $zapytanie = "CREATE TABLE IF NOT EXISTS osoby(id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, czas datetime, IP char(15), imie char(20), nazwisko char(50))";
    $wynik = mysql_query($zapytanie);

    if (!$wynik) {
      Pokaz_Blad();
    }
  }

  /**
   * Zapisuje wartości z formularza do tabeli w bazie danych
   */
  function Zapisz_Dane_Z_Ankiety($imie, $nazwisko)
  {
    $zapytanie = "INSERT INTO osoby (imie, nazwisko, czas, IP) VALUES ('$imie', '$nazwisko', NOW(), '" . $_SERVER['SERVER_ADDR'] . "')";
    $wynik = mysql_query($zapytanie);

    if (!$wynik) {
      Pokaz_Blad();
    }
  }

  /**
   * Wyświetla błąd związany z operacją na bazie danych i przerywa wykonywanie skryptu
   */
  function Pokaz_Blad()
  {
    echo "<p>\n";
    echo "Numer błędu: <b>".mysql_errno()."</b><br>";
    echo "Opis błędu: <b>".mysql_error()."</b>";
    echo "</p>\n";
    die();
  }

  /**
   * Wykonuje zapytanie na tabeli w bazie danych i go zwraca jeśli jest poprawny
   */
  function Wykonaj_Zapytanie($zapytanie) 
  {
    $wynik = mysql_query($zapytanie);
    
    if (!$wynik) {
      Pokaz_Blad();
    }
    
    return $wynik;
  }

  /**
   * Pokazuje wynik zapytania w postaci tabeli HTML
   */
  function Pokaz_Wynik($wynik)
  {  
    $kolumny = mysql_num_fields($wynik);
    echo "<table border='1'>\n";
    echo "<tr>\n";
    for ($i = 0; $i < $kolumny; $i++) {
      echo "<th>".mysql_field_name($wynik, $i)."</th>\n";
    }
    echo "</tr>\n";
    
    while ($wiersz = mysql_fetch_array($wynik)) {
      echo "<tr>";
      for ($i = 0; $i < $kolumny; $i++) {
        echo "<td>".$wiersz[$i]."</td>\n";
      }
      echo "</tr>\n";
    }	
    echo "</table>\n";
  }

?>