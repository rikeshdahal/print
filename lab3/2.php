<?php
$arr1 = ['Hunar', 'Dahal'];
$s = 'Hargun';
$a = 19;
$f = 10.2;
$c = true;
echo gettype($arr1) . '<br>';
echo gettype($s) . '<br>';
echo gettype($a) . '<br>';
echo gettype($f) . '<br>';
echo gettype($c) . '<br>';

class II
{
    function getData()
    {
        echo 'hello world' . '<br>';
    }
}
$Obj = new II();
$Obj->getData();
echo gettype($Obj);
?>
