<?php

class CandyCrush {
    const INF = 100000;

    private $times; // Define $times property
    private $n;     // Define $n property
    private $dp;    // Define $dp property
    
    public function howLong($times, $position) {
        $this->times = $times;
        $this->n = count($times);
        $this->dp = array_fill(0, $this->n, array_fill(0, max($times)+1, -1));
        
        return $this->findMaxTime($position, 0);
    }
    
    private function findMaxTime($position, $time) {
        if ($position < 0 || $position >= $this->n || $time >= $this->times[$position]) {
            return $time;
        }

        if ($this->dp[$position][$time] != -1) {
            return $this->dp[$position][$time];
        }
        
        $stay = $this->findMaxTime($position, $time + 1);
        $left = $this->findMaxTime($position - 1, $time + 1);
        $right = $this->findMaxTime($position + 1, $time + 1);

        $this->dp[$position][$time] = max($stay, $left, $right);
        
        return $this->dp[$position][$time];
    }
}


// class CandyCrush {
//     public function howLong($times, $position) {
//         $n = count($times);
//         $maxTime = $times[$position];

//         // Helper function to check if a move is valid
//         $isValidMove = function ($pos) use ($n, $times) {
//             return $pos >= 0 && $pos < $n && $times[$pos] > 0;
//         };

//         while (true) {
//             $leftPosition = $position - 1;
//             $rightPosition = $position + 1;

//             // Move right if position valid and i 
//             if ($isValidMove($rightPosition) && $times[$rightPosition] > $maxTime) {
//                 $maxTime = $times[$rightPosition];
//                 $position = $rightPosition;
//             } elseif ($isValidMove($leftPosition) && $times[$leftPosition] > $maxTime) {
//                 $maxTime = $times[$leftPosition];
//                 $position = $leftPosition;
//             } else {
//                 break;
//             }
//         }

//         return $maxTime;
//     }
// }


// class CandyCrush {
//     public function howLong($times, $position) {
//         $n = count($times);

//         // Helper function to check if the candy can move to a specific position
//         $canMoveToPosition = function($index) use ($n) {
//             return $index >= 0 && $index < $n;
//         };

//         // Helper function to find the maximum crush time of adjacent positions
//         $findMaxCrushTime = function($index) use ($times, $canMoveToPosition, $n) {
//             $maxCrushTime = 0;
//             if ($canMoveToPosition($index - 1)) {
//                 $maxCrushTime = max($maxCrushTime, $times[$index - 1]);
//             }
//             if ($canMoveToPosition($index + 1)) {
//                 $maxCrushTime = max($maxCrushTime, $times[$index + 1]);
//             }
//             return $maxCrushTime;
//         };

//         $maxTime = 0;
//         $currentIndex = $position;

//         // Simulate candy movement until it can't move anymore or maxCrushTime is 0
//         while ($canMoveToPosition($currentIndex) && $times[$currentIndex] > 0) {
//             $maxCrushTime = $findMaxCrushTime($currentIndex);
//             $maxTime = max($maxTime, $maxCrushTime);

//             // Mark the current position as crushed
//             $times[$currentIndex] = 0;

//             // Decide the next position to move based on the maximum crush time
//             if ($canMoveToPosition($currentIndex + 1) && $times[$currentIndex + 1] === $maxCrushTime) {
//                 $currentIndex++;
//             } elseif ($canMoveToPosition($currentIndex - 1) && $times[$currentIndex - 1] === $maxCrushTime) {
//                 $currentIndex--;
//             } else {
//                 // If both left and right positions are not valid or not equal to maxCrushTime,
//                 // break the loop as the candy cannot move anymore
//                 break;
//             }
//         }

//         return $maxTime;
//     }
// }
