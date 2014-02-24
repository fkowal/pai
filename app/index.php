<?php
  include "naglowek.htm";
?>

  <h2 style="text-align: center;">Kwestionariusz</h2>

  <hr>

  <form action="podsumowanie.php" method="post">
    <p>Imię<br><input type="text" name="imie" value="" placeholder="np. Alicja" required></p>
    <p>Nazwisko<br><input type="text" name="nazwisko" value="" placeholder="np. Kowalska" required></p>
    <p>Nr indeksu<br><input type="text" name="album" value="" placeholder="np. 7365998" required></p>
    <p>Płeć<br>
      <input type="radio" name="plec" value="K"> kobieta
      <input type="radio" name="plec" value="M"> mężczyzna
    </p>
    
    <hr>
    
    <p>Kategorie prawa jazdy<br>
      <input type="checkbox" name="pjA" value="A"> A<br>
      <input type="checkbox" name="pjB" value="B"> B<br>
      <input type="checkbox" name="pjC" value="C"> C<br>
      <input type="checkbox" name="pjD" value="D"> D<br>
      <input type="checkbox" name="pjInne" value="Inne"> Inne
    </p>
    
    <hr>
    
    <p>Wykształcenie<br>
      <select name="nauka" required>
        <option value="">Proszę wybrać</option>
        <option>podstawowe</option>
        <option>średnie</option>
        <option>wyższe</option>
      </select>
    </p>
    
    <hr>
    
    <p>Uwagi<br>
      <textarea name="uwagi" rows="5" cols="70" placeholder="np. dodatkowe informacje"></textarea><br><br>
    </p>
    
    <hr>
    
    <p>
      <input type="submit" value="Dalej">
      <input type="reset" value="Wyczyść"><br>
    </p>
  </form>

<?php
  include "stopka_prosta.htm";
?>