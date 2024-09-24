<?php

// https://www.hackerrank.com/challenges/picking-numbers/problem

function pickingNumbersArray($arr) {

  //  sort($arr, SORT_REGULAR);
    
    $longestSubArray = [];
    
    foreach ($arr as $key => $value) {
        $newSub = [$value];
        foreach ($arr as $keyControl => $valueControl) {
            if($key === $keyControl) {
                continue;
            }
            
            $diff = abs($value - $valueControl);
            
            if ($diff <= 1 ) {
                $ableForSubarray = true;
                foreach ($newSub as $valueSub){
                    if(abs($valueControl - $valueSub) > 1) {
                        $ableForSubarray = false;
                        break;
                    }
                }

                if($ableForSubarray) {
                    $newSub[] = $valueControl;
                }
            }


        }

        if(count($longestSubArray) < count($newSub) ) {
            $longestSubArray = $newSub;
        }        
    
    }


    return count($longestSubArray);

}


// $arr = [4,6,5,3,3,1];
$arr = [1,2,2,3,1,2];

$time_pre = microtime(true);
for($i = 0; $i < 100000; $i++) {
    $result = pickingNumbersArray($arr);
}

$time_post = microtime(true);
$exec_time = $time_post - $time_pre;

var_dump($result);
echo "exec time:" . ($exec_time);

