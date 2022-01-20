<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if ($_GET["id"]) {
        echo "<img src='https://www.koreapas.com/logo/";
        echo $_GET["id"];
        echo ".png' alt=''>";
    } else {
        echo "없음";
    }
    ?>



</body>

</html>