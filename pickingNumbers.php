<?php

// https://www.hackerrank.com/challenges/picking-numbers/problem

function pickingNumbers($arr) {

    
    $freq = array_fill(0, 100, 0);


    foreach ($arr as $value) {
        $freq[$value]++;
    }

    $longest = 0;
    foreach ($freq as $key => $value) {
        $longest = max($longest, $value + ($freq[$key - 1] ?? 0));    

    }
    
    return $longest;
}



$arr = [1,2,2,3,1,2];

$time_pre = microtime(true);
for($i = 0; $i < 100000; $i++) {
    $result = pickingNumbers($arr);
}

$time_post = microtime(true);
$exec_time = $time_post - $time_pre;

var_dump($result);
echo "exec time:" . ($exec_time);
