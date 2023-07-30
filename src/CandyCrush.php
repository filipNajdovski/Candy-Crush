<?php
class CandyCrush {
    public function howLong($times, $position) {
        $n = count($times);

        // Helper function to check if the candy can move to a specific position
        $canMoveToPosition = function($index) use ($n) {
            return $index >= 0 && $index < $n;
        };

        // Helper function to find the maximum crush time of adjacent positions
        $findMaxCrushTime = function($index) use ($times, $canMoveToPosition, $n) {
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

        // Simulate candy movement until it can't move anymore or maxCrushTime is 0
        while ($canMoveToPosition($currentIndex) && $times[$currentIndex] > 0) {
            $maxCrushTime = $findMaxCrushTime($currentIndex);
            $maxTime = max($maxTime, $maxCrushTime);

            // Mark the current position as crushed
            $times[$currentIndex] = 0;

            // Decide the next position to move based on the maximum crush time
            if ($canMoveToPosition($currentIndex + 1) && $times[$currentIndex + 1] === $maxCrushTime) {
                $currentIndex++;
            } elseif ($canMoveToPosition($currentIndex - 1) && $times[$currentIndex - 1] === $maxCrushTime) {
                $currentIndex--;
            } else {
                // If both left and right positions are not valid or not equal to maxCrushTime,
                // break the loop as the candy cannot move anymore
                break;
            }
        }

        return $maxTime;
    }
}
