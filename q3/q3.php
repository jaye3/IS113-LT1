<!-- 
    Name: Jana Ysabelle San Pedro Choa 
    Email: janachoa.2022
 -->

<?php

function find_max_eats($quicker_food, $slower_food, $break_t) {
    $results = []; // total time => num of items
    $countSlowFood = 0;

    $rounds = intdiv($break_t, $quicker_food);

    while ($countSlowFood < $rounds) {
        $curr_t = $slower_food * $countSlowFood;
        $internal_t = $curr_t;
        $countQuickFood = 0;

        while ($internal_t <= $break_t) {
            $internal_t += $quicker_food;
            if ($internal_t <= $break_t) {
                $curr_t += $quicker_food;
                $countQuickFood++;
                // echo "<br>$countQuickFood, $countSlowFood, $break_t, internal t: $internal_t <br>";
            } else {
                break;
            }
        }
        
        $totalCount = $countQuickFood + $countSlowFood;
        
        if ($curr_t == $break_t) {
            return [
                $curr_t => $totalCount
            ];
        } elseif ($curr_t > $break_t) {
            return $results;
        } else {
            if (array_key_exists($curr_t, $results)) {
                $results[$curr_t] = max($results[$curr_t], $totalCount); 
            } else {
                $results[$curr_t] = $totalCount; 
            }
            $countSlowFood++;
        }
    }
}


function solve_t(int $cake_t, int $pie_t, int $break_t): int
{
    // YOUR CODE GOES HERE
    // if not enough time at all, end func
    if (($cake_t > $break_t) || ($pie_t > $break_t)) {
        return -1;
    }
    // shouldn't have included this ^^ 
    
    // finding food with best RoR
    if ($cake_t < $pie_t) {
        $quicker_food = $cake_t;
        $slower_food = $pie_t;
    } else {
        $quicker_food = $pie_t;
        $slower_food = $cake_t;
    }

    // $results = []; // total time => num of items
    // $countSlowFood = 0;

    // $rounds = intdiv($break_t, $quicker_food);

    // while ($countSlowFood < $rounds) {
    //     $curr_t = $slower_food * $countSlowFood;
    //     $internal_t = $curr_t;
    //     $countQuickFood = 0;

    //     while ($internal_t <= $break_t) {
    //         $internal_t += $quicker_food;
    //         if ($internal_t <= $break_t) {
    //             $curr_t += $quicker_food;
    //             $countQuickFood++;
    //             // echo "$cake_t, $pie_t, $break_t, internal t: $internal_t <br>";
    //         } else {
    //             break;
    //         }
    //     }
    //     $totalCount = $countQuickFood + $countSlowFood;
    //     if ($curr_t == $break_t) {
    //         return $totalCount;
    //     } elseif (array_key_exists($curr_t, $results)) {
    //         $results[$curr_t] = max($results[$curr_t], $totalCount); 
    //     } else {
    //         $results[$curr_t] = $totalCount; 
    //     }

    //     $countSlowFood++;
    // }

    $results = find_max_eats($quicker_food, $slower_food, $break_t);

    $maxTime = max(array_keys($results));
    if ($maxTime != $break_t) {
        // echo "Not exact!";
        return -1;
    } else {
        return $results[$maxTime];
    }


}

function solve(int $cake_t, int $pie_t, int $break_t): array
{
    // YOUR CODE GOES HERE
    $items_eaten = solve_t($cake_t, $pie_t, $break_t);
    
    if ($items_eaten != -1) {
        $coffee_t = 0;
        return [$items_eaten, 0];
    } 

    if ($cake_t < $pie_t) {
        $quicker_food = $cake_t;
        $slower_food = $pie_t;
    } else {
        $quicker_food = $pie_t;
        $slower_food = $cake_t;
    }

    $all_times = find_max_eats($quicker_food, $slower_food, $break_t);
    // $currMax = max(array_keys($all_times));
    // unset($all_times[$currMax]);
    $maxTime = max(array_keys($all_times));
    $maxEats = $all_times[$maxTime];
    
    // echo "<br>Break: $break_t, Max time and eats: $maxTime, $maxEats<br>";
    
    $coffee_t = $break_t - $maxTime;

    return [$maxEats, $coffee_t];



}
?>