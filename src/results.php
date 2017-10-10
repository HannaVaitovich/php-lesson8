<?php
require_once '../core/core.php';

if (!empty($_POST)) {
$correct = 0;
$incorrect = 0;
$file_dir = '../tests/';
$test_name = $_POST['test'];
$test = file_get_contents($file_dir . $test_name . '.json');
$test = json_decode($test, true); 

    foreach($test as $qn => $q)
{ 
    if (isset($qn) && isset($_POST['a'.$qn])) {
    if( $q['correctAnswer'] == $_POST['a'.$qn] ) {
        $correct ++; 
    } else {
        $incorrect ++;
}
} else {
    echo "Ошибка! Bыберете тест из ".'<a href="../list.php">списка</a>'." и ответьте на все вопросы!";
    exit;
}

}

$name = getAuthorizedUser()['username'];
$correct = 'Правильных ответов: '.$correct;
$incorrect = 'Неправильных ответов: '.$incorrect;

}
