<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка файлов с тестами</title>
</head>
<body>

<form action="admin.php" enctype="multipart/form-data" method="post">   
    <h3>Загрузите файл в формате json, содержащий тест:</h3>
    <input type="file" name="testFile" accept=".json">
    <input type="submit" value="Загрузить" name="submit">
</form>
<br><h3><a href="list.php">Список загруженных тестов</a></h3>

<?php

if (isset($_FILES['testFile'])) { 
    if (is_uploaded_file($_FILES['testFile']['tmp_name'])) {     
        $uploaddir = 'tests/';
        $uploadfile = $uploaddir . basename($_FILES['testFile']['name']);      
            if (end(explode('.', $_FILES['testFile']['name'])) !== 'json') {
                echo 'Принимаются файлы только в формате json!';
                exit;
            }
            if ($_FILES['testFile']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES['testFile']['tmp_name'], $uploadfile)) {
                echo "<h3>Файл с тестом успешно загружен</h3>";
            } else {
                echo "<h3>Ошибка! Не удалось загрузить файл</h3>";
                exit;
            }
    }
}
?>
</body>
</html>