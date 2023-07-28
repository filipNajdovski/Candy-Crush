<?php

class CandyCrush {
    public function howLong($times, $position) {
        $n = count($times);
        $maxTime = 0;

        for ($i = 0; $i < $n; $i++) {
            // Calculate the time it takes for the candy to reach the current position.
            $timeToReach = abs($position - $i);

            // Calculate the time it takes for the current position to get crushed.
            $timeToCrush = max($times[$i] - $timeToReach, 0);

            // Update the maximum time if the current position takes longer to get crushed.
            $maxTime = max($maxTime, $timeToCrush);
        }

        return $maxTime;
    }
}

