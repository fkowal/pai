<?php
  include "dane_na_zmienne.php";
  include "naglowek.htm";
?>
  <h2 style="text-align: center;">Podsumowanie kwestionariusza</h2>

  <hr>
  
  <form action="zapisz.php" method="post">
    <p>Imię: <strong><?php echo $imie; ?></strong></p>
    <p>Nazwisko: <strong><?php echo $nazwisko; ?></strong></p>
    <p>Nr indeksu: <strong><?php echo $album; ?></strong></p>
    <p>Płeć: <strong>
    <?php 
      if ($plec == "K") {
        echo "kobieta";
      }
      if ($plec == "M") {
        echo "mężczyzna";
      }
    ?></strong>
    </p>
    
    <hr>
    
    <p>Kategorie prawa jazdy:<br>
      <?php 
        if ($pjBrak) { 
          echo "<strong>brak</strong><br>";
        } else {
          if (!empty($pjA)) { 
            echo "<strong>A</strong><br>"; 
          }
          if (!empty($pjB)) { 
            echo "<strong>B</strong><br>"; 
          }
          if (!empty($pjC)) { 
            echo "<strong>C</strong><br>"; 
          }
          if (!empty($pjD)) { 
            echo "<strong>D</strong><br>"; 
          }
          if (!empty($pjInne)) { 
            echo "<strong>Inne</strong>"; 
          }        
        }
      ?>
    </p>
    
    <hr>
    
    <p>Wykształcenie: <strong><?php echo $nauka; ?></strong></p>
    
    <hr>
    
    <p>Uwagi:<br><strong>
    <?php echo nl2br($uwagi); ?>
    </strong>
    </p>
    
    <hr>
    
    <p>
      <input type="submit" value="Wyślij">
    </p>
    <input type="hidden" name="imie" value="<?php echo $imie; ?>">
    <input type="hidden" name="nazwisko" value="<?php echo $nazwisko; ?>">
    <input type="hidden" name="album" value="<?php echo $album; ?>">
    <input type="hidden" name="plec" value="<?php echo $plec; ?>">
    <input type="hidden" name="pjA" value="<?php echo $pjA; ?>">
    <input type="hidden" name="pjB" value="<?php echo $pjB; ?>">
    <input type="hidden" name="pjC" value="<?php echo $pjC; ?>">
    <input type="hidden" name="pjD" value="<?php echo $pjD; ?>">
    <input type="hidden" name="pjInne" value="<?php echo $pjInne; ?>">
    <input type="hidden" name="nauka" value="<?php echo $nauka; ?>">
    <input type="hidden" name="uwagi" value="<?php echo $uwagi; ?>">
    
  </form>
<?php
  include "stopka.htm";
?>