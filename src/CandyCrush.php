<?php

class CandyCrush {
    public function howLong($times, $position) {
        $n = count($times);
        $left = 0;
        $right = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($i < $position) {
                $left = max($left, $times[$i] - ($position - $i));
            } else if ($i > $position) {
                $right = max($right, $times[$i] - ($i - $position));
            }
        }
        return max($left, $right);
    }
}
