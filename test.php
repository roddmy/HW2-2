<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <title>Тест</title>
    
</head>
<body>

<form method="post">
    
    <?php
    if (!empty($_GET["name"])) {
        $test = json_decode(file_get_contents('./tests/' . $_GET["name"] . '.json'));
        
        foreach($test->questions as $question) {
            echo '<h3>' . $question->question . '</h3>';
            
            foreach($question->choices as $key => $choice) {
                echo '<label><input type="radio" value="' . $key . '" name="' . $question->id . '">'. $choice . '</label>';
            }
        }
    }
    ?>
    <br><input type="submit" value="Проверить ответы">

</form>
</body>
</html>

<?php


if ($_POST) {
    $count = 0;
    
    foreach($_POST as $number => $answer) {
        foreach($test->questions as $question) {
            if ($answer === $question->correct && $number === $question->id) {
                $count++;
            }
        }
    }
    echo '<h3>Правильных ответов: ' . $count . '</h3>';

}
?>