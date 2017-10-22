<?php

date_default_timezone_set('Europe/Copenhagen');

setlocale(LC_TIME, 'da_DK', 'Danish', 'Denmark', "da-DK");

$text = json_decode(file_get_contents("json/da.json"));
?>