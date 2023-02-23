<?php

$ptbr = 'vendor/laravel-lang/lang/locales/pt_BR/php.json';
$enToPt = 'lang/pt-br/validation.php';

$ptbr = json_decode(file_get_contents($ptbr), true);
$handle = fopen($enToPt, "a+");

while (!feof($handle)) {
    $linha = fgets($handle);
    foreach ($ptbr as $key => $value) {
        if (str_contains($linha, $key)) {
            $linha = str_replace($key, $value, $linha);
            fwrite($handle, $linha);
        }
    }
}

fclose($handle);

