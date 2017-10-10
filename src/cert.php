<?php
session_start();
include __DIR__ . '/results.php';
    $im = imagecreatetruecolor(960, 350)
    or die ("Ошибка при создании изображения");
    $colorBg = imagecolorallocate($im, 154, 199, 212);
    $col = imagecolorallocate ($im, 219, 26, 103);
    $font = '/andantino.ttf';
    imagettftext ($im , 18 , 0 , 100 , 100 , $col , $font , $name . ' вы прошли тест');
    imagettftext ($im , 18 , 0 , 100 , 150 , $col , $font , $text);
    header('Content-type: image/png');
    imagepng($im);
    imagedestroy($im);
?>