﻿<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>Tilly的原型</title>
    <link href="css/base.css" rel="stylesheet" type="text/css" />
</head>
<body>


<p><a href="index.php" class="goback">返回原型目录：</a></p>
<?php

    if(empty($_GET['proName'])){
        die('Wrong Request');
    }

require_once "common_function.php";

echo "<iframe frameborder='0' border='0' src='".getApplicationDir()."/{$_GET['proName']}' style='width: 100%;height: 900px'></iframe>";

?>

</body>
</html>
