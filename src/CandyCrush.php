<?php
class CandyCrush {
    public function howLong($times, $position) {
        $n = count($times);
        
        // Helper function to check if the candy can move to a specific position
        $canMoveToPosition = function($index) use ($times) {
            return $index >= 0 && $index < count($times) && $times[$index] > 0;
        };
        
        // Helper function to find the maximum crush time of adjacent positions
        $findMaxCrushTime = function($index) use ($times, $canMoveToPosition) {
            $maxCrushTime = 0;
            if ($canMoveToPosition($index - 1)) {
                $maxCrushTime = max($maxCrushTime, $times[$index - 1]);
            }
            if ($canMoveToPosition($index + 1)) {
                $maxCrushTime = max($maxCrushTime, $times[$index + 1]);
            }
            return $maxCrushTime;
        };
        
        $maxTime = 0;
        $currentIndex = $position;
        
        // Simulate candy movement until it can't move anymore
        while ($canMoveToPosition($currentIndex)) {
            $maxCrushTime = $findMaxCrushTime($currentIndex);
            $maxTime = max($maxTime, $maxCrushTime);
            
            // Mark the current position as crushed
            $times[$currentIndex] = 0;
            
            // Decide the next position to move based on the maximum crush time
            if ($canMoveToPosition($currentIndex - 1) && $canMoveToPosition($currentIndex + 1)) {
                if ($times[$currentIndex - 1] >= $times[$currentIndex + 1]) {
                    $currentIndex--;
                } else {
                    $currentIndex++;
                }
            } elseif ($canMoveToPosition($currentIndex - 1)) {
                $currentIndex--;
            } elseif ($canMoveToPosition($currentIndex + 1)) {
                $currentIndex++;
            } else {
                // If both left and right positions are not valid or not equal to maxCrushTime,
                // break the loop as the candy cannot move anymore
                break;
            }
        }
        
        return $maxTime;
    }
}
