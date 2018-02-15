<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
</head>
<body>
    <h1>Список загруженных тестов</h1>
    <table>

<?php
    $files = array_slice(scandir('tests/' ), 3);
    $count = 1;
if (!empty($files)) {
    foreach ($files as $file) {
        if (end(explode('.', $file)) === 'json') {
            $test = pathinfo($file)['filename'];
            echo '<tr><td>' . $count . ") " . '</td><td><a href="test.php?name=' . $test . '">' . $test . '</a></td></tr>';
            $count++;
        }
    }
} else {
    echo '<tr><td>Нет загруженных тестов</td></tr>';

}
?>
    </table>
</body>
</html>