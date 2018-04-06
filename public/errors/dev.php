<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
    <!-- Meta tag Keywords -->

</head>
<body>
    <div class="header">
        <h1>Произошла Ошибка</h1>
        <p><b>Код ошибки:</b> <?php echo $errorNum ?></p>
        <p><b>Текст ошибки:</b> <?php echo $errorStr ?></p>
        <p><b>Файл ошибки:</b> <?php echo $errorFile ?></p>
        <p><b>Номер строки:</b> <?php echo $errorLine ?></p>
    </div>
</body>
</html>