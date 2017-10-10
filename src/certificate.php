<?php
require_once '../core/core.php';
include __DIR__ . '/results.php';
$width = getimagesize(__DIR__ . '/image3.png')[0];
$height = getimagesize(__DIR__ . '/image3.png')[1];
$image = imagecreatetruecolor($width, $height);
$imBox = imagecreatefrompng(__DIR__ . '/image3.png');
$nameColor = imagecolorallocate($imBox, 0, 0, 0);
$correctColor = imagecolorallocate($imBox, 14, 124, 5);
$incorrectColor = imagecolorallocate($imBox, 218, 28, 6);
imagecopy($image, $imBox, 0, 0, 0, 0, $width, $height);
imagettftext($imBox, 30, 0, 50, 100, $nameColor, './Roboto-Regular.ttf', $name . ', ваш результат: ');
imagettftext($imBox, 25, 0, 50, 200, $correctColor, './Roboto-Regular.ttf', $correct);
imagettftext($imBox, 25, 0, 50, 250, $incorrectColor, './Roboto-Regular.ttf', $incorrect);
header('Content-type: image/png');
imagepng($imBox);
imagedestroy($image);
imagedestroy($imBox);
