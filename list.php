<?php
//list.php
    $testList = scandir('files/');
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/styles.css"/>
  </head>
  <body>
      <section class="main-container">
        <h1>Tests</h1>
        <ul class="file-list">
          <?php foreach ($testList as $key => $value) {
              if ($key > 1) {
                $testNum = $key - 1;
                echo "<li>$testNum $value</li>";
              }
          } ?>
        </ul>
        <div class="form-container">
          <form action="test.php" method="GET" class="file-input-form">
            <label for="test_number" class="label">Выберите номер теста:</label>
            <input type="text" name="test_number">
            <input type="submit" value="Загрузить тест" class="button select-button" />
          </form>
        </div>
     </section>
  </body>
</html>
