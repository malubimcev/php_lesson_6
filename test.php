<?php
//test.php
    $testResults = '';
    $fileName = '';
    $json = '';
    $data = [];
    $fields = [];
    if (isset($_GET['test_number'])) {
        $fileName = "test_".htmlspecialchars($_GET['test_number']).".json";
        writeLog('$fileName='.$fileName);
        $json = file_get_contents($fileName);
        $data = json_decode($json, true);
    }
    if (isset($_POST['isRight'])) {
        $testResults = "<h2>Test results:</h2>";
    }
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>test</title>
    <link rel="stylesheet" href="css/styles.css"/>
  </head>
  <body>
    <section class="main-container">
        <h1>Тест: <?php echo $data['testName']; //вывод названия теста ?></h1>
        <div class="form-container">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="test-form">
            <?php $q = 0;//инициализация счетчика вопросов для создания уникальных имен групп radio-переключателей
            foreach ($data['questions'] as $question): ?>
                <fieldset class="question">
                <legend class="question-legend"><?php echo $question['question']; $q++; ?></legend>
                <?php foreach ($question['answers'] as $answer_key => $answer): ?>
                    <label class="test-answer"><?php echo $answer['answer']; ?>
                        <input type="radio" name="<?php echo $q; ?>" value="<?php echo $answer['isRight']; ?>" /><br>
                    </label>
                <?php endforeach; ?>
                </fieldset>
            <?php endforeach; ?>
            <input type="submit" value="Результаты теста" class="button result-button" />
        </form>
        </div>
        <div class="form-container">
            <?php echo $testResults; ?>
        </div>
    </section>
  </body>
</html>
